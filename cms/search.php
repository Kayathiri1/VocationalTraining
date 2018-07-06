
<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>
<?php

$search=$_POST['search_tag'];
// SELECT `Col`, `Col2` FROM `Table` WHERE `Col3` IN (?, ?, ?, ?, ?);
// # This selects 5 rows
$string = $search;
// $array = explode(" ", $string); // Split string into an array

// $Word1 = $array[0]; 

// $Word2 = $array[1];

// echo $Word1." ".$Word2;
$query="SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
$search_result=mysqli_query($connection,$query)


?>



    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header" style="color: green">
                    Search results
                    
                </h1>

                <?php 
                
                $search_result_count=mysqli_num_rows($search_result);
                if (!$search_result) {
               echo mysqli_error($connection);
                }
                
                elseif ($search_result_count == 0){
                    echo "<h1><small>Sorry, No results found!</small></h1>";
                }
                else{
                    while ($row=mysqli_fetch_assoc($search_result)) {
                    $post_title=$row['post_title'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_content=$row['post_content'];
                    $post_tags=$row['post_tags'];
                    $post_time=$row['post_time'];

                
                    echo "<h2><a href='#''>$post_title</a></h2>";
                    echo "<p class='lead'>by <a href='index.php'>Start Bootstrap</a></p>";
                    echo "<p><span class='glyphicon glyphicon-time'></span> Posted on $post_date at $post_time </p><hr>";
                    echo "<img class='img-responsive' src=$post_image alt=''><hr>";
                    echo " <p>$post_content</p>";
                    echo "<a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";
                }

                
                echo "<ul class='pager'><li class='previous'><a href='#'>&larr; Older</a></li><li class='next'><a href='#'>Newer &rarr;</a></li></ul>";
                
                 }
                
                ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";?>
        </div>
        <!-- /.row -->

       
        <!-- Footer -->
       <?php include "includes/footer.php";?>


 