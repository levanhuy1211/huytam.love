<?php
ini_set('display_errors', 1)
session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == "login"){
require_once("db.php");
echo "huy là tao";
}else{
    header("Location: auth.php");
}
?>