 <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    
                    <form action="index.php" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search_tag">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="search">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                </form>
                    <!-- /.input-group -->
                </div>

                <div class="well">
                    <h4>Login</h4>
                    
                    <form action="includes/login.php" method="post">
                    <div class="input-group">
                        <input type="username" class="form-control" name="username" placeholder="username"></div>
                        <br>
                         <div class="input-group "><input type="password" class="form-control" name="password" placeholder="password">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" name="login">
                                Login
                        </button>
                        </span>
                    </div>
                </form>
                    <!-- /.input-group -->
                </div>
        


                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled">
                                <?php
                            $cat_query="SELECT * FROM navcategory";
                            $select_all_categories=mysqli_query($connection, $cat_query);

                            $cat_count=mysqli_num_rows($select_all_categories);
                            $count=0;
                            $cat_array=array();
                            while ($row=mysqli_fetch_assoc($select_all_categories) ) {
                                $cat_title=$row['cat_title'];
                                
                                if ($count<$cat_count/2) {
                                   echo "<li><a href='index.php?category={$cat_title}'>$cat_title</a>
                                            </li>";
                                }

                                else{
                                    $cat_array[$count-$cat_count/2]=$cat_title;
                                }
                                $count++;
                            }
                ?>  
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-sm-6">
                            <ul class="list-unstyled">
                                <?php
                                foreach($cat_array as $cat){
                                     echo "<li><a href='index.php?category={$cat}'>$cat</a>
                                            </li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>
