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
	$sql = "SELECT COUNT(capstone.cap_id) as total FROM `capstone`,categories,status WHERE capstone.cap_title LIKE '%$searchItem%' and (capstone.cat_id=$cat1 or capstone.cat_id=$cat2 or capstone.cat_id=$cat3 or capstone.cat_id=$cat4 or capstone.cat_id=$cat5) and capstone.cat_id = categories.cat_id and capstone.status_id=status.status_id LIMIT 10";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
		$data = mysqli_fetch_assoc($result);
		if ($data['total'] < 10) {
			echo "
		    <tr>
				<td colspan='6' class='small table-query'>".$data['total']." of ".$data['total']." record(s)</td>
			</tr>";
		}else{
			echo "
		    <tr>
				<td colspan='6' class='small table-query'>10 of ".$data['total']." record(s)</td>
			</tr>";
		}  
	}
}

else if (!empty($searchItem) and $cat1 == 0 and $cat2 == 0 and $cat3 == 0 and $cat4 == 0 and $cat5 == 0) {
	$sql = "SELECT COUNT(capstone.cap_id) as total FROM `capstone`,categories,status WHERE capstone.cap_title LIKE '%$searchItem%' and capstone.cat_id = categories.cat_id and capstone.status_id=status.status_id LIMIT 10";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
		$data = mysqli_fetch_assoc($result);
		if ($data['total'] < 10) {
			echo "
		    <tr>
				<td colspan='6' class='small table-query'>".$data['total']." of ".$data['total']." record(s)</td>
			</tr>";
		}else{
			echo "
		    <tr>
				<td colspan='6' class='small table-query'>10 of ".$data['total']." record(s)</td>
			</tr>";
		}  
	}
}


else if (empty($searchItem) and $cat1 > 0 or $cat2 > 0 or $cat3 > 0 or $cat4 > 0 or $cat5 > 0) {
	$sql = "SELECT COUNT(capstone.cap_id) as total FROM `capstone`,categories,status  WHERE (capstone.cat_id=$cat1 or capstone.cat_id=$cat2 or capstone.cat_id=$cat3 or capstone.cat_id=$cat4 or capstone.cat_id=$cat5) and capstone.cat_id = categories.cat_id and capstone.status_id=status.status_id LIMIT 10";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
		$data = mysqli_fetch_assoc($result);
		if ($data['total'] < 10) {
			echo "
		    <tr>
				<td colspan='6' class='small table-query'>".$data['total']." of ".$data['total']." record(s)</td>
			</tr>";
		}else{
			echo "
		    <tr>
				<td colspan='6' class='small table-query'>10 of ".$data['total']." record(s)</td>
			</tr>";
		}  
	}
}

else if (empty($searchItem) and $cat1 == 0 and $cat2 == 0 and $cat3 == 0 and $cat4 == 0 and $cat5 == 0) {
	$sql = "SELECT COUNT(capstone.cap_id) as total FROM `capstone`,categories,status WHERE capstone.cat_id = categories.cat_id and capstone.status_id=status.status_id LIMIT 10";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
		$data = mysqli_fetch_assoc($result);
		if ($data['total'] < 10) {
			echo "
		    <tr>
				<td colspan='6' class='small table-query'>".$data['total']." of ".$data['total']." record(s)</td>
			</tr>";
		}else{
			echo "
		    <tr>
				<td colspan='6' class='small table-query'>10 of ".$data['total']." record(s)</td>
			</tr>";
		}  
	}
}


?>