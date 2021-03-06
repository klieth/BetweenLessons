<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

class REST {
	public $_allow = array();
	public $_content_type = "application/json";
	public $_request = array();

	private $_method = "";
	private $_code = 200;

	public function __construct() {
		$this->inputs();
	}

	public function response($data,$status) {
		$this->_code = ($status)?$status:200;
		$this->set_headers();
		echo $data;
		exit;
	}

	private function get_status_message() {
		$status = array(
			200 => 'OK',
			400 => 'Bad Request',
			404 => 'Not Found',
			406 => 'Not Acceptable',
			500 => 'Internal Server Error'
			);
		return ($status[$this->_code])?$status[$this->_code]:$status[500];
	}

	public function get_request_method() {
		return $_SERVER['REQUEST_METHOD'];
	}

	private function inputs() {
		switch($this->get_request_method()) {
		case "POST":
			$this->_request = $this->clean($_POST);
			break;
		case "GET":
		case "DELETE":
			$this->_request = $this->clean($_GET);
			break;
		default:
			$this->response('',406);
			break;
		}
	}

	private function clean($data) {
		$clean_input = array();
		if (is_array($data)) {
			foreach($data as $k => $v) {
				$clean_input[$k] = $this->clean($v);
			}
		} else {
			$clean_input = trim($data);
		}
		return $clean_input;
	}

	private function set_headers() {
		header("HTTP/1.1 " . $this->_code . " " . $this->get_status_message());
		header("Content-Type:" . $this->_content_type);
	}
}
?>
