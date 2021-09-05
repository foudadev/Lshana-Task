<?php

if (!empty($_GET['id'])) {
    // require connection
    require_once 'includes/db.php';
    // get id parameter
    $id = $_GET['id'];
    // delete query
    $del_query = "DELETE FROM `user_data` WHERE id = '" . $id . "'";
    $result = mysqli_query($conn, $del_query);
    if ($result) {
        header('location:index.php?msg=del');
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
