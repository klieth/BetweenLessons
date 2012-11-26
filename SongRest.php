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
				$this->get_songs(1);  // Hard coded to user 1, but logged in user should be stored in a cookie
			}
		} //else if ($this->get_request_method() == "DELETE") {
		//	if (isset($_SERVER['PATH_INFO'])) {
		//		$this->delete_song(strtok($_SERVER['PATH_INFO'], '/'));
		//	}
		else if ($this->get_request_method() == "POST" && isset($_POST['delete'])) {
			if (!isset($_SERVER['PATH_INFO'])) {
				$this->response('sid must be set',400);
			}
			$sid = strtok($_SERVER['PATH_INFO'], '/');
			$this->delete_song($sid);
		} else if ($this->get_request_method() == "POST") {
			if (count($this->_request) == 0) {
				$this->response('Must specify data to update/add',400);
			} else {
				$data = $this->_request;
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
		$res = mysqli_query($this->db, "DELETE FROM Song WHERE sid=" . $sid);
		$this->response("Deleted " . $res,200);
	}

	private function update_song($sid,$data) {
		if ($this->get_request_method() != "POST") {
			$this->response('',406);
		}
		foreach ($data as $k => $v) {
			if ($k == "uid" || $k == "tempo") {
				mysqli_query($this->db, "UPDATE Song SET " . $k . "=" . $v . " WHERE sid=" . $sid);
			} else if ($k == "title" || $k == "composer" || $k == "comment" || $k == "genre") {
				mysqli_query($this->db, "UPDATE Song SET " . $k . "='" . $v . "' WHERE sid=" . $sid);
			}
		}
		$this->response('Song updated',200);
	}

	private function add_song($data) {
		if ($this->get_request_method() != "POST") {
			$this->response('',406);
		}
		//remove this
		$data['composer'] = 'test composer';
		$data['genre'] = 'blues';
		$data['tempo'] = 100;
		$data['date'] = '2011-1-1';
		$data['comments'] = 'none';

		if (!isset($data['uid']) || !isset($data['title']) || !isset($data['composer']) || !isset($data['genre']) || !isset($data['tempo']) || !isset($data['date']) || !isset($data['comments'])) {
			$this->response('All columns must be set.',400);
		}
		$res = mysqli_query($this->db, "INSERT INTO Song (uid,title,composer,tempo,genre,date,comments) VALUES (" . $_POST['uid'] . ",'" . $_POST['title'] . "','" . $data['composer'] . "'," . $data['tempo'] . ",'" . $data['genre'] . "','" . $data['date'] . "','" . $data['comments'] . "')");
		$this->response('Song added ' . $res,200);
	}

	private function get_songs($uid) {
		if ($this->get_request_method() != "GET") {
			$this->response('',406);
		}
		$res = mysqli_query($this->db, "SELECT sid FROM Song WHERE uid=" . $uid);
		$data = array();
		while (($row = mysqli_fetch_assoc($res)) != null) {
			array_push($data, $row);
		}
		$this->response(json_encode($data),200);
	}
}

$songRest = new SongRest;
$songRest->process();
?>
