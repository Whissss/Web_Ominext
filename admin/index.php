<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="?hanhdong=them">Thêm</a>
        <table cellpadding="10" style="background: #ccc">
            <tr><td>Tên sản phẩm</td><td>Mô tả</td><td>Sửa/Xóa</td></tr>
            <?php foreach($sps as $sp) { ?>
            <tr><td><?php echo $sp['tensp'] ?>
            </td><td><?php echo $sp['mota'] ?>
            </td><td><a href="index.php?hanhdong=sua&id=<?php echo $sp['id'] ?>">Sửa</a>
            /<a href="index.php?hanhdong=xoa&id=<?php echo $sp['id'] ?>">Xóa</a></td></tr>
            <?php } ?>    
        </table>
    </body>
</html>