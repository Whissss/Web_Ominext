<?php 
    include 'View/connect.php' ;
	if(isset($_REQUEST['id']))
    {
        $ma=$_REQUEST['id'];
        $sql1="UPDATE friend SET status = '' WHERE id_user = '$ma'";
        $count=$conn->exec($sql1);
         if($count>0)
        {            
            echo "thành công";
        }
    }
?>