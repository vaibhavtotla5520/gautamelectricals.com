<?php
include 'Main.php';
$callTo = new Main;
session_start();

if(isset($_POST['username']) && isset($_POST['password'])) {
  $result = $callTo->authenticate($_POST['username'],$_POST['password']);
  echo $result;
}

if(isset($_POST['logout'])) {
  $result = $callTo->logout();
  echo $result;
}

if(isset($_POST['request_for_add'])) {
  if (!empty($_FILES["product_image"])) {
    $name = basename($_FILES["product_image"]["name"]);
    if(move_uploaded_file($_FILES["product_image"]["tmp_name"], "assets/images/".$name)) {
      // uploaded
      $result = $callTo->add_product($_POST['product_id'],$_POST['name'],$_POST['description'],$_POST['price'],$name,$_POST['category'],$_POST['page']);
      echo $result;
    }
  }
}
