<?php
require_once 'connection.php';
require_once 'generateRandom.php';

$searchItem = $_POST['NewItem'];



if (!empty($searchItem)) {

$sql = "SELECT * FROM capstone where capstone.cap_title LIKE '%$searchItem%' LIMIT 10";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <tr>
        <td >
            <h4><a href='#'>".$row['cap_title']."</a></h4>
            <p class='small'>Date Published: ".$row['cap_date_pub']."</p>
            <p class='small'>Author: ".$row['cap_author']."</p>
        </td>
        <td class='col-md-2 text-center'>
                <h5 class='text-rigth'><span class='reader'>". generateRandomView() ."</span> <br /><span>readers</span> </h5>
                <h5 class='text-rigth'><span class='reader'>". generateRandomPercent() ." </span> <br /><span>rating</span> </h5>
        </td>
    </tr>";
    }
}else{
    echo "No data to show.";
}
}else{
$sql = "SELECT * FROM capstone LIMIT 10";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <tr>
        <td >
            <h4><a href='#'>".$row['cap_title']."</a></h4>
            <p class='small'>Date Published: ".$row['cap_date_pub']."</p>
            <p class='small'>Author: ".$row['cap_author']."</p>
        </td>
        <td class='col-md-2 text-center'>
                <h5 class='text-rigth'><span class='reader'>". generateRandomView()." </span> <br /><span>readers</span> </h5>
                <h5 class='text-rigth'><span class='reader'> ".  generateRandomPercent()  ."</span> <br /><span>rating</span> </h5>
        </td>
    </tr>";
    }
}
}





?>