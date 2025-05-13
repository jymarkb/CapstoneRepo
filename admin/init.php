<?php
require_once '../php/connection.php';
session_start();

if(empty($_SESSION['AccountID'])){
  header("Location: ../index.php");
}
?>