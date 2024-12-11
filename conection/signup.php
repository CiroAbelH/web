<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!--Font-->
    <link rel="stylesheet" href="../view/login_styles.css"">
    <title>Sign Up</title>
</head>
<body>



<?php
include "sections/db.php";
//Si estando la sesion activa trata de ir a login se redirige automaticamente a index.php
if(isset($_SESSION["user_id"])){
    header ("Location: index.php");
}

?>
    
    <div class="logo">
        <a href="../index.php">
           <img src="../assets/img/Logo1x1.png" alt="Logo"> 
        </a>
    </div>
    <?php

    if (isset($_SESSION["duplicated_email"])) { ?>
        <p><?= $_SESSION["duplicated_email"]; ?></p>
    <?php session_unset(); } ?>

    <section>
        <div class="login-container">
            <form class="form-container" action="sections/new_user.php" method="post">
                <div class="change">
                    <a href="login.php">O inicia sesión</a>
                </div>
                
                <input type="text" name="name" required minlength="2" maxlength="30" placeholder="Nombre">
                 <br>
                <input type="password" name="password" required minlength="4" maxlength="40" placeholder="Contraseña">
                <br>
                <input type="email" name="email" maxlength="60" placeholder="email_example@gmail.com">
                 <br>
                <input class="submit" type="submit" value="Enviar" name="send">
                <br>
                <br>
                
            </form>
    
        </div>
    </section>

    <?php include"../templates/login_footer.php";?>