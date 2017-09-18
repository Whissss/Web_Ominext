<?php 
    ob_start();
    include 'View/connect.php';
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $admin = $_POST['admin'] ;
        $pass  = $_POST['pass'] ;

        $admin = strip_tags($admin);
        $admin = addslashes($admin);
        $pass  = strip_tags($pass);
        $pass  = addslashes($pass);
        $sql2  = "SELECT count(*) FROM user WHERE name = '$admin' and pass ='$pass'";
        $row = $conn->query($sql2);
        $r   = $row->fetch();
        if($r[0]==1)
        {
            $as = $_POST['admin'];
            if(isset($_POST['ghinho']) && $_POST['ghinho']=="ghinho")
            {
                setcookie('login_admin', 'ok', time()+60*60*24);
				header("location:index.php");
            }else if(!isset($_POST['ghinho'])){
				session_start();
				$_SESSION['login_admin']='ok';
				header("location:index.php");
			}
            echo "lỗi";
        }
        else
        {
            ?>
            <script>
                   alert("Nhập sai tài khoản hoặc mật khẩu");
            </script>
            <?php
        }
    }
    ?>

<form id="login-form" class="main_login" action="#" method="post">
    <div class="modal-body">
        <input name="admin" id="login_username" class="form-control" type="text" placeholder="Nhập Tên Đăng Nhập" required>
       
        <input 
        name="pass" id="login_password" class="form-control" type="password" placeholder="Mật Khẩu" required>
            <div class="checkbox">
                    <label>
                        <input type="checkbox" value="ghinho" name="ghinho"> Ghi Nhớ
                    </label>
            </div>
    </div>
            <div class="modal-footer">
                <div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng Nhập</button>
                </div>
            <div class="login_remember">
                    <button id="login_lost_btn" type="button" class="btn btn-link">Quên Mật Khẩu?</button>
                    
                    <button type="button" class="btn btn-link"><a href="?page=dang_ki">Đăng Ký</a></button>
                </div>
            </div>
</form>