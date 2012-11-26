<?php
require_once("restinclude/Rest.php");

class SongRest extends REST {
	public $data = "";

	const DB_SERVER = "";
	const DB_USER = "";
	const DB_PASSWORD = "";
	const DB = "";

	private $db = NULL;

	public function __construct() {
		parent::__construct();
		//$this->dbConnect();
	}

	private function dbConnect() {
		$this->db = mysql_connect(self::DB_SERVER,self::DB_USER,self::DB_PASSWORD);
		if ($this->db) mysql_select_db(self::DB,$this->db);
	}

	public function process() {
		$func = 'get_songs';
		// ADD OTHER FUNCTIONS
		// depends on parameters passed in url and request method
		//if (!is_null(substr($_SERVER['PATH_INFO'], 1)) {
		//	$func = 'get_songs';
		//}
		if ((int)method_exists($this,$func) > 0) {
			$this->$func($_GET['uid']);						// FOR LOGGED IN ID
		} else {
			$this->response('',404);
		}
	}

	private function get_songs($uid) {
		if ($this->get_request_method() != "GET") {
			$this->response('',406);
		}
		$this->response('{msg:"'. substr($_SERVER['PATH_INFO'],1) .'",uid:"'.$uid.'"}',200);
	}
}

$songRest = new SongRest;
$songRest->process();
?>
