<?php include "includes/header.php";?>

<?php include "includes/Top_navbar.php";?>
<?php include "includes/side_navbar_activity.php";?>
<?php include "includes/user_functions.php"; 

$users="active";?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

<?php include "includes/side_navbar.php";?>

<link rel="stylesheet" type="text/css" href="css/addpost.css">
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
                          
                        }



                        if (isset($_GET['delete'])) {
                            $del_user=$_GET['delete'];
                            $query1= "DELETE FROM users WHERE user_id ={$del_user}";
                            $delete_post=mysqli_query($connection, $query1);

                            header("Location: users.php");
                        }
                        

                        else if (isset($_GET['Edit'])) {
                            $user_id=$_GET['Edit'];
                            $query2 = "SELECT * FROM users WHERE user_id ={$user_id}";
                            $edit_user=mysqli_query($connection, $query2);
                            
                            edit_user($edit_user);

                             }

                        else{
                          show_user_table(); 
                         }
                          ?>

                    </div>
                </div>
                <!-- /.row -->

<?php include "includes/footer.php";?>