<?php

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
        return 'status';
    }

    public function edit_product(){
        // edit product
        return 'status';
    }

    public function delete_product(){
        // delete product
        return 'status';
    }
}
