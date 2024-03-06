<?php
@session_start();
if(isset($_COOKIE['login'])){
    $pdo = new PDO("mysql:host=10.3.48.70;dbname=huytamdb", "huytam_user", "ieFIMOufxb6dRHsPaAwt");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
?>