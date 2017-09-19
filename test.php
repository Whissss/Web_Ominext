<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="Bootstrap/js/bootstrap.min.js">
        <link rel="stylesheet" type="text/css" href="Bootstrap/js/bootstrap.js">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<style>
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
	<body>
		<?php
		include 'View/connect.php';
		    $sql1="SELECT DISTINCT * FROM user ";     
            $sql1.=" ORDER BY id DESC ";
            if(isset($_REQUEST['p']))
            {
                $p=$_REQUEST['p'];
            } else {
                $p=1;
            }
            $start=($p-1)*5;
            $sql1.=" limit $start, 5 ";
            $rows1=$conn->query($sql1); 
            $r=$rows1->fetch()[0];
            $sotrang= ceil($r/5);?>
         <div style="clear: both; float: right; margin-top: 10px">
   
            <?php
            $link="test.php";
         if($sotrang>1)
         {
             for($i=1; $i<=$sotrang; $i++)
             {
                 echo "<a href='$link&p=$i'><button class='btn'>$i</button></a>";
             }
         }
             ?> 
            </div>

    </body>
</html>