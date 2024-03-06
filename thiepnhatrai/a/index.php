<?php
echo $_COOKIE['login'];
die;
if(isset($_COOKIE['login'])){
    echo $_COOKIE['login'];
require_once("db.php");
echo "huy là tao";
}else{
    header("Location: auth.php");
}
?>