<?php
	include 'connect.php';
	$a = $_POST['data'];
	$sql="SELECT id,name,age,email,phone,gender,address FROM user WHERE
	name LIKE '%$a%' || age LIKE '%$a%' || email LIKE '%$a%' || phone LIKE '%$a%' || gender LIKE '%$a%' || address LIKE '%$a%' LIMIT 10";
	$rows = $conn->query($sql);
	foreach ($rows as $r)
                    {
                        echo  
                                "<tr>"

                                ."<td>$r[0]</td>"
                                ."<td>$r[1]</td>"
                                ."<td>$r[2]</td>"
                                ."<td>$r[3]</td>"
                                ."<td>$r[4]</td>"
                                ."<td>$r[5]</td>"
                                ."<td>$r[6]</td>"
                                ."<td align='center'>"
                                ."<a class='btn btn-default '><em class='fa fa-pencil'></em></a> "
                                ."<button class='btn btn-danger' onclick='xoa($r[0])'><em class='fa fa-trash'>"
                                ."</td>"
                                ."</tr>";                       
                    }    
?>