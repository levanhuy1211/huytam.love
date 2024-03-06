<?php
@session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == "login"){
require_once("db.php");
}else{
    header("Location: auth.php");
}
?>