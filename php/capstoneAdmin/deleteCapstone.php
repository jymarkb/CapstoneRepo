<?php
require_once '../connection.php';
session_start();

$id = $_POST['id'];
$sql = "DELETE FROM `capstone` WHERE `cap_id` = $id";
if (mysqli_query($conn,$sql)) {
	echo "success";
}else{
	echo "failed";
}
?>