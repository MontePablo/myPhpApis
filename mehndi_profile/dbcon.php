<?php

$host="localhost";
$username="root";
$password="";
$dbname="mehndi_profile_db";
$conn=mysqli_connect($host,$username,$password,$dbname);
if(!$conn){
    die("connection failed: ". mysqli_connect_error());
}
?>