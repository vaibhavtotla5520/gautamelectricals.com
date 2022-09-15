<?php

$servername = "localhost";

$username = "gautamel_products";

$password = "Gautam@123";

$db = "gautamel_gautamelectricals.com";



// Create connection

$conn = mysqli_connect($servername, $username, $password,$db);



// Check connection

if (!$conn) {

   die("Connection failed: " . mysqli_connect_error());

}

//echo "Connected successfully";

?>