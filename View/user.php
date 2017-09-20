<div class="row profile">
	<div class="col-md-12 col-sm-12">
		<div class="profile-sidebar">
			<div class="profile-userpic row">
				<img src="Bootstrap/images/icon_user.png" class="img-responsive" alt="Image_user" style="height: 150px;width: 150px;">
				<a class="btn btn-default" style="margin-top: -80px;">
					<em class="glyphicon glyphicon-pencil"></em>        </a>
			</div>

			<div class="profile-usertitle">
				<div class="profile-usertitle-name">
					<?php echo $_SESSION['username'] ?>
				
				</div>

				<div class="profile-usertitle-job">
					
				</div>
			</div>

				<div class="profile-userbuttons">
				<button type="button" class="btn btn-success btn-sm">Kết Bạn</button>
				<button type="button" class="btn btn-danger btn-sm">Gửi Tin Nhắn</button>
			    </div>

			<div class="profile-usermenu">
				<ul class="nav">
					<li class="active">
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