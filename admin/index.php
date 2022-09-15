<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Admin</title>
    <style>
        .btn-color{
          background-color: #0e1c36;
          color: #fff;
        }
        .profile-image-pic{
          height: 200px;
          width: 200px;
          object-fit: cover;
        }
        .cardbody-color{
          background-color: #ebf2fa;
        }
        a{
          text-decoration: none;
        }
    </style>
  </head>
  <body>
    <!--<h1>Hello, world!</h1>-->

    <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <!--<h2 class="text-center text-dark mt-5">Authentication</h2>-->
        <!--<div class="text-center mb-5 text-dark">User</div>-->
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5" id="loginForm" method="post">

            <div class="text-center">
              <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" id="username" aria-describedby="emailHelp" required name="username" placeholder="username">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" placeholder="password" required name="password">
            </div>
            <div class="text-center"><button type="button" class="btn btn-color px-5 mb-5 w-100" id="submitBtn">Login</button></div>
            <!--<div id="emailHelp" class="form-text text-center mb-5 text-dark">Not-->
            <!--  Registered? <a href="#" class="text-dark fw-bold"> Create an-->
            <!--    Account</a>-->
            <!--</div>-->
          </form>
        </div>

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
            $("#submitBtn").click(function(){
                // window.alert('called');
                // e.preventDefault(); // avoid to execute the actual submit of the form.
                var form = $('#loginForm');
                $.ajax({
                    type: "POST",
                    data: form.serialize(),
                    url: "RequestHandler.php",
                    success: function(result){
                        if(result == 1){
                          window.location.href = 'admin.php';
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
        });
    </script>
  </body>
</html>
