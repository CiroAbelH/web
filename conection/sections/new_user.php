<?php

include "db.php";


if(isset($_POST["send"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    
    //ENCRIPTAR CONTRASENAS
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $query_select = "SELECT email FROM users WHERE email = '$email'";
    $result_select = mysqli_query($con, $query_select);
    $data_select = mysqli_fetch_assoc($result_select);

    //Comprobar que no haya otro usuario existente con el mismo correo
    if(isset($data_select) && count($data_select) > 0){
        $_SESSION["duplicated_email"] = "El email ingresado se encuentra en uso, ingrese otro o inicia sesión";
        header ("Location: ../signup.php");
    }else{
        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        $result = mysqli_query($con, $query);

    
    
        if(!$result){
        echo "Query_failed";
        }

        $_SESSION["message"] = "Usuario Creado Exitosamente";
    
        header("Location: ../login.php");
    }

    
}