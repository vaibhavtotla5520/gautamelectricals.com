<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['username'])) {
    header('location:index.php');
} else {
    $headings = $_SESSION['username'];
}

if (isset($_GET['msg'])) {
    echo "<script>alert('" . $_GET['msg'] . "');</script>";
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
        #add,
        #edit,
        #delete,
        #show {
            display: none;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid" style="margin-top:10px;">
        <div class="row">
            <div class="col-1">
                <div class="dropdown">
                    <h5>Hello,<?php echo !empty($headings) ? $headings : ''; ?></h5>
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
                    <tbody id="show_here">

                    </tbody>
                </table>
                <!-- show section ends -->

                <!-- add section starts -->
                <div id="add" class="container">
                    <h6>Add</h6>
                    <form id="add_form" action="RequestHandler.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="product_id">Product ID</label>
                            <input type="text" class="form-control" placeholder="Product ID" name="product_id" Required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" Required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="3" placeholder="Write here" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" placeholder=" Rs/-" name="price">
                        </div>
                        <div class="form-group">
                            <label for="product_image">Image</label>
                            <input type="file" class="form-control-file" name="product_image" Required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" placeholder="Category" name="category">
                        </div>
                        <div class="form-group">
                            <label for="page">Page</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="page">
                                <option value="products">Products</option>
                                <option value="home">Home</option>
                                <option value="manufacture">Manufacture</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success" name="request_for_add" value="request_for_add">Add</button>
                    </form>
                </div>
                <!-- add section ends -->

                <!-- edit section starts -->
                <div id="edit" class="container">
                    <h6>Enter ID of Product which you want to Edit :</h6>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Product ID" aria-label="Search" name="product_id" id="product_id">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="edit_search_button">Search</button>
                    </form>
                    <form id="for_edit" enctype="multipart/form-data" action="RequestHandler.php" method="post">


                    </form>
                </div>
                <!-- edit section ends -->

                <!-- delete section starts -->
                <div class="container" id="delete">
                    <h6 for="exampleFormControlInput1">Enter ID of Product which you want to delete :</h6>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Product ID" aria-label="Search" id="product_id_delete">
                        <button class="btn btn-outline-danger my-2 my-sm-0" type="button" id="delete_search_button">Search</button>
                    </form><br>
                    <div id="for_delete">

                    </div>
                </div>
                <!-- delete section ends -->

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            // logout
            $("#logout_btn").click(function() {
                $.ajax({
                    type: "POST",
                    data: {
                        "logout": "logout"
                    },
                    url: "RequestHandler.php",
                    success: function(result) {
                        if (result == 1) {
                            window.location.href = 'index.php';
                        } else {
                            window.alert(result);
                        }
                    },
                    error: function(result) {
                        // **alert('error; ' + eval(error));**
                        window.alert('Error')
                    }
                });
            });

            // show
            $("#show_product").click(function() {
                $("#show").toggle('fast', 'swing');
                $("#add").hide('fast', 'swing');
                $("#edit").hide('fast', 'swing');
                $("#delete").hide('fast', 'swing');
                $.ajax({
                    type: "POST",
                    data: {
                        "show": "show"
                    },
                    url: "RequestHandler.php",
                    success: function(result) {
                        if (result) {
                            $('#show_here').html(result);
                        } else {
                            window.alert(result);
                        }
                    },
                    error: function(result) {
                        // **alert('error; ' + eval(error));**
                        window.alert('Error')
                    }
                });
            });

            // add
            $("#add_product").click(function() {
                $("#add").toggle('fast', 'swing');
                $("#show").hide('fast', 'swing');
                $("#edit").hide('fast', 'swing');
                $("#delete").hide('fast', 'swing');
            });

            // edit
            $("#edit_product").click(function() {
                $("#edit").toggle('fast', 'swing');
                $("#show").hide('fast', 'swing');
                $("#add").hide('fast', 'swing');
                $("#delete").hide('fast', 'swing');
            });
            // edit search
            $("#edit_search_button").click(function() {
                let product_id = $("#product_id").val();
                $.ajax({
                    type: "POST",
                    data: {
                        "search_product_id": product_id
                    },
                    url: "RequestHandler.php",
                    success: function(result) {
                        if (result) {
                            $('#for_edit').html(result);
                        } else {
                            window.alert(result);
                        }
                    },
                    error: function(result) {
                        // **alert('error; ' + eval(error));**
                        window.alert('Error')
                    }
                });
            });

            // delete
            $("#delete_product").click(function() {
                $("#delete").toggle('fast', 'swing');
                $("#show").hide('fast', 'swing');
                $("#add").hide('fast', 'swing');
                $("#edit").hide('fast', 'swing');
            });
            // delete search
            $("#delete_search_button").click(function() {
                let product_id = $("#product_id_delete").val();
                $.ajax({
                    type: "POST",
                    data: {
                        "delete_product_id": product_id
                    },
                    url: "RequestHandler.php",
                    success: function(result) {
                        if (result) {
                            $('#for_delete').html(result);
                        } else {
                            window.alert(result);
                        }
                    },
                    error: function(result) {
                        // **alert('error; ' + eval(error));**
                        window.alert('Error')
                    }
                });
            });
        });
    </script>
</body>

</html>