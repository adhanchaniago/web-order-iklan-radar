<?php require_once "../functions.php";
	session_start();
	unset($_SESSION['email']);
	unset($_SESSION['user_id']);
	session_destroy();
	header('location:'.getSite('url'));
?>