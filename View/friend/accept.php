<?php 
	include 'View/connect.php' ;
	if(isset($_REQUEST['id']))
    {
        $id_friend    = $_REQUEST['id'];
        $a     = $_SESSION['email'];
        $sql   = "SELECT id_user FROM user WHERE email = '$a'";
        $row     = $conn->query($sql);
        foreach ($row as $r1)
        $id_user = $r1[0];
        var_dump($id_user);
        $sql1  = "UPDATE relationship SET status=2 WHERE(id_friend = '$id_user' AND id_user = '$id_friend')";
        var_dump($sql1);
        $co = $conn->exec($sql1);
        if($co > 0)
        {      
            
            $thongbao++;     
            echo "Xác nhận thành công";
        }
    }
?>