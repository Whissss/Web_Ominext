<?php 
    include 'View/connect.php' ;
	if(isset($_REQUEST['id']))
    {
        $id_friend    = $_REQUEST['id'];
        $sql1  = "DELETE FROM relationship WHERE id_friend = '$id_friend'";
        $count=$conn->exec($sql1);
         if($count>0)
        {            
            echo "hủy thành công";
        }
    }
?>