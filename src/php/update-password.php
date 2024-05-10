<?php
session_start();
include('config.php');

$log_userid = $_SESSION['id'];
$current_pass = $_POST['cur-pass'];
$new_pass = $_POST['new-pass'];
$conf_pass = $_POST['conf-pass'];

$sql = "SELECT * FROM users WHERE user_id = '$log_userid' LIMIT 1";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);

if ($new_pass != $conf_pass) {
    echo '<script>alert("The password do not match. Please re-enter your password.")</script>';
    echo '<script>window.location.href="user-accsetting.php"</script>';
} elseif ($current_pass == $row['password']) {
    
    $sql = "UPDATE users SET password = '$new_pass' WHERE user_id= '$log_userid'";
    if (mysqli_query($link, $sql)) {
        echo '<script>alert("Password has been change successfully.")</script>';
        echo '<script>window.location.href="user-accsetting.php";</script>';
    } else {
        echo '<script>alert("Unable to change your password")</script>';
        echo '<script>window.location.href="user-accsetting.php";</script>';
    } 
} else {
    echo '<script>alert("Current password does not matched. Pleasr try again")</script>';
    echo '<script>window.location.href = "user-accsetting.php"</script>';
}
mysqli_close($link);
?>