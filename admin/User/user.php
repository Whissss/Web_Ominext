<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chào Mừng Bạn Đến Với Web Trao Đổi Sách Miễn Phí</title>
        <link rel="stylesheet" type="text/css" href="../Bootstrap/css/Style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <?php include'connect.php' ?>
        <script type="text/javascript">
            function xoa(id) {
                if(confirm('Ban co muon xoa khong?')==true)
                {
                    window.location="index.php?page=xoa&id="+id;
                }
            }
        </script>
        <div class="container"> 
     <div class="row"> 
      <h1 class="text-center"><a href="#">Quản lý người dùng</a></h1> 
      <div class="col-md-10 col-md-offset-1"> 
       <div class="panel panel-default panel-table"> 
        <div class="panel-heading"> 
         <div class="row"> 
          <div class="col col-xs-6"> 
           <h3 class="panel-title">Danh sách người dùng</h3> 
          </div> 
          <div class="col col-xs-6 text-right">
          </div> 
         </div> 
        </div> 
        <div class="panel-body"> 
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
            <tbody>
            <?php
                    $sql="SELECT id,name,age,email,phone,gender,address FROM user";
                    $rows=$conn->query($sql);
                    foreach ($rows as $r)
                    {
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
                                ."<a class='btn btn-default '><em class='fa fa-pencil'></em></a> "
                                ."<button class='btn btn-danger' onclick='xoa($r[0])'><em class='fa fa-trash'>"
                                ."</td>"
                                ."</tr>"

                        ;
                    }        
                ?>
          </tr> 
         </tbody></table> 
        </div> 
        <div class="panel-footer"> 
         <div class="row"> 
          <div class="col col-xs-4">Trang 1 của 5 </div> 
          <div class="col col-xs-8"> 
          <!--  <ul class="pagination hidden-xs pull-right"> 
            <li><a href="http://hocwebgiare.com/#">1</a>
            </li> 
            <li><a href="http://hocwebgiare.com/#">2</a>
            </li> 
            <li><a href="http://hocwebgiare.com/#">3</a>
            </li> 
            <li><a href="http://hocwebgiare.com/#">4</a>
            </li> 
            <li><a href="http://hocwebgiare.com/#">5</a>
            </li> 
           </ul> 
           <ul class="pagination visible-xs pull-right"> 
            <li><a href="http://hocwebgiare.com/#">«</a>
            </li> 
            <li><a href="http://hocwebgiare.com/#">»</a>
            </li> 
           </ul> 
          </div> --> 
         </div> 
        </div> 
       </div> 
      </div> 
     </div>
    </div>


    </body>
</html>