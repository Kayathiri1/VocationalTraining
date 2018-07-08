<?php

$conn = mysqli_connect("localhost", "root", "", "vocational training institute");
$ouput = array();
$query = "SELECT * FROM leave_table";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_array($result))
    {
        $output[] = $row;
    }


    echo json_encode($output);
}

?>