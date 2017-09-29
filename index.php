<!DOCTYPE html>
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
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
		<script 
			src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">
		</script>

		<script
		  src="https://code.jquery.com/jquery-3.2.1.min.js"
		  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		  crossorigin="anonymous">
		</script>
	</head>
	<style>
    .clearFix
{
    clear:both;
}
.panel.panel-chat
{
    position: fixed;
    bottom:0;
    right:0;
    max-width: 350px;
    box-shadow: none;
    -webkit-box-shadow: none;
}
.panel.panel-chat *
{
    background: none;
    border: none;
}
.panel.panel-chat .panel-heading
{
    background: #4b67a8;
    border: 1px solid #2e4588;
    color:#FFF;
}
.panel.panel-chat .panel-heading a:nth-of-type(1)
{
    text-decoration: none;
    width: 290px;
    color:#FFF;
    font-weight: bold;
    float:left;
}
.panel.panel-chat .panel-heading a:nth-of-type(2)
{
    text-decoration: none;
    max-width: 11px;
    width: 11px;
    color:#FFF;
    float:right;
}
.panel.panel-chat .panel-body
{
    display: block;
    padding: 0;
    margin: 0;
    max-height: 250px;
    height: 250px;
    border-left: 1px solid #b2b2b2;
    border-right: 1px solid #b2b2b2;
    background: #EDEFF4;
    overflow: auto;
}
.panel.panel-chat .panel-body::-webkit-scrollbar {
     display: none;
 }
.panel.panel-chat .panel-body .messageMe
{
    border-bottom:1px dotted #b2b2b2;
}
.panel.panel-chat .panel-body .messageMe img
 {
     float:left;
     max-width: 50px;
     max-height: 50px;
 }
.panel.panel-chat .panel-body .messageMe span
{
    display: block;
    float:left;
    padding: 5px;
    background: #FFF;
    min-height: 50px;
    max-width: 280px;
    height: 50px;
    width: 280px;
    word-break: break-all;
}
.panel.panel-chat .panel-body .messageHer
{
    border-bottom:1px dotted #b2b2b2;
}
.panel.panel-chat .panel-body .messageHer img
{
    float:right;
    max-width: 50px;
    max-height: 50px;
}
.panel.panel-chat .panel-body .messageHer span
{
    display: block;
    float:right;
    padding: 5px;
    background: #FFF;
    min-height: 50px;
    max-width: 280px;
    height: 50px;
    width: 280px;
    word-break: break-all;
}
.panel.panel-chat .panel-footer
{
    padding: 0;
    margin: 0;
    border: 1px solid #b2b2b2;
    max-height: 75px;
    height: 75px;
}
.panel.panel-chat .panel-footer textarea
{
    margin-bottom: -5px;
    resize: none;
    width: 100%;
    height: 100%;
}
</style>
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
            ?>
            <script>        
            var user = "yes";
            localStorage.setItem("a",user);
    </script>
<?php
    }
?>
<script>
    if(localStorage.getItem("a",user)== "no")
    {
        alert("Thoat");
    })
</script>
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
<script type="text/javascript">
$(function(){
    $(".panel.panel-chat > .panel-heading > .chatMinimize").click(function(){
        if($(this).parent().parent().hasClass('mini'))
        {
            $(this).parent().parent().removeClass('mini').addClass('normal');

            $('.panel.panel-chat > .panel-body').animate({height: "250px"}, 500).show();

            $('.panel.panel-chat > .panel-footer').animate({height: "75px"}, 500).show();
        }
        else
        {
            $(this).parent().parent().removeClass('normal').addClass('mini');

            $('.panel.panel-chat > .panel-body').animate({height: "0"}, 500);

            $('.panel.panel-chat > .panel-footer').animate({height: "0"}, 500);

            setTimeout(function() {
                $('.panel.panel-chat > .panel-body').hide();
                $('.panel.panel-chat > .panel-footer').hide();
            }, 500);


        }

    });
    $(".panel.panel-chat > .panel-heading > .chatClose").click(function(){
        $(this).parent().parent().remove();
    });
})
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
                       		include 'View/forum.php' ;
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
						case 'xac_nhan' :
							include 'View/friend/accept.php' ;
								break ;
						case 'tin_nhan' :
							include 'View/message.php' ;
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