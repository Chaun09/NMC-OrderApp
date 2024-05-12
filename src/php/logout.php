<?php
session_start();
session_destroy();
include('config.php');
//Find the name of the logged user
$log_userid = $_SESSION['id'];
$finduser_sql = "SELECT * FROM users WHERE user_id = '$log_userid'";
$result = mysqli_query($link, $finduser_sql);
$row = mysqli_fetch_array($result);
$sid = $row['user_id'];
echo '<script>alert("Successfully logout.")</script>';
echo '<script>location.href="index.php"</script>'
?>

