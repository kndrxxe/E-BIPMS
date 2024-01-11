<?php
session_start();

include 'conn.php';
if (isset($_SESSION['uid']) && isset($_SESSION['user']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
	if (time() - $_SESSION['login_time_stamp'] > 600) {
		session_unset();
		session_destroy();
		header("Location: userlogin.php");
	} else {
		$_SESSION['login_time_stamp'] = time();
	}
} else {
	header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include 'conn.php';
    $query = "SELECT * FROM documents";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $items) {
            ?>
            <iframe src="generateclearance.php?id=<?php echo $items['id']; ?>#toolbar=0" frameborder="0" width="50%" height="800px"></iframe>
            <?php
            break;
        }
    } else {
        echo "No Record Found";
    }
    ?>
</body>

</html>