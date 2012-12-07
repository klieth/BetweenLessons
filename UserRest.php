<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once("restinclude/Rest.php");

class UserRest extends REST {
	public $data = "";

	const DB_SERVER = "classroom.cs.unc.edu";
	const DB_USER = "klieth";
	const DB_PASSWORD = "NMHVWQTxeP6pbBmR";
	const DB = "comp42620db";

	private $db = NULL;

	public function __construct() {
		parent::__construct();
		$this->dbConnect();
	}

	private function dbConnect() {
		$this->db = mysqli_connect(self::DB_SERVER,self::DB_USER,self::DB_PASSWORD,self::DB);
		if (mysqli_connect_errno($this->db))
			$this->response('Database error: ' . mysqli_connect_error(),500);
	}

	public function process() {
		if ($this->get_request_method() == "GET") {
			if (!isset($this->_request['uname'] || !isset($this->_request['pass']))) {
				$this->response('User ID and password must be specified',400);
			}
			$this->auth(_request['uname'],_request['pass']);
		}
	}

	private function auth($uname,$pass) {
		$res = mysqli_query($this->db, "SELECT uid,first,last FROM User WHERE pass = MD5('" . $pass . "')");
		$row = mysqli_fetch_assoc($res);
		if ($row['first'] == $uname) {
			$this->response(json_encode($row),200);
		} else {
			$this->response("Wrong username/password",400);
		}
	}
}

$userRest = new UserRest;
$userRest->process();
?>
