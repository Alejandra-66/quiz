<?php
$hostDB = "localhost";
$userDB = "root";
$pwdDB = "";
$nameDB="examen_pr2";
$conexDB = new mysqli($hostDB, $userDB, $pwdDB, $nameDB);
if($conexDB->connect_error){
    echo $conexDB->connect_error;
    die();
}
echo "Conexión exitosa<br>";