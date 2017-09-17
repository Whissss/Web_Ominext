<div id="menu">
	<ul>
		<li><a href="index.php">Trang chủ</a></li>
		<li><a href="?page=dien_dan">Diễn đàn</a></li>
		<li><a href="?page=tin_tuc">Tin tức</a></li>
		<li><a href="?page=hoi_dap">Hỏi đáp</a></li>
		<li><a href="?page=lien_he">Liên hệ</a></li>
		<?php
		    if($nguoi_dung==false)
		    {
		        ?>
		        <li><a href="?page=dang_nhap">Đăng Nhập</a></li>
		        <li><a href="?page=dang_ki">Đăng Ký</a></li>
		    <?php }		     
		    else
		    {
		    	?>
		    	<li><a href="?page=dang_xuat">đăng xuất</a></li>
		    <?php
			}
		?>
	</ul>
</div>