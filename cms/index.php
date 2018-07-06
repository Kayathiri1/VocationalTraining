<?php include "includes/header.php"; ?>
<?php include "includes/functions.php"; ?>
<?php include "includes/db.php"; ?>
<?php 




if (isset($_POST['search'])) {

            $search=$_POST['search_tag'];
            $post_query="SELECT * FROM posts WHERE post_tags LIKE '%$search%' OR post_title LIKE '%$search%'";
            $head_title="Search results";
            $pub_type="search";
            }
else{
                
            $post_query="SELECT * FROM posts";
            $head_title="Home page";
            $pub_type="post";}

if (isset($_GET['category'])) {
    $cat_title=$_GET['category'];
    
    $post_query="SELECT * FROM posts WHERE post_category='$cat_title'";
    $pub_type="categorized";
}
            
?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    <?php echo $head_title?>
                    
                </h1>

                <?php 
                
                run_query($post_query,$pub_type);

                ?>
                
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";?>
        </div>
        <!-- /.row -->

       
        <!-- Footer -->
       <?php include "includes/footer.php";?>