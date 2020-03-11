<?php

    $db_host     = 'localhost';
    $db_user     = 'root';
    $db_password = 'root';
    $db_name     = 'my_cms';

    $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    if(!$connection) {
        die('Connection Failed: ' . mysqli_connect_error($connection));
    }
?>