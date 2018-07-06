<?php include "includes/header.php";?>

<?php include "includes/Top_navbar.php";?>
<?php include "includes/side_navbar_activity.php";?>
<?php$users="active";?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

<?php include "includes/side_navbar.php";?>

<?php include "includes/user_functions.php";?>

<link rel="stylesheet" href="./cms/admin/css/add_post.css">
<link rel="stylesheet" href="./cms/admin/css/addpost.css">
<link rel="stylesheet" href="./cms/admin/css/sb-admin.css">
<script src="./cms/js/jquery.js"></script>
<script src="./cms/js/bootstrap.js"></script>


<!-- content here -->
<style type="text/css">
    .picsize{
        width: 60px;
        height: 60px;
    }

    .ed_del{
        padding-right: 50px;
    }
</style>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php 

                        if(isset($_POST['update_user'])){
                            // update_post();
                              
                                $user_id=$_GET['Edit_id'];
                                $username=$_POST['username'];
                                $user_firstname=$_POST['user_firstname'];
                                $user_lastname=$_POST['user_lastname'];                                        
                                $user_password=$_POST['user_password'];
                                $user_role=$_POST['user_role']; 
                                $date_created=date("Y-m-d");

                                $connection = mysqli_connect('localhost', 'root', '', 'vocational training institute');

                                $queryy="UPDATE `currents_students` SET  username= '$username', user_firstname= '$user_firstname',user_lastname = '$user_lastname',user_password= '$user_password',user_role= '$user_role' WHERE user_id = '$user_id'";



                                mysqli_query($connection, $queryy);


                                if (isset($_FILES["file_source"]["name"]) && $_FILES['file_source']['size'] > 0) {
                                        save_user_image();
                                        $user_image= "images/user_images/".$image; 
                                         $query3="UPDATE admin SET user_image = '$user_image' WHERE user_id = '$user_id'";

                                        connect($query3);

    
                                 }

                                // header("Location: users.php");
                                
                        }



                        if (isset($_GET['delete'])) {
                            $del_user=$_GET['delete'];
                            $query1= "DELETE FROM `current_students` WHERE user_id ={$del_user}";
                            $delete_post=mysqli_query($connection, $query1);


                        }
                        

                        else if (isset($_GET['Edit'])) {
                            $user_id=$_GET['Edit'];
                            $query2 = "SELECT * FROM `current_students` WHERE user_id ={$user_id}";
                            $edit_user=mysqli_query($connection, $query2);
                            
                            edit_user($edit_user);

                             }

                        /*else{
                          show_user_table();
                         }*/
                          ?>

                    </div>
                </div>
                <!-- /.row -->

<?php include "includes/footer.php";?>