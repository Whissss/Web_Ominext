<aside class="vertical-menu  col-md-2 col-sm-12">
	<ul class="nav nav-pills nav-stacked">
	    <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>&thinsp;Home</a></li>
	    <li><a href="#"><span class="glyphicon glyphicon-book"></span>&thinsp;Đọc Sách</a></li>
	    <li><a href="#"><span class="glyphicon glyphicon-bookmark"></span>&thinsp;Lưu Trữ</a></li>
	    <li><a href="?page=thong_bao"><span class="glyphicon glyphicon-bell"></span>&thinsp;Thông Báo</a></li>
	    <li><a href="#"><span class="glyphicon glyphicon-folder-open"></span>&thinsp;&thinsp;Up Sách</a></li>
    </ul>
  		<hr>
      		
    <ul class="nav nav-pills nav-stacked ">
	    <li class="active"><a href="#"><span class="glyphicon glyphicon-heart"></span>&thinsp;Góc Trao Đổi</a></li>
	    <?php
	    if($nguoi_dung==true)
	    {
	        echo "<li><a href='?page=ban_be'><span class='glyphicon glyphicon-map-marker'></span>&thinsp;Bạn Bè</a></li>" ;
	    }
	    ?>
	    <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>&thinsp;Trao Đổi Sách</a></li>
	    <li><a href="#"><span class="glyphicon glyphicon-check"></span>&thinsp;Video dạy học</a></li>
	    <li><a href="#"><span class="glyphicon glyphicon-piggy-bank"></span>&thinsp;&thinsp;Ủng Hộ Sách</a></li>
	    <li><a href="#">
	    <span class="glyphicon glyphicon-list-alt"></span>
	    &thinsp;
	    &thinsp;Sự Kiện</a></li>
    </ul>
</aside>