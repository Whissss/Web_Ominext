<div class="row profile">
	<div class="col-md-12 col-sm-12">
		<div class="profile-sidebar">
			<div class="profile-userpic row">
				<?php 
					$a = $_SESSION['email'];
				    $sql ="SELECT img_name FROM icon_user WHERE email = '$a'" ;
				    $row = $conn->query($sql);
				    foreach ($row as $r1)
				    {
				        echo"<img src='icon_user/$r1[0]' class='img-responsive' alt='Image_user' style='height: 150px;width: 150px;'>";
				    }
                ?>
	                <a onclick="return openWindow()">
	                	<div style="margin-top:-60px;" class="btn btn-default">
				        <em class="glyphicon glyphicon-pencil"></em>
				         </div>
				    </a>
                    <a onclick="return closeWindow()"></a>
			</div>

			<div class="profile-usertitle">
				<div class="profile-usertitle-name">
					<?php echo $_SESSION['username'] ?>
				</div>
               
				<div class="profile-usertitle-job">
					
				</div>
			</div>
			<div class="profile-usermenu">
				<ul class="nav">
					<li>
						<a href="#">
						<i class="glyphicon glyphicon-home"></i>
						Dòng Thời Gian </a>
					</li>
					<li>
						<a href="">
						<i class="glyphicon glyphicon-user"></i>
						Bạn Bè </a>
					</li>
					<li>
						<a href="?page=chinh_sua">
						<i class="glyphicon glyphicon-ok"></i>
						Cài Đặt Tài Khoản </a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>