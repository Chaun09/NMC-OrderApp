<?php
session_start();
include('config.php');
//Find the name of the logged user
$log_userid = $_SESSION['id'];
$finduser_sql = "SELECT * FROM users WHERE user_id = '$log_userid'";
$result = mysqli_query($link, $finduser_sql);
$row = mysqli_fetch_array($result);
$sid = $row['user_id'];

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
                            <img src="../images/<?php echo $row['image'];?>" alt="profile-pic">
                        </div>
                        <div class="acc-detail">
                            <h2>
                                FullName: <?php echo $row['full_name'];?>
                            </h2>
                          
                            <h2>
                                Email: <?php echo $row['email'];?>
                            </h2>
                            <button onclick="location.href='php/user-prosetting.php'">Edit Profile</button>
                        </div>
                    </div>
                    <div class="right-column-right">
                        <?php
                        $num_of_comquiz_sql = "SELECT * FROM quiz q INNER JOIN quiz_question qq, history h WHERE (qq.quiz_id = q.quiz_id) AND (qq.quques_id = h.quques_id) AND (h.stud_id = '$sid') GROUP BY q.quiz_id";
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
                            <p class="complete-box-title">
                                Total Completed Quiz
                            </p>
                            <span class="complete-box-number">
                                <?php echo $rowNum;?>
                            </span>
                        </div>

                        <?php
                        $num_of_question_sql = "SELECT * FROM question WHERE stud_id = '$sid'";
                        $resultQuestion = mysqli_query($conn, $num_of_question_sql);
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
                            <p class="question-box-title">
                                Total Question
                            </p>
                            <span class="question-box-number">
                                <?php echo $num_question;?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
    </body>
</html>