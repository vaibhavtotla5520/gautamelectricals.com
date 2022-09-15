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
