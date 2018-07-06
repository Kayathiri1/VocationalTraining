
<?php

session_start();
 unset($_SESSION['username']);
 unset($_SESSION['user_role']);
 unset($_SESSION['user_firstname']);
 unset($_SESSION['user_lastname']);
 session_destroy();
 header('Location: ../index.php');