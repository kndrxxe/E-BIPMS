<?php
session_start();
include 'conn.php';

$update_id = $_POST['id'];
$isPaid = $_POST['isPaid'];
$upload_file = ''; // Initialize the variable

// Handle the profile picture upload
if (isset($_FILES['proof'])) {
    if ($_FILES['proof']['error'] === UPLOAD_ERR_OK) {
        // Check if the file is an image
        $file_info = getimagesize($_FILES['proof']['tmp_name']);
        if ($file_info !== false) {
            $upload_dir = 'proof_of_payment/';
            $upload_file = $upload_dir . basename($_FILES['proof']['name']);

            if (!is_dir($upload_dir) || !is_writable($upload_dir)) {
                echo 'Upload directory does not exist or is not writable.';
            } else {
                if (move_uploaded_file($_FILES['proof']['tmp_name'], $upload_file)) {
                    $query = "UPDATE documents SET isPaid = '$isPaid', proof = '$upload_file' WHERE id = '$update_id'";
                    if (!mysqli_query($conn, $query)) {
                        echo 'Error updating database: ' . mysqli_error($conn);
                    } else {
                        echo 'Database updated successfully.';
                    }
                } else {
                    echo 'Error moving uploaded file.';
                }
            }
        } else {
            echo 'File is not an image.';
        }
    } else {
        echo 'File upload error: ' . $_FILES['proof']['error'];
    }
} else {
    echo 'No file uploaded.';
}

$query_run = mysqli_query($conn, $query);

if ($query_run) {
    $_SESSION['paymentsuccessfull'] = "Payment Successfully Sent";
    header('Location: userdocument.php');
} else {
    $_SESSION['paymenterror'] = "Payment Error";
    header('Location: userdocument.php');
}
?>