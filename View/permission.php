<?php
if (isset($_SESSION['user']) == false) {
	ob_start();
?>
	<script>
        alert("Nhập sai tài khoản hoặc mật khẩu");
    </script>
	<?php
	header('location:http://localhost/web_sach/index.php');
}else {
	if (isset($_SESSION['permision']) == true) {
		$permission = $_SESSION['permision'];
		if ($permission == '0') {
			echo "Bạn không đủ quyền truy cập vào trang này<br>";
			echo "<a href='http://localhost/web_sach/index.php'> Click để về lại trang chủ</a>";
			exit();
		}
	}
}
?>