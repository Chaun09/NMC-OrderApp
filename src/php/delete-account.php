<?php
session_start();
include('config.php');

$log_userid = $_SESSION['id'];

if(isset($_POST['delete-stud-acc'])){
	//Get the id of the student
	$sql = "SELECT * FROM users WHERE user_id = '$log_userid'";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);
	$sid = $row['user_id'];
	
	$sql = "DELETE FROM users WHERE user_id = $sid";
	// if(mysqli_query($link, $sql)){
	// 	$sql = "DELETE FROM answer WHERE stud_id = $sid";
	// 	if(mysqli_query($conn, $sql)){
	// 		$sql = "DELETE FROM history WHERE stud_id = $sid";
	// 		if(mysqli_query($conn, $sql)){ 
	// 			$sql = "DELETE FROM question WHERE stud_id = $sid";
	// 			if(mysqli_query($conn, $sql)){ 
	// 				$sql = "DELETE FROM result WHERE stud_id = $sid";
	// 				if(mysqli_query($conn, $sql)){ 
	// 				}
	// 			}
	// 		}
	// 	}
	// 	echo '<script>alert("Account Has Been Deleted.")</script>';
	// 	echo '<script>window.location.href="index.php"</script>';
	// }
	// else{
	// 	echo '<script>alert("Failed to Delete Your Account")</script>';
	// }
    echo '<script>alert("Account Has Been Deleted.")</script>';
		echo '<script>window.location.href="index.php"</script>';
}
mysqli_close($link);
?>