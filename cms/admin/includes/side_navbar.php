 <div class="collapse navbar-collapse navbar-ex1-collapse" ">
                <ul class="nav navbar-nav side-nav" >
                   <?php  
                  echo "<li class='{$dashboard}'>"?>
                        <a href="index.html" style='color: #42fff8'><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                     <?php  
                   echo "<li class='{$Applicants}'>"?>
                    <a href="add_applicant.php" style='color: #42fff8'><i class="fa fa-user"></i> Applicants</a>
                    </li>
                       <!--  <a href="javascript:;" data-toggle="collapse" data-target="#demo_post"><i class="fa fa-fw fa-arrows-v"></i> Applicants <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo_post" class="collapse">
                            <li>
                                <a href="applicants.php">View all Applicants</a>
                            </li>
                            <li>
                                <a href="add_applicant.php">Approve Applicant</a>
                            </li>
                        </ul>
                    </li> -->
                   <?php  
                   echo "<li class='{$Modules}'>"?>
                        <a href="category.php" style='color: #42fff8'><i class="fa fa-fw fa-wrench"></i> Modules</a>
                    </li>
                   
                    <?php  
                  
                     
                   echo "<li class='{$users}'>"?>
                        <a href="#" data-toggle="collapse" data-target="#demo_user" style='color: #42fff8'><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo_user" class="collapse">
                            <li>
                                <a href="users.php">View all users</a>
                            </li>
                            <li>
                                <a href="add_user.php">Add user123</a>
                            </li>
                        </ul>
                    </li>
                     <?php  
                   echo "<li class='{$profile}'>"?>
                        <a href="Profile.html" style='color: #42fff8'><i class="fa fa-user"></i> Profile</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
