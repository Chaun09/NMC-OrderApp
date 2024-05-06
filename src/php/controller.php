<?php

if(!isset($_SESSION)) { 
    session_start(); 
} 

require 'config.php';
require_once 'authEmail.php';

$errors = array();

// Prevent student signup form refresh
$stud_first_name        = "";
$stud_last_name         = "";
$stud_username          = "";
$stud_email             = "";
$stud_password          = "";
$stud_confirm_password  = "";

// Prevent teacher form refresh
$teac_first_name        = "";
$teac_last_name         = "";
$teac_username          = "";
$teac_email             = "";
$teac_password          = "";
$teac_confirm_password  = "";
$image                  = "";

// When student clicks on the sign up button
if (isset($_POST['stud-reg'])) {
    $stud_first_name        = $_POST['stud_first_name'];
    $stud_last_name         = $_POST['stud_last_name'];
    $stud_username          = $_POST['stud_username'];
    $stud_email             = $_POST['stud_email'];
    $stud_password          = $_POST['stud_password'];
    $stud_confirm_password  = $_POST['stud_confirm_password'];
    
    $emailQuery = "SELECT * FROM student WHERE stud_email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s',$stud_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if($userCount > 0) {
        echo '<script>alert("Email already exists, please try a different email!")</script>';
        return false;
    }
    
    $usernameQuery = "SELECT * FROM student WHERE stud_username=? LIMIT 1";
    $stmt = $conn->prepare($usernameQuery);
    $stmt->bind_param('s',$stud_username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if($userCount > 0) {
        echo '<script>alert("Username already exists, please try a different username!")</script>';
        return false;
    }

    if (count($errors) === 0) 
    {
        $stud_password1 = $stud_password;
        $token = bin2hex(random_bytes(50));
        $verified = false; 

        $sql = "INSERT INTO student (stud_first_name, stud_last_name, stud_username, stud_email, hashed_password, verified, token) VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssbs',$stud_first_name, $stud_last_name, $stud_username, $stud_email, $stud_password, $verified, $token);
        
        if ($stmt->execute()) 
        {
            // login user
            $user_id = $conn->insert_id; 
            $_SESSION['id'] = $user_id;
            $_SESSION['stud_username'] = $stud_username;
            $_SESSION['stud_email'] = $stud_email;

        

                        // flash message
            echo "<script type='text/javascript'>alert('dang nhap thanh cong');
            window.location='index.php';
            </script>";
            exit();
        } else {
            echo "<script type='text/javascript'>alert('dang nhap thanh cong');
            window.location='index.php';
            </script>";
        }
    }

}

// When teacher clicks on the sign up button
if (isset($_POST['teach-reg'])) {
    $teac_first_name        = $_POST['teac_first_name'];
    $teac_last_name         = $_POST['teac_last_name'];
    $teac_username          = $_POST['teac_username'];
    $teac_email             = $_POST['teac_email'];
    $teac_password          = $_POST['teac_password'];
    $teac_confirm_password  = $_POST['teac_confirm_password'];
    $teac_status            = "Not Verified";
    
    if (isset($_FILES['image'])) {
        $target_dir = "images/";
        $target_file = $target_dir.basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $image = $_FILES['image']['name'];
    }
    
    $emailQuery = "SELECT * FROM teacher WHERE teac_email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s',$teac_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if($userCount > 0) {
        echo '<script>alert("Email already exists, please try a different email!")
        </script>';
        return false;
    }
    
    $usernameQuery = "SELECT * FROM teacher WHERE teac_username=? LIMIT 1";
    $stmt = $conn->prepare($usernameQuery);
    $stmt->bind_param('s',$teac_username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if($userCount > 0) {
        echo '<script>alert("Username already exists, please try a different username!")</script>';
        return false;
    }

    if (count($errors) === 0) {
        $teac_password1 = $teac_password;

        $sql = "INSERT INTO teacher (teac_username, teac_password, teac_email, teac_first_name, teac_last_name, teac_edu_proof, teac_status) 
        VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssss',$teac_username, $teac_password1, $teac_email, $teac_first_name, $teac_last_name, $image, $teac_status);
        
        if ($stmt->execute()) {
            // login user
            $teach_id = $conn->insert_id; 
            $_SESSION['teach_id'] = $teach_id;
            $_SESSION['teac_username'] = $teac_username;
            $_SESSION['teac_email'] = $teac_email;

            echo "<script type='text/javascript'>alert('Your account request is now pending for approval from admin!');
            window.location='teacher-quiz.php';
            </script>";
            exit();
        } else {
            echo "<script type='text/javascript'>alert('Error!');
            window.location='teacher-quiz.php';
            </script>";
        }
    }
}


// When student clicks on the login button 
if (isset($_POST['stud_login'])) {
   
    $log_username = $_POST['log_username'];
    $log_password = $_POST['log_password'];
    
  
        // validation
            if (count($errors)===0) 
            {
            $sql = "SELECT * FROM users WHERE username='$log_username' and password='$log_password' LIMIT 1";
            $result = mysqli_query($link, $sql);
         

            if (mysqli_num_rows($result) == 1) {
                // login success
                $_SESSION['id'] = $user['user_id'];
                $_SESSION['stud_email'] = $user['email'];
                $_SESSION['log_username'] = $user['username'];
               
                // flash message
                echo "<script type='text/javascript'>alert('Please verify your account through your email!');
                window.location='verification.php';
                </script>";
                exit();
            }

           
            } else {
                echo "<script type='text/javascript'>alert('Invalid credentials!');
                window.location='index.php';
                </script>";
                return false;
            }
        }

   


//logout user 
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['stud_username']);
    unset($_SESSION['stud_email']);
    unset($_SESSION['verified']);
    header('location: index.php');
    exit();
}



// verify user by token
function verifyUser($token)
{
    global $conn;
    $sql = "SELECT * FROM student WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $update_query = "UPDATE student SET verified=1 WHERE token='$token'";

        if (mysqli_query($conn, $update_query)) {
          // log user in   
            $_SESSION['id'] = $user['stud_id'];
            $_SESSION['stud_username'] = $user['stud_username'];
            $_SESSION['stud_email'] = $user['stud_email'];
            $_SESSION['verified'] = 1;
         // flash message
            echo "<script type='text/javascript'>alert('Account has been successfully verified!');
            window.location='student-quiz.php';
            </script>";
            exit();
        }
    } else {
        echo 'User not found';
    }
}

// if user clicks on the forgot password button
if (isset($_POST['forgot-password'])) {
    $stud_email = $_POST['stud_email'];

    if (!filter_var($stud_email, FILTER_VALIDATE_EMAIL)) {
        echo "<script type='text/javascript'>alert('Email address is invalid!');
            window.location='forgot_password.php';
            </script>";
    }

    if (count($errors) ==0) {
       $sql = "SELECT * FROM student WHERE stud_email='$stud_email' LIMIT 1"; 
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        $token = $user['token'];
        sendPasswordResetLink($stud_email, $token);
        echo "<script type='text/javascript'>alert('An email has been successfully sent to your email address with a link to reset your password.');
            window.location='index.php';
            </script>";
        exit(0);
    }
}

// if user clicked on the reset password button
if (isset($_POST['reset-password-btn'])) {
    $stud_password = $_POST['stud_password'];
    $stud_confirm_password = $_POST['stud_confirm_password'];

    $stud_password = password_hash($stud_password, PASSWORD_DEFAULT);
    $stud_email = $_SESSION['stud_email'];

    if(count($errors)== 0) {
        $sql= "UPDATE student SET hashed_password='$stud_password' WHERE stud_email='$stud_email'";
        $result= mysqli_query($conn, $sql);
        if ($result) {
            echo "<script type='text/javascript'>alert('Your password has been successfully resetted! Please re-login into your account using your new password.');
            window.location='index.php';
            </script>";
            exit(0);
        }
    }
}

function resetPassword($token)
{
    global $conn;
    $sql = "SELECT * FROM student WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['stud_email'] = $user['stud_email'];
    header('location: reset-password.php');
    exit(0);
}