<?php

$server = "localhost";
$database = "crudemployees";
$username = "root";
$password = "";

try{
    $con = new PDO("mysql:host=$server;dbname=$database",$username,$password);
}catch(Exception $except){
    echo $except->getMessage();
}

?>