<?php //include "includes/db.php";?>


<?php

function count_approved_applicants(){

    global $connection_d;
    $query = "SELECT * FROM applicants WHERE Approval='approved' ";
    $approved_users=mysqli_query($connection_d,$query); 
    $num_rows = mysqli_num_rows( $approved_users); 
    return $num_rows;
}

function count_unapproved_applicants(){

    global $connection_d;
    $query = "SELECT * FROM applicants WHERE Approval='Unapproved' ";
    $approved_users=mysqli_query($connection_d,$query); 
    $num_rows = mysqli_num_rows( $approved_users); 
    return $num_rows;
}

function show_applicant_table($string){
  
  $approval_type=$string;?>
  <h1 class="page-header">
                            Applicants
                            <small></small>
                        </h1>
  <table class="table table-bordered table-hover">
                            <thead>
                                <th>ID</th>
                                <th>fname</th>                                
                                
                                 <th>maths</th>
                                 <th>science</th>
                                 <th>english</th>
                                 <th>email</th>
                                 <th>Approval</th>
                                 <th></th>
                               
                                <th>Account_created</th>
                                <th>Delete</th>
                                

                            </thead>
                            <tbody>

                                <?php
                                  global $connection_d;
                                    if ( $approval_type=="approved") {
                                        $query="SELECT * FROM applicants WHERE Approval='approved'" ;
                                    }

                                    elseif ( $approval_type=="unapproved") {
                                        $query="SELECT * FROM applicants WHERE Approval='Unapproved'" ;
                                    }

                                    elseif( $approval_type=="all"){
                                        $query="SELECT * FROM applicants";
                                    }
                                    
                                    $show_all_applicants=mysqli_query($connection_d, $query);

                                    if(!$show_all_applicants){
                                        echo "error".mysqli_error($connection);
                                    }
                                    while ($row=mysqli_fetch_assoc($show_all_applicants)) {
                                        $user_id=$row['id'];
                                        $username=$row['fname'];
                                        $maths=$row['maths'];
                                        $science=$row['science'];                                                   
                                        $english=$row['english'];                                     
                                        
                                        $user_email=$row['email'];
                                        $user_approval=$row['Approval'];
                                        $Account_created=$row['account_created'];

                                        // $admin='admin';
                                        //  $Subscriber='subscriber';
                                        if($user_approval=='approved'){
                                            $approval='Unapprove';}
                                        else{
                                            $approval='Approve';}
                                        
                                        echo " <tr>
                                                    <td>$user_id</td>
                                                    <td>$username</td>
                                                    <td>$maths</td>
                                                    <td>$science</td>
                                                    <td>$english</td>
                                                    <td>$user_email</td>
                                                    <td>$user_approval</td>

                                                    <td><a class='ed_del' href='add_applicant.php?$approval={$user_id}'><i class='fa fa-pencil'>$approval</i></a></td>
                                                    <td>$Account_created</td>                       

                                                
                                                    

                                                     <td ><a class='ed_del' href='add_applicant.php?delete={$user_id}'> <i class='fa fa-trash' style='color: #ff4111'> Delete</i></a></td>

                                                </tr>";

                                    }
                                    }