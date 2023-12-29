<?php
session_start();

include 'conn.php';
if (isset($_POST['updatepassword'])) {
    $id = $_POST['updatepassword_id'];
    $password = md5($_POST['password']);
    $last_password_change = date("Y-m-d H:i:s");

    // Get the last password change date from the database
    $user_query = "SELECT last_password_change FROM users WHERE id = '$id'";
    $user_result = mysqli_query($conn, $user_query);
    $user_row = mysqli_fetch_array($user_result);
    $lastPasswordChange = new DateTime($user_row['last_password_change']);
    $now = new DateTime();

    $interval = $lastPasswordChange->diff($now);

    if ($interval->d < 60) {
        $_SESSION['updateerror'] = "You can only change your password 60 days after the last change.";
        header('Location: useraccount.php');
        exit();
    }

    if (!empty($id)) {
        $query = "UPDATE users SET password = '$password', last_password_change = '$last_password_change' WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $_SESSION['updatesuccess'] = "Password Updated Successfully";
            header('Location: useraccount.php');
        } else {
            $_SESSION['updateerror'] = "Password Update Error";
            header('Location: useraccount.php');
        }
    }
}
?>