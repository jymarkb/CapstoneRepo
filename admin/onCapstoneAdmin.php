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
      function clearData() {
        $('#author').val('');
        $('#category').val('');
        $('#abstract').val('');
        $('#keyword').val('');
        $('#title').val('');

        $('#authorUpdate').val('');
        $('#categoryUpdate').val('');
        $('#abstractUpdate').val('');
        $('#keywordUpdate').val('');
        $('#titleUpdate').val('');
      };

      function queryResultCapstoneadData() {
        var item = $("#searchBox").val();

        $("#tableCapstoneData").load("../php/capstoneAdmin/searchCapstone.php", {
          NewItem: item
        });

        $("#tableCapstoneResult").load("../php/capstoneAdmin/queryResultCapstone.php", {
          NewItem: item
        });
      };
      var checkCat1 = 0;
      var checkCat2 = 0;
      var checkCat3 = 0;
      var checkCat4 = 0;
      var checkCat5 = 0;
      var item = $("#searchBox").val();

      function getDataFilter() {
        var item = $("#searchBox").val();
        $("#tableCapstoneData").load("../php/capstoneAdmin/searchCapstoneFilter.php", {
          NewItem: item,
          cat1: checkCat1,
          cat2: checkCat2,
          cat3: checkCat3,
          cat4: checkCat4,
          cat5: checkCat5
        });

        $("#tableCapstoneResult").load("../php/capstoneAdmin/queryResultCapstone.php", {
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


      $("#tableCapstoneData").load("../php/capstoneAdmin/searchCapstoneFilter.php", {
        NewItem: item,
        cat1: checkCat1,
        cat2: checkCat2,
        cat3: checkCat3,
        cat4: checkCat4,
        cat5: checkCat5
      });


      $("#tableCapstoneResult").load("../php/capstoneAdmin/queryResultCapstone.php", {
        NewItem: item,
        cat1: checkCat1,
        cat2: checkCat2,
        cat3: checkCat3,
        cat4: checkCat4,
        cat5: checkCat5
      });


      $("#addContent").click(function() {
        var author = $("#author").val();
        var category = $('#category option:selected').attr('id');
        var abstract = $("#abstract").val();
        var keyword = $("#keyword").val();
        var title = $("#title").val();


        $.ajax({
          type: 'POST',
          url: '../php/capstoneAdmin/addCapstone.php',
          data: {
            author: author,
            category: category,
            abstract: abstract,
            keyword: keyword,
            title: title
          },
          success: function(response) {
            if (response == "success") {
              alert("Successfully inserted");
              clearData();
              reloadData();
            } else {
              alert("Failed to insert");
              clearData();
              reloadData();
            }
          }
        });
      });


      $(document).on('click', 'a[name="edit"]', function() {
        var id = (this.id);
        $("#modalEditContent").load("../php/capstoneAdmin/fetchDataCapstone.php", {
          id: id
        });

      });

      $(document).on('click', '#updateContent', function() {
        var author = $("#authorUpdate").val();
        var category = $("#categoryUpdate option:selected").attr('id');
        var abstract = $("#abstractUpdate").val();
        var keyword = $("#keywordUpdate").val();
        var title = $("#titleUpdate").val();
        var capid = $("#capstoneIdUpdate").text();


        $.ajax({
          type: 'POST',
          url: '../php/capstoneAdmin/updateCapstone.php',
          data: {
            author: author,
            category: category,
            abstract: abstract,
            keyword: keyword,
            title: title,
            capid: capid
          },
          success: function(response) {
            if (response == "success") {
              clearData();
              alert("Successfully updated");
              $('#editContentModal').modal('toggle');
              getDataFilter();
            } else {
              alert("Failed to update");
              clearData();
              $('#editContentModal').modal('toggle');
            }
          }
        });
      });

      $(document).on('click', 'a[name="delete"]', function() {
        var id = (this.id);
        $("#modalDeleteContent").load("../php/capstoneAdmin/deleteSelectDataCapstone.php", {
          id: id
        });
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

      $(document).on('click', 'input[name="delete-confirm"]', function() {
        var id = (this.id);

        $.ajax({
          type: 'POST',
          url: '../php/capstoneAdmin/deleteCapstone.php',
          data: {
            id: id
          },
          success: function(response) {
            if (response == "success") {
              alert("Successfully Deleted the item.");
              $('#deleteContentModal').modal('toggle');
              getDataFilter();
            } else {
              alert("Unable to delete the item.");
              $('#deleteContentModal').modal('toggle');
              getDataFilter();
            }
          }
        });
      });


      $(document).on('click', 'a[name="preview"]', function() {
        var id = (this.id);

        $("#previewContentModal").load("../php/capstoneAdmin/previewCapstone.php", {
          id: id
        });
        $("#previewContentHeaderModal").load("../php/capstoneAdmin/previewHeaderCapstone.php", {
          id: id
        });

      })


    });
  </script>
  <title>Capstone Library | Capstone</title>
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
          <li class="active"><a class="nav-title" href="onCapstoneAdmin.php">Casptone</a></li>
          <li><a class="nav-title" href="onManageAdmin.php">Manage</a></li>
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
              <li><a href="#"><span class="glyphicon glyphicon-off"></span> &nbspLogout</a></li>
            </ul>
          </div>
        </ul>
      </div>

    </div>
  </nav>
  <!-- //-- end navbar -->


  <div class="container custom-main-container">
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
        <div class="col-md-2">
          <a href="#" data-toggle="modal" data-target="#AddContentModal" class="btn btn-success"><span class="  glyphicon glyphicon glyphicon-plus"></span> Add New</a>
        </div>
      </div>
      <div class="row">

      </div>



      <div class="col-md-3  ">
        <!-- filter start -->
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <a class="filter-panel-title" data-toggle="collapse" href="#collapseFilter"><span class="glyphicon glyphicon-list"></span> &nbspFilter</a>
            </div>
            <div id="collapseFilter" class="panel-collapse">
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

                <!-- <div class="row">
              <div class="text-rigth col-md-1 col-md-offset-8">
                <a href="#" class="btn btn-primary btn-sm">Apply</a>
              </div>
            </div> -->
              </div>
            </div>
          </div>
        </div>
        <!-- filter end -->

        <!-- selection start -->
        <div class="list-group">
          <a href="#" class="list-group-item active border-item">Transaction</a>
          <a href="#" class="list-group-item border-item">Record </a>
          <a href="#" class="list-group-item border-item">Report </a>
        </div>
        <!-- selection start -->
      </div>

      <div class="col-md-9 custom-side-table-admin">
        <table class="table table-hover custom-table">
          <thead>
            <tr>
              <th class="col-md-9">Title & Description</th>
              <th class="col-md-2">Rating</th>
              <th class="col-md-1"></th>
            </tr>
          </thead>
          <tbody id="tableCapstoneData">
          </tbody>

          <tfoot id="tableCapstoneResult">

          </tfoot>
        </table>

      </div>
      <div class="row">
        <ul class="pager">
          <li><a class="text-center pager-btn" id="prev" href="#">Previous</a></li>
          <li><a class="text-center pager-btn" id="next" href="#">Next</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="footer">
    <p class="text-center">All Rights Reserved &copy 2019</p>
  </div>





  <!-- modal-add-content -->
  <div class="modal fade" id="AddContentModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title text-center">Add New Item</h2>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label for="Title">Title :</label>
            <input type="text" class="form-control" id="title" placeholder="Capstone Title">
          </div>

          <div class="form-group">
            <label for="Author">Author :</label>
            <input type="text" class="form-control" id="author" placeholder="use comma(,) to separate Authors">
          </div>

          <div class="form-group">
            <label for="Category">Category :</label><br>
            <select id="category" class="form-control">
              <?php
              $sql = "SELECT * FROM categories";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option id=" . $row['cat_id'] . " name=''>" . $row['cat_name'] . "</option>";
                }
              }

              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="abstract">Abstract:</label>
            <textarea class="form-control" rows="8" id="abstract" placeholder="Write your abstract here"></textarea>
          </div>
          <div class="form-group">
            <label for="keyword">Keyword :</label>
            <input type="text" class="form-control" id="keyword" placeholder="use comma(,) to separate keywords">
          </div>
          <div class="form-group">
            <label for="screenshot">Screenshot :</label>
            <input type="file" class="form-control" id="screenshot" multiple>
          </div>

          <div class="row">
            <div class="col-md-12 col-xs-12 input-group text-center">
              <input type="submit" id="addContent" class="btn btn-success btn-lg" name="" value="Submit">
            </div>
          </div>

          <!-- 
        </form> -->
        </div>
        <div class="modal-footer">
          <button type="button " class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- modal-add-content -->


  <!-- modal-edit-content -->
  <div class="modal fade" id="editContentModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title text-center">Edit Item</h2>
        </div>

        <div class="modal-body" id="modalEditContent">


        </div>
        <div class="modal-footer">
          <button type="button " class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- modal-edit-content -->

  <!-- modal-delete-content -->
  <div class="modal fade" id="deleteContentModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title text-center">Delete Item</h2>
        </div>

        <div class="modal-body" id="modalDeleteContent">


        </div>
        <!-- <div class="modal-footer">
      <button type="button " class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
    </div> -->
      </div>
    </div>
  </div>
  <!-- modal-delete-content -->

  <!-- modal-content -->
  <div class="modal fade" id="contentModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Title</h2>
        </div>

        <div class="modal-body">
          <p class="">Author</p>
          <p class="">Category</p>
          <p>Abstract</p>
          <p>Keyword</p>
          <p>Screenshot</p>
        </div>
        <div class="modal-footer">
          <button type="button " class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
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