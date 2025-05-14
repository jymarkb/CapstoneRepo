<?php
require_once "init.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../node_modules/bootstrap3/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../node_modules/bootstrap3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../style.css">
  
  <script>
    $(document).ready(function() {
      $(function() {
        $('[data-toggle="tooltip"]').tooltip()
      })

      $(document).on('click', 'a[name="logout"]', function() {
        var id = (this.id);

        $.ajax({
          type: 'POST',
          url: '../php/logout.php',
          data: {
            id: id
          },
          success: function(response) {
            if (response == "success") {
              alert("Signing out")
              window.location.href = "../index.php";
            } else {
              alert("There is an error");
            }
          }
        });
      })





      var checkCat1 = 0;
      var checkCat2 = 0;
      var checkCat3 = 0;
      var checkCat4 = 0;
      var checkCat5 = 0;
      var item = $("#searchBox").val();

      function getDataFilter() {
        var item = $("#searchBox").val();
        $("#tableCapstoneAndBorrowData").load("../php/manageAdmin/searchManageFilter.php", {
          NewItem: item,
          cat1: checkCat1,
          cat2: checkCat2,
          cat3: checkCat3,
          cat4: checkCat4,
          cat5: checkCat5
        });

        $("#tableCapstoneAndBorrowResult").load("../php/manageAdmin/queryResultCapstoneAndBorrow.php", {
          NewItem: item,
          cat1: checkCat1,
          cat2: checkCat2,
          cat3: checkCat3,
          cat4: checkCat4,
          cat5: checkCat5
        });
      }

      $("#searchBtn").click(function() {
        getDataFilter()
      });

      $("#searchBox").change(function() {
        getDataFilter()
      });

      $("#tableCapstoneAndBorrowData").load("../php/manageAdmin/searchManageFilter.php", {
        NewItem: item,
        cat1: checkCat1,
        cat2: checkCat2,
        cat3: checkCat3,
        cat4: checkCat4,
        cat5: checkCat5
      });

      $("#tableCapstoneAndBorrowResult").load("../php/manageAdmin/queryResultCapstoneAndBorrow.php", {
        NewItem: item,
        cat1: checkCat1,
        cat2: checkCat2,
        cat3: checkCat3,
        cat4: checkCat4,
        cat5: checkCat5
      });


      $('input[type="checkbox"]').click(function() {
        if ($(this).prop("checked") == true) {
          var checkID = $(this).val();
          if (checkID == 1) {
            checkCat1 = 1;
          } else if (checkID == 2) {
            checkCat2 = 2;
          } else if (checkID == 3) {
            checkCat3 = 3;
          } else if (checkID == 4) {
            checkCat4 = 4;
          } else if (checkID == 5) {
            checkCat5 = 5;
          }

        } else if ($(this).prop("checked") == false) {
          var checkID = $(this).val();
          if (checkID == 1) {
            checkCat1 = 0;
          } else if (checkID == 2) {
            checkCat2 = 0;
          } else if (checkID == 3) {
            checkCat3 = 0;
          } else if (checkID == 4) {
            checkCat4 = 0;
          } else if (checkID == 5) {
            checkCat5 = 0;
          }
        }


        getDataFilter();
      });

      $(document).on('click', 'a[name="preview"]', function() {
        var id = (this.id);

        $("#previewContentModal").load("../php/manageAdmin/previewManage.php", {
          id: id
        });
        $("#previewContentHeaderModal").load("../php/manageAdmin/previewHeaderManage.php", {
          id: id
        });

      })

      $("#sectionContent").change(function() {
        var id = $(this).children(":selected").attr("id");
        if (id == 1) {
          alert("capstone");
        } else {
          alert("borrow");
        }
      })

      $(document).on('click', '#capstoneContent', function() {

      });

    });
  </script>

  <title>Capstone Library | Manage</title>
</head>

<body>


  <!-- //-- start navbar -->
  <nav class="navbar navbar-default custom-nav">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navCollapse1">
          <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true "></span>
        </button>
        <a class="navbar-brand" href="onHomeAdmin.php"><img class="nav-brand-img" src="..\images\logo\logo.png"></a>
      </div>
      <div class="collapse navbar-collapse" id="navCollapse1">
        <ul class="nav navbar-nav ">
          <li><a href="onHomeAdmin.php">Home</a></li>
          <li><a class="nav-title" href="onCapstoneAdmin.php">Casptone</a></li>
          <li class="active"><a class="nav-title" href="onManageAdmin.php">Manage</a></li>
        </ul>


        <ul class="nav navbar-nav navbar-right">
          <div class="dropdown">
            <a class="btn btn-account dropdown-toggle account-name" type="button" data-toggle="dropdown"><img class="img-account" width="32px" height="32px" src="..\images\dp.png">
              <?php
              $accountID = $_SESSION['AccountID'];
              $sql = "SELECT acc_fname from account where acc_id='$accountID' ";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo $row['acc_fname'];
                }
              }
              ?>
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> &nbspProfile</a></li>
              <li><a href="#" name="logout" <?php $accountID = $_SESSION['AccountID'];
                                            echo "id='$accountID'"; ?>><span class="glyphicon glyphicon-off"></span> &nbspLogout</a></li>
            </ul>
          </div>
        </ul>
      </div>

    </div>
  </nav>
  <!-- //-- end navbar -->

  <div class="container  custom-main-container">
    <div class="container-fluid">
      <div class="row custom-search-admin">
        <div class="col-md-7 col-md-offset-3">
          <div class="input-group">
            <input type="text" class="form-control" id="searchBox" placeholder="Search">
            <div class="input-group-btn">
              <button class="btn btn-default" id="searchBtn" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-2 text-right">
          <select id="sectionContent" class="form-control">
            <option id="1">Capstone</option>
            <option id="2">Borrower</option>
          </select>
        </div>
      </div>

      <div class="row">

        <div class="col-md-3  ">
          <!-- filter start -->
          <div class="panel-group">
            <div class="panel panel-default">
              <div class="panel-heading">
                <a class="filter-panel-title" data-toggle="collapse" href="#collapseFilter"><span class="glyphicon glyphicon-list"></span> &nbspFilter</a>
              </div>
              <div id="collapseFilter" class="panel-collapse ">
                <div class="panel-body row">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 filter-capstone">
                      <p class="filter-title">Category</p>
                      <ul class="list-group">
                        <?php
                        $sql = "SELECT * FROM categories";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                            echo "
								        		<li class='list-group-item'>
											      <label><input name='chk' type='checkbox' value=" . $row['cat_id'] . "> " . $row['cat_name'] . "</label>
											    </li>";
                          }
                        }
                        ?>
                      </ul>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 filter-capstone">

                      <p class="filter-title">Year</p>
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
                  </div>

                  <div class="row">
                    <div class="text-rigth col-md-1 col-md-offset-8">
                      <a href="#" class="btn btn-primary btn-sm">Apply</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- filter end -->

          <!-- selection start -->
          <div class="list-group">
            <a href="#" class="list-group-item active border-item">Transaction <span class="badge">12</span></a>
            <a href="#" class="list-group-item border-item">Record <span class="badge">12</span></a>
            <a href="#" class="list-group-item border-item">Report <span class="badge">12</span></a>
          </div>
          <!-- selection start -->
        </div>

        <div class="col-md-9 custom-side-table-admin">
          <table class="table table-hover custom-table">
            <thead>
              <tr>
                <th class="col-md-1 tbl-check"><input type="checkbox" name=""></th>
                <th class="col-md-4">Capstone Title</th>
                <th class="col-md-2">Author</th>
                <th class="col-md-2">Category</th>
                <th class="col-md-2">Date Submited</th>
                <th class="col-md-1">Action</th>
              </tr>
            </thead>
            <tbody id="tableCapstoneAndBorrowData">

            </tbody>

            <tfoot id="tableCapstoneAndBorrowResult">
              <!-- <tr>
							<td colspan="6" class="small table-query">10 of 200 records</td>
						</tr> -->
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-md-offset-3">
          <div class="btn-group">
            <a href="#" class="btn btn-primary "><span class="small text-center">Approve All</span></a>
          </div>
          <div class="btn-group">
            <a href="#" class="btn btn-primary "><span class="small text-center">Disapprove All</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="footer">
    <p class="text-center">All Rights Reserved &copy 2019</p>
  </div>



  <!-- modal-preview-content -->
  <div class="modal fade" id="prevContentModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" id="previewContentHeaderModal">

        </div>


        <div class="modal-body" id="previewContentModal">


        </div>


        <div class="modal-footer">
          <button type="button " class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>