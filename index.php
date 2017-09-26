<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Chào Mừng Bạn Đến Với Web Trao Đổi Sách Miễn Phí</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="Bootstrap/css/Style.css">
    <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

		<script 
			src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">
		</script>

		<script
		  src="https://code.jquery.com/jquery-3.2.1.min.js"
		  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		  crossorigin="anonymous">
		</script>
    </head>
<body>
<?php
	ob_start();
	session_start();
	$nguoi_dung = false;
  $thongbao = 0 ;
	include 'View/connect.php';
	if(!(isset($_COOKIE['login_admin']) && $_COOKIE['login_admin']=='ok') && !(isset($_SESSION['login_admin']) && $_SESSION['login_admin']=='ok'))
	{
	}else{
		$nguoi_dung = true;
    
		if(isset($_COOKIE['login_admin']))
		{}
		if(isset($_SESSION['login_admin']))
		{}
	}
?>
<script language="javascript">
         
        var window_new = null;
         
        function openWindow()
        {
            window_new = window.open('http://localhost/web_sach/View/upload_image.php', "windowChild", "width=500, height=500" );
            return false;
        }
         
        function closeWindow()
        {
            window_new.close();
            return false;
        }
</script> 
	<section class="content">
		<div class="row header">
			<!-- Logo -->
			
			<!-- Image Logo -->
			<header class="content_header col-md-10 col-sm-12">
				<div class="content_img">
				<img src="Bootstrap/images/header/logo_bk.png" alt="Logo_bk" id="logo_header">
				</div>
			</header>

			<!-- Select school -->
			<div class="select_header col-md-2">
					<select name="Select_school">
						<option value="Bach_khoa">Bách Khoa</option>
						<option value="Kinh_te">Kinh Tế Quốc Dân</option>
						<option value="Xay_dung">Xây Dựng</option>
					</select>
			</div>
		</div>
		
		<!-- Horizontal Horizontal -->
		<nav>
			<?php include'View/menu.php';?>
		</nav>

		<!-- Vertical Menu -->
		<div class="row">
			<?php include 'View/vertical-menu.php'; ?>
		
			<!-- // Vertical Menu -->
			<section class="so col-md-10">        
                <?php 
                if(isset($_REQUEST['page']))
                {
                	$page = $_REQUEST['page'];
                    switch ($page)
                    {
                        case '/' :
                            include 'index.php';
                        		    break;
                        case 'dien_dan' :
                       		  include 'index.php' ;
                       			    break ;
                       	case 'tin_tuc' :
                       		  include 'View/register.php' ;
                       			    break ;
                       	case 'hoi_dap' :
                       		  include 'View/answer.php' ;
                       			    break ;
                       	case 'lien_he' :
                       		  include 'View/contact.php' ;
                       			    break ;
                       	case 'trang_ca_nhan' :
                       		  include 'View/user.php' ;
                       			    break ;
                        case 'thong_bao' :
                            include 'View/notification.php' ;
                                break ;        
                       	case 'chinh_sua' :
                       		  include 'View/option_user.php' ;
                       			    break ;
                       	case 'ban_be' :
                       	    include 'View/friend.php';
                       	        break ;
                        case 'add' :
                            include 'View/friend/add.php';
                                break ;
                        case 'huy' :
                            include 'View/friend/unfriend.php';
                                break ;
                        case 'friend' :
                            include 'View/friend/inform.php';
                                break ; 		
                        case 'dang_ki':
                            include 'View/register.php' ;
                                break;
                        case 'dang_nhap':
                        	  include 'View/Login.php'; 
                                break;
                        case 'thanh_cong':
                        	  include 'View/success.php';
                        		    break;
                        case 'dang_xuat':
                        	  include 'View/logout.php';
                        		    break;
                       	default :
                       		 include 'View/404.php';
                       		      break ;

                    }
                
                } 
                else 
                {
                    include 'View/product.php';
                }
                ?>
            </section>
		</div>

		<div class="clear"></div>

		<?php include 'View/footer.php' ?>

    </section>