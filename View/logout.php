<?php
    if(isset($_COOKIE['login_admin']))
    {
    	session_start();
        setcookie('login_admin', '', time());
        if(session_destroy()) // Destroying All Sessions
            {
                header("Location: index.php"); // Redirecting To Home Page
            }
    }
?>