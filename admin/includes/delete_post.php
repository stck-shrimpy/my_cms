<?php

if(isset($_GET['p_id'])) {
    
    $query = "DELETE FROM posts WHERE post_id = {$post_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: posts.php?source=view_all_posts");
    exit();
}



?>

