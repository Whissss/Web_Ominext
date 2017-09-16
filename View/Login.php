<?php 
    ob_start();
    session_start();
    include 'View/connect.php';
?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $admin = $_POST['admin'] ;
        $pass  = $_POST['pass'] ;

        $admin = strip_tags($admin);
        $admin = addslashes($admin);
        $pass  = strip_tags($pass);
        $pass  = addslashes($pass);
        $sql2  = 
"SELECT count(*) FROM user WHERE name = '$admin' and pass ='$pass'";
        $row = $conn->query($sql2);
        $r   = $row->fetch();
        if($r[0]==1)
        {
            if($ghinho==true)
            {
                 setcookie('login_admin', 'ok', time()+86400);
                 ?>
                     <script>
                         alert("đã lưu cookie");
                     </script>
                 <?php
            }
            $_SESSION['user'] = $admin;
            $nguoi_dung == true;
            header("location:index.php");

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
                        <input type="checkbox" value="ghinho" id="ghinho"> Ghi Nhớ
                    </label>
                    <script>
            document.getElementById('ghinho').onclick = function(e){
                if (this.checked){
                    <?php $ghinho== true ?>
                }
                else{
                    <?php $ghinho== false ?>
                }
            };
        </script>
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