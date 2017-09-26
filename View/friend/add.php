<?php
    include 'View/connect.php' ;

	if(isset($_REQUEST['id']))
    {  
        $a     = $_SESSION['email'];
        $ma    = $_REQUEST['id'];
        $sql   = "SELECT email FROM user WHERE id_user = '$ma'";
        $row     = $conn->query($sql);
        foreach ($row as $r1)
            $mail = $r1[0];
        $sql1  = "INSERT INTO friend(email,email_friend,status) VALUES ('$a','$mail',1)";
        $sql2  = "INSERT INTO friend(email,email_friend,status) VALUES ('$mail','$a',1)";
        $count = $conn->exec($sql1);
        $count1= $conn->exec($slq2);
        if($count > 0 && $count1 > 0)
        {      
            $thongbao++;     
            echo "add thành công";
        }
}
?>