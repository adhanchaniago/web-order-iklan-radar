<?php
	
	function addUser($email = "", $password = "", $level) {
		global $mysqli;
		
		$mysqli->query("INSERT INTO T_users(email,password,level) VALUES('".$email."','".$password."','".$level."')");

		return true;
	}

	function getUserItems($user_id) {
		global $mysqli;
		$_SQL	= $mysqli->query("SELECT * FROM T_users WHERE user_id='".$user_id."'");
		$_DATA	= mysqli_fetch_array($_SQL);
		$UserItems[] = $_DATA;
		return $UserItems;
	}

	function getUserId($email) {
		global $mysqli;
		$_SQL	= $mysqli->query("SELECT user_id FROM T_users WHERE email='".$email."'");
		$_DATA	= mysqli_fetch_array($_SQL);
		return $_DATA['user_id'];
	}

	function getLastUserId() {
		global $mysqli;

		$_SQL 		= $mysqli->query("SELECT max(user_id) as maxID FROM T_users");
		$_DATA 		= mysqli_fetch_array($_SQL);
		$LastUserId = $_DATA['maxID'];
		return $LastUserId;
	}

	function userLogin($email, $password) {
		global $mysqli;
		$_SQL 	= $mysqli->query("SELECT * FROM T_users WHERE email='".$email."' AND password='".$password."'");
		$_DATA 	= $_SQL->num_rows;

		if ($_DATA > 0) {
			return true;
		}
		else {
			return false;
		}
	}
?>