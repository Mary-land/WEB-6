<?php
const API_URL = "http://localhost/web3/api.php";
function session($sessionid, $user) {
	if($sessionid != null) {
		setcookie("sessionid", $sessionid);
		setcookie("username", $user);
	} else {
		return $_COOKIE["sessionid"] ?? null;
	}
}
function get_id() {
	return $_COOKIE["sessionid"] ?? null;
}
function logout()
{
	if (isset($_COOKIE['sessionid'])) {
		unset($_COOKIE['sessionid']);
	}
	if (isset($_COOKIE['username'])) {
		unset($_COOKIE['username']);
	}
	$id=get_id();
	session_id($id);
	session_destroy();
	header("Location: ../controllers/index.php");	
}
function api_request($action, $method, $params) {
	//var_dump(1234567);
	$url = API_URL . "?action=$action&method=$method&$params";
	$response_string = file_get_contents($url);
	//var_dump($response_string);
	$decoded = json_decode($response_string,true);
	//echo json_last_error();
	//var_dump($decoded);
	return $decoded;
}
?>