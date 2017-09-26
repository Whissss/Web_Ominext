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
                                                $s     = "SELECT status FROM friend WHERE email_friend = '$r[1]' OR email='$r[1]'"  ;
                                                $count = $conn->query($s);
                                                $r1     = $count->fetch();
                                                $id    = $r1[0];
                                                if($id==1)
                                                { 
                                                    ?>                                        
                                                    <a class='btn btn-success btn-xs' onclick='huy(<?php echo $r[0] ?>)'>
                                                    <span class='glyphicon glyphicon-heart'></span> Đã Gửi Lời Mời Kết Bạn 
                                                    </a>
                                                    
                                            <?php }
                                                elseif ($id==2) {
                                                     ?>                                        
                                                    <a class='btn btn-success btn-xs' onclick='friend(<?php echo $r[0] ?>)'>
                                                    <span class='glyphicon glyphicon-heart'></span> Bạn Bè </a> 
                                                <?php  }
                                                else
                                                {
                                                   ?>                                        
                                                <a class='btn btn-success btn-xs' onclick='add(<?php echo $r[0] ?>)'>
                                                    <span class='glyphicon glyphicon-heart'></span> Kết Bạn </a> 
                                                <?php  }
                                                ?>
                                            <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-comment"></span> Tin Nhắn </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    </td>
		<?php } 

	;?>            
</table>
<div>