<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form method="post" action="exercise3.5.php">
	<label for="cot">C?t</label>
	<input type="number" id="cot" name="cot" value="<?php echo @$_POST["cot"]; ?>" require />
	<label for="dong">Dòng</label>
	<input type="number" id="dong" name="dong" value="<?php echo @$_POST["dong"]; ?>" require />
	<input type="submit" id="submit" />
</form>
<?php
	$cot=@$_POST["cot"];
	$dong=@$_POST["dong"];
?>
<table width="100px" border="1" cellspacing="0" cellpadding="3">
	<?php 
		for($i=1;$i<=$dong;$i++){
	?>
	<tr>
		<?php 
			for ($j=1;$j<=$cot;$j++){
		?>
		<td>&nbsp;</td>
		<?php } ?>
	</tr>
	<?php } ?>
</table>
</body>
</html>