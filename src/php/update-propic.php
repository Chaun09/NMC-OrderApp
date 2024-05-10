<?php
session_start();
include('config.php');

$log_userid = $_SESSION['id'];
$retrievesql = "SELECT * FROM users WHERE user_id = '$log_userid'";
$result = mysqli_query($link, $retrievesql);
$row = mysqli_fetch_array($result);
$sid = $row['user_id'];

if(isset($_POST['update-profile'])) {

    //Name of the uploaded profile picture
    $new_propic = $_FILES['new_propic']['name'];
    //Destination
    $destination = '../images/' . $new_propic;

    //Get the file extension
    $extension = pathinfo($new_propic, PATHINFO_EXTENSION);

    $file = $_FILES['new_propic']['tmp_name'];

    if(!empty($new_propic)){
        if(move_uploaded_file($file, $destination)) {
            $sql = "UPDATE users SET image = '$new_propic' WHERE user_id = '$sid'";
            if(mysqli_query($link, $sql)){
                echo '<script>alert("Profile picture has been change successfully")</script>';
                echo '<script>window.location.href = "user-prosetting.php"</script>';
            } else {
                echo '<script>alert("Failed to update.")</script>';
                echo '<script>window.location.href = "user-prosetting.php"</script>';
            }
        } else {
            echo '<script>alert("Failed to update.")</script>';
        }
    } else{
    };
} else {
    echo '<script>alert("Error")</script>';
    echo '<script>window.location.href = "user-prosetting.php"</script>';
}
mysqli_close($link);

?>