<?php
@session_start();
echo $_SESSION['login'];
if(isset($_SESSION['login'])){
require_once("db.php");
echo "huy là tao";
}else{
    header("Location: auth.php");
}
?>