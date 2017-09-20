<?php 
	  include 'View/connect.php';
?>
<?php 
    $sql = "SELECT img_name FROM icon_user" ;
    $row = $conn->query($sql);
    foreach ($row as $r1)
    {
        echo"<img src='icon_user/$r1[0]' width='100px'>";
    }
?>