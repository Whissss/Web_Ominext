<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chào Mừng Bạn Đến Với Web Trao Đổi Sách Miễn Phí</title>
        <link rel="stylesheet" type="text/css" href="../Bootstrap/css/Style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.timkiem').keyup(function(){
                var search = $('.timkiem').val() ;
                $.post('ajax.php',{data:search}, function(data)
                {
                    $('.danhsach').html(data);
                })
            })
            })
</script>
<script type="text/javascript">
        function xoa(id) {
            if(confirm('Ban co muon xoa khong?')==true){
                window.location="delete.php?page=xoa&id="+id;
            }
            }
        // function message(id)
        // {
        //     window.location="message_with_user.php?page=message&id="+id;
        // }  
</script>        
    </head>
    <body>
        <?php include'connect.php' ?>
       
        <div class="container"> 
    <div cl ss="row"> 
        <h1 cl ss="text-center"><a href="#">Quản lý người dùng</a></h1> 
        <div c ass="col-md-10 col-md-offset-1"> 
            <div  class="panel panel-default panel-table"> 
            <div class="panel-heading"> 
                <div  class="row"> 
                    <div class="col col-xs-6"> 
                        <h3 class="panel-title">Danh sách người dùng</h3> 
                    </div> 
                    <div class="col col-xs-6 text-right">
                        <input type="text" class="timkiem"> Tìm Kiếm
                    </div> 
                </div> 
            </div> 
        <div class="panel-body col-xs-10 col-sm-10"> 
            <table class="table table-striped table-bordered table-list"> 
            <thead> 
                <tr> 
                    <th class="hidden-xs">Mã số</th> 
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
                $rows=$conn->query($sql); 
                $r=$rows->fetch()[0];
                $sotrang= ceil($r/5);
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
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                </div>
        <div class="modal-body">
            <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
           </div>
      
        </div>
    </div>
    <div class="panel-footer"> 
            <div class="row">
                <div class="col-md-4 col-xs-4">Trang <?php echo $p ; ?> của 5 </div>

                <div class="col-md-8 col-xs-8">
                <ul class="pagination">
                
                <?php
                 if($sotrang>1){
                    for($i=1; $i<=$sotrang; $i++)
                    {
                        echo "<li><a href='$link?p=$i'>$i</a></li>";
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
</div>
</body>
</html>