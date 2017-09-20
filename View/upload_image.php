<script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function  readURL(input,thumbimage) {
    if  (input.files && input.files[0]) { 
    var  reader = new FileReader();
    reader.onload = function (e) {
    $("#thumbimage").attr('src', e.target.result);
       }
       reader.readAsDataURL(input.files[0]);
       }
    else  { 
      $("#thumbimage").attr('src', input.value);
  
    }
    $("#thumbimage").show();
    $('.filename').text($("#uploadfile").val());
    $('.Choicefile').css('background', '#C4C4C4');
    $('.Choicefile').css('cursor', 'default');
    $(".removeimg").show();
    $(".Choicefile").unbind('click'); 
          
    }
    $(document).ready(function () {
    $(".Choicefile").bind('click', function  () { 
    $("#uploadfile").click();
               
    });
    $(".removeimg").click(function () {
    $("#thumbimage").attr('src', '').hide();
    $("#myfileupload").html('<input type="file" id="uploadfile" name="ImageUpload"  onchange="readURL(this);" />');
    $(".removeimg").hide();
    $(".Choicefile").bind('click', function  () {
    $("#uploadfile").click();
    });
    $('.Choicefile').css('background','#0877D8');
    $('.Choicefile').css('cursor', 'pointer');
    $(".filename").text("");
    });
    })
</script>
<style type="text/css">
    #uploadfile,.removeimg
    {
        display:none;
    }
    #thumbbox
    {
        position:relative;
        width:100px;
    }
    .removeimg
    {
        background:  url("http://png-3.findicons.com/files/icons/2181/34al_volume_3_2_se/24/001_05.png")
        repeat scroll 0 0 transparent;
        height: 24px;
        position: absolute;
        right: 5px;
        top: 5px;
        width: 24px; 
   }
</style>
<?php
    ob_start();
    session_start();
    include 'connect.php';
    $a = $_SESSION['email'];
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $ten_anh = $_FILES['ImageUpload']['name'];
        $sql     = "UPDATE icon_user SET img_name = '$ten_anh' WHERE email = '$a'";
        $count   = $conn->exec($sql);
        move_uploaded_file($_FILES['ImageUpload']['tmp_name'], "../icon_user/$ten_anh");
        if($count>0)
                {
                    
                }  
        
    }
?>
    <body style="text-align: center;">
        <form action="" method="POST" enctype="multipart/form-data">
            <div id="myfileupload">
                <input type="file" id="uploadfile" name="ImageUpload" onchange="readURL(this);" />
            </div>
            <div id="thumbbox">
                <img height="100px" width="100px" alt="Thumb image" id="thumbimage" style="display: none" />
                <a class="removeimg" href="javascript:" ></a></div>
            <div id="boxchoice">
                <p style="clear:both"></p>
            </div>
            <input type="submit" value="Chọn">
        </form>
</body>
</html>