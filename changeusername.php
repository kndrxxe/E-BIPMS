<?php
session_start();

include 'conn.php';
if (isset($_POST['updateusername'])) {
    $id = $_POST['update_id'];
    $username = $_POST['username'];
    $last_username_change = date("Y-m-d H:i:s");

    // Get the last username change date from the database
    $user_query = "SELECT last_username_change FROM users WHERE id = '$id'";
    $user_result = mysqli_query($conn, $user_query);
    $user_row = mysqli_fetch_array($user_result);
    $lastUsernameChange = new DateTime($user_row['last_username_change']);
    $now = new DateTime();

    $interval = $lastUsernameChange->diff($now);

    if ($interval->d < 10) {
        $_SESSION['updateerror'] = "You can only change your username 10 days after the last change.";
        header('Location: useraccount.php');
        exit();
    }

    // Check if username already exists
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $check_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['updateerror'] = "Username already exists, please choose another one";
        header('Location: useraccount.php');
        exit();
    }

    if (!empty($id)) {
        $query = "UPDATE users SET username = '$username', last_username_change = '$last_username_change' WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $_SESSION['updatesuccess'] = "Username Updated Successfully";
            header('Location: useraccount.php');
        } else {
            $_SESSION['updateerror'] = "Username Update Error";
            header('Location: useraccount.php');
        }
    }
}
?>