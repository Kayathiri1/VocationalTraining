<?php include "includes/header.php";?>
<?php include "includes/functions.php";?>
<?php include "includes/Top_navbar.php";?>


<?php include "includes/side_navbar_activity.php";
$categories="active";
?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<style type="text/css">
    .cat_id{
        width: 30%;
        text-align: center;
    }

    .message{
        color: red;
    }
</style>


<?php include "includes/side_navbar.php";?>

<!-- content here -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Category
                            <small>Edit categories</small>
                        </h1>

                        <div class="col-md-6">
                            <?php

                                if (isset($_POST['Create'])) {
                                    $cat_title=$_POST['cat_title'];
                                    
                                    if ($cat_title=="" || empty($cat_title)) {
                                        echo "<p style='color: red'>This field cannot be empty!</p>";
                                    }

                                    else{
                                    add_category($cat_title);
                                    header("Location: category.php");
                                     }
                                }

                                 if (isset($_GET['delete'])) {
                                    $cat_id_to_del=$_GET['delete'];
                                 
                                    delete_Category($cat_id_to_del);
                                    header("Location: category.php");
                                }



                                ?>
                                <form action="category.php" method="post">
                                
                                <div class="form-group">
                                   <label for="cat_title">New category</label>
                                    <input type="text" class="form-control" name="cat_title" style="color: black; font-size: 15px"> 
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="Create" value="Add category">
                                </div>
                                
                            </form>


                                <?php

                                 if (isset($_GET['edit'])) {
                                    $cat_id_to_edit=$_GET['edit'];
                                    $message= "<br>";

                                    if (isset($_POST['update'])) {
                                        $cat_title=$_POST['edited_cat_title'];
                                        
                                         if ($cat_title=="" || empty($cat_title)) {
                                            $message="<br><p class='message'>This fiels cannot be empty!</p>";
                                         }

                                          else{
                                             edit_Category($cat_id_to_edit,$cat_title);
                                             }
                                        }
                                    ?>
                                   
                                    <form action=<?php echo "category.php?edit={$cat_id_to_edit}"; ?> method="post">
                                        <div class="form-group">
                                           <label for="edited_cat_title">Edit category</label>
                                          <?php echo $message;
                                          cat_edit_form($cat_id_to_edit);  
                                }

                             ?>

                            
                        </div>

                        <div class="col-md-6">
                            <?php show_cat_table();?>
                           
                        </div>                       


                    </div>
                </div>
                <!-- /.row -->

<?php include "includes/footer.php";?>