<?php 
	include 'View/connect.php';
	$page_url ="http://localhost/web_sach/test.php";
	$display = 3;
    $num_links = 3;
    $records = $conn->query("SELECT COUNT(*) FROM user");
    $total_rows = $records->rowCount(); 
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