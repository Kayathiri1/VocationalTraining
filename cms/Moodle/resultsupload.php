



<?php include "includes/header.php";?>

<?php include "includes/Top_navbar.php";?>
<?php include "includes/side_navbar_activity.php";?>
<?php $Upload_results="active";?>
<?php include "includes/side_navbar.php";?>
<!-- content here -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    

                    <div class="col-lg-12">
                        <h1 class="page-header">                            
                           <!--header-->
                        </h1>
<?php $courseId=$_GET['courseId'];
echo "<b><h1>$courseId</h1></b>";
 $_SESSION['res_id']=$courseId; ?>

<h1><b>Upload results</b></h1><br><hr>

              <div class="well">
               <form style="border:1px solid #ccc" method="POST" >
                
               
                <div class="input-group container">
                     <b>Username of student: </b> <br>
                        <input type="text" name="uname"  class="form-control" required style="width: 500px"><br>
             <br>
                        <b>Marks: </b><br>
                        <input type="number" name="marks" class="form-control" max="100"  min="0" style="width: 500px" required> <br>

                        <br><br>

                        
                        <button type="submit" name="add" class="signupbtn btn btn-primary">ADD</button></br><br><br>
                       <?php 
                       $y=$_GET['msg'];
                      echo "<div class='col-lg-12' style='background-color: rgba(36, 204, 187, .3); padding-top: 2%;border-radius: 10px; width: 500px'><b>$y</div><br><br>";?>
             
            </div>
                
              </form></div>

<?php 

$courseId=$_SESSION['res_id'];

$uname="";
$marks="";
$conn=mysqli_connect('localhost','root','','vocational training institute');


  if (isset($_POST['add'])){
    unset($_SESSION['msg']);
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $marks=mysqli_real_escape_string($conn,$_POST['marks']);

      $query="SELECT * FROM users WHERE username='$uname'";
      $result=mysqli_query($conn,$query);
      if(mysqli_num_rows($result)>0){
        $query1="SELECT * FROM results WHERE username='$uname'";
        $result1=mysqli_query($conn,$query1);
        if(mysqli_num_rows($result1)>0){
          $sql="UPDATE results SET  $courseId='$marks' where username='$uname';";
          mysqli_query($conn, $sql);
          $result=mysqli_query($conn,$sql);
        }else{
          $sql="INSERT INTO results(username, $courseId) VALUES('$uname','$marks')";
          mysqli_query($conn, $sql);
          $msg="You have to enter valid username";
          header("Location: resultsupload.php?courseId=&courseId&msg=$msg");  
        }
        
      }else{
        $msg="Username does not exist";
        header("Location: resultsupload.php?courseId=$courseId&msg=$msg");  
      }
      
    
}
  




?>
<?php include "includes/footer.php";?>