
<form method="POST">
    <input type="text" name="oneCode" placeholder="Vd: 123123" required="required" class="form-control" id="verification_code">
    <input type="submit" name="submit" value="Submit">
</form>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
@session_start();
if (isset($_POST['submit'])) {
    if ($_POST['oneCode']=="huytam123") {
        $_SESSION['login']="login";
        header("Location: thiepnhatrai/a/index.php");
    } else {
        echo 'FAILED';
    }
}
?>