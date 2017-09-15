<!DOCTYPE html>
<html>
<head>
	<title>Hello</title>
</head>
<body>
<script type="text/javascript">
	function sosanh()
	{
		var x = document.getElementById("pass").value;
		var y = document.getElementById("pass_confirm").value;
		alert(x+y);
	}
</script>
	<form action="#" method="POST">
        <input type="password" name="p1" id="pass">
        <input type="password" name="p2" id="pass_confirm">
        <button type="submit" onclick="sosanh()">Oke</button>		
	</form>
</body>
</html>