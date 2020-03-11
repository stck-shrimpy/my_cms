<?php

if(isset($_GET['c_id'])) {
    $comment_id = $_GET['c_id'];
    $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: comments.php?source=view_all_comments");
    exit();
}



?>

