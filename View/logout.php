<?php
    if(isset($_COOKIE['login_admin']))
		setcookie ('login_admin','',time());
	  session_start();
	  if(isset($_SESSION['login_admin']))
		unset($_SESSION['login_admin']);
		?>
    <script>
		    localStorage.setItem("a","no");
		</script>
		<?php
	  header('location:index.php');
?>