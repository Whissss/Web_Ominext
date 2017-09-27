<?php
    include 'View/connect.php' ;
	if(isset($_REQUEST['id']))
    {  
        $id_friend    = $_REQUEST['id'];
        $a     = $_SESSION['email'];
        $sql   = "SELECT id_user FROM user WHERE email = '$a'";
        $row     = $conn->query($sql);
        foreach ($row as $r1){
        $id_user = $r1[0];
        }
        $sql1  = "INSERT INTO relationship(id_user,id_friend,status,id_action) VALUES ('$id_user','$id_friend',1,'$id_user')";
        $count = $conn->exec($sql1);
        if($count > 0)
        {      
            
            $thongbao++;     
            echo "add thành công";
        }
}
?>