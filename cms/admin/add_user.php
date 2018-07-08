<?php include "includes/header.php";?>

<?php include "includes/Top_navbar.php";?>
<?php include "includes/side_navbar_activity.php";
$users="active";?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

<?php include "includes/side_navbar.php";?>
<?php include "includes/user_functions.php";?>
<?php
date_default_timezone_set("Asia/Colombo");

?>

<link rel="stylesheet" type="text/css" href="css/addpost.css">
<!-- content here -->

 <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">


<?php  
if(isset($_POST['submit'])){


    $query = "SELECT * FROM applicants WHERE Approval='approved' AND account_created='no'";
    $approved_users=mysqli_query($connection_d,$query);  

    if(!$approved_users){
        echo mysqli_error($connection_d); 
    }  

    while($row=mysqli_fetch_assoc($approved_users)){
        $full_name=$row['fname'];
        $password='E-TOKK/2018';
        $img='images/default.jpg';
        $id=$row['id'];
       
       
       $query2="INSERT INTO students (full_name,password,user_img) VALUES ('$full_name', '$password','$img')";
       $create_user=mysqli_query($connection_d, $query2);  

       $yes='yes';

       if($create_user){
            $query="UPDATE applicants SET  account_created='$yes' WHERE id = '$id'";
            $update=mysqli_query($connection_d,$query);  
       }

    }

    echo "<h3>Accounts created!</h3>";    
 
   // header("Location: users.php");
    
}
?>


                        <h1 class="page-header">
                            Create user
                            
                        </h1>

                            <div class="row">
                                <div class="col-lg-12">
                             <form action="add_user.php" method="post" enctype="multipart/form-data">
                                
                             
                                
                              <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-success btn-md" style="margin-bottom: 50px" value="Create user accounts for Approved Applicants"></div>
                                

                             </form>

                         </div>
<?php
                         show_applicants_table();?>



                     </div>
                    </div>
                </div>
                <!-- /.row -->

<?php include "includes/footer.php";?>