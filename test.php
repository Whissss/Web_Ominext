<style type="text/css">
	.content
{
	margin-top: 60px;
}
h2{
	color:#FB3126;
}
tbody tr td{
	text-align:center;
}
thead th{
	background-color: #FB503B;
	padding:10px;
	border-radius:6px;
	color:#FFF;
}
tr:nth-child(even) {
	background-color:#FEBFBC;
}
ul{
	list-style:none;
}
.navigation{
	margin-top:50px;
}
.navigation li.single{
	background-color:#FB503B;
	padding: 10px;
	border-radius: 5px;
	color:#FFF;
}
.navigation li {
	display: inline-block;
	padding:10px;
}
.navigation li a{
	color: #FB503B;
	text-decoration:none;
}

.navigation li a,.navigation li a:hover,.navigation li.active a {
	background-color: #FFFFFF;
	border-radius: 5px;
	border:1px solid #FB503B;
	cursor: pointer;
	padding: 10px;
}
.navigation li a:hover,.navigation li.active a {
	background-color: #FB503B;
	color:#FFFFFF;
}
</style>
<div class="content">
	<?php include 'paga.php' ?>
    <center><h2>Danh sách món ăn</h2></center>
        <table width="50%" align="center" cellpadding="5" cellspacing="0">
              <thead>
                  <tr>
                     <th>Mã Món Ăn</th>
                     <th>Tên Món Ăn</th>
                     <th>Giá</th>
                  </tr>
              </thead>
              <tbody>
              <?php
                  $results = "SELECT * FROM user ORDER BY id ASC LIMIT $position, $display";
                  foreach($conn->query($results) as $row)
                  {
                      echo '<tr>';
                      echo '<td align="center" align="middle">'.$row['name'].'</td>';
                      echo '<td align="center" valign="middle">'.$row['age'].'</td>';
                      echo '<td align="center" valign="middle">'.$row['address'].'</td>';
                      echo '</tr>';
                  }
                  ?>
              </tbody>
       </table>
<div class="navigation" align="center">
    <ul>
    <?php
         if(isset($total_pages))
         {
         if($total_pages > 1)
         {
          echo "<li class='single'>Page '.$curr_page. ' of '.$total_pages.'</li>";
               if($curr_page > $num_links)
               {
               	echo "<li><a href=''.$page_url.'?page=1'>First</a></li>";
               }
               // nếu trang hiện tại > 1
               if($curr_page > 1)
               {
                echo "<li><a href=''.$page_url.'?page='.($curr_page-1).''>Previous</a> </li>";
               }
               for($pages = $start ; $pages <= $end ;$pages++)
              {
                  if($pages == $curr_page)
                  {
                      echo "<li class='active'><a href=''.$page_url.'?page='.$pages.''>'.$pages.'</a></li>";
                  }
                  else
                  {
                  echo "<li><a href=''.$page_url.'?page='.$pages.''>'.$pages.'</a></li>"; 
                  }
              }
              // nếu trang hiện tại < tổng số trang           
             if($curr_page < $total_pages )
             {
             	echo "<li><a href=''.$page_url.'?page='.($curr_page+1).''>Next</a></li>";
             }
             // nếu trang hiện tại + số link muốn hiển thị (ở đây là + với số link bên phải) > tổng số trang
            if(($curr_page + $num_links) <$total_pages )
            {
            	echo "<li><a href=''.$page_url.'?page='.$total_pages.''>Last</a> </li>";
            }  
         }
       }
   ?>
   </ul></div></div>
