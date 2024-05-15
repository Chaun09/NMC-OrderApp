<?php
include("../php/config.php");
error_reporting(0);
session_start();
if (isset($_POST['submit'])) {
   
  $username = $_POST['username'];
  $password = $_POST['password'];
  

  
        
          $sql = "SELECT * FROM admin WHERE username='$username' and password='$password' LIMIT 1";
          $result = mysqli_query($link, $sql);
       

         
              $user = mysqli_fetch_array($result);
              // login success
              $_SESSION["adm_id"] = $user['adm_id'];
             
             
              // flash message
              echo "<script type='text/javascript'>alert('Login Successful !');
              window.location='all_users.php';
              </script>";
              exit();
          
        
         
          } else {
              echo "<script type='text/javascript'>alert('Invalid credentials!');
              window.location='../php/index.php';
              </script>";
              return false;
          }
      


?>
