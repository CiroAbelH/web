<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <link rel="stylesheet" type="text/css" href="view/styles.css">
    <title>Trip.Wav - Company</title>
</head>

<body>
    <?php session_start(); if(isset($_SESSION["admin_name"])){ ?>
        <span>Bienvenido admin: <?= $_SESSION["admin_name"] ?> | </span>
        <a class="mientras" href="conection/crud.php">Administrador de Productos</a>
        <style>
            .mientras{
                color:black;
            }
            .mientras:hover{
                color: cadetblue;
            }
        </style>
        
    <?php }?>
    <!---HEADER--->
    <header class="header">
        <div class="header-container">
            <!-- <div class="menu-button">
                <a href="#"><box-icon name='menu'></box-icon></a>
            </div> -->
            <div class="header-container-1">
    
                <form class="header-left" action="">
                    <div class="search">
                        <input type="text" placeholder="Buscar">
                        <div class="search-icon">
                            <a href="#">
                            <box-icon name='search'></box-icon>
                            </a>
                        </div>
                    </div>
                </form>
        
                <div class="logo">
                    <a href="#">
                        <img src="Assets/Img/Logo1x1.png" alt="" height="100px" width="110px">
                    </a>
                </div>
                
                <div class="header-rigth-size">
                    <div class="header-right">
                        <div class="user">
                            <?php  if(isset($_SESSION["user_id"])){ ?>
                                <a href="#"><?php echo "( ".$_SESSION["user_name"]. " )"; ?></a>
                                <span>-</span>
                                 <br>
                                <a href="conection/sections/logout.php">Cerrar Session</a>
                            <?php } else{ ?>
                            <a href="conection/login.php">Iniciar Sesion</a>
                            <?php }?>
                        </div>
            
                        <!-- <div class="carrito">
                            <a href="#">
                            <box-icon name='cart'></box-icon>
                            </a>
            
                        </div> -->
                    </div>
                </div>
                
        
        
            </div>
        
            <div class="header-container-2">
                <nav>
                    <ul>
                        <li><a href="index.php">Beats</a></li>
                        <li><a href="drumkits.php">Drum Kits</a></li>
                        <li><a href="samples.php">Samples</a></li>
                    </ul>
                </nav>
        
            </div>

        </div>
    </header>
