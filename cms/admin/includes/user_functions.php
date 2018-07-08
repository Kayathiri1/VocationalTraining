<?php //include "includes/db.php";?>
<?php include "includes/dbb.php";?>

<?php

$connection=$connection_d;
function connect($query){
    global $connection;
    $result=mysqli_query($connection, $query);

    if (!$result) {
        echo mysqli_error($connection);
    }
}
function save_user_image(){
    $target_dir = "../images/user_images/";
    $target_file = $target_dir . basename($_FILES["file_source"]["name"]);
    global $image;
    $image= basename($_FILES["file_source"]["name"]);
    $uploadOk = 1;


    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["file_source"]["size"] > 500000) {
        echo "your file is too large.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file_source"]["tmp_name"], $target_file)) {
            // echo "The file ". basename( $_FILES["file_source"]["name"]). " has been uploaded.";
        } 
        }
    }


function show_user_table(){
	?>

	<h1 class="page-header">
                            Users
                            <small>admin</small>
                        </h1>
	<table class="table table-bordered table-hover">
                            <thead>
                                <th>Username</th>
                                
                                <th>password</th>
                                
                                 <th>type</th>
                               
                                <th>Delete</th>
                                <th>Edit</th>

                            </thead>
                            <tbody>

                                <?php
                                	global $connection_d;
                                    $query="SELECT * FROM users";
                                    $show_all_users=mysqli_query($connection_d, $query);

                                    if(!$show_all_users){
                                        echo "error".mysqli_error($connection_d);
                                    }
                                    while ($row=mysqli_fetch_assoc($show_all_users)) {
                                       // $user_id=$row['index_no'];
                                        $username=$row['username'];
                                                                         
                                        $user_password=$row['password'];
                                        
                                        $user_type=$row['type'];
                                       // $user_image="../".$user_image;

                                        // $admin='admin';
                                        //  $Subscriber='subscriber';
                                        echo " <tr>
                                                    
                                                    <td>$username</td>
                                                   
                                                     <td> $user_password</td>
                                                     <td> $user_type</td>
                                                   
                                                  
                                                    <td ><a class='ed_del' href='users.php?delete={$username}'> <i class='fa fa-trash'> Delete</i></a></td>
                                                    <td ><a class='ed_del' href='users.php?Edit={$username}'><i class='fa fa-pencil'> Edit</i></a></td>


                                                </tr>";

                                    }
                                ?>
                            </tbody>
                            
                        </table>
                        <?php


}

function edit_user($edit_user){
      global $connection_d;
      $connection=$connection_d;
      while ($row=mysqli_fetch_assoc($edit_user)) {
                                       
                                        $username=$row['username'];
                                                                         
                                        $user_password=$row['password'];
                                      
                                    }
                                    ?>

                                     <h1 class="page-header">
                                     </br>
                            Edit user:
                            <small><?php echo $username ?></small>
                        </h1>

                            
                                <div class="col-lg-12">
                             <?php echo "<form action='users.php?Edit_pass=$username' method='post' enctype='multipart/form-data'>" ?>
                                
                               <div class="form-group">
                                <label for="password">New password</label>
                                 <input type='text' name='user_password' class='form-control title' value=<?php echo $user_password?> > </div>

                              <div class="form-group">
                                <input type="submit" name="update_user" class="btn btn-success" style="margin-bottom: 50px" value="Update the user"></div>
                                

                             </form>

                            
<?php }

function show_applicants_table(){
  ?>

  <h1 class="page-header">
                            Applicants
                            <small></small>
                        </h1>
  <table class="table table-bordered table-hover">
                            <thead>
                                <th>ID</th>
                                <th>fname</th>                                
                                
                                 <th>maths</th>
                                 <th>science</th>
                                 <th>english</th>
                                 <th>email</th>
                                 <th>Approval</th>
                               
                               
                                <th>Account_created</th>
                                <th>Delete</th>
                                <th>Edit</th>

                            </thead>
                            <tbody>

                                <?php
                                  global $connection_d;
                                    $query="SELECT * FROM applicants";
                                    $show_all_applicants=mysqli_query($connection_d, $query);

                                    if(!$show_all_applicants){
                                        echo "error".mysqli_error($connection);
                                    }
                                    while ($row=mysqli_fetch_assoc($show_all_applicants)) {
                                        $user_id=$row['id'];
                                        $username=$row['fname'];
                                        $maths=$row['maths'];
                                        $science=$row['science'];                                                   
                                        $english=$row['english'];                                     
                                        
                                        $user_email=$row['email'];
                                        $user_approval=$row['Approval'];
                                        $Account_created=$row['account_created'];

                                        // $admin='admin';
                                        //  $Subscriber='subscriber';
                                        if($user_approval=='approved'){
                                            $approval='Unapprove';}
                                        else{
                                            $approval='Approve';}
                                        
                                        echo " <tr>
                                                    <td>$user_id</td>
                                                    <td>$username</td>
                                                    <td>$maths</td>
                                                    <td>$science</td>
                                                    <td>$english</td>
                                                    <td>$user_email</td>
                                                    <td>$user_approval</td>
                                                    <td>$Account_created</td>
                                                    
                                                   

                                                   
                                                    <td ><a class='ed_del' href='add_user.php?delete={$user_id}'> <i class='fa fa-trash'> Delete</i></a></td>
                                                    <td><a class='ed_del' href='add_user.php?Approval={$user_id}'><i class='fa fa-pencil'>$approval</i></a></td>

                                                </tr>";

                                    }
                                ?>
                            </tbody>
                            
                        </table>
                        <?php


}
