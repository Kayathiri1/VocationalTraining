<?php include "includes/header.php"; session_start();?>

<?php include "includes/Top_navbar.php";?>
<?php include "includes/side_navbar_activity.php";?>
<?php $My_results="active";?>
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

<h1><b>My results</b></h1><br><hr>

              <div class="well">
               <form style="border:1px solid #ccc" method="POST" >
                
               
                <div class="input-group container">
                     <b>ET001: <?php echo $_SESSION['m1']; ?></b> <br>
                        
             <br>
                        <b>ET002: <?php echo $_SESSION['m2']; ?></b><br><br>
                         <b>ET003: <?php echo $_SESSION['m3']; ?></b> <br>
                        
             <br>
                        <b>ET004: <?php echo $_SESSION['m4']; ?></b><br>
                        
                        

                        <br><br>

                        
                        
             
            </div>
                
              </form></div>




                        
                    </div>

                </div>
<?php 
$username=$_SESSION['username'];
$conn=mysqli_connect('localhost','root','','vocational training institute');
$query="SELECT * FROM results WHERE username='$username'  ";
$result=mysqli_query($conn,$query);
$dataarray=array();
if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $dataarray[]=$row;
        }
    }
foreach($dataarray as $data){
    $m1=$data['ET001'];}
foreach($dataarray as $data){
    $m2=$data['ET002'];}
foreach($dataarray as $data){
    $m3=$data['ET003'];}
foreach($dataarray as $data){
    $m4=$data['ET004'];

}

if(mysqli_num_rows($result)>0){
    $_SESSION['m1']=$m1;
    $_SESSION['m2']=$m2;
    $_SESSION['m3']=$m3;
    $_SESSION['m4']=$m4;
}

?>               

<?php include "includes/footer.php";?>