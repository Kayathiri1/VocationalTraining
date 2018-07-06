<?php 

function run_query($post_query, $pub_type){
	global $connection;
	$connect_post_query=mysqli_query($connection,$post_query);
	$search_result_count=mysqli_num_rows($connect_post_query); 

	if (!$connect_post_query) {
                    echo "error occured!".mysqli_error($connection);
                }               
	               
    else{
                    $myarray = array();
                    while($row2 = mysqli_fetch_assoc($connect_post_query)) {                     
                    $myarray[] = $row2; 
                    
                    }
                    
                    $count=$search_result_count-1;
                    while ($count >= 0) {
                        $row=$myarray[$count];

                        $count--;
                        $post_title=$row['post_title'];
                        $post_date=$row['post_date'];
                        $post_image=$row['post_image'];
                        $post_content=substr($row['post_content'],0,100);
                        $post_tags=$row['post_tags'];
                        $post_time=$row['post_time'];

                    
                        echo "<h2><a href='#''>$post_title</a></h2>";
                        // echo "<p class='lead'>by <a href='index.php'>Start Bootstrap</a></p>";
                        echo "<p><span class='glyphicon glyphicon-time'></span> Posted on $post_date at $post_time </p><hr>";
                        echo "<img class='img-responsive' src=$post_image alt=''><hr>";
                        echo " <p>$post_content</p>";
                        echo "<a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";
                    
                    }

                }

    if ($search_result_count == 0){
    	if($pub_type=="search"){echo "<h1><small>Sorry, No results found!</small></h1>";}
    	if($pub_type=="post"){echo "<h1><small>Sorry, No posts Yet!</small></h1>";}
        if($pub_type=="categorized"){echo "<h1><small>Sorry, No posts yet in that category!</small></h1>";}
        
    }

    else{
    	include "includes/pager.php"; 
    }

}


