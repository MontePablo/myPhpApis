<?php

 header('Access-Control-Allow-Origin:*');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Method: GET');
 header('Acess-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

include('dbcon.php');include('common_functions.php');



    $order_id=$_POST['order_id'];
    return getData($order_id);


 
 function getData($order_id){
    global $conn;
    $query = "SELECT * FROM order_item where order_id = $order_id ";
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
