<?php include "../includes/db.php";?>

<?php


function connect($query){
	global $connection;
	$result=mysqli_query($connection, $query);

	if (!$result) {
		echo mysqli_error($connection);
	}
}

function show_cat_table(){
	global $connection;
	$cat_query="SELECT * FROM navcategory";
	$cat_rows=mysqli_query($connection,$cat_query);

	if (!$cat_rows) {
		echo "erroe!<br>";
	}

	echo "<table class='table table-bordered'>
                                <thead>
                                    <tr>                                        
                                        <th class='cat_id'>category ID</th>
                                        <th>category name</th>
                                    </tr>
                                </thead>

                                <tbody>";

                                while ($row=mysqli_fetch_assoc($cat_rows)) {
                                	
                                	echo "<tr>
                                			<td class='cat_id'>{$row['cat_id']}</td>
                                			<div class='row'><td><div class='col-lg-8 col-xs-5'>{$row['cat_title']}</div><div class='col-lg-2 col-xs-3'><a  href='category.php?delete={$row['cat_id']}'>Delete</a></div><div class='col-lg-2 col-xs-2'><a href='category.php?edit={$row['cat_id']}'>Edit</a></div></td><div>
                                			
                                		 </tr>";
                                }
                                    
                                    
                                echo "</tbody>
                            </table>";
}

function add_category($cat_title){
	global $connection;
	$cat_title=$cat_title;
	$cat_query="INSERT INTO navcategory (cat_title) VALUES ('$cat_title')";
	$cat_rows=mysqli_query($connection,$cat_query);

	if (!$cat_rows) {
		echo "<h1>error occured when trying to add a category!!<br></h1>";
		echo mysqli_error($connection);
	}

	else{
		echo "category <span style='color: green'>'{$cat_title}'</span> was added successfully!<br><br>";

	}


}


function delete_Category($cat_id_to_del){
	global $connection;
	$cat_del_query="DELETE FROM navcategory WHERE cat_id = {$cat_id_to_del}";
	$cat_delete=mysqli_query($connection,$cat_del_query);
    
	if (!$cat_delete) {
		echo "error!<br>".mysqli_error($connection);
	}


}

function edit_Category($cat_id_to_edit,$cat_title){
	global $connection;

	$get_pre_cat_q="SELECT * FROM navcategory WHERE cat_id='$cat_id_to_edit'";
	$get_pre_cat=mysqli_query($connection, $get_pre_cat_q);

	while ($row=mysqli_fetch_assoc($get_pre_cat)) {
		$pre_cat_title=$row['cat_title'];
	}
	echo $pre_cat_title;

	$post_cat_query_q="UPDATE posts SET post_category = '$cat_title' WHERE post_category = '$pre_cat_title'";
	$post_cat_query=mysqli_query($connection, $post_cat_query_q);

	$cat_edit_query="UPDATE navcategory SET cat_title = '$cat_title' WHERE cat_id = $cat_id_to_edit";
	$cat_edit=mysqli_query($connection,$cat_edit_query);
    
	if (!$cat_edit) {
		echo "error in updating!".mysqli_error($connection)."<br>";
	}

}

function get_cat_name($cat_id){
	global $connection;
	$cat_select_query="SELECT * FROM navcategory WHERE cat_id = $cat_id";
	$cat_select=mysqli_query($connection,$cat_select_query);
    
    while ($row=mysqli_fetch_assoc($cat_select)) {
    	$cat_name=$row['cat_title'];
   
    }
    echo $cat_name;
	if (!$cat_select) {
		echo "error!<br>".mysqli_error($connection);
	}
	
}

function cat_edit_form($cat_id_to_edit){
	?>
		<input type="text" class="form-control" name="edited_cat_title" value=<?php get_cat_name($cat_id_to_edit)?> > 
        </div>
        
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="update" value="Update category">
        </div>
    </form><?php
}

function saveimage(){
	$target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["file_source"]["name"]);
    global $image;
    $image= basename($_FILES["file_source"]["name"]);
    $uploadOk = 1;


    // Check if file already exists
    if (file_exists($target_file)) {
        // echo "Sorry, file already exists.";
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

function show_post_table(){
	?>

	<h1 class="page-header">
                            Posts
                            <small>admin</small>
                        </h1>
	<table class="table table-bordered table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Content</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Tags</th>

                            </thead>
                            <tbody>

                                <?php
                                	global $connection;
                                    $query="SELECT * FROM posts";
                                    $show_all_posts=mysqli_query($connection, $query);

                                    if(!$show_all_posts){
                                        echo "error".mysqli_error($connection);
                                    }
                                    while ($row=mysqli_fetch_assoc($show_all_posts)) {
                                        $post_id=$row['post_id'];
                                        $post_title=$row['post_title'];
                                        $post_category=$row['post_category'];
                                        $post_date=$row['post_date'];
                                        $post_image=$row['post_image'];
                                        $post_time=$row['post_time'];
                                        $post_comments=$row['post_comments'];
                                        $post_tags=$row['post_tags'];
                                        $post_content=$row['post_content'];

                                        
                                        if(!filter_var($post_image, FILTER_VALIDATE_URL)){
                                        		$post_image= "../".$post_image;
                                        }
   													 

                                        echo " <tr>
                                                    <td>$post_id</td>
                                                    <td>$post_title</td>
                                                    <td>$post_category</td>
                                                    <td><img class=picsize src='{$post_image}'></td>
                                                    <td>$post_content</td>
                                                    <td>$post_comments</td>
                                                    <td>$post_date</td>
                                                    <td>$post_time</td>
                                                    <td>$post_tags</td>
                                                    <td ><a class='ed_del' href='posts.php?delete={$post_id}'><i class='fa fa-trash'> Delete</i></a></td>
                                                    <td ><a class='ed_del' href='posts.php?Edit={$post_id}'><i class='fa fa-pencil'> Edit</i></a></td>


                                                </tr>";

                                    }
                                ?>
                            </tbody>
                            
                        </table>
                        <?php


}
function edit_post($edit_post){
		global $connection;
      while ($row=mysqli_fetch_assoc($edit_post)) {
                                        $post_id=$row['post_id'];
                                        $post_title=$row['post_title'];
                                        $post_category=$row['post_category'];
                                        $post_date=$row['post_date'];
                                        $post_image=$row['post_image'];
                                        $post_time=$row['post_time'];
                                        $post_comments=$row['post_comments'];
                                        $post_tags=$row['post_tags'];
                                        $post_content=$row['post_content'];
                                    }

                           

                            
                       ?>

                          	<h1 class="page-header">
                          	  Edit post
                           	 </h1>


                             <?php echo "<form action='posts.php?edit_id={$post_id}' method='post' enctype='multipart/form-data'>" ?>
                                
                               <div class="form-group">
                                <label for="post_title">Add Post title</label>
                                 <?php echo "<input type='text' name='post_title' class='form-control title' value='{$post_title}' >"?> </div>  

                                <div class="form-group">
                                    <label for="select category">SelectCategory  :</label>
                                    <select id="select category"  class="form-control sel " name="category" >
                                        <option><?php echo $post_category ?></option>
                                       
                                        <?php

                                        $cat_query= " SELECT * FROM navcategory";
                                        $select_all_Cat = mysqli_query($connection, $cat_query);

                                        while ($row=mysqli_fetch_assoc($select_all_Cat)) {
                                            $cat_title =$row['cat_title'];
                                           
                                            if($cat_title!= $post_category){
                                            echo "<option>{$cat_title }</option>";
                                            }
                                             
                                        }

                                        ?>
                                    </select> </div>  

                                    <div class="form-group">
                                    <a href="category.php"><input type="button" name="" value="Add New Category" class="btn btn-success"></a>
                                    </div>


                              

                                <p><span class='glyphicon glyphicon-time'></span> Posted on 
                                    <?php 
                                    $today =date("Y-m-d");
                                    $time= date("h:i:sa");
                                    echo "{$today} at {$time}"?> </p>
                                     <dir>
                                       <i class="fa fa-fw fa-wrench"></i> Time will be automatically updated!</dir>
                                       <hr>
                                
                                <!-- <input type="file" name="imgFile" accept="image/*" id="imgFile" src="" class="btn btn-primary" value="">
 -->
                                
                                <div style="position:relative;"><?php $path= '../'.$post_image;
                                         echo "<br><img src='$path' style='width:200px'>" ?>
                                         	
                                         </div>
                                        
                                <div style="position:relative;">

                                        <a class='btn btn-primary' href='javascript:;'>
                                            Choose Image...
                                            <input type="file" accept="image/*" name="file_source" id="file_source"  style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                                        </a>
                                        &nbsp;
                                        <span class='label label-info' id="upload-file-info"> <?php echo $post_image?> </span>
                                </div>

                                <br>
                                <label for="text-area">Add content</label>
                                <br>
                                <textarea  name="text-area" class="conto"><?php echo $post_content ?></textarea>
                                <br>
                                <div class="form-group">
                                <label for="post_tags">Tags</label>
                                 <input type='text' name='post_tags' class='form-control title' value=<?php echo $post_tags ?> ></div>  
                                <input type="submit" name="update_post" class="btn btn-success" style="margin-bottom: 50px" value="Update the post">
                                

                             </form>

<?php }