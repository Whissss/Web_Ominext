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
<script type="text/javascript">
    function hien(id)
    {
        <?php
            
            ?>   
    }
</script>
<Style>
/* .ten{
    text-align:center;
} */
</Style>         
<?php
    $a = $_SESSION['email'];
	if(isset($_REQUEST['p'])){
        $p=$_REQUEST['p'];
    }else{
        $p=1;
    }
        $start=($p-1)*5;
        $sql="SELECT id,email,img_name FROM icon_user WHERE email != '$a'";
        $sql.="ORDER BY id DESC ";
        $rows=$conn->query($sql); 
        $r=$rows->fetch()[0];
        $sotrang= ceil($r/5);
        $sql.=" limit $start, 5 ";
        $rows=$conn->query($sql);
            foreach ($rows as $r){
            ?>     
                                    <table>
                                    <td>
                                    <a onclick='trang_ca_nhan(<?php echo $r[0] ?>)'>
                                        <img src="icon_user/<?php echo $r[2] ?>" style="height:130px;width:130px;">
                                    </a>
                                    <p>
                                    <?php 
                                        $sql2 = "SELECT name FROM user WHERE email = '$r[1]'";
                                        $count1 = $conn->query($sql2);
                                        foreach($count1 as $name)
                                        {
                                            echo "<a href='&id=$r[0]'>$name[0]</a>";
                                        }
                                    ?>
                                    </p>
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
                                            <a class="btn btn-danger btn-xs" onclick="hien(<?php echo $id_friend ?>)">
                                            <span class="glyphicon glyphicon-comment"></span> Tin Nhắn </a>
                                        </p>
                                        </td>
                                        </table>
                                    
		<?php } ;?>
<div style="clear: both; padding: 30px;">
<?php 
$link="index.php?page=ban_be";
if($sotrang>1)
{
    for($i=1; $i<=$sotrang; $i++)
    {
        echo "<button><a href='$link&p=$i' style='padding: 10px;'> $i</a></button> ";
    }
}
    ?>
<div class="row" hidden>
    <div class="panel panel-chat" >
    <div class="panel-heading" >
        <a href="#" class="chatMinimize" onclick="return false"><span>Özgür Gürbüz</span></a>
        <a href="#" class="chatClose" onclick="return false"><i class="glyphicon glyphicon-remove"></i></a>
        <div class="clearFix"></div>
    </div>
    <div class="panel-body">
        <div class="messageMe">
            <div class="clearFix"></div>
        </div>
        <div class="messageHer">
        </div>

    </div>
    <div class="panel-footer">
        <textarea name="textMessage" cols="0" rows="0"></textarea>
    </div>
</div>
</div>
</div>
</div>
