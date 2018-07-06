
	<h1 class="page-header">Users<small>admin</small></h1>
	<table class="table table-bordered table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                               
                                <th>Password</th>
                                <th>Role</th>
                                 <th>image</th>
                                <th>Admin</th>
                                <th>Subscriber</th>
                                <th>Delete</th>
                                <th>Edit</th>

                            </thead>
                            <tbody>

                                <?php
                                	$connection = mysqli_connect('localhost', 'root', '', 'vocational training institute');
                                    $query="SELECT * FROM `current_students`";
                                    $show_all_users=mysqli_query($connection, $query);

                                    if(!$show_all_users){
                                        echo "error".mysqli_error($connection);
                                    }
                                    while ($row=mysqli_fetch_assoc($show_all_users)) {
                                        $user_id=$row['user_id'];
                                        $username=$row['username'];
                                        $user_firstname=$row['user_firstname'];
                                        $user_lastname=$row['user_lastname'];                                        
                                        $user_password=$row['user_password'];
                                        $user_role=$row['user_role'];
                                        $user_image=$row['user_image'];
                                        $user_image="../".$user_image;

                                        $admin='admin';
                                         $Subscriber='subscriber';
                                        echo " <tr>
                                                    <td>$user_id</td>
                                                    <td>$username</td>
                                                    <td>$user_firstname</td>
                                                    <td>$user_lastname</td>
                                                     <td> $user_password</td>
                                                    <td> $user_role</td>
                                                    <td><img class=picsize src='{$user_image}'></td>

                                                    <td ><a class='ed_del' href='users.php?Role={$admin}&id={$user_id}'>Admin</a></td>
                                                    <td ><a class='ed_del' href='users.php?Role={$Subscriber}&id={$user_id}'>Subscriber</a></td>
                                                    <td ><a class='ed_del' href='users.php?delete={$user_id}'> <i class='fa fa-trash'> Delete</i></a></td>
                                                    <td ><a class='ed_del' href='users.php?Edit={$user_id}'><i class='fa fa-pencil'> Edit</i></a></td>


                                                </tr>";

                                    }
                                ?>
                            </tbody>
                            
                        </table>
                        <?php



function edit_user($edit_user){


      while ($row=mysqli_fetch_assoc($edit_user)) {
                                        $user_id=$row['user_id'];
                                        $username=$row['username'];
                                        $user_firstname=$row['user_firstname'];
                                        $user_lastname=$row['user_lastname'];                                     
                                        $user_password=$row['user_password'];
                                        $user_role=$row['user_role'];
                                        $user_image=$row['user_image'];
                                        // $user_image="../".$user_image;
                                    }
                                    ?>

                                     <h1 class="page-header">
                            Edit user
                            <small><?php echo $username ?></small>
                        </h1>

                            <div class="row">
                                <div class="col-lg-12">
                             <?php echo "<form action='users.php?Edit_id={$user_id}' method='post' enctype='multipart/form-data'>" ?>
                                
                               <div class="form-group">
                                <label for="user_firstname">Firstname</label>
                                 <input type='text' name='user_firstname' class='form-control title' value=<?php echo $user_firstname?> > </div>

                                 <div class="form-group">
                                <label for="user_lastname">Lastname</label>
                                 <input type='text' name='user_lastname' class='form-control title' value=<?php echo $user_lastname?> > </div>   
                                 <div class="form-group">
                                <label for="username">User name</label>
                                 <input type='text' name='username' class='form-control title' value=<?php echo $username?> > </div>                                 
                              
                                
                                <div style="position:relative;">
                                        <a class='btn btn-primary' href='javascript:;'>
                                            Choose profile picture...
                                            <input type="file" accept="image/*" name="file_source" id="file_source"  style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                                        </a>
                                        &nbsp;
                                        <span class='label label-info' id="upload-file-info"><?php echo '../'.$user_image?></span>
                                </div>

                             
                             <br>
                                <div class="form-group">
                                <label for="user_password">Password</label>
                                 <input type='password' name='user_password' class='form-control title' value=<?php echo $user_password?> ></div> 

                                  <div class="form-group">
                                <label for="user_role">Role</label>
                                <select id="select category"  class="form-control sel " name="user_role">
                                    <option><?php echo $user_role?></option>
                                       <?php 
                                       $roles=array('admin','subscriber');
                                       foreach ($roles as $role) {
                                          if($role!=$user_role){
                                            echo "<option>$role</option>";
                                          }
                                        }

                                       ?>
                                       
                                 </select>
                                 </div> 
                                
                              <div class="form-group">
                                <input type="submit" name="update_user" class="btn btn-success" style="margin-bottom: 50px" value="Update the user"></div>
                                

                             </form>

                            
<?php }