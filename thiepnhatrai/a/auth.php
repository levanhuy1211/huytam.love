
<form method="POST">
    <input type="text" name="oneCode" placeholder="Vd: 123123" required="required" class="form-control" id="verification_code">
    <input type="submit" name="submit" value="Submit">
</form>
<?php
setcookie("login", "your_username", time() + 3600);
if (isset($_POST['submit'])) {

    if ($_POST['oneCode']=="huytam123") {
        $_COOKIE['login']="login";
        echo $_COOKIE['login'];
        header("Location: index.php");
    } else {
        echo 'FAILED';
    }
}
?>