<script type="text/javascript">
    $(document).ready(function(){
        $('.timkiem').keyup(function(){
            var search = $('.timkiem').val() ;
            $.post('User/ajax.php',{data:search}, function(data)
            {
                $('.danhsach').html(data);
            })
        })
        })
</script>
<script type="text/javascript">
        function xoa(id) {
            if(confirm('Ban co muon xoa khong?')==true){
                window.location="User/delete.php?page=xoa&id="+id;
            }
            }

</script>        
        <?php include'connect.php'
        	
        ?>
       
    <div class="row"> 
        <div class="col-md-12"> 
            <div class="panel panel-default panel-table"> 
            <div class="panel-heading"> 
                <div  class="row"> 
                    <div class="col col-xs-6"> 
                        <h3 class="panel-title">Danh sách người dùng</h3> 
                    </div> 
                    <div class="col col-xs-6 text-right">
                        <input type="text" class="timkiem">
                    </div> 
                </div> 
            </div> 
        <div class="panel-body col-xs-12 col-sm-12"> 
            <table class="table table-striped table-bordered table-list"> 
            <thead> 
                <tr> 
                    <th class="hidden-md">Mã số</th> 
                    <th>Họ tên</th> 
                    <th>Tuổi</th>
                    <th>Email</th> 
                    <th>Điện thoại</th>
                    <th>Giới Tính</th>
                    <th>Địa Chỉ</th>
                    <th>Tùy Chọn</th>
                </tr> 
            </thead> 
            <tbody class="danhsach">
            <?php
                if(isset($_REQUEST['p'])){
                    $p=$_REQUEST['p'];
                }else{
                    $p=1;
                }
                $start=($p-1)*5;
                $sql="SELECT id,name,age,email,phone,gender,address FROM user";
                $sql.=" ORDER BY id DESC ";
                $rows=$conn->query($sql); 
                $r=$rows->fetch()[0];
                $sotrang= ceil($r/5);
                echo $sotrang;
                $link="user.php";
                $sql.=" limit $start, 5 ";
                $rows=$conn->query($sql);
                    foreach ($rows as $r){
                        echo  
                                "<tr>"
                                    ."<td>$r[0]</td>"
                                    ."<td>$r[1]</td>"
                                    ."<td>$r[2]</td>"
                                    ."<td>$r[3]</td>"
                                    ."<td>$r[4]</td>"
                                    ."<td>$r[5]</td>"
                                    ."<td>$r[6]</td>"
                                    ."<td align='center'>"
                                    ."<a class='btn btn-info' data-toggle='modal' data-target='#myModal' onclick='message($r[0])'><em class='fa fa-pencil'></em></a> "
                                    ."<button class='btn btn-danger' onclick='xoa($r[0])'><em class='fa fa-trash'>"
                                    ."</td>"
                                ."</tr>"

                        ;
                    }        
                ?>
            </tbody>
            </table> 
        </div>
    <div class="panel-footer"> 
            <div class="row">
                <div class="col-md-4 col-xs-4">Trang <?php echo $p ; ?> của 5 </div>

                <div class="col-md-8 col-xs-8">
                <ul class="pagination">
                <?php
                $link="?page=user";
                    if($sotrang>1){
                        for($i=1; $i<=$sotrang; $i++){
                        echo "<li><a href='$link&p=$i'>$i</a></li>";
                    }
                    }
                    ?>
                </ul>
                </div> 
            </div> 
        </div> 
    </div> 
    </div>
</div>
