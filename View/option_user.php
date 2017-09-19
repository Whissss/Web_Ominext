<div class="row profile">
	<div class="col-md-12 col-sm-12">
		<div class="profile-sidebar">
			<!-- SIDEBAR USERPIC -->
			<div class="profile-userpic row">
				<img src="Bootstrap/images/icon_user.png" class="img-responsive" alt="Image_user" style="height: 150px;width: 150px;">
				<a class="btn btn-default" style="margin-top: -80px;">
					<em class="glyphicon glyphicon-pencil"></em>        </a>
			</div>
			<!-- END SIDEBAR USERPIC -->
			<!-- SIDEBAR USER TITLE -->
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">
					<?php echo $_SESSION['username'] ?>
				<a class="btn btn-default">
					<em class=" glyphicon glyphicon-pencil
 "></em>        </a>
				</div>

				<div class="profile-usertitle-job">
					
				</div>
			</div>
			<!-- END SIDEBAR USER TITLE -->
			<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
				<button type="button" class="btn btn-success btn-sm">Kết Bạn</button>
				<button type="button" class="btn btn-danger btn-sm">Gửi Tin Nhắn</button>
			    </div>

			<!-- END SIDEBAR BUTTONS -->
			<!-- SIDEBAR MENU -->
			<div class="profile-usermenu">
				<ul class="nav">
					<li class="active">
						<a href="#">
						<i class="glyphicon glyphicon-home"></i>
						Overview </a>
					</li>
					<li>
						<a href="">
						<i class="glyphicon glyphicon-user"></i>
						Cài đặt tài khoản </a>
					</li>
					<li>
						<a href="#" target="_blank">
						<i class="glyphicon glyphicon-ok"></i>
						Tasks </a>
					</li>
					<li>
						<a href="#">
						<i class="glyphicon glyphicon-flag"></i>
						Help </a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>