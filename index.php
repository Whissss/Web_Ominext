<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Chào Mừng Bạn Đến Với Web Trao Đổi Sách Miễn Phí</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="Bootstrap/css/Style.css">


    	<link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>

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
		include 'View/connect.php';
	?>

	<section class="content">
		<div class="row header">
			<!-- Logo -->
			
			<!-- Image Logo -->
			<header class="content_header col-md-10">
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
			<section class="so col-md-8">        
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
                        case 'dang_ki':
                        	include 'View/register.php' ;
                            	break;
                        case 'dang_nhap':
                        	include 'View/Login.php'; 
                            	break;
                        case 'thanh_cong':
                        	include 'View/success.php';
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

<script type="text/javascript" src="Bootstrap/css/Script.js">
</script>

</body>
</html>