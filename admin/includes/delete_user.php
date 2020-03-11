<?php

if(isset($_GET['u_id'])) {
    
    $query = "DELETE FROM users WHERE user_id = {$user_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: users.php?source=view_all_users");
    exit();
}



?>

