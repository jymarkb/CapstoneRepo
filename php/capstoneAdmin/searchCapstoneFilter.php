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
	$sql = "SELECT * FROM `capstone`,categories,status WHERE cap_title LIKE '%$searchItem%' and (capstone.cat_id=$cat1 or capstone.cat_id=$cat2 or capstone.cat_id=$cat3 or capstone.cat_id=$cat4 or capstone.cat_id=$cat5) and capstone.cat_id = categories.cat_id and capstone.status_id=status.status_id LIMIT 10";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
	    while ($row = mysqli_fetch_assoc($result)) {
	    echo "
	    <tr>
	        <td >
	            <h4><a href='#' name='preview' id=".$row['cap_id']."  data-toggle='modal' data-target='#prevContentModal'>".$row['cap_title']."</a></h4>
	            <p class='small'>Date Published: ".$row['cap_date_pub']."</p>
	            <p class='small'>Author: ".$row['cap_author']."</p>
	            <p class='small'>Category: ".$row['cat_name']."</p>
	            <p class='small'>Status: ".$row['status_desc']."</p>
	            
	        </td>
	        <td class='col-md-2 text-center'>
	            <h5 class='text-left'><span class='reader'> 123456 </span> <br /><span class='small'>readers</span></h5>
	            <h5 class='text-left'><span class='reader'> 100% </span> <br /><span class='small'>rating</span></h5>
	        </td>
	        <td >
	            <div class='btn-group btn-table'>
	                <a id=".$row['cap_id']." name='edit' href='#' data-toggle='modal' data-target='#editContentModal' class='btn btn-edit'><span class='small text-center glyphicon glyphicon-pencil'></span></a>
	            </div>
	            <div class='btn-group btn-table'>
	                <a id=".$row['cap_id']." name='delete' href='#' data-toggle='modal' data-target='#deleteContentModal' class='btn btn-danger'><span class='small text-center glyphicon glyphicon-trash'></span></a>
	            </div>
	        </td>
	    </tr>";
	    }
	}
}

else if (!empty($searchItem) and $cat1 == 0 and $cat2 == 0 and $cat3 == 0 and $cat4 == 0 and $cat5 == 0) {
	$sql = "SELECT * FROM capstone,status,categories where capstone.cap_title LIKE '%$searchItem%' and capstone.cat_id = categories.cat_id and capstone.status_id=status.status_id LIMIT 10";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
	    while ($row = mysqli_fetch_assoc($result)) {
	    echo "
	    <tr>
	        <td >
	            <h4><a href='#' name='preview' id=".$row['cap_id']."  data-toggle='modal' data-target='#prevContentModal'>".$row['cap_title']."</a></h4>
	            <p class='small'>Date Published: ".$row['cap_date_pub']."</p>
	            <p class='small'>Author: ".$row['cap_author']."</p>
	            <p class='small'>Category: ".$row['cat_name']."</p>
	            <p class='small'>Status: ".$row['status_desc']."</p>
	            
	        </td>
	        <td class='col-md-2 text-center'>
	            <h5 class='text-left'><span class='reader'> 123456 </span> <br /><span class='small'>readers</span></h5>
	            <h5 class='text-left'><span class='reader'> 100% </span> <br /><span class='small'>rating</span></h5>
	        </td>
	        <td >
	            <div class='btn-group btn-table'>
	                <a id=".$row['cap_id']." name='edit' href='#' data-toggle='modal' data-target='#editContentModal' class='btn btn-edit'><span class='small text-center glyphicon glyphicon-pencil'></span></a>
	            </div>
	            <div class='btn-group btn-table'>
	                <a id=".$row['cap_id']." name='delete' href='#' data-toggle='modal' data-target='#deleteContentModal' class='btn btn-danger'><span class='small text-center glyphicon glyphicon-trash'></span></a>
	            </div>
	        </td>
	    </tr>";
	    }
	}
}

else if (empty($searchItem) and $cat1 > 0 or $cat2 > 0 or $cat3 > 0 or $cat4 > 0 or $cat5 > 0) {
	$sql = "SELECT * FROM `capstone`,categories,status WHERE (capstone.cat_id=$cat1 or capstone.cat_id=$cat2 or capstone.cat_id=$cat3 or capstone.cat_id=$cat4 or capstone.cat_id=$cat5) and capstone.cat_id = categories.cat_id and capstone.status_id=status.status_id LIMIT 10";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
	    while ($row = mysqli_fetch_assoc($result)) {
	    echo "
	    <tr>
	        <td >
	            <h4><a href='#' name='preview' id=".$row['cap_id']."  data-toggle='modal' data-target='#prevContentModal'>".$row['cap_title']."</a></h4>
	            <p class='small'>Date Published: ".$row['cap_date_pub']."</p>
	            <p class='small'>Author: ".$row['cap_author']."</p>
	            <p class='small'>Category: ".$row['cat_name']."</p>
	            <p class='small'>Status: ".$row['status_desc']."</p>

	        </td>
	        <td class='col-md-2 text-center'>
	            <h5 class='text-left'><span class='reader'> 123456 </span> <br /><span class='small'>readers</span></h5>
	            <h5 class='text-left'><span class='reader'> 100% </span> <br /><span class='small'>rating</span></h5>
	        </td>
	        <td >
	            <div class='btn-group btn-table'>
	                <a id=".$row['cap_id']." name='edit' href='#' data-toggle='modal' data-target='#editContentModal' class='btn btn-edit'><span class='small text-center glyphicon glyphicon-pencil'></span></a>
	            </div>
	            <div class='btn-group btn-table'>
	                <a id=".$row['cap_id']." name='delete' href='#' data-toggle='modal' data-target='#deleteContentModal' class='btn btn-danger'><span class='small text-center glyphicon glyphicon-trash'></span></a>
	            </div>
	        </td>
	    </tr>";
	    }
	}
}

else if (empty($searchItem) and $cat1 == 0 and $cat2 == 0 and $cat3 == 0 and $cat4 == 0 and $cat5 == 0) {
	$sql = "SELECT * FROM capstone,status,categories where capstone.cat_id = categories.cat_id and capstone.status_id=status.status_id LIMIT 10";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
	    while ($row = mysqli_fetch_assoc($result)) {
	    echo "
	    <tr>
	        <td >
	            <h4><a href='#' name='preview' id=".$row['cap_id']."  data-toggle='modal' data-target='#prevContentModal'>".$row['cap_title']."</a></h4>
	            <p class='small'>Date Published: ".$row['cap_date_pub']."</p>
	            <p class='small'>Author: ".$row['cap_author']."</p>
	            <p class='small'>Category: ".$row['cat_name']."</p>
	            <p class='small'>Status: ".$row['status_desc']."</p>
	        </td>
	        <td class='col-md-2 text-center'>
	            <h5 class='text-left'><span class='reader'> 123456 </span> <br /><span class='small'>readers</span></h5>
	            <h5 class='text-left'><span class='reader'> 100% </span> <br /><span class='small'>rating</span></h5>
	        </td>
	        <td >
	            <div class='btn-group btn-table'>
	                <a id=".$row['cap_id']." name='edit' href='#' data-toggle='modal' data-target='#editContentModal' class='btn btn-edit'><span class='small text-center glyphicon glyphicon-pencil'></span></a>
	            </div>
	            <div class='btn-group btn-table'>
	                <a id=".$row['cap_id']." name='delete' href='#' data-toggle='modal' data-target='#deleteContentModal' class='btn btn-danger'><span class='small text-center glyphicon glyphicon-trash'></span></a>
	            </div>
	        </td>
	    </tr>";
	    }
	}
}



	

?>