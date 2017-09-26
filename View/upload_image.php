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
<?php
    ob_start();
    session_start();
    include 'connect.php';
    $a = $_SESSION['email'];
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $target_dir = "icon_user/";
        $target_file = $target_dir . basename($_FILES['ImageUpload']['name']);
        
        $typeFile = pathinfo($_FILES['ImageUpload']['name'], PATHINFO_EXTENSION);
        $typeFileAllow = array('png','jpg','jpeg', 'gif');

        if(!in_array($typeFile, $typeFileAllow)){
            $error = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
        }
        $sizeFile = $_FILES['ImageUpload']['size'];
        if($sizeFile > 5242880){
            $error = "File bạn chọn không được quá 5MB";
        }
        
        if(file_exists($target_file)){
            $error = "File bạn chọn đã tồn tại trên hệ thống";
        }

        if(empty($error))
        {
            $ten_anh  = $_FILES['ImageUpload']['name'];
            $sql1     = "UPDATE icon_user SET img_name = '$ten_anh' WHERE email = '$a'";
            $count    = $conn->exec($sql1);
            if($count>0 ){
                
                echo "Thành Công";
                move_uploaded_file($_FILES['ImageUpload']['tmp_name'], "../icon_user/$ten_anh");
            }elseif($count<=0){
                $sql2   = "INSERT INTO icon_user(email,img_name) VALUES('$a','$ten_anh')";
                move_uploaded_file($_FILES['ImageUpload']['tmp_name'], "../icon_user/$ten_anh");
                $count2 = $conn->exec($sql2);
                if($count2>0)
                {
                    echo "<div style='color:red;'>Thêm Thành Công</div>";    
                }
            }
        }
        else
        {
            echo $error;
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
            <input type="submit" value="Upload">
        </form>
</body>
</html>