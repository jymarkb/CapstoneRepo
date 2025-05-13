<?php
require_once '../connection.php';
session_start();

$id = $_POST['id'];

$sql = "SELECT * FROM capstone,categories where capstone.cap_id='$id' and capstone.cat_id=categories.cat_id";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
		echo "
		<p class='titlePreview'>Category :</p>
		<p class='text-justify custom-indent'>".$row['cat_name']."</p>
		<p class='titlePreview'>Abstract :</p>
		<p class='text-justify custom-indent'>".$row['cap_abstract']."</p>
		<p class='titlePreview'>Keyword(s) :</p>
		<p class='text-justify custom-indent'>keyword, keyword, Keyword</p>
		<p class='titlePreview'>Screenshot(s) :</p>

		<div id='myCarousel' class='carousel slide' data-ride='carousel'>

		  <ol class='carousel-indicators'>
		    <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
		    <li data-target='#myCarousel' data-slide-to='1'></li>
		    <li data-target='#myCarousel' data-slide-to='2'></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class='carousel-inner'>
		    <div class='item active'>
		      <img src='../images/1.jpg' alt='Los Angeles'>
		    </div>

		    <div class='item'>
		      <img src='../images/2.jpg' alt='Chicago'>
		    </div>

		    <div class='item'>
		      <img src='../images/3.jpg' alt='New York'>
		    </div>
		  </div>

		  <!-- Left and right controls -->
		  <a class='left carousel-control' href='#myCarousel' data-slide='prev'>
		    <span class='glyphicon glyphicon-chevron-left'></span>
		    <span class='sr-only'>Previous</span>
		  </a>
		  <a class='right carousel-control' href='#myCarousel' data-slide='next'>
		    <span class='glyphicon glyphicon-chevron-right'></span>
		    <span class='sr-only'>Next</span>
		  </a>
		</div>


		";
	}
}

?>