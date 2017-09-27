<?php ob_start() ?>
<?php
    $a = $_SESSION['email'];
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

        	$gender = $_POST['gender'];
        	if(!isset($gender))
        	{
        		$loi[] = 'loi_gioi_tinh';
        	}

			if(empty($loi))
			{
				$name    = $_POST['name'] ;
				$email   = $_POST['email'] ;
				$dob     = $_POST['DoB'] ;
				$phone   = $_POST['phone'] ;
				$gender  = $_POST['gender'] ;
				$address = $_POST['address'] ;

				$name    = strip_tags($name);
                $name    = addslashes($name);
                $email   = strip_tags($email);
                $email   = addslashes($email);
                $address = strip_tags($address);
                $address = addslashes($address);

				$sql = "
UPDATE user SET name='$name' , age='$dob' ,  email='$email' ,  phone='$phone' ,  gender='$gender' , address='$address' WHERE email = '$a'";
				$count  = $conn->query($sql);				
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
 <?php
	 $sql2 = "SELECT name,age,email,phone,gender,address FROM user WHERE email = '$a'";
	 $row = $conn->query($sql2);
	 $r = $row->fetch();
 ?>
<div class="row main">
    <div class="main-login main-center">
			<form class="" method="post" action="#">
						
				<div class="form-group">
					<label for="name" class="cols-sm-2 control-label">Tên Bạn</label>						    
			        <div class="cols-sm-10">
					    <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="name" id="name"  placeholder="Điền Tên Đầy Đủ Của Bạn ..." required value="<?php if(isset($r)) echo $r[0]; ?>" />
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="cols-sm-2 control-label"> Email</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								<input type="email" class="form-control" name="email" id="email"  placeholder="Điền Email Của Bạn ..." required value="<?php if(isset($r)) echo $r[2]; ?>" />
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
								<input type="date" class="form-control" id="exampleInputDOB1" required name="DoB" value="<?php if(isset($r)) echo $r[1]; ?>">
							</div>
						</div>

					</div>
				</div>

				<div class="form-group">
					<label for="confirm" class="cols-sm-2 control-label">Điện Thoại</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="number" class="form-control" name="phone" id="phone"  placeholder="Nhập Số Điện Thoại ..." required value="<?php if(isset($r)) echo $r[3]; ?>" />
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
								<input type="radio" name="gender" value="Nam"
								<?php if($r[4]=='Nam'){
									echo 'checked';
								} ?>
								>Nam
							</li>
							<li>
								<input type="radio" name="gender" value="Nữ"
								<?php if($r[4]=='Nữ'){
									echo 'checked';
								} ?>
								>Nữ
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
								<input type="text" class="form-control" name="address" id="address"  placeholder="Nhập Địa Chỉ Của Bạn ..." required value="<?php if(isset($r)) echo $r[5]; ?>" />
							</div>
						</div>
				</div>

				<div class="form-group ">
					<button class="btn btn-primary btn-lg btn-block login-button" ng-disabled="!form.$dirty ||
 (form.$dirty && form.$invalid)">Sửa Thông Tin</button>
				</div>
						
			</form>
	</div>
</div>