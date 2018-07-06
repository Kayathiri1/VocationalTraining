<?php include "db.php";

session_start();


if (isset($_POST['login'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];

    $username=mysqli_real_escape_string($connection, $username);
    $password=mysqli_real_escape_string($connection, $password);

    $query="SELECT * FROM users WHERE username='$username' AND user_password='$password'";
    $validate=mysqli_query($connection, $query);
    $count=mysqli_num_rows($validate);
   
    if ($count==0) {
    	echo "no such a user";
    }
    else{
    	
        while ($row=mysqli_fetch_assoc($validate)) {
                $user_id=$row['user_id'];
                $username=$row['username'];
                $user_firstname=$row['user_firstname'];
                $user_lastname=$row['user_lastname'];                                        
                $user_password=$row['user_password'];
                $user_role=$row['user_role'];
                $user_image=$row['user_image'];         
    }

    $_SESSION['username']=$username;
    $_SESSION['user_firstname']=$user_firstname;
    $_SESSION['user_lastname']=$user_lastname;
    $_SESSION['user_role']=$user_role;

    if($_SESSION['user_role']=='admin'){
        header("Location: ../admin/index.php");
    }

    else if($_SESSION['user_role']=='Subscriber'){
        header("Location: ../index.php");
    }
    }


}