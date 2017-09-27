<script type="text/javascript">
        function add(id) {
                window.location="?page=add&id="+id;
        }
</script>
<script type="text/javascript">
        function huy(id) {
                window.location="?page=huy&id="+id;
        }
</script> 
<script type="text/javascript">
        function friend(id) {
                window.location="?page=friend&id="+id;
        }
</script> 

<div>
<table>               
<?php

    $a = $_SESSION['email'];
    $sql   = "SELECT id_user FROM user WHERE email = '$a'";
    $row     = $conn->query($sql);
    foreach ($row as $r1)
    $id_user = $r1[0];
	if(isset($_REQUEST['q'])){
        $p=$_REQUEST['q'];
    }else{
        $p=1;
    }
        $start=($p-1)*5;
        $sql1="SELECT * FROM relationship
        WHERE (id_user = '$id_user' OR id_friend = '$id_user')
        AND status = 1
        AND id_action != '$id_user'";
        $rows=$conn->query($sql1); 
        $r=$rows->fetch()[0];
        $sotrang= ceil($r/5);
        $sql1.=" limit $start, 5 ";
        $rows=$conn->query($sql1);
        foreach($rows as $r)
            {
                $id = $r[0];
             ?>
                    <td>
                            <div class="well well-sm">
                                <div class="information_user">
                                    <a class="thumbnail pull-left" href="#">
                                    <?php
                                        $sql1 = "SELECT email,name FROM user WHERE id_user = '$id'";
                                        $rows1=$conn->query($sql1);
                                        foreach($rows1 as $r)
                                            $email = $r[0];
                                        $sql="SELECT img_name FROM icon_user WHERE email = '$email'";
                                        $row1=$conn->query($sql);
                                        foreach ($row1 as $r2)
                                            echo"<img src='icon_user/$r2[0]' class='media-object' alt='Image_user' style='height: 214px;width: 245px;'>";
                                        ?>
                                       
                                    </a><?php echo $r[1] ?>
                                    <div class="media-body">
                                        <h4 class='media-heading'></h4>
                                    <a class='btn btn-success btn-xs' onclick='xacnhan(<?php echo $r[0] ?>)'>
                                    <span class='glyphicon glyphicon-heart'></span>Xác Nhận</a>
                                    </div>
                                </div>
                            </div>
                    </td>
        <?php } 
	;?>            
</table>
<div>
