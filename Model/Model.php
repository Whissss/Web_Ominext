<?php
function them($ten,$mk,$email,$ngay_sinh,$dien_thoai,$gioi_tinh,$dia_chi){
    global $db;
    $caulenh = "INSERT INTO user(tensp, mota) VALUES('$tensp', '$mota')";
    $thuchien = $db->exec($caulenh);
}

function sua($id, $tensp, $mota){
    global $db;
    $caulenh = "UPDATE sanpham SET tensp = '$tensp', mota = '$mota' WHERE id = '$id'";
    $thuchien = $db->exec($caulenh);
}

function xoa($id){
    global $db;
    $caulenh = "DELETE FROM sanpham WHERE id = $id";
    $thuchien = $db->exec($caulenh);
}

function redirect($url) {
    session_write_close();
    header("Location: " . $url);
    exit;
}
?>

