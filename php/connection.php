<?php
    require_once 'env.php';

    $conn = new mysqli(getenv("DATABASE_HOST"), getenv("DATABASE_USER"), getenv("DATABASE_PASS"), getenv("DATABASE_NAME"));

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>