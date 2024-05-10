<?php
session_start();
include('config.php');

$log_userid = $_SESSION['id'];
$new_email = $_POST['new-email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM users WHERE user_id = '$log_userid' LIMIT 1";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);

if ($pass == $row['password']) {
    $sqlcheckemail =  "SELECT * FROM users WHERE email LIKE '$new_email'";
    $emailexists = mysqli_query($link, $sqlcheckemail);
    if(mysqli_num_rows($emailexists) > 0) {
        echo '<script>alert("Email already exists, please try a different email!")</script>';
        echo '<script>window.location.href = "user-accsetting.php"</script>';
    } else {
        $sql = "UPDATE users SET email = '$new_email' WHERE user_id= '$log_userid'";
        if (mysqli_query($link, $sql)) {
            echo '<script>alert("Email has been change successfully")</script>';
            echo '<script>window.location.href = "user-accsetting.php"</script>';
        } else {
            echo '<script>alert("Unable to change your email")</script>';
            echo '<script>window.location.href = "user-accsetting.php"</script>';
        }
    }
} else {
echo '<script>alert("Please enter the correct password.")</script>';
echo '<script>window.location.href = "user-accsetting.php"</script>';
}
mysqli_close($link);

?>