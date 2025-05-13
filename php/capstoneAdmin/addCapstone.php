<?php
require_once '../connection.php';
session_start();

$author = $_POST['author'];
$category = $_POST['category'];
$abstract = $_POST['abstract'];
$keyword = $_POST['keyword'];
$title = $_POST['title'];

$dateNow=date("Y/m/d H:i:s");
$accountID = $_SESSION['AccountID'];

$sql = "INSERT INTO `capstone` (`cap_id`, `cap_title`, `cap_author`, `cap_abstract`, `cap_date_pub`, `cat_id`, `acc_id`, `stat_id`, `status_id`) VALUES (NULL, '$title', '$author', '$abstract', '$dateNow', '$category', '$accountID', '0', '4')";

if ($conn->query($sql) === TRUE) {
    echo "success";


} else {
    echo "Failed";
} 

?>