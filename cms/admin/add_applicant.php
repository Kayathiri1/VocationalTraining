<?php include "includes/header.php";?>

<?php include "includes/Top_navbar.php";?>
<?php include "includes/side_navbar_activity.php";
$Applicants="active";?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

<?php include "includes/side_navbar.php";?>
<?php include "includes/user_functions.php";?>
<?php include "includes/applicant_functions.php"; ?>
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
       
       
       $query2="INSERT INTO students (id,full_name,password,user_img) VALUES ('$id', $full_name', '$password','$img')";
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


if (isset($_GET['Unapprove'])) {
                $appl_id_to_approve=$_GET['Unapprove'];
                $query2="UPDATE applicants SET  Approval='Unapproved' WHERE id = '$appl_id_to_approve'";
                $update=mysqli_query($connection_d,$query2);
                header("Location: add_applicant.php");

}

if (isset($_GET['Approve'])) {
                $appl_id_to_approve=$_GET['Approve'];
                $query2="UPDATE applicants SET  Approval='approved' WHERE id = '$appl_id_to_approve'";
                $update=mysqli_query($connection_d,$query2);  
                header("Location: add_applicant.php");
}

if (isset($_GET['Approve'])) {
                $appl_id_to_approve=$_GET['Approve'];
                $query2="UPDATE applicants SET  Approval='approved' WHERE id = '$appl_id_to_approve'";
                $update=mysqli_query($connection_d,$query2);  
                header("Location: add_applicant.php");
}

if (isset($_GET['delete'])) {
                $appl_id_to_delete=$_GET['delete'];
                $query3="DELETE FROM applicants  WHERE id = '$appl_id_to_delete'";
                $update=mysqli_query($connection_d,$query3);  
                header("Location: add_applicant.php");
}

//header("Location: add_applicant.php");
?>                      
                        <h4 class="page-header">
                            
                           <?php  

                           $count_of_approved=count_approved_applicants();
                           $count_of_unapproved=count_unapproved_applicants();
                           echo "<i class=' fa fa-user-plus'> -</i>Number of approved applicants : {$count_of_approved}<br/>" ; 
                           echo "<br/><i class='fa fa-user-times'> -</i>Number of unapproved applicants : {$count_of_unapproved}"  ?>


                           <form action="add_applicant.php" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                           </br>
                                <input type="submit" name="approved_applicants" class="btn btn-primary btn-lg" style="margin-bottom: 50px" value="Approved Applicants">&nbsp;&nbsp;&nbsp;&nbsp;
                                 <input type="submit" name="unapproved_applicants" class="btn btn-warning btn-lg" style="margin-bottom: 50px" value="Unpproved Applicants">&nbsp;&nbsp;&nbsp;&nbsp;
                                  <input type="submit" name="all_applicants" class="btn btn-success btn-lg" style="margin-bottom: 50px" value="all Applicants">
                            </div>
                                

                             </form>
                            
                        </h4>
                      
<?php
                    if(isset($_POST['approved_applicants'])){
                                            
                         show_applicant_table('approved');}
                    elseif (isset($_POST['unapproved_applicants'])) {
                         show_applicant_table('unapproved');
                    }
                    elseif (isset($_POST['all_applicants'])) {
                         show_applicant_table('all');
                    }
                    else{
                        show_applicant_table('all');
                    }

                         ?>



                     </div>
                    </div>
                </div>
                <!-- /.row -->
<?php 

                                ?>
                            </tbody>
                            
                        </table>
                        <?php




?>
<?php include "includes/footer.php";

?>