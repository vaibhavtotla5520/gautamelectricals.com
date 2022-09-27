<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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

if(isset($_POST['search_product_id'])) {
  $result = $callTo->edit_product($_POST['search_product_id']);
  foreach($result as $data) {
      $status_button = $data['status']=='Published' ? 'success' : 'warning';
      echo '<div class="form-group">
      <label for="exampleFormControlInput1">Product ID</label>
      <input type="text" class="form-control" placeholder="Product ID" value="'.$data['product_id'].'">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Name</label>
      <input type="text" class="form-control" placeholder="Name" value="'.$data['name'].'">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write here" value="">'.$data['description'].'</textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Price</label>
      <input type="text" class="form-control" placeholder=" Rs/-" value="'.$data['price'].'">
    </div>
    <div class="form-group">
          <label for="exampleFormControlFile1">Image</label><br>
          <img src="assets/images/'.$data['image'].'" width="200px"/>
        <input type="file" class="form-control-file" id="fileInput">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Category</label>
        <input type="text" class="form-control" placeholder="Category" value="'.$data['category'].'">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Page : '.$data['page'].'</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option>Products</option>
          <option>Home</option>
          <option>Manufacture</option>
        </select>
      </div><button type="button" class="btn btn-'.$status_button.'">'.$data['status'].'</button>
      <button type="submit" class="btn btn-primary">Edit</button>';
  }
}

if(isset($_POST['show'])) {
  $result = $callTo->show_product();
  foreach($result as $data) {
      $status_button = $data['status']=='Published' ? 'success' : 'warning';
                echo '<tr>
                  <th scope="row">'.$data['product_id'].'</th>
                  <td>'.$data['name'].'</td>
                  <td>'.$data['description'].'</td>
                  <td>'.$data['price'].'</td>
                  <td><img src="assets/images/'.$data['image'].'" width="100px"/></td>
                  <td>'.$data['category'].'</td>
                  <td>'.$data['page'].'</td>
                  <td><button class="btn btn-'.$status_button.'">'.$data['status'].'</button></td>
                </tr>';
  }
}

if(isset($_POST['request_for_add'])) {
  if (!empty($_FILES["product_image"])) {
    $name = basename($_FILES["product_image"]["name"]);
    if(move_uploaded_file($_FILES["product_image"]["tmp_name"], "assets/images/".$name)) {
      // uploaded
      $result = $callTo->add_product($_POST['product_id'],$_POST['name'],$_POST['description'],$_POST['price'],$name,$_POST['category'],$_POST['page']);
      if($result) {
        header('location:admin.php?msg=Product%20Added');
      } else {
        echo $result;
      }
    } else {
      header('location:admin.php?msg=Product%Not%Added');
    }
  } else {
    header('location:admin.php?msg=Image%Not%Uploaded');
  }
}
