<?php
@session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == "login"){
    $conn = new PDO("mysql:host=10.3.48.70;dbname=huytamdb", "huytam_user", "ieFIMOufxb6dRHsPaAwt");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}else{
  header("Location: auth.php");
}
?>