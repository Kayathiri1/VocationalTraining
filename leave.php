<?php
$connect = mysqli_connect("localhost", "root", "", "vocational training institute");
$data=json_decode(file_get_contents("php://input"));
if(count($data) > 0)
{
    $uname = mysqli_real_escape_string($connect, $data->uname);
    $type = mysqli_real_escape_string($connect, $data->type);

    $num_day = mysqli_real_escape_string($connect, $data->num_day);
    $from_date = mysqli_real_escape_string($connect, $data->from_date);
    $to_date = mysqli_real_escape_string($connect, $data->to_date);
    $comment = mysqli_real_escape_string($connect, $data->comment);

    $query = "INSERT INTO leave_table(uname, type, num_day, from_date, to_date, comment) VALUES ('$uname' , '$type', '$num_day', '$from_date', '$to_date', '$comment' )";

    if(mysqli_query($connect, $query))
    {
        echo "DATA INSERTED...";
    }
    else
    {
        echo 'ERROR';
    }
}


?>