<?php
include"../sections/db.php";

if(isset($_POST["save_task"])){
    $title = $_POST["title"];
    $price = $_POST["price"];
    $cover = $_FILES["cover"]["name"];
    $uploads = "/assets/img/$cover";

    // Inserción de datos puestos en una variable
    $query = "INSERT INTO products (product_title, product_price, product_image ) VALUES ('$title', '$price', '$cover')";
    // Elecución de la variable $con que contiene la conexion a la base de datos y $query que ya estando en la base de datos se ejecuta y se pasa todo a una variable $result
    $result = mysqli_query($con, $query);

    //Si no se obtiene un resultado
    if(!$result){
        die("Query Failed");
    }
    move_uploaded_file($_FILES["cover"]["tmp_name"], "../../assets/img/".$_FILES["cover"]["name"]);

    // Alertas
    $_SESSION["message"] = "Task Saved Succesfully";
    $_SESSION["message_type"] = "success";
    header ("Location: ../crud.php");
}