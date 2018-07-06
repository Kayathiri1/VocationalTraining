<?php include "includes/header.php";?>

<?php include "includes/Top_navbar.php";?>
<?php include "includes/side_navbar_activity.php";?>
<?php include "includes/functions.php";
$posts="active";?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

<?php include "includes/side_navbar.php";?>

<link rel="stylesheet" type="text/css" href="css/addpost.css">
<!-- content here -->
<style type="text/css">
    .picsize{
        width: 108px;
        height: 36px;
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

                        if(isset($_POST['update_post'])){
                            // update_post();
                              
                                $post_id=$_GET['edit_id'];
                                $post_title=$_POST['post_title'];
                                $post_category=$_POST['category'];
                                $post_content=$_POST['text-area'];
                                $post_tags=$_POST['post_tags'];
                                $post_date =date("Y-m-d");
                                $post_time= date("h:i:sa"); 
                                                       

                                $queryy="UPDATE posts SET  post_title= '$post_title', post_category= '$post_category',post_content = '$post_content',post_time= '$post_time',post_tags= '$post_tags', post_date='$post_date' WHERE post_id = '$post_id'";

                                connect($queryy);

                                if (isset($_FILES["file_source"]["name"]) && $_FILES['file_source']['size'] > 0) {
                                        saveimage();
                                        $post_image= "images/".$image; 
                                         $query3="UPDATE posts SET post_image = '$post_image' WHERE post_id = '$post_id'";

                                        connect($query3);

    
                                 }

                                header("Location: posts.php");
                                
                        }



                        if (isset($_GET['delete'])) {
                            $del_post=$_GET['delete'];
                            $query1= "DELETE FROM posts WHERE post_id ={$del_post}";
                            $delete_post=mysqli_query($connection, $query1);

                            header("Location: posts.php");
                        }
                        

                        else if (isset($_GET['Edit'])) {
                            $post_Edit=$_GET['Edit'];
                            $query2 = "SELECT * FROM posts WHERE post_id ={$post_Edit}";
                            $edit_post=mysqli_query($connection, $query2);
                            
                            edit_post($edit_post);

                             }

                        else{
                          show_post_table(); 
                         }
                          ?>

                    </div>
                </div>
                <!-- /.row -->

<?php include "includes/footer.php";?>