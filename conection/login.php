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
    <title>Login</title>
</head>
<body>




<?php

include "sections/db.php";
//Si estando la sesion activa trata de ir a login se redirige automaticamente a index.php
if(isset($_SESSION["user_id"])){
    header ("Location: ../index.php");
} else if(isset($_SESSION["admin_name"])){
    session_unset();
    session_destroy();
}

?>


<div class="logo">
    <a href="../index.php">
       <img src="../assets/img/Logo1x1.png" alt="Logo"> 
    </a>
</div>
<?php if(isset($_SESSION["login_message"])){ ?>
    <p><?= $_SESSION["login_message"]; ?></p>
<?php session_unset(); }?>
<section>
    <div class="login-container">
        
        <form class="form-container" action="sections/login_verification.php" method="post">
            <div class="change">
            <a href="signup.php">O crea una cuenta</a>
            </div>
            

            <input type="email" name="email" required placeholder="email@example.com">
            <br>
            <input type="password" name="password" required minlength="4" maxlength="40" placeholder="Contraseña">
            <br>
            <input class="submit" type="submit" name="send" >
            <br>
            <br>
            
        </form>
    
    </div>
</section>


<?php include"../templates/login_footer.php";?>