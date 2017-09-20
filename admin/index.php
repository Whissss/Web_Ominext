<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Chào Mừng Bạn Đến Với Web Trao Đổi Sách Miễn Phí</title>
		<link rel="stylesheet" type="text/css" href="Bootstrap/css/Style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="js/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="Bootstrap/css/Style_admin.css">
		<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="Bootstrap/js/jquery.js"></script>
	</head>
	<body>
        <?php
	ob_start();
	session_start();
	$nguoi_dung = false;
	include 'User/connect.php';
	if(!(isset($_COOKIE['login_admin']) && $_COOKIE['login_admin']=='ok') && !(isset($_SESSION['login_admin']) && $_SESSION['login_admin']=='ok'))
	{
		header('location:login.php');
	}else{
		$nguoi_dung = true;
		if(isset($_COOKIE['login_admin']))
		{
			echo "Đăng Nhập Thành Công";
		}
		if(isset($_SESSION['login_admin']))
		{}
	}
?>
	<section class="admin_container">
	<h1><a href="#">Trang Quản Trị Viên</a></h1>
		<div class="row">
			<div class="col-md-3 col-sm-12">
			    <div class="sidebar-nav">
			        <div class="navbar navbar-default" role="navigation">
			        <div class="navbar-collapse collapse sidebar-navbar-collapse">
			            <ul class="nav navbar-nav">
				            <li><a href="#">Trang Chủ</a></li>
				            <li><a href="?page=user">Người Dùng</a></li>
				            <li><a href="?page=admin">Quản Trị Viên</a></li>
				            <li><a href="?page=messages">Tin Nhắn</a></li>
				            <li><a href="?page=logout">Đăng Xuất</a></li>
			            </ul>
			        </div><!--/.nav-collapse -->
			        </div>
			    </div>
            </div>
        	<div class="col-md-9">
			    <?php
			        if(isset($_REQUEST['page'])){
			        	$page = $_REQUEST['page'];
                        switch ($page) {
                        	case '' :
                        		include 'User/user.php';
                        		break;
                        	case 'user':
                        		include 'User/user.php';    
                        		break;
                        	case 'admin' :
                        	    break;
                        	case 'admin' :
                        	    break;
                        	case 'logout' :
                        	    include 'logout.php';
                        	    break;
                        	default:
                        		
                        		break;
                        }
			        }
			    ?>
		    </div>
		</div>
	</section>
	</body>
</html>