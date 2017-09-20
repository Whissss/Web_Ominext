<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
        
    </head>

<script type="text/javascript">
    function  readURL(input,thumbimage) {
    if  (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
    var  reader = new FileReader();
    reader.onload = function (e) {
    $("#thumbimage").attr('src', e.target.result);
       }
       reader.readAsDataURL(input.files[0]);
       }
    else  { // Sử dụng cho IE
      $("#thumbimage").attr('src', input.value);
  
    }
    $("#thumbimage").show();
    $('.filename').text($("#uploadfile").val());
    $('.Choicefile').css('background', '#C4C4C4');
    $('.Choicefile').css('cursor', 'default');
    $(".removeimg").show();
    $(".Choicefile").unbind('click'); //Xóa sự kiện  click trên nút .Choicefile
          
    }
    $(document).ready(function () {
    $(".Choicefile").bind('click', function  () { //Chọn file khi .Choicefile Click
    $("#uploadfile").click();
               
    });
    $(".removeimg").click(function () {//Xóa hình  ảnh đang xem
    $("#thumbimage").attr('src', '').hide();
    $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
    $(".removeimg").hide();
    $(".Choicefile").bind('click', function  () {//Tạo lại sự kiện click để chọn file
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

    <body>
        <form action="" method="POST">
            <div id="myfileupload" style="text-align: center;">
                <input type="file" id="uploadfile" name="ImageUpload" onchange="readURL(this);" />
            </div>
            <div id="thumbbox">
                <img height="100" width="100" alt="Thumb image" id="thumbimage" style="display: none" />
                <a class="removeimg" href="javascript:" ></a></div>
            <div id="boxchoice">
                <p style="clear:both"></p>
            </div>
            <input type="submit" value="Chọn">
        </form>
</body>
</html>