<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if(!isset($_POST)) die();

session_start();

$response = [];

$con = mysqli_connect('localhost', 'root', '', 'vocational training institute');

$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$md5pass = mdm5($password);
$table = mysqli_real_escape_string($con, $_POST['type']);

if($table=="Student"){
    $query = "SELECT * FROM `current_students` WHERE username='$username' AND user_password='$md5pass'";
}
else if($table=="Admin"){
    $query = "SELECT * FROM `admin` WHERE username='$username' AND password='$md5pass'";
}
else if($table=="Registrar"){
    $query = "SELECT * FROM `registrar` WHERE registrar_id='$username' AND password='$md5pass'";
}
else if($table=="Lecturer"){
    $query = "SELECT * FROM `lectures` WHERE Lecture_id='$username' AND password='$md5pass'";
}


$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0) {
    $response['status'] = 'loggedin';
    $response['user'] = $username;
    $response['useruniqueid'] = md5(uniqid());
    $_SESSION['useruniqueid'] = $response['useruniqueid'];
}else{
    $response['status'] = 'error';
}


echo json_encode($response);
