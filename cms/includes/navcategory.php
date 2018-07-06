<?php include "db.php"; 

$query="INSERT INTO navcategory (cat_title) VALUES ('PHP')";

$add_navcategory=mysqli_query($connection, $query);

if ($add_navcategory) {
	echo "success";
}

