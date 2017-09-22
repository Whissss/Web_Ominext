<?php include'connect.php' ?>
<?php
    if(isset($_REQUEST['id']))
    {
        $ma=$_REQUEST['id'];
        $sql1="DELETE FROM user WHERE id=$ma";
         $count=$conn->exec($sql1);
         if($count>0)
        {            
            header('location:../index.php?page=user');
        }
    }
?>

