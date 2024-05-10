<?php
session_start();
include('config.php');

$userid = $_SESSION['id'];
$retrievesql = "SELECT * FROM users WHERE user_id = '$userid'";
$result = mysqli_query($link, $retrievesql);
$row = mysqli_fetch_array($result);
$sid = $row['user_id'];

if(isset($_POST['update-username'])) {
    //first name
    $new_user = $_POST['new_user'];


    if(!empty($new_user)){
        $sql = "UPDATE users SET username = '$new_user' WHERE user_id = '$sid'";
        if(mysqli_query($link, $sql)){
        }
    }else {
        echo '<script>alert("Unable to change your username")</script>';
        echo '<script>window.location.href = "user-prosetting.php"</script>';
    }

 
    echo '<script>alert("Your username has been change successfully")</script>';
    echo '<script>window.location.href = "user-prosetting.php"</script>';
} else {
    echo '<script>alert("Error")</script>';
    echo '<script>window.location.href = "user-prosetting.php"</script>';
}
mysqli_close($link);

?>