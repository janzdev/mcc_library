<?php

$host = "localhost";
$username ="root";
$password="";
$database ="mcc_library";

$con = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_error()) {
  echo 'error';
  die();
}
?>