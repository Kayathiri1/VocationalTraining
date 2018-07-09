<?php 
session_start();
$courseId=$_SESSION['res_id'];

echo $courseId;
$uname="";
$marks="";
$conn=mysqli_connect('localhost','root','','vocational training institute');
$uname=mysqli_real_escape_string($conn,$_POST['uname']);
$marks=mysqli_real_escape_string($conn,$_POST['marks']);


  if (isset($_POST['add'])){
  		$query="SELECT * FROM users WHERE username='$uname'";
  		$result=mysqli_query($db,$query);
    	if(mysqli_num_rows($result)>0){
    		$sql="INSERT INTO results(username, $courseId) VALUES('$uname','$marks')";
			mysqli_query($conn, $sql);
			header("Location: ../resultsupload.php?courseId=&courseId");
		}else{
			echo "<div class='col-lg-12' style='background-color: rgba(36, 204, 187, .3); padding-top: 2%;border-radius: 10px; width: 500px'><b>Sorry, passwords doesn't match!!!</div><br><br>";
		}
    	
  	
}
  




?>