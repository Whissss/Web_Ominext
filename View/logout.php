<?php
    if(isset($_COOKIE['login_admin']))
    {
        setcookie('login_admin', '', time());
        header('location:login.php');
    }
?>