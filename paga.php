<?php 
	  include 'View/connect.php';
	  $page_url ="http://localhost/web_sach/test.php";
    $display = 2;
    $num_links = 2;
    $sql = "SELECT COUNT(*) FROM user";
    $records = $conn->query("SELECT COUNT(*) FROM user");
    $total_rows = $records->rowCount();
    echo $total_rows;
    // for($i = 0 ; $i<$total_rows;$i++)
    // {
    //   echo $i;
    // }
    if(isset($_GET['page']) && is_numeric($_GET['page']))
    {
      $curr_page = $_GET['page'];
    }
    else
    {
        $curr_page = 1;
    }
    $position = (($curr_page - 1)*$display);
    $total_pages = ceil($total_rows / $display);
    if($curr_page > $num_links)
   {
   $start = $curr_page-($num_links-1);
}
else
{
   $start = 1;
}

if(($curr_page + $num_links ) < $total_pages)
{
	$end = $curr_page + $num_links;
}
else
{
	$end = $total_pages;
}
?>