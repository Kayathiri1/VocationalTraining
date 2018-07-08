   <?php 

   $username=$_SESSION['username'];//to display the username at right corner of the top navbar
   //$username="";
   ?>

   <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><font face="arial" size="4" color="white">E-Tokk Moodle </font></a>
                
            </div>

           <!--  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> -->
                <ul class="nav navbar-nav">

                    
                </ul>
                
           <!--  </div> -->

            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="../../index.html" style='color: #42fff8'><i class="fa fa-home"></i> Home </a></li>
                
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style='color: #42fff8'><i class="fa fa-user"></i> <?php echo $username?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>