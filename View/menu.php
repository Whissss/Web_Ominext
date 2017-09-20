<div id="menu" class="row" >
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
		    	<li><a href="?page=trang_ca_nhan">
		    		<?php 
					$a = $_SESSION['email'];
				    $sql ="SELECT img_name FROM icon_user WHERE email = '$a'" ;
				    $row = $conn->query($sql);
				    foreach ($row as $r1)
				    {
				        echo"<img src='icon_user/$r1[0]' style='height: 24px ;width: 24px; border-radius: 50%;'>";
				    }
                ?><span><?php echo $_SESSION['username'] ; ?></span>
		    	    </a>
		    	</li>
		    	<li><a href="?page=dang_xuat">Đăng Xuất</a></li>
		    <?php
			}
		?>
	</ul>
</div>