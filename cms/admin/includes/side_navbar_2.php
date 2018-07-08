 <div class="collapse navbar-collapse navbar-ex1-collapse" ">
                <ul class="nav navbar-nav side-nav" >
                   <?php  
                  echo "<li class='{$dashboard}'>"?>
                        <a href="index.html" style='color: #42fff8'><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                     <?php  
                   echo "<li class='{$Applicants}'>"?>
                    <a href="cms/admin/add_applicant.php" style='color: #42fff8'><i class="fa fa-user"></i> Applicants</a>
                    </li>
                    
                   <?php  
                   echo "<li class='{$Modules}'>"?>
                        <a href="category.php" style='color: #42fff8'><i class="fa fa-fw fa-wrench"></i> Modules</a>
                    </li>
                   
                    <?php  
                  
                     
                   //echo "<li class='{$users}'>"?>
                     <!--   <a href="#" data-toggle="collapse" data-target="#demo_user" style='color: #42fff8'><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo_user" class="collapse">
                            <li>
                                <a href="/cms/admin/users.php">View all bhvivyusers</a>
                            </li>
                            <li>
                                <a href="/cms/admin/add_user.php">Add user123</a>
                            </li>
                        </ul>
                    </li>-->

                    <?php echo "<li class='{$users}'>"?>
                    <a href="cms/admin/users.php" style='color: #42fff8'><i class="fa fa-user"></i> Users</a>
                    </li>
                    

                     <?php  
                   echo "<li class='{$profile}'>"?>
                        <a href="Profile.html" style='color: #42fff8'><i class="fa fa-user"></i> Profile</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
