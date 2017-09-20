<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>C</title>

<link rel="stylesheet" type="text/css" href="../Bootstrap/js_chat/jScrollPane/jScrollPane.min.js" />
<link rel="stylesheet" type="text/css" href="../Bootstrap/css_chat/page.css" />
<link rel="stylesheet" type="text/css" href="../Bootstrap/css_chat/chat.css" />

</head>

<body>

<div id="chatContainer">

    <div id="chatTopBar" class="rounded"></div>
    <div id="chatLineHolder"></div>
    
    <div id="chatUsers" class="rounded"></div>
    <div id="chatBottomBar" class="rounded">
        <div class="tip"></div>
        
        <form id="loginForm" method="post" action="">
            <input id="name" name="name" class="rounded" maxlength="16" />
            <input id="email" name="email" class="rounded" />
            <input type="submit" class="blueButton" value="Login" />
        </form>
        
        <form id="submitForm" method="post" action="">
            <input id="chatText" name="chatText" class="rounded" maxlength="255" />
            <input type="submit" class="blueButton" value="Submit" />
        </form>
        
    </div>
    
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="../Bootstrap/js_chat/jScrollPane/jquery.mousewheel.js"></script>
<script src="../Bootstrap/js_chat/jScrollPane/jScrollPane.min.js"></script>
<script src="../Bootstrap/js_chat/script.js"></script>
</body>
</html>
