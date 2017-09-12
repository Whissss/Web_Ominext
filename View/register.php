	<div class="row main">
		<div class="main-login main-center">
			<h5>Điền Đầy Đủ Thông Tin Để Đăng Kí</h5>
				<form class="" method="post" action="#">
						
					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Tên Bạn</label>
						    <div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="name" id="name"  placeholder="Điền Tên Đầy Đủ Của Bạn ..." required value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" />
								<span>
									
								</span>
							</div>
							</div>
					</div>

					<div class="form-group">
						<label for="password" class="cols-sm-2 control-label">Mật Khẩu</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Điền Mật Khẩu Của Bạn ..." required/>
								</div>
							</div>
					</div>

					<div class="form-group">
						<label for="confirm" class="cols-sm-2 control-label">Xác Nhận Mật Khẩu Của Bạn</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Xác Nhận Lại Mật Khẩu ..." required/>
								</div>
							</div>
					</div>

					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label"> Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" id="email"  placeholder="Điền Email Của Bạn ..." required value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" />
									<span class="input-group-addon">
                            <?php
                                if(!empty($loi) && in_array('loi_trung_email', $loi))
                                {
                                    echo 'Email đã tồn tại';
                                }
                            ?>
                                
                        </span>
								</div>
							</div>
					</div>

					<div class="form-group">
						<label for="confirm" class="cols-sm-2 control-label">Ngày Tháng Năm Sinh</label>
							<div class="cols-sm-10">
								<div class="well"> 
								    <div class="form-group">
								    <input type="date" class="form-control" id="exampleInputDOB1" required name="ngay_sinh">
								    </div>
								</div>

							</div>
					</div>

					<div class="form-group">
						<label for="confirm" class="cols-sm-2 control-label">Điện Thoại</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="number" class="form-control" name="dien_thoai" id="dien_thoai"  placeholder="Nhập Số Điện Thoại ..." required value="<?php if(isset($_POST['dien_thoai'])) echo $_POST['dien_thoai']; ?>" />
								</div>
							</div>
					</div>

					<div class="form-group">
						<label class="cols-sm-2 control-label">Giới Tính</label>
							<div class="cols-sm-10">
									<ul class="Gender list-inline">
										<li>
											<input type="radio" name="gender" value="Nam">Nam
										</li>
										<li>
											<input type="radio" name="gender" value="Nữ">Nữ
										</li>
									</ul>
							</div>
					</div>

					<div class="form-group">
						<label for="confirm" class="cols-sm-2 control-label">Địa Chỉ</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="dia_chi" id="dia_chi"  placeholder="Nhập Địa Chỉ Của Bạn ..." required value="<?php if(isset($_POST['dia_chi'])) echo $_POST['dia_chi']; ?>" />
								</div>
							</div>
					</div>

					<div class="form-group ">
						<button class="btn btn-primary btn-lg btn-block login-button">Đăng Ký</button>
					</div>
						
				</form>
		</div>
	</div>

<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
        {
        	$loi=array();
        	$email = $_POST['email'];
        	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        	{
        		$loi[] = 'loi_mail' ;
        	}

        	$sdt = $_POST['dien_thoai'];
        	$pattern = '/^[0-9-+]{10,13}/';
			if(!preg_match($pattern, $sdt, $match) == 1){
				$loi[] = 'loi_sdt';
			}
			$pass1 = $_POST['password'];
			$pass2 = $_POST['confirm'];
			if($pass2 !== $pass2)
			{
				$loi[] = 'loi_pass';
			}
			$q="SELECT E_mail FROM user ";
            $rows1=$conn->query($q);
            foreach ($rows1 as $r1)
                {
                    if($_POST['email']==$r1[1])
                {
                    $loi[]='loi_trung_email';
                }

        		}

			if(empty($loi))
			{
				$name = $_POST['name'];
				$pass = $_POST['password'];
				$mail = $_POST['email'];
				$Dob = $_POST['ngay_sinh'];
				$phone = $_POST['dien_thoai'];
				$gender = $_POST['gender'];
				$address = $_POST['dia_chi'];

			$sql = 
"INSERT INTO user(Name,Pass_word,Age,E_mail,Phone,Gender,Address) 
 VALUES ('$name','$pass','$Dob','$mail','$phone','$gender','$address')";
			$count=$conn->exec($sql);

			if($count>0)
			{
				header('location:./?page=thanh_cong');
			}
		}
    }
 ?>