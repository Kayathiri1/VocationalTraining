<?php include "includes/header.php";?>

<?php include "includes/Top_navbar.php";?>
<?php include "includes/side_navbar_activity.php";?>
<?php $users="active";?>
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


    
    $username=$_POST['username'];
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];                                        
    $user_password=$_POST['user_password'];
    $md5pass = md5($user_password);
    $user_image= "images/user_images/default.jpg"; 
    $user_role=$_POST['user_role'];  
    $date_created=date("Y-m-d");                                    


    if (isset($_FILES["file_source"]["name"]) && $_FILES['file_source']['size'] > 0) {
        save_user_image();      
        $user_image= "images/user_images/".$image; 
        // $query3="UPDATE users SET user_image = '$user_image' WHERE user_id = '$user_id'";
        }

    $query = " INSERT INTO `current_students` (username, user_firstname, user_lastname, user_password, user_role, user_image, date_created) VALUES ( '$username', '$user_firstname', ' $user_lastname', '$user_password', '$user_role','$user_image' ,'$date_created') ";

    $connection = mysqli_connect('localhost', 'root', '', 'vocational training institute');

    mysqli_query($connection, $query);

    
 

    
}
?>


                        <h1 class="page-header">
                            Create user
                            
                        </h1>

                            <div class="row">
                                <div class="col-lg-12">
                             <form action="add_user.php" method="post" enctype="multipart/form-data">
                                
                               <div class="form-group">
                                <label for="user_firstname">Firstname</label>
                                 <input type='text' name='user_firstname' class='form-control title' value='' > </div>

                                 <div class="form-group">
                                <label for="user_lastname">Lastname</label>
                                 <input type='text' name='user_lastname' class='form-control title' value='' > </div>   
                                 <div class="form-group">
                                <label for="username">User name</label>
                                 <input type='text' name='username' class='form-control title' value='' > </div>                                 
                              
                                
                                <div style="position:relative;">
                                        <a class='btn btn-primary' href='javascript:;'>
                                            Choose profile picture...
                                            <input type="file" accept="image/*" name="file_source" id="file_source"  style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                                        </a>
                                        &nbsp;
                                        <span class='label label-info' id="upload-file-info"></span>
                                </div>

                             
                             <br>
                                <div class="form-group">
                                <label for="user_password">Password</label>
                                 <input type='password' name='user_password' class='form-control title' value='' ></div> 

                                  <div class="form-group">
                                <label for="user_role">Role</label>
                                <select id="select category"  class="form-control sel " name="user_role">
                                        <option>admin</option>
                                        <option>Subscriber</option>
                                 </select>
                                 </div> 
                                
                              <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-success" style="margin-bottom: 50px" value="Create the user"></div>
                                

                             </form>

                         </div>
                     </div>
                    </div>
                </div>
                <!-- /.row -->

<?php include "includes/footer.php";?>