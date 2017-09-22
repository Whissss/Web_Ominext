<?php ob_start() ?>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
        {
        	$loi=array();
        	$email = $_POST['email'];
        	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        	{
        		$loi[] = 'loi_mail' ;
        	}

        	$sdt = $_POST['phone'];
        	$pattern = '/^[0-9-+]{10,13}/';
			if(!preg_match($pattern, $sdt, $match) == 1){
				$loi[] = 'loi_sdt';
			}

			$pass1 = $_POST['password'];
			$pass2 = $_POST['confirm'];
			if($pass1 !== $pass2)
			{
				$loi[] = 'loi_pass';
			}
			$q="SELECT email FROM user ";
            $rows1=$conn->query($q);
            foreach ($rows1 as $r1)
            {
                    if($_POST['email']==$r1[0])
                		{
                            $loi[]='loi_trung_email';
                        }

        	}
        	$gender = $_POST['gender'];
        	if(!isset($gender))
        	{
        		$loi[] = 'loi_gioi_tinh';
        	}

			if(empty($loi))
			{
				$name    = $_POST['name'] ;
				$pass    = $_POST['password'] ;
				$email   = $_POST['email'] ;
				$dob     = $_POST['DoB'] ;
				$phone   = $_POST['phone'] ;
				$gender  = $_POST['gender'] ;
				$address = $_POST['address'] ;

				$name    = strip_tags($name);
                $name    = addslashes($name);
                $pass    = strip_tags($pass);
                $pass    = addslashes($pass);
                $email   = strip_tags($email);
                $email   = addslashes($email);
                $address = strip_tags($address);
                $address = addslashes($address);

				$sql = "
insert into user(name , pass , age ,  email ,  phone ,  gender , address ) 
values ('$name','$pass','$dob', '$email','$phone','$gender','$address')";
				
				if($gender=='Nam')
				{
					$sql1 = "INSERT INTO icon_user(email,img_name) VALUES('$email','male.jpg')";
					$count1 = $conn->exec($sql1);
				}
				if($gender=='Nữ')
				{
					$sql2 = "INSERT INTO icon_user(email,img_name) VALUES('$email','female.jpg')";
					$count2 = $conn->exec($sql2);
				}
				$count  = $conn->exec($sql);
				
				
				if($count>0)
				{
					session_start();
				    $_SESSION['login_admin'] ='ok';
				    $_SESSION['username']    = $name;
				    $_SESSION['email']       = $email;
				    header("location:index.php");
				}
			}
   		}
 ?>
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
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="cols-sm-2 control-label">Mật Khẩu</label>
					
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="password" id="password"  placeholder="Điền Mật Khẩu Của Bạn ..." 
							 required/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="confirm" class="cols-sm-2 control-label">Xác Nhận Mật Khẩu Của Bạn</label>

					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Xác Nhận Lại Mật Khẩu ..." 
						     required/>
						</div>

							<?php 
						        if(!empty($loi) && in_array('loi_pass', $loi))
                                {
                                    echo "<div style='background-color:red; text-align:center;'>2 pass không trùng nhau</div>";
                                }

							?>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="cols-sm-2 control-label"> Email</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								<input type="email" class="form-control" name="email" id="email"  placeholder="Điền Email Của Bạn ..." required value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" />
							</div>
							<?php 
						        if(!empty($loi) && in_array('loi_trung_email', $loi))
                                {
                                    echo "<div style='background-color:red; text-align:center;'>Email đã có người sử dụng</div>";
                                }
                                if(!empty($loi) && in_array('loi_email', $loi))
                                {
                                    echo "<div style='background-color:red; text-align:center;'>Sai định dạng Email</div>";
                                }
							?>
						</div>
				</div>

				<div class="form-group">
					<label for="confirm" class="cols-sm-2 control-label">Ngày Tháng Năm Sinh</label>
					<div class="cols-sm-10">
						<div class="well"> 
							<div class="form-group">
								<input type="date" class="form-control" id="exampleInputDOB1" required name="DoB">
							</div>
						</div>

					</div>
				</div>

				<div class="form-group">
					<label for="confirm" class="cols-sm-2 control-label">Điện Thoại</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="number" class="form-control" name="phone" id="phone"  placeholder="Nhập Số Điện Thoại ..." required value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>" />
						</div>
						    <?php 
						        if(!empty($loi) && in_array('loi_sdt', $loi))
                                {
                                    echo "<div style='background-color:red; text-align:center;'>Số điện thoại từ 10-13 số</div>";
                                }
                            ?>
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
					<span>
						<?php 
							if(!empty($loi) && in_array('loi_gioi_tinh', $loi))
                                {
                                    echo "<div style='background-color:red; text-align:center;'>Vui Lòng Chọn Giới Tính</div>";
                                }
						?>
					</span>
				</div>

				<div class="form-group">
					<label for="confirm" class="cols-sm-2 control-label">Địa Chỉ</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="address" id="address"  placeholder="Nhập Địa Chỉ Của Bạn ..." required value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>" />
							</div>
						</div>
				</div>

				<div class="form-group ">
					<button class="btn btn-primary btn-lg btn-block login-button" ng-disabled="!form.$dirty ||
 (form.$dirty && form.$invalid)">Đăng Ký</button>
				</div>
						
			</form>
	</div>
</div>