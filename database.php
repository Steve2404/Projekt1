<?php 
try{
    session_start();
    $pdo = new PDO("mysql:host=localhost;dbname=mypaketo_projekt;charset=utf8",'mypaketo_root','Steve4815162342');
}catch(PDOException $e){
echo "Verbindung Fehlung : " .$e->getMessage();
}?>