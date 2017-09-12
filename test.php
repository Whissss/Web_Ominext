<?php
$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
$salt = sprintf("$2y$%02d$", 10) . $salt; //$2y$ là thuật toán BlowFish, 10 là độ dài của key mã hóa.
$password = crypt($password, $salt);
echo $password;
$1 = '$2y$10$1RSc2JVq5Q3ZNmK33DTy9e7jwP.ykknAGvA0pHs6bi52d9eob700S';
$2 = '$2y$10$dVS85487P7D3jopb73hqJ.P3P96RK6Hbgc0cHMN/1dVdFGua9eJWi' ;
if($1.strtr)
?>