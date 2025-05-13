<?php
require_once '../connection.php';
session_start();

$searchItem = $_POST['NewItem'];
$cat1 = $_POST['cat1'];
$cat2 = $_POST['cat2'];
$cat3 = $_POST['cat3'];
$cat4 = $_POST['cat4'];
$cat5 = $_POST['cat5'];



if (!empty($searchItem) and $cat1 > 0 or $cat2 > 0 or $cat3 > 0 or $cat4 > 0 or $cat5 > 0) {//-search with cat
	$sql = "SELECT * FROM `capstone`,categories,status WHERE cap_title LIKE '%$searchItem%' and (capstone.cat_id=$cat1 or capstone.cat_id=$cat2 or capstone.cat_id=$cat3 or capstone.cat_id=$cat4 or capstone.cat_id=$cat5) and capstone.cat_id = categories.cat_id and capstone.status_id=status.status_id and capstone.status_id=5 LIMIT 10";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
	    while ($row = mysqli_fetch_assoc($result)) {
	    echo "
	    <tr>
			<td ><input name='preview' type='checkbox' name='contentChk'></td>
			<td ><a href='#' name='preview' id=".$row['cap_id']."  data-toggle='modal' data-target='#prevContentModal'>".$row['cap_title']."</a></td>
			<td >".$row['cap_author']."</td>
			<td >".$row['cat_name']."</td>
			<td >".$row['cap_date_pub']."</td>
			<td >
				<div class='btn-group'>
               		<button type='button' class='btn btn-success btn-xs' data-toggle='tooltip' title='Approve Capstone'><span class='small text-center glyphicon glyphicon-ok'></span></button>
            	</div>
            	<div class='btn-group'>
            		<button type='button' class='btn btn-danger btn-xs' data-toggle='tooltip' title='DisApprove'><span class='small text-center glyphicon glyphicon-remove'></span></button>
            	</div>
            </td>
		</tr>

	    ";
	    }
	}
}

else if (!empty($searchItem) and $cat1 == 0 and $cat2 == 0 and $cat3 == 0 and $cat4 == 0 and $cat5 == 0) {
	$sql = "SELECT * FROM capstone,status,categories where capstone.cap_title LIKE '%$searchItem%' and capstone.cat_id = categories.cat_id and capstone.status_id=status.status_id and capstone.status_id=5  LIMIT 10";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
	    while ($row = mysqli_fetch_assoc($result)) {
	    echo "
	    <tr>
			<td ><input name='preview' type='checkbox' name='contentChk'></td>
			<td ><a href='#' name='preview' id=".$row['cap_id']."  data-toggle='modal' data-target='#prevContentModal'>".$row['cap_title']."</a></td>
			<td >".$row['cap_author']."</td>
			<td >".$row['cat_name']."</td>
			<td >".$row['cap_date_pub']."</td>
			<td >
				<div class='btn-group'>
               		<button type='button' class='btn btn-success btn-xs' data-toggle='tooltip' title='Approve Capstone'><span class='small text-center glyphicon glyphicon-ok'></span></button>
            	</div>
            	<div class='btn-group'>
            		<button type='button' class='btn btn-danger btn-xs' data-toggle='tooltip' title='DisApprove Capstone'><span class='small text-center glyphicon glyphicon-remove'></span></button>
            	</div>
            </td>
		</tr>

	    ";
	    }
	}
}

else if (empty($searchItem) and $cat1 > 0 or $cat2 > 0 or $cat3 > 0 or $cat4 > 0 or $cat5 > 0) {
	$sql = "SELECT * FROM `capstone`,categories,status WHERE (capstone.cat_id=$cat1 or capstone.cat_id=$cat2 or capstone.cat_id=$cat3 or capstone.cat_id=$cat4 or capstone.cat_id=$cat5) and capstone.cat_id = categories.cat_id and capstone.status_id=status.status_id and capstone.status_id=5 LIMIT 10";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
	    while ($row = mysqli_fetch_assoc($result)) {
	    echo "
	    <tr>
			<td ><input name='preview' type='checkbox' name='contentChk'></td>
			<td ><a href='#' name='preview' id=".$row['cap_id']."  data-toggle='modal' data-target='#prevContentModal'>".$row['cap_title']."</a></td>
			<td >".$row['cap_author']."</td>
			<td >".$row['cat_name']."</td>
			<td >".$row['cap_date_pub']."</td>
			<td >
				<div class='btn-group'>
               		<button type='button' class='btn btn-success btn-xs' data-toggle='tooltip' title='Approve Capstone'><span class='small text-center glyphicon glyphicon-ok'></span></button>
            	</div>
            	<div class='btn-group'>
            		<button type='button' class='btn btn-danger btn-xs' data-toggle='tooltip' title='DisApprove Capstone'><span class='small text-center glyphicon glyphicon-remove'></span></button>
            	</div>
            </td>
		</tr>

	    ";
	    }
	}
}

else if (empty($searchItem) and $cat1 == 0 and $cat2 == 0 and $cat3 == 0 and $cat4 == 0 and $cat5 == 0) {
	$sql = "SELECT * FROM capstone,status,categories where capstone.cat_id = categories.cat_id and capstone.status_id=status.status_id and capstone.status_id=5 LIMIT 10";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
	    while ($row = mysqli_fetch_assoc($result)) {
	    echo "
	    <tr>
			<td ><input name='preview' type='checkbox' name='contentChk'></td>
			<td ><a href='#' name='preview' id=".$row['cap_id']."  data-toggle='modal' data-target='#prevContentModal'>".$row['cap_title']."</a></td>
			<td >".$row['cap_author']."</td>
			<td >".$row['cat_name']."</td>
			<td >".$row['cap_date_pub']."</td>
			<td >
				<div class='btn-group'>
               		<button type='button' class='btn btn-success btn-xs' data-toggle='tooltip' title='Approve Capstone'><span class='small text-center glyphicon glyphicon-ok'></span></button>
            	</div>
            	<div class='btn-group'>
            		<button type='button' class='btn btn-danger btn-xs' data-toggle='tooltip' title='DisApprove Capstone'><span class='small text-center glyphicon glyphicon-remove'></span></button>
            	</div>
            </td>
		</tr>

	    ";
	    }
	}
}



	

?>