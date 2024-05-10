<?php
session_start();
include('config.php');

$log_userid = $_SESSION['id'];
$retrievesql = "SELECT * FROM users WHERE user_id = '$log_userid'";
$result = mysqli_query($link, $retrievesql);
$row = mysqli_fetch_array($result);
$sid = $row['user_id'];

if(isset($_POST['update-username'])) {
    //username name
    $new_username = $_POST['new_username'];

    $existuername = "SELECT * FROM users WHERE full_name = '$new_username'";
    $result = mysqli_query($link, $existuername);
    $username = mysqli_fetch_array($result);

    if($username > 0) {
        echo '<script>alert("Username already exists, please try a different username!")</script>';
        echo '<script>window.location.href = "user-prosetting.php"</script>';
    } else {
        if(!empty($new_username)){
            $sql = "UPDATE users SET full_name = '$new_username' WHERE user_id = '$sid'";
            if(mysqli_query($link, $sql)){
            }
        }else {
            echo '<script>alert("Unable to change your username")</script>';
            echo '<script>window.location.href = "user-prosetting.php"</script>';
        }
        echo '<script>alert("Username has been change successfully")</script>';
        echo '<script>window.location.href = "user-prosetting.php"</script>';
    }
} else {
    echo '<script>alert("Error")</script>';
    echo '<script>window.location.href = "user-prosetting.php"</script>';
}
mysqli_close($link);

?>