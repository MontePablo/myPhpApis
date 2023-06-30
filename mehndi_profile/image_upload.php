<?php
include('dbcon.php');include('common_functions.php');

if(isset($_FILES["uploaded_file"]["name"])){
    $id=$_POST['id'];
    $name=$_FILES["uploaded_file"]["name"];
    $tmp_name = $_FILES["uploaded_file"]["tmp_name"];
    $error = $_FILES['uploaded_file']['error'];
    if(!empty($name)){
        $location = './assets/';

        if(!is_dir($location)){
            mkdir($location);
        }

        $a=move_uploaded_file($tmp_name,"$location$name");
        if($a){
            global $conn;
            $query="INSERT INTO items_images(filename,item_id) 
            values ('$name','$id')";
            $result=mysqli_query($conn,$query);
            if($result){
              echo myResponseNoData(201);
            }else{
            echo myResponseNoData(400);
            }

        }
    }else {
        echo myResponseNoData(405);
    }
}
?>