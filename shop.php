<!-- Header Start Here -->
<?php include 'includes/header.php'; ?>
<!-- Header End Here -->

<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  header('Location: index.php');
}
?>

<!-- Page Content -->
<div class="container">

  <!-- Portfolio Item Heading -->
  <h1 class="my-4">Page Heading
    <small>Secondary Text</small>
  </h1>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-8">
      <img class="img-fluid" src="https://via.placeholder.com/750x500" alt="">
    </div>

    <div class="col-md-4">
      <h3 class="my-3">Project Description</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
      <h3 class="my-3">Project Details</h3>
      <ul>
        <li>Lorem Ipsum</li>
        <li>Dolor Sit Amet</li>
        <li>Consectetur</li>
        <li>Adipiscing Elit</li>
      </ul>
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->