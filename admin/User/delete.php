<?php include'connect.php' ?>
<?php
    if(isset($_REQUEST['id']))
    {
        $ma=$_REQUEST['id'];
        var_dump($ma);
        $sql1="DELETE FROM user WHERE id=$ma";
         $count=$conn->exec($sql1);
         if($count>0)
        {
            echo "Hello";
            
            header('location:../index.php');
        }
    }
?>

