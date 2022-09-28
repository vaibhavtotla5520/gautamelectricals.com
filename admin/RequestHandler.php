<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'Main.php';
$callTo = new Main;
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $result = $callTo->authenticate($_POST['username'], $_POST['password']);
    echo $result;
}

if (isset($_POST['logout'])) {
    $result = $callTo->logout();
    echo $result;
}

if (isset($_POST['delete_product_id'])) {
    $result = $callTo->delete_product($_POST['delete_product_id']);
    if (!$result) {
        die('Not found');
    }
    echo '<table class="table"><thead class="thead-dark">
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
</thead>';
    foreach ($result as $data) {
        $status_button = $data['status'] == 'Published' ? 'success' : 'warning';
        echo '
              <tbody>
                <tr>
                  <th scope="row">' . $data['product_id'] . '</th>
                  <td>' . $data['name'] . '</td>
                  <td>' . $data['description'] . '</td>
                  <td>' . $data['price'] . '</td>
                  <td><img src="assets/images/' . $data['image'] . '" width="100px"/></td>
                  <td>' . $data['category'] . '</td>
                  <td>' . $data['page'] . '</td>
                  <td><button class="btn btn-' . $status_button . '">' . $data['status'] . '</button></td>
                </tr>
                <tr><td><form action="RequestHandler.php" method="post">
                <input type="hidden" name="id" value="' . $data['id'] . '"><br>
                <button class="btn btn-danger" type="submit" name="delete_product" value="delete_product">Delete</button>
                </form></td></tr>
                </tbody>';
    }
    echo '</table>';
}

if (isset($_POST['search_product_id'])) {
    $result = $callTo->edit_product($_POST['search_product_id']);
    if (!$result) {
        die('Not found');
    }
    foreach ($result as $data) {
        $status_button = $data['status'] == 'Published' ? 'success' : 'warning';
        echo '<div class="form-group">
      <label for="exampleFormControlInput1">Product ID</label>
      <input type="hidden" name="id" value="' . $data['id'] . '">
      <input type="text" class="form-control" placeholder="Product ID" value="' . $data['product_id'] . '" name="product_id">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Name</label>
      <input type="text" class="form-control" placeholder="Name" value="' . $data['name'] . '" name="name">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write here" name="description">' . $data['description'] . '</textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Price</label>
      <input type="text" class="form-control" placeholder=" Rs/-" value="' . $data['price'] . '" name="price">
    </div>
    <div class="form-group">
          <label for="exampleFormControlFile1">Image</label><br>
          <img src="assets/images/' . $data['image'] . '" width="200px"/>
        <input type="hidden" class="form-control-file" name="image_default" value="' . $data['image'] . '">
        <input type="file" class="form-control-file" id="fileInput" name="product_image">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Category</label>
        <input type="text" class="form-control" placeholder="Category" value="' . $data['category'] . '" name="category">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Page</label>
        <select class="form-control" id="exampleFormControlSelect1" name="page">
          <option value="' . $data['page'] . '" selected>' . $data['page'] . '</option>
          <option value="products">Products</option>
          <option value="home">Home</option>
          <option value="manufacture">Manufacture</option>
        </select>
        <input type="hidden" name="status" value="' . $data['status'] . '">
      </div><button type="button" class="btn btn-' . $status_button . '">' . $data['status'] . '</button>
      <button type="submit" class="btn btn-primary" name="request_for_edit" value="for_edit">Edit</button>';
    }
}

if (isset($_POST['show'])) {
    $result = $callTo->show_product();
    if (!$result) {
        die('Not Products found to show');
    }
    foreach ($result as $data) {
        $status_button = $data['status'] == 'Published' ? 'success' : 'warning';
        echo '<tr>
                  <th scope="row">' . $data['product_id'] . '</th>
                  <td>' . $data['name'] . '</td>
                  <td>' . $data['description'] . '</td>
                  <td>' . $data['price'] . '</td>
                  <td><img src="assets/images/' . $data['image'] . '" width="100px"/></td>
                  <td>' . $data['category'] . '</td>
                  <td>' . $data['page'] . '</td>
                  <td><button class="btn btn-' . $status_button . '">' . $data['status'] . '</button></td>
                </tr>';
    }
}

if (isset($_POST['request_for_add'])) {
    if (!empty($_FILES["product_image"])) {
        $name = basename($_FILES["product_image"]["name"]);
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], "assets/images/" . $name)) {
            // uploaded
            $result = $callTo->add_product($_POST['product_id'], $_POST['name'], $_POST['description'], $_POST['price'], $name, $_POST['category'], $_POST['page']);
            if ($result) {
                header('location:admin.php?msg=Product%20Added');
            } else {
                header('location:admin.php?msg=' . $result);
            }
        } else {
            header('location:admin.php?msg=Product%20Not%20Added');
        }
    } else {
        header('location:admin.php?msg=Image%20Not%20Uploaded');
    }
}

if (isset($_POST['request_for_edit'])) {
    if (empty($_FILES["product_image"]['name'])) {
        $result = $callTo->edited($_POST['id'], $_POST['product_id'], $_POST['name'], $_POST['description'], $_POST['price'], $_POST['image_default'], $_POST['category'], $_POST['page'], $_POST['status']);
        if ($result) {
            header('location:admin.php?msg=Product%20Updated');
        } else {
            header('location:admin.php?msg=' . $result);
        }
    } else {
        $name = basename($_FILES["product_image"]["name"]);
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], "assets/images/" . $name)) {
            $result = $callTo->edited($_POST['id'], $_POST['product_id'], $_POST['name'], $_POST['description'], $_POST['price'], $name, $_POST['category'], $_POST['page'], $_POST['status']);
            if ($result) {
                header('location:admin.php?msg=Product%20Updated');
            } else {
                header('location:admin.php?msg=' . $result);
            }
        } else {
            header('location:admin.php?msg=Image%20Not%20Updated');
        }
    }
}

if (isset($_POST['delete_product'])) {
    $result = $callTo->deleted($_POST['id']);
    if ($result) {
        header('location:admin.php?msg=Product%20Deleted%20Successfully');
    } else {
        header('location:admin.php?msg=' . $result);
    }
}
