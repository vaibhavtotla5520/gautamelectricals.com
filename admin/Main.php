<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Main {
    public function connect_db() {
        // db connection details
        // Create connection
        $conn = new mysqli('localhost', 'root', '', 'gautamel_main');
        // $conn = new mysqli('103.118.16.254', 'gautamel_admin', 'Gautam@123', 'gautamel_main');

        // Check connection
        if ($conn->connect_error) {
            return("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public function authenticate($username, $password) {
        // check user
        $conn = $this->connect_db();
        $sql = "SELECT id, username FROM users_ge WHERE username = '$username' AND password = '$password';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
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

    public function add_product($product_id, $name, $description, $price, $image, $category, $page) {
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

    public function show_product($offset, $limit) {
        // show product
        $conn = $this->connect_db();
        $sql = "SELECT * FROM products_ge ORDER BY id DESC LIMIT $limit OFFSET $offset;";
        $result = $conn->query($sql);
        $list_product = [];
        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            $conn->close();
            return $data;
        } else {
            return false;
        }
    }

    public function edit_product($product_id) {
        // edit product
        $conn = $this->connect_db();
        $sql = "SELECT * FROM products_ge WHERE product_id = '$product_id';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            $conn->close();
            return $data;
        } else {
            return FALSE;
        }
    }

    public function edited($id, $product_id, $name, $description, $price, $image, $category, $page, $status) {
        // edited product
        $conn = $this->connect_db();
        $sql = "UPDATE products_ge SET product_id='$product_id', name='$name', description='$description', price='$price', image='$image', category='$category', page='$page', status='$status' WHERE id=" . $id . ";";
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public function delete_product($product_id) {
        // delete product
        $conn = $this->connect_db();
        $sql = "SELECT * FROM products_ge WHERE product_id = '$product_id';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            $conn->close();
            return $data;
        } else {
            return FALSE;
        }
    }

    public function deleted($id) {
        $conn = $this->connect_db();
        $sql = "DELETE FROM products_ge WHERE id = '$id';";
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public function change_status($id, $status) {
        $conn = $this->connect_db();
        $sql = "UPDATE products_ge SET status = '$status' WHERE id = '$id';";
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
