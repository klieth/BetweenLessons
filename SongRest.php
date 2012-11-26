<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once("restinclude/Rest.php");

class SongRest extends REST {
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
			if (!isset($this->_request['uid'])) {
				$this->response('User ID must be specified',400);
			}
			if (isset($_SERVER['PATH_INFO'])) {
				$sid = strtok($_SERVER['PATH_INFO'], '/');
				$this->get_song_info($sid);
			} else {
				$this->get_songs();
			}
		} else if ($this->get_request_method() == "DELETE") {
			if (isset($_SERVER['PATH_INFO'])) {
				$this->delete_song(strtok($_SERVER['PATH_INFO'], '/'));
			}
		} else if ($this->get_request_method() == "POST") {
			if (!isset($this->_request['data'])) {
				$this->response('Must specify data to update/add',400);
			} else {
				$data = json_decode($_POST['data']);
			}
			if (isset($_SERVER['PATH_INFO'])) {
				$sid = strtok($_SERVER['PATH_INFO'], '/');
				$this->update_song($sid,$data);
			} else {
				$this->add_song($data);
			}
		}
		$this->response('',404);
	}

	private function get_song_info($sid) {
		if ($this->get_request_method() != "GET") {
			$this->response('',406);
		}
		$res = mysqli_query($this->db, "SELECT * FROM Song WHERE sid=" . $sid);
		$data = mysqli_fetch_assoc($res);
		$this->response(json_encode($data),200);
	}

	private function delete_song($sid) {
	}

	private function update_song($sid,$data) {
	}

	private function add_song($data) {
		if ($this->get_request_method() != "POST") {
			$this->response('',406);
		}
		if (!isset($data['uid']) || !isset($data['title']) || !isset($data['composer']) || !isset($data['genre']) || !isset($data['bpm']) || !isset($data['date']) || !isset($data['comment'])) {
			$this->response('All columns must be set.',400);
		}
		mysqli_query($this->db, "INSERT INTO Song (uid,title,composer,tempo,genre,date,comments) VALUES (" . $data['uid'] . ",'" . $data['title'] . "','" . $data['composer'] . "'," . $data['genre'] . ",'" . $data['bpm'] . ",'" . $data['date'] . "','" . $data['comment'] . "')");
		$this->response('Song added',200);
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
