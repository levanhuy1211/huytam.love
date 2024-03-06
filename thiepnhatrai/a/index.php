<?php
@session_start();

if(isset($_SESSION['login'])){
    echo $_SESSION['login'];
require_once("db.php");
echo "huy là tao";
}else{
    
    header("Location: auth.php");
}
?>