<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

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
		$func = NULL;
		$sid = NULL;
		$data = NULL;
		if ($this->get_request_method() == "GET") {
			if (!isset($_GET['uid'])) {
				$this->response('User ID must be specified',400);
			}
			if (!is_null($sid = strtok($_SERVER['PATH_INFO'], '/')) {
				$func = 'get_song_info';
			} else {
				$func = 'get_songs';
				$sid = NULL;
			}
		} else if ($this->get_request_method() == "DELETE") {
			if (!is_null($sid = strtok($_SERVER['PATH_INFO'], '/')) {
				$func = 'delete_song';
			}
		} else if ($this->get_request_method() == "POST") {
			if (!is_null($sid = strtok($_SERVER['PATH_INFO'], '/')) {
				$func = 'update_song';
			}
			if (isset($_POST['add'])) {
				$func = 'add_song';
			}
			if (!isset($_POST['data'])) {
				$this->response('Must specify data to change',400);
			} else {
				$data = json_decode($_POST['data']);
			}
		}
		if ((int)method_exists($this,$func) > 0) {
			if (!is_null($sid) && is_null($data))
				$this->$func($sid);
			else if (!is_null($_GET['uid']))
				$this->$func($_GET['uid']);
			else if (!is_null($data) && !is_null($sid))
				$this->$func($sid,$data);
			else {
				//$this->response('Wrong parameters',500);
				header("HTTP/1.1 500 Internal Server Error");
				print("Wrong parameters");
				exit();
			}
		} else {
			$this->response('',404);
		}
	}

	private function get_song_info($sid) {
		if ($this->get_request_method() != "GET") {
			$this->response('',406);
		}
		$this->response('{msg:"info on song ' . $sid . '"}',200);
	}

	private function delete_song($sid) {
	}

	private function update_song($sid,$data) {
	}

	private function add_song($sid,$data) {
	}

	private function get_songs($uid) {
		if ($this->get_request_method() != "GET") {
			$this->response('',406);
		}
		$this->response('{msg:"Songs obtained"}',200);
	}
}

$songRest = new SongRest;
$songRest->process();
?>
