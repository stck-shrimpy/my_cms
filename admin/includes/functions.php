<?php


// String Escape
function string_escape($string) {

    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

// Password Encryption
function password_encrypt($password) {
    $options = [
        'cost' => 12,
    ];
    return password_hash($password, PASSWORD_BCRYPT, $options);
    
}

// Update Post View Count
function update_post_views( $post_id) {
    global $connection;
    $query = "SELECT * FROM posts WHERE post_id = $post_id";
    $selected_post = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($selected_post)) {
        $post_views = $row['post_views'];
    }
    $post_views = $post_views + 1;
    $query = "UPDATE posts SET post_views = $post_views WHERE post_id = $post_id";
    $update_post_views = mysqli_query($connection, $query);


}

// Post & User ID to Title
function id_to_title($table_name, $column_name, $id) {
    global $connection;
    $column_name = $column_name;
    $query = "SELECT * FROM $table_name WHERE $column_name = $id";
    $select = mysqli_query($connection, $query);
    if($column_name == 'post_id') {
        $column_name = 'post_title';
    }
    if($column_name == 'user_id') {
        $column_name = 'user_name';
    }
    while($row = mysqli_fetch_assoc($select)) {
        
        $title = $row["{$column_name}"];
    }
    return $title;
}

function prevent_image_overlap($image) {
    global $connection;
    $query = "SELECT * FROM posts";
    $select_posts = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_posts)) {
        $db_post_image = $row['post_image'];
        if($image = $db_post_image) {
           return $image . "1";
        break;
        }
    }


}
// function password_verify($password) {

// }

// // Select User From Database
// function select_user($column, $condition) {

//     global $connection;

//     $query = "SELECT * FROM users WHERE $column = '{$condition}' ";
//     $select_user = mysqli_query($connection, $query);

//     while($row = mysqli_fetch_array($select_user)) {

//     }

// }

