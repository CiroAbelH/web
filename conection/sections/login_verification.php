<?php
include"db.php";



if(isset($_POST["send"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT id_user, email, name, password FROM users WHERE email = '$email'";
    $results = mysqli_query($con, $query);
    //se pasan los resultados a un array asociativo para poder ser leidos
    $data = mysqli_fetch_assoc($results);


    if(isset($data) && password_verify($_POST["password"], $data["password"])){
        // En caso de que el id del usuario sea 8 es el admin
        //si no es un usuario normal
        switch ($data["id_user"]){
            case ($data["id_user"] == 8) :
                header ("Location: ../crud.php");
                $_SESSION["admin_id"] = $data["id_user"];
                $_SESSION["admin_name"] = $data["name"];
                break;


            case ($data["is_user"] != 8) :
                $_SESSION["user_id"] = $data["id_user"];
                $_SESSION["user_name"] = $data["name"];
                header ("Location: ../../index.php");
            break;
        }
        
    } else{


        $_SESSION["login_message"] = "Las credenciales igresadas son incorrectas";
        header ("Location: ../login.php");


    }
    
}