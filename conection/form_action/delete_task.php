<?php

include "../sections/db.php";

if (isset($_GET["id"])){
    $id = $_GET["id"];
    $query = "DELETE FROM products WHERE product_id = $id";

    $result = mysqli_query( $con, $query );

    if(!$result){
        die ("Query Failed");
    }

    $_SESSION["message"] = "Task Removed Successfully";
    $_SESSION["message_type"] = "danger";
    header ("LOCATION: ../crud.php");
}