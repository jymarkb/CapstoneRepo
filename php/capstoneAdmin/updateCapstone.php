<?php
require_once '../connection.php';
session_start();


$author = $_POST['author'];
$category = $_POST['category'];
$abstract = $_POST['abstract'];
$keyword = $_POST['keyword'];
$title = $_POST['title'];
$capid = $_POST['capid'];

$sql = "UPDATE capstone SET cap_title='$title', cap_author='$author' , cap_abstract='$abstract' , cat_id='$category' WHERE cap_id = $capid";

if(mysqli_query($conn,$sql)){
	echo "success";
}else{
	echo "failed";
}





?>