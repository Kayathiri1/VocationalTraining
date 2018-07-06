 <div class="collapse navbar-collapse navbar-ex1-collapse" ">
                <ul class="nav navbar-nav side-nav" >
                   <?php  
                  echo "<li class='{$dashboard}'>"?>
                        <a href=""><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                     <?php  
                   echo "<li class='{$posts}'>"?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo_post"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo_post" class="collapse">
                            <li>
                                <a href="posts.php">View all posts</a>
                            </li>
                            <li>
                                <a href="add_post.php">Add posts</a>
                            </li>
                        </ul>
                    </li>
                   <?php  
                   echo "<li class='{$categories}'>"?>
                        <a href="category.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                   
                    <?php  
                  echo "<li class='{$comments}'>"?>
                        <a href="comments.html"><i class="fa fa-fw fa-file"></i> Comments</a>
                    </li>
                    <?php  
                   echo "<li class='{$users}'>"?>
                        <a href="" data-toggle="collapse" data-target="#demo_user"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo_user" class="collapse">
                            <li>
                                <a href="./cms/admin/users.php">View all users</a>
                            </li>
                            <li>
                                <a href="./cms/admin/add_user.php">Add user</a>
                            </li>
                        </ul>
                    </li>
                     <?php  
                   echo "<li class='{$profile}'>"?>
                        <a href="Profile.html"><i class="fa fa-user"></i> Profile</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
