<?php
  require_once 'php/connection.php';
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link rel="stylesheet" href="bootstrap\dist\css\bootstrap.css"> -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="node_modules/bootstrap3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <script>
      $(document).ready(function(){
        var item = $("#seachBox").val();
          $("#searchBtn").click(function(){
            var item = $("#seachBox").val();
            $("#tableHomeData").load("php/searchHome.php", {
              NewItem:item
            });
          });

          $("#seachBox").change(function(){
            var item = $("#seachBox").val();
            $("#tableHomeData").load("php/searchHome.php", {
              NewItem:item
            });
          });

          $("#tableHomeData").load("php/searchHome.php", {
              NewItem:item
          });

          $(document).on('click','a[id="loginBtn"]', function(){
            var user=$("#username").val();
            var pass= $("#password").val();

            $.ajax({
              type:'POST',
              url:'php/login.php',
              data:{user:user,pass:pass},
              success:function(response){
                console.log(response);
                if(response=="Administrator"){
                  // $("#username").val() = "";
                  // $("#password").val() = "";
                window.location.href="admin/onHomeAdmin.php";
                }
                else if(response=="Member"){
                  // $("#username").val() = "";
                  // $("#password").val() = "";
                window.location.href="user/onHomeUser.php";
                }else{
                window.location.href="index.php";
                alert("invalid password");
                }

              }
            });
          });



      });
    </script>

    <title>Capstone Library | Home</title>
  </head>

<body id="content_bodyID">


<nav class="navbar navbar-default custom-nav">
  <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navCollapse">
            <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true "></span>
          </button>
          <a class="navbar-brand" href="index.php"><img class="nav-brand-img" src="images\logo\logo.png"></a>
      </div>
  <div class="collapse navbar-collapse" id="navCollapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="onregister.php"><span class="glyphicon glyphicon-user"></span> Register Here</a></li>
        <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
  </div>
    
  </div>
</nav>


<div class="container custom-main-container">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="input-group home-search">
            <input type="text" class="form-control" id="seachBox" name="seachBox" placeholder="Search for ...">
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




<!-- modal-login -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title text-center">Login</h2>
        </div>
        <div class="modal-body" id="modal-login">
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" id="username" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
            </div>
             <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password" id="password" class="form-control" placeholder="" aria-describedby="sizing-addon1">
            </div>

            <div class="col-md-12 col-xs-12 input-group text-center"> 
              <a href="#" type="submit" id="loginBtn" class="btn btn-success btn-lg">Submit</a>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
          <p id="form-message"></p>
        </div>
      </div>
        
    </div>
  </div>


</body>

</html>