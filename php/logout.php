<?php
require_once 'connection.php';
session_start();

$accountID = $_SESSION['AccountID'];

if (!empty($accountID)) {
	session_destroy();
	echo "success";
}else{
	echo "failed";
}

?>