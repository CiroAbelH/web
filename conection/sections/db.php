<?php

session_start();

$con = mysqli_connect("localhost","root","",       "trippie_database");

if(!$con){
    echo "Error de conexión";
}

