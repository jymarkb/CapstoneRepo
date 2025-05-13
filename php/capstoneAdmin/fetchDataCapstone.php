<?php  
require_once '../connection.php';
session_start();

$id =$_POST['id'];

if (!empty($id)) {
$sql = "SELECT * FROM capstone,categories where capstone.cap_id='$id' and capstone.cat_id=categories.cat_id";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    	$title=$row['cap_title'];
    	$author=$row['cap_author'];
    	$category=$row['cat_id'];
    	$abstract=$row['cap_abstract'];
		echo "
		<div class='form-group'>
		<p id='capstoneIdUpdate' hidden>".$row['cap_id']."</p>
			<label for='Title'>Title :</label> 
			<input type='text' class='form-control' id='titleUpdate' placeholder='Capstone Title' value='$title'>
	  </div>


	  <div class='form-group'>
		<label for='Author'>Author :</label> 
		<input type='text' class='form-control' id='authorUpdate' placeholder='use comma(,) to separate Authors' value='$author'>
	  </div>

	  
	  <div class='form-group'>
		<label for='Category'>Category :</label><br>
		<select id='categoryUpdate' class='form-control'>
		  <option ".(($category=='1')?'selected="selected"':"")." id='1'>Mobile Application</option>
		  <option ".(($category=='2')?'selected="selected"':"")." id='2'>Windows Application</option>
		  <option ".(($category=='3')?'selected="selected"':"")." id='3'>Web Based System</option>
		  <option ".(($category=='4')?'selected="selected"':"")." id='4'>Game Development</option>
		  <option ".(($category=='5')?'selected="selected"':"")." id='5'>Artificial Intelligent</option> 
		</select>
	  </div>

	  <div class='form-group'>
		<label for='abstract'>Abstract:</label>
		<textarea class='form-control' rows='8' id='abstractUpdate' placeholder='Write your abstract here'>$abstract</textarea>
	  </div>
	  
	  <div class='form-group'>
		<label for='keyword'>Keyword :</label> 
		<input type='text' class='form-control' id='keywordUpdate' placeholder='use comma(,) to separate keywords'>
	  </div>
	  <div class='form-group'>
		<label for='screenshot'>Screenshot :</label>
		<input type='file' class='form-control' id='screenshotUpdate' multiple>
	  </div>

	  <div class='row'>
		<div class='col-md-12 col-xs-12 input-group text-center'> 
		  <input type='submit' id='updateContent' class='btn btn-success btn-lg'  value='UPDATE'>
		</div>
	  </div>
		";
	}
}

}


?>