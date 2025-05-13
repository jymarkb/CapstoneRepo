<?php
require_once '../connection.php';
session_start();


$id=$_POST['id'];
$sql = "SELECT * FROM capstone WHERE cap_id='$id'";
$result = (mysqli_query($conn,$sql));
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    	echo "
    	<h2 class='text-center'>Do you want to delete ".$row['cap_title']."?</h2>

	    <div class='col-md-12 col-xs-12 input-group text-center'> 
	      <input id='$id' name='delete-confirm' type='submit' id='deleteContent' class='btn btn-success custom-delete' value='Confirm'>
	      <input type='submit' class='btn btn-danger custom-delete' data-dismiss='modal' value='Cancel'>
	    </div>
    	";
    }	
}

?>