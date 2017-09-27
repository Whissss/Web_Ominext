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
<script type="text/javascript">
        function xacnhan(id) {
                window.location="?page=xac_nhan&id="+id;
        }
</script> 

<div>
<table>               
<?php
    $a = $_SESSION['email'];
	if(isset($_REQUEST['q'])){
        $p=$_REQUEST['q'];
    }else{
        $p=1;
    }
        $start=($p-1)*5;
        $sql="SELECT id,email,img_name FROM icon_user WHERE email != '$a'";
        $sql.=" ORDER BY id DESC ";
        $rows=$conn->query($sql); 
        $r=$rows->fetch()[0];
        $sotrang= ceil($r/5);
        $sql.=" limit $start, 5 ";
        $rows=$conn->query($sql);
            foreach ($rows as $r){
            ?>
                    <td>
                            <div class="well well-sm">
                                <div class="information_user">
                                    <a class="thumbnail pull-left" href="#">
                                        <img class="media-object" src="icon_user/<?php echo $r[2] ?>" style="height:214px;width:245px;">
                                    </a>
                                    <?php echo $r[1] ?>
                                    <div class="media-body">
                                        <h4 class='media-heading'></h4>
                                            <?php
                                                $sql1 = "SELECT id_user FROM user WHERE email = '$a'";
                                                $row = $conn->query($sql1);
                                                $r1 = $row->fetch();
                                                $id_user = $r1[0];
                                                $sq = "SELECT id_user FROM user WHERE email = '$r[1]'";
                                                $h = $conn->query($sq);
                                                $n = $h->fetch();
                                                $id_friend = $n[0];
                                                $s = "SELECT status FROM relationship WHERE(id_user = '$id_friend' AND id_friend = '$id_user')";
                                                $count = $conn->query($s);
                                                $r2     = $count->fetch();
                                                $id    = $r2[0];
                                                if($id==1)
                                                { 
                                                    ?>                                        
                                                    <a class='btn btn-success btn-xs' onclick='xacnhan(<?php echo $id_friend ?>)'>
                                                    <span class='glyphicon glyphicon-heart'></span> Xác Nhận 
                                                    </a>       
                                            <?php }
                                                ?>
                                                <?php
                                                $s1 = "SELECT status FROM relationship WHERE(id_user = '$id_user' AND id_friend = '$id_friend')";
                                                $count1 = $conn->query($s1);
                                                $r3     = $count1->fetch();
                                                $i    = $r3[0];
                                                if($i==1)
                                                { 
                                                    ?>                                        
                                                    <a class='btn btn-success btn-xs' onclick='huy(<?php echo $id_friend ?>)'>
                                                    <span class='glyphicon glyphicon-heart'></span> Đã Gửi Lời Mời Kết Bạn 
                                                    </a>
                                                <?php }
                                                 elseif($id==2 || $i ==2) {
                                                    ?>                                        
                                                   <a class='btn btn-success btn-xs' onclick='friend(<?php echo $id_friend ?>)'>
                                                   <span class='glyphicon glyphicon-heart'></span> Bạn Bè </a> 
                                               <?php  } 
                                                elseif($id !=1 && $i==0 &&$id !=2) {?>                                        
                                                    <a class='btn btn-success btn-xs' onclick='add(<?php echo $id_friend ?>)'>
                                                        <span class='glyphicon glyphicon-heart'></span> Kết Bạn </a> 
                                                    <?php }

                                                ?>
                                            <a class="btn btn-danger btn-xs"  onclick='message(<?php echo $id_friend ?>)'>
                                            <span class="glyphicon glyphicon-comment"></span> Tin Nhắn </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    </td>
		<?php } ;?>            
</table>
<div>