<?php
  session_start();
  if(!isset($_SESSION['username'])) {
    header('location:index.php');
  } else {
    $headings = $_SESSION['username'];
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <title>Admin</title>
    <style>
        #add,#edit,#delete {
            display: none;
        }
    </style>
  </head>
  <body>
<!-- navbar -->
    <div class="container-fluid"  style="margin-top:10px;">
        <div class="row">
          <div class="col-1">
            <div class="dropdown">
              <h5>Hello,<?php echo !empty($headings)? $headings :''; ?></h5>
              <button class="btn btn-dark" id="logout_btn">Logout</button><br><br>
              <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                Action
              </button>
              <div class="dropdown-menu">
                <button class="dropdown-item" type="button" id="show_product">Show</button>
                <button class="dropdown-item" type="button" id="add_product">Add</button>
                <button class="dropdown-item" type="button" id="edit_product">Edit</button>
                <button class="dropdown-item" type="button" id="delete_product">Delete</button>
              </div>
            </div>
          </div>
          <div class="col-11">
            <!-- show section starts -->
            <table class="table" id="show">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Price</th>
                  <th scope="col">Image</th>
                  <th scope="col">Category</th>
                  <th scope="col">Page</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">00001</th>
                  <td>MCCB BCH Single Phase 6A</td>
                  <td>Details for products</td>
                  <td>299/-Rs</td>
                  <td>assets/image/pathtoimg.jpg</td>
                  <td>Equipment</td>
                  <td>Home</td>
                  <td><button class="btn btn-secondary">Publish</button></td>
                </tr>
              </tbody>
            </table>
<!-- show section ends -->

<!-- add section starts -->
        <div id="add" class="container">
          <h6>Add</h6>
          <form id="add_form" action="RequestHandler.php" method="post">
            <div class="form-group">
              <label for="exampleFormControlInput1">Product ID</label>
              <input type="text" class="form-control" placeholder="Product ID">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Name</label>
              <input type="text" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Description</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write here"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Price</label>
              <input type="text" class="form-control" placeholder=" Rs/-">
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Image</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Category</label>
              <input type="text" class="form-control" placeholder="Category">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Page</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option>Products</option>
                <option>Home</option>
                <option>Manufacture</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
          </form>
        </div>
        <!-- add section ends -->

        <!-- edit section starts -->
        <div id="edit" class="container">
          <h6>Enter ID of Product which you want to Edit :</h6>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Product ID" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <!-- <form id="for_edit">
          <div class="form-group">
          <label for="exampleFormControlInput1">Product ID</label>
          <input type="text" class="form-control" placeholder="Product ID">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Description</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write here"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Price</label>
          <input type="text" class="form-control" placeholder=" Rs/-">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Image</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Category</label>
            <input type="text" class="form-control" placeholder="Category">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Page</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option>Products</option>
              <option>Home</option>
              <option>Manufacture</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Edit</button>
        </form> -->
      </div>
      <!-- edit section ends -->

      <!-- delete section starts -->
      <div class="container" id="delete">
        <h6 for="exampleFormControlInput1">Enter ID of Product which you want to delete :</h6>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Product ID" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
      <!-- delete section ends -->

        </div>
      </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
    <script>
    $(document).ready(function(){

      // logout
        $("#logout_btn").click(function(){
          $.ajax({
                type: "POST",
                data: {"logout":"logout"},
                url: "RequestHandler.php",
                success: function(result){
                    if(result == 1){
                      window.location.href = 'index.php';
                    } else {
                      window.alert(result);
                    }
                },
                error: function (result) {
                    // **alert('error; ' + eval(error));**
                    window.alert('Error')
                }
            });
        });

        // show
        $("#show_product").click(function(){
          $("#show").toggle('fast','swing');
          $("#add").hide('fast','swing');
          $("#edit").hide('fast','swing');
          $("#delete").hide('fast','swing');
        });

        // add
        $("#add_product").click(function(){
          $("#add").toggle('fast','swing');
          $("#show").hide('fast','swing');
          $("#edit").hide('fast','swing');
          $("#delete").hide('fast','swing');
        });

        // edit
        $("#edit_product").click(function(){
          $("#edit").toggle('fast','swing');
          $("#show").hide('fast','swing');
          $("#add").hide('fast','swing');
          $("#delete").hide('fast','swing');
        });

        // delete
        $("#delete_product").click(function(){
          $("#delete").toggle('fast','swing');
          $("#show").hide('fast','swing');
          $("#add").hide('fast','swing');
          $("#edit").hide('fast','swing');
        });
    });
    </script>
  </body>
</html>
