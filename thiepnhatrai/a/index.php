<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
@session_start();

if(isset($_SESSION['login'])){
    echo $_SESSION['login'];
require_once("db.php");
echo "huy là tao";
}else{
    echo $_SESSION['login'];
}
?>