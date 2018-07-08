<?php

$dbb['dbb_host']="localhost";
$dbb['dbb_user']="root";
$dbb['dbb_pass']="";
$dbb['dbb_name']="vocational training institute";

foreach ($dbb as $key => $value) {
    define(strtoupper($key), $value);
}

$connection_d=mysqli_connect(DBB_HOST,DBB_USER,DBB_PASS,DBB_NAME);


// if($connection){
// 	echo "we are connected!";
// }
?>