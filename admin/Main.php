<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Main {
    public function connect_db(){
        // db connection details
        // Create connection
        $conn = new mysqli('localhost', 'root', '','test');

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public function authenticate($username,$password){
        // check user
        $conn = $this->connect_db();
        $sql = "SELECT id, username FROM users_ge WHERE username = '$username' AND password = '$password';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id'];
          }
          $conn->close();
          return true;
        } else {
          return "User Not Found";
        }
        // return true;
    }

    public function logout() {
      session_destroy();
      return true;
    }

    public function add_product($product_id,$name,$description,$price,$image,$category,$page){
        // add product
        $conn = $this->connect_db();
        $sql = "INSERT INTO products_ge (product_id,name,description,price,image,category,page,status)
        VALUES ('$product_id','$name','$description','$price','$image','$category','$page','Publish');";
        if ($conn->query($sql) === TRUE) {
          $conn->close();
          return true;
        } else {
          return "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public function show_product(){
        // show product
        $conn = $this->connect_db();
        $sql = "SELECT * FROM products_ge ORDER BY id DESC LIMIT 7;";
        $result = $conn->query($sql);
        $list_product = [];
        if ($result->num_rows > 0) {
          $data = [];
          while($row = $result->fetch_assoc()) {
            $data [] = $row;
          }

          $conn->close();
          return $data;
        } else {
          return "No Products Found";
        }
    }

    public function edit_product($product_id){
        // edit product
        $conn = $this->connect_db();
        $sql = "SELECT * FROM products_ge WHERE product_id = '$product_id';";
        $result = $conn->query($sql);
        $list_product = [];
        if ($result->num_rows > 0) {
          $data = [];
          while($row = $result->fetch_assoc()) {
            $data [] = $row;
          }

          $conn->close();
          return $data;
        } else {
          return "Product Not Found";
        }
    }

    public function delete_product(){
        // delete product
        return 'status';
    }
}
