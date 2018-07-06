<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$connect = mysqli_connect("localhost", "root", "", "vocational training institute");

$result = $connection->query("SELECT uname,approval FROM leave_table");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)){
    if($outp != "") {$outp .=",";}
    $outp .= '{"Uname":"' .$rs["uname"] . '",';
    $outp .= '"Approval":"' .$rs["approval"] . '"}';
}
$outp = '{"records":['.$outp.']}';
$connect->close();
 echo($outp);

?>