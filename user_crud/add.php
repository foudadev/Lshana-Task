<?php

if (isset($_POST['submit']) && $_POST['submit'] != '') {
    // require the db connection
    require_once 'includes/db.php';
    $name = (!empty($_POST['name'])) ? $_POST['name'] : '';

    $id = (!empty($_POST['user_id'])) ? $_POST['user_id'] : '';

    if (!empty($id)) {
        // update the record if their id 
        $user_query = "UPDATE `user_data` SET name ='" . $name . "' WHERE id ='" . $id . "'";
        $msg = "update";
    } else {
        // insert the new record
        $user_query = "INSERT INTO `user_data` (name) VALUES ('" . $name . "')";
        $msg = "add";
    }

    $result = mysqli_query($conn, $user_query);

    if ($result) {
        header('location:index.php?msg=' . $msg);
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}

if (isset($_GET['id']) && $_GET['id'] != '') {
    // require the db connection
    require_once 'includes/db.php';

    $user_id = $_GET['id'];
    $user_query = "SELECT * FROM `user_data` WHERE id='" . $user_id . "'";
    $user_res = mysqli_query($conn, $user_query);
    $results = mysqli_fetch_row($user_res);
    $name = $results[1];


} else {
    $name = "";
    $user_id = "";
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php';?>
<body>
   <?php include 'partial/nav.php';?>

    <div class="container">
        <div class="formdiv">
        <div class="info"></div>
        <form method="POST" action="">
            <div class="form-group row">
                <label for="first_name" class="col-sm-2 col-form-label"> Name: </label>
                <div class="col-sm-7">
                <input type="text" name="name" class="form-control" id="first_name" placeholder="Enter your name " value="<?php echo $name; ?>">
            </div>
            <div class="form-group row">
                <div class="col-sm-7">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>