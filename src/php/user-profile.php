<?php
session_start();
include('config.php');
//Find the name of the logged user
$log_userid = $_SESSION['id'];
$finduser_sql = "SELECT * FROM users WHERE user_id = '$log_userid'";
$result = mysqli_query($link, $finduser_sql);
$row = mysqli_fetch_array($result);
$sid = $row['user_id'];

if(!isset($_SESSION['id']))
{
  echo '<script>alert("You must log in to your account first.")</script>';
  echo '<script>location.href="index.php"</script>';
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/user-profile.css">
        <link rel="icon" type="image/png" href="../images/icon copy.png">
        <title>NMC Restaurant</title>
    </head>
    <body>
     

        <div class="container-box" id="container-box">
            <?php include("backbtn.php");?>
            <div class="profile-container">
                <h1>Profile Page</h1>
                <div class="account-info">
                    <div class="left-column-info">
                        <div class="acc-pic">
                            <img src="../images/<?php echo $row['image'];?>" >
                        </div>
                        <div class="acc-detail">
                            <h2>
                                UserName: <?php echo $row['username'];?>
                            </h2>
                            <h2>
                                FullName: <?php echo $row['full_name'];?>
                            </h2>
                          
                           
                            <button onclick="location.href='user-prosetting.php'">Edit Profile</button>
                        </div>
                    </div>
                    <div class="right-column-right">
                        <?php
                        $num_of_comquiz_sql = "SELECT * FROM orderdetails  WHERE user_id = '$log_userid'";
                        $resultQuiz = mysqli_query($link, $num_of_comquiz_sql);
                        if($resultQuiz){
                            
                            $rowNum = mysqli_num_rows($resultQuiz);

                            if($rowNum){
                                $num_comquiz = $rowNum;
                            }else{
                                $num_comquiz = 0;
                            }
                            mysqli_free_result($resultQuiz);
                        }
                        ?>
                        
                        <div class="complete-quiz-box">
                            <a href="show_order.php">
                            <p class="complete-box-title">
                                Order History
                            </p>
                            <span class="complete-box-number">
                                <?php echo $rowNum;?>
                            </span>
                           </a>  
                        </div>
                   
                       

                        <?php
                        $num_of_question_sql = "SELECT * FROM orders WHERE user_id = '$log_userid'";
                        $resultQuestion = mysqli_query($link, $num_of_question_sql);
                        if($resultQuestion){
                            
                            $rowNum = mysqli_num_rows($resultQuestion);

                            if($rowNum){
                                $num_question = $rowNum;
                            }else{
                                $num_question = 0;
                            }
                            mysqli_free_result($resultQuestion);
                        }
                        ?>
                        <div class="question-box">
                            <a href="show_order_details.php">
                            <p class="question-box-title">
                                Details About My Order History
                            </p>
                            <span class="question-box-number">
                                <?php echo $num_question;?>
                            </span>
                        </a>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
     
    </body>
</html>