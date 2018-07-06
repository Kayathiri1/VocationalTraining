<?php include "includes/header.php";?>

<?php include "includes/Top_navbar.php";?>
<?php include "includes/side_navbar_activity.php";
$posts="active";?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

<?php include "includes/side_navbar.php";?>
<?php include "includes/user_functions.php";?>
<?php


?>

<link rel="stylesheet" type="text/css" href="css/addpost.css">
<!-- content here -->
<style type="text/css">
    .picsize{
        width: 108px;
        height: 36px;
    }
</style>


 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">


<?php  
if(isset($_POST['submit'])){
   

    saveimage();

    $post_title=$_POST['post_title'];
    $post_category=$_POST['category'];
    $post_content=$_POST['text-area'];
    $post_tags=$_POST['post_tags'];
    $post_date =date("Y-m-d");
    $post_time= date("h:i:sa"); 
    $post_image="images/".$image;



    $query = " INSERT INTO posts (post_title, post_category, post_date, post_image, post_content, post_time, post_tags ) VALUES ( '$post_title', '$post_category', ' $post_date', '$post_image', '$post_content', '$post_time', '$post_tags') ";

    connect($query);

    header("Location: add_post.php");
    
}
?>


                        <h1 class="page-header">
                            New post
                            <small>admin</small>
                        </h1>

                            <div class="row">
                                <div class="col-lg-12">
                             <form action="add_post.php" method="post" enctype="multipart/form-data">
                                
                               <div class="form-group">
                                <label for="post_title">Add Post title</label>
                                 <input type='text' name='post_title' class='form-control title' value='' > </div>  

                                <div class="form-group">
                                    <label for="select category">SelectCategory  :</label>
                                    <select id="select category"  class="form-control sel " name="category">
                                        <option></option>
                                        <?php

                                        $cat_query= "SELECT * FROM navcategory";
                                        $select_all_Cat = mysqli_query($connection, $cat_query);

                                        while ($row=mysqli_fetch_assoc($select_all_Cat)) {
                                            $cat_title =$row['cat_title'];
                                            echo "<option>{$cat_title }</option>";
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
                                
                                <div style="position:relative;">
                                        <a class='btn btn-primary' href='javascript:;'>
                                            Choose Image...
                                            <input type="file" accept="image/*" name="file_source" id="file_source"  style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                                        </a>
                                        &nbsp;
                                        <span class='label label-info' id="upload-file-info"></span>
                                </div>

                                <br>
                                <label for="text-area">Add content</label>
                                <br>
                                <textarea  name="text-area" class="conto"></textarea>
                                <br>
                                <div class="form-group">
                                <label for="post_tags">Tags</label>
                                 <input type='text' name='post_tags' class='form-control title' value='' ></div>  
                                <input type="submit" name="submit" class="btn btn-success" style="margin-bottom: 50px" value="Publish the post">
                                

                             </form>

                         </div>
                     </div>
                    </div>
                </div>
                <!-- /.row -->

<?php include "includes/footer.php";?>