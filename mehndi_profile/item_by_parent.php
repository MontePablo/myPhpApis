<?php
include('dbcon.php');include('common_functions.php');

    $parent=$_POST['parent'];
    if(empty($parent)){
        echo myResponseNoData(405);
    }else{
       return getData($parent);
    }

 
function getData($parent){
    global $conn;
    $query = "SELECT * FROM items where parent = $parent ";
    $query_run = mysqli_query($conn,$query);
    if($query_run){
        if(mysqli_num_rows($query_run)>0){
            $res = mysqli_fetch_all($query_run,MYSQLI_ASSOC);
            echo myResponseWithData(200,$res);
        }else{
            echo myResponseNoData(204);
        }
    }else{
        echo myResponseNoData(405);
    }
}
?>