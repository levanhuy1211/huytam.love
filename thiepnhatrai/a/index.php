<?php
@session_start();
if(isset($_SESSION['login'])){
require_once("db.php");
echo "huy là tao";
}
?>