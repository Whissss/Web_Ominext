<?php 
    include 'View/connect.php' ;
	if(isset($_REQUEST['id']))
    {
        $ma    = $_REQUEST['id'];
        $sql   = "SELECT email FROM user WHERE id_user = '$ma'";
        $row   = $conn->query($sql);
        foreach ($row as $r1)
        $mail  = $r1[0];
        $sql1  = "DELETE FROM friend WHERE email_friend = '$mail' OR ";
        $count=$conn->exec($sql1);
         if($count>0)
        {            
            echo "hủy thành công";
        }
    }
?>