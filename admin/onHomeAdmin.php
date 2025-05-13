<?php 
require_once "init.php"
?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="..\bootstrap\dist\css\bootstrap.css">
    <link rel="stylesheet" type="text/css" href="..\bootstrap\dist\css\style.css">
    <script src="..\bootstrap\dist\js\jquery-3.3.1.min.js"></script>
    <script src="..\bootstrap\dist\js\bootstrap.min.js"></script>
    
    <script>
      $(document).ready(function(){
        var item = $("#searchBox").val();
          $("#searchBtn").click(function(){
            var item = $("#searchBox").val();
            $("#tableHomeData").load("../php/searchHome.php", {
              NewItem:item
            });
          });

          $("#searchBox").change(function(){
            var item = $("#searchBox").val();
            $("#tableHomeData").load("../php/searchHome.php", {
              NewItem:item
            });
          });

          $("#tableHomeData").load("../php/searchHome.php", {
              NewItem:item
          });


          $("#logout").click(async (e) =>{
              e.preventDefault();
              e.stopPropagation();

              $.ajax({
                 type:'POST',
                 url:"../php/logout.php",
                 success:(response) => {
                  // console.log(response);
                  if(response === "success"){
                    window.location.href = "../index.php"
                  }
                 }
              })
          })
      });
    </script>
    <title>Capstone Library | Home</title>
  </head>

<body>


<nav class="navbar navbar-default custom-nav">
  <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navCollapse1">
            <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true "></span>
          </button>
          <a class="navbar-brand" href="..\admin\onHomeAdmin.php"><img class="nav-brand-img" src="..\images\logo\logo.png"></a>
      </div>
  <div class="collapse navbar-collapse" id="navCollapse1">
      <ul class="nav navbar-nav ">
        <li class="active"><a href="onHomeAdmin.php">Home</a></li>
        <li ><a class="nav-title" href="onCapstoneAdmin.php">Casptone</a></li>
        <li ><a class="nav-title" href="onManageAdmin.php">Manage</a></li>
      </ul>


      <ul class="nav navbar-nav navbar-right">
        <div class="dropdown">
          <a class="btn btn-account dropdown-toggle account-name" type="button" data-toggle="dropdown"><img class="img-account" width="32px" height="32px" src="..\images\dp.png">
            <?php
            $accountID = $_SESSION['AccountID'];
            $sql = "SELECT acc_fname from account where acc_id='$accountID' ";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['acc_fname'];
              }
            }
            ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a ><span class="glyphicon glyphicon-user"></span> &nbspProfile</a></li>
            <li><a  id="logout"><span class="glyphicon glyphicon-off"></span> &nbspLogout</a></li>
          </ul>
      </div>
      </ul>
  </div>
    
  </div>
</nav>


<div class="container custom-main-container">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="input-group home-search">
          <input type="text" class="form-control" id="searchBox" placeholder="Search for ...">
            <div class="input-group-btn">
              <button class="btn btn-default" id="searchBtn" name="searchBtn" type="submit"><span class="glyphicon glyphicon-search"></span>
              </button> 
            </div>
        </div>
      </div>
    </div>



  <div class="row">
    <div class="col-md-3">

      <div class="panel panel-new">
        <div class="panel-heading "><span class="glyphicon glyphicon-list"> </span> &nbspCategory</div>
        <ul class="list-group">
          <li class="list-group-item">
            <label><input type="checkbox" value=""> Mobile Application</label> 
          </li>
          <li class="list-group-item">
            <label><input type="checkbox" value=""> Windows Application</label> 
          </li>
          <li class="list-group-item">
            <label><input type="checkbox" value=""> Game Development</label> 
          </li>
          <li class="list-group-item">
            <label><input type="checkbox" value=""> Web Based Application</label> 
          </li>
          <li class="list-group-item">
            <label><input type="checkbox" value=""> Artificial Intelegent</label> 
          </li>
        </ul>
      </div>

      <div class="panel panel-new">
        <div class="panel-heading "><span class="glyphicon glyphicon-list"> </span> &nbspYear</div>
        <ul class="list-group">
            <li class="list-group-item">
              <label><input type="checkbox" value=""> 2019</label> <span class="badge">1.9k</span>
            </li>
            <li class="list-group-item">
              <label><input type="checkbox" value=""> 2018</label> <span class="badge">1.1k</span>
            </li>
            <li class="list-group-item">
              <label><input type="checkbox" value=""> 2017</label> <span class="badge">1.2k</span>
            </li>
            <li class="list-group-item">
              <label><input type="checkbox" value=""> 2016</label> <span class="badge">1.4k</span>
            </li>
          </ul>
      </div>

    </div>

    <div class="col-md-9">

      <table class="table custom-table">
        <thead>
          <tr>
            <th class="col-md-10">Title & Description</th>
            <th class="col-md-2 text-center">Rating</th>
          </tr>
        </thead>
        <tbody id="tableHomeData">

        </tbody>
      </table>
    </div>
  </div>

    <div class="row">
      <ul class="pager">
        <li><a class="text-center pager-btn" href="#">Previous</a></li>
        <li><a class="text-center pager-btn" href="#">Next</a></li>
      </ul>
    </div>  
  </div>
</div>


  <div class="footer">
    <p class="text-center">All Rights Reserved &copy 2019</p>
  </div>

</body>

</html>