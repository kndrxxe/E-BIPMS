<?php
session_start();

include 'conn.php';

$id = $_POST['update_id'];
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$position = $_POST['position'];
$committee = $_POST['committee'];
$termStartYear = $_POST['termStartYear'];
$termEndYear = $_POST['termEndYear'];
$type = $_POST['type'];
$upload_file = '';

function cropImage($sourceFile, $destFile, $cropSize)
{
    list($sourceWidth, $sourceHeight, $sourceType) = getimagesize($sourceFile);

    // Calculate the crop size
    $cropSize = min($sourceWidth, $sourceHeight);

    $offsetX = ($sourceWidth - $cropSize) / 2;
    $offsetY = ($sourceHeight - $cropSize) / 2;

    // Create a new true color image
    $destImage = imagecreatetruecolor($cropSize, $cropSize);

    // Copy and resize part of an image with resampling

    // Create a new image from file 
    switch ($sourceType) {
        case IMAGETYPE_GIF:
            $sourceImage = imagecreatefromgif($sourceFile);
            break;
        case IMAGETYPE_JPEG:
            $sourceImage = imagecreatefromjpeg($sourceFile);
            break;
        case IMAGETYPE_PNG:
            $sourceImage = imagecreatefrompng($sourceFile);
            break;
        default:
            return false;
    }

    // Copy and resize part of an image with resampling
    imagecopyresampled($destImage, $sourceImage, 0, 0, $offsetX, $offsetY, $cropSize, $cropSize, $cropSize, $cropSize);

    // Output image to file 
    switch ($sourceType) {
        case IMAGETYPE_GIF:
            imagegif($destImage, $destFile);
            break;
        case IMAGETYPE_JPEG:
            imagejpeg($destImage, $destFile);
            break;
        case IMAGETYPE_PNG:
            imagepng($destImage, $destFile);
            break;
        default:
            return false;
    }

    // Free up memory
    imagedestroy($sourceImage);
    imagedestroy($destImage);

    return true;
}

function correctImageOrientation($filename)
{
    if (function_exists('exif_read_data')) {
        $exif = exif_read_data($filename);
        if ($exif && isset($exif['Orientation'])) {
            $orientation = $exif['Orientation'];
            if ($orientation != 1) {
                $img = imagecreatefromjpeg($filename);
                $deg = 0;
                switch ($orientation) {
                    case 3:
                        $deg = 180;
                        break;
                    case 6:
                        $deg = 270;
                        break;
                    case 8:
                        $deg = 90;
                        break;
                }
                if ($deg) {
                    $img = imagerotate($img, $deg, 0);
                }
                // then rewrite the rotated image back to the disk as $filename 
                imagejpeg($img, $filename, 95);
            } // if there is some rotation necessary
        } // if have the exif orientation info
    } // if function exists     
}
if (isset($_FILES['picture'])) {
    if ($_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        // Check if the file is an image
        $file_info = getimagesize($_FILES['picture']['tmp_name']);
        if ($file_info !== false) {
            // The file is an image, so move it to the uploads directory
            $upload_dir = 'officials/';
            $upload_file = $upload_dir . basename($_FILES['picture']['name']);

            // Check if the upload directory exists and is writable
            if (!is_dir($upload_dir) || !is_writable($upload_dir)) {
                echo 'Upload directory does not exist or is not writable.';
            } else {
                if (move_uploaded_file($_FILES['picture']['tmp_name'], $upload_file)) {
                    correctImageOrientation($upload_file);
                    $cropSize = 150; // Set the size of the crop
                    $cropWidth = 150; // Set the width of the crop
                    $cropHeight = 150; // Set the height of the crop
                    cropImage($upload_file, $upload_file, $cropWidth, $cropHeight);
                    // The file was uploaded successfully, so update the user's profile picture in the database
                    $query = "UPDATE officials SET picture = '$upload_file' WHERE id = '$id'";
                    if (!mysqli_query($conn, $query)) {
                        echo 'Error updating database: ' . mysqli_error($conn);
                    }
                } else {
                    echo 'Error moving uploaded file.';
                }
            }
        } else {
            echo 'File is not an image.';
        }
    } else {
        echo 'File upload error: ' . $_FILES['picture']['error'];
    }
} else {
    echo 'No file uploaded.';
}
$query = "UPDATE officials SET firstName='$firstName', middleName='$middleName', lastName='$lastName', position='$position', committee='$committee', termStartYear='$termStartYear', termEndYear='$termEndYear', type='$type' WHERE id='$id'";
$query_run = mysqli_query($conn, $query);

if ($upload_file !== '') {
    $query = "UPDATE officials SET picture='$upload_file' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);
}

if ($query_run) {
    $_SESSION['saveofficialsupdate'] = "Data Updated Successfully";
    header('Location: adminofficials.php');
} else {
    $_SESSION['errorofficialsupdate'] = "Data Update Error";
    header('Location: adminofficials.php');
}
?>