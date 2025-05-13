<?php
require_once '../connection.php';
session_start();

$id = $_POST['id'];

$sql = "SELECT * FROM capstone,categories where capstone.cap_id='$id' and capstone.cat_id=categories.cat_id";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
		echo "
		<h2 class='modal-title text-center'>".$row['cap_title']."</h2>
		<p class='text-center'>".$row['cap_author']."</p>
		";
	}
}

?>