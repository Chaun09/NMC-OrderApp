<?php require_once 'controller.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/visitheader.css">
        <link rel="stylesheet" href="css/signup.css">
        <link rel="icon" type="image/png" href="../images/icon copy.png">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/8e94eefdff.js" crossorigin="anonymous"></script>
        <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <section class="top-nav-bar" style="z-index:50;" id="top-nav-bar">
                <div class="left-nav" id="left-nav">
                   
                    <a href="#" class="icon" id="menu-btn">
                        <i class="fa fa-bars"></i>
                    </a>
                    <nav>
                        <ul class="main-menu">
                       
                            <li><a href="student-forum.php">Forum</a></li>
                            <li><a href="visitor-faq.php">FAQ</a></li>
                            <li><a href="visitor-aboutus.php">About Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="right-nav" id="right-nav">
                    <a id="signin-btn" class="sign-in" href="#">Sign In</a>
                    <a id="signup-btn" class="sign-up" href="#">Sign Up</a>
                    <a id="signup-btn" class="sign-up" href="admin/admin-login-page.php">Admin Log In</a>
                </div>

            <div id="signin-modal" class="signin-modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="signin-close">&times;</span>
                    <p>Sign In</p>
                    <div class="account-login-information">
                        <!--Form to collect data when login, username and password-->
                        
                        <form class="signin-form" method="POST" id="signup">
                           
                                <div class="acc-details">
                                    <i class="fas fa-user-circle"></i>
                                    <input class="acc-username" type="text" id="student" name="log_username" placeholder="Username" required >
                                </div>
                                <div class="acc-details">
                                    <i class="fas fa-unlock-alt icon"></i>
                                    <input class="acc-password" type="password" id="password" name="log_password" placeholder="Password" required >
                                </div>
                                    <div class="showpass">
                                        <input type="checkbox" id="showPASS">
                                        <label for="terms">
                                            View your password
                                        </label>
                                    </div>
                                    
                                    <script>
                                             
        $(document).ready(function() {
            $("#showPASS").change(function(){
                $(this).prop("checked") ?  $("#password").prop("type", "text") : $("#password").prop("type", "password");    
            });
        });
                                    </script>
                                <div class="sign-in-btn">
                                    <input type="submit" name="stud_login" value="Sign In">
                                </div>
                        </form>
                        <div class="forgot-pass">
                            <span>Forgot Password?<a href="forgot-password.php">&nbspReset your Password</a></span>
                        </div>
                        <hr class="divide-line-signin">
                    
                    </div>
                </div>
            </div>

            <div id="signup-modal" class="signup-modal">
                <!-- Modal content -->
                <div class="modal-content"  id="signup">
                    <span class="signup-close">&times;</span>
                    <p>Sign Up</p>
                    <div class="account-login-information" id="signup">
                        <!--Form to collect data when login, username and password-->
                        
                        <form class="signup-form" method="POST" id="signup">
                           
                                <div class="acc-details">
                                    <i class="fas fa-user-circle"></i>
                                    <input class="acc-username" type="text" id="student" name="signup_username" placeholder="Username" required >
                                </div>
                                <div class="acc-details">
                                    <i class="fas fa-unlock-alt icon"></i>
                                    <input class="acc-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" id="password1" name="signup_password" placeholder="Password" required >
                             
                                </div>
                                <div class="acc-details">
                                    <i class="fas fa-unlock-alt icon"></i>
                                    <input class="acc-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" id="password1" name="signup_password_again" placeholder="Password Again" required >
                                  
                                </div>
                                <div class="acc-details">
                                    <i class="fas fa-user-circle"></i>
                                    <input class="acc-username" type="text" id="student" name="signup_username_full" placeholder="Fullname" required >
                                </div>
                                <div class="acc-details">
                                    <i class="fas fa-user-circle"></i>
                                    <input class="acc-username" type="email" id="student" name="signup_email" placeholder="Email" required >
                                </div>
                                <div class="showpass">
                                        <input type="checkbox" id="showPASS1">
                                        <label for="terms">
                                            View your password
                                        </label>
                                </div>
                             
                               
                                <script>
                                             
                                             $(document).ready(function() {
                                                 $("#showPASS1").change(function(){
                                                     $(this).prop("checked") ?  $("#password1").prop("type", "text") : $("#password1").prop("type", "password");    
                                                 });
                                             });
                                </script>
                                
          

                              
                              
                                <div class="sign-in-btn">
                                    <input type="submit" name="SignUp" value="Sign Up">
                                </div>
                                
                      
                        </form>
                      
                       
                        
                        <hr class="divide-line-signin">
                     
                    </div>
                  
                 
                </div>  
              
            </div>

          
        </section>

       

        <!--Modal Box for Sign In-->
        <script>

        
        const targetDiv = document.getElementById("dropdown-list");
        const btn = document.getElementById("menu-btn");
        btn.onclick = function () {
        if (targetDiv.style.display !== "none") {
            targetDiv.style.display = "none";
        } else {
            targetDiv.style.display = "block";
        }
        };

        var signinmodal = document.getElementById("signin-modal");
        var signinbtn = document.getElementById("signin-btn");
        var signinspan = document.getElementsByClassName("signin-close")[0];
        signinbtn.onclick = function() {
            signinmodal.style.display = "block";
        }
        signinspan.onclick = function() {
            signinmodal.style.display = "none";
        }

        <!--Modal Box for Sign Up-->
        var signupmodal = document.getElementById("signup-modal");
        var signupbtn = document.getElementById("signup-btn");
        var signupspan = document.getElementsByClassName("signup-close")[0];
       
        signupbtn.onclick = function() {
            signupmodal.style.display = "block";
        }
        signupspan.onclick = function() {
            signupmodal.style.display = "none";
        }

        //close all model and open signup model
        var signinmodalclose = document.getElementsByClassName("signup-btn")[0];
        signinmodalclose.onclick = function() {
            signinmodal.style.display = "none";
            signupmodal.style.display = "block";
        }

        //close all model and open signin model
        var signinmodalclose = document.getElementsByClassName("signin-btn")[0];
        signinmodalclose.onclick = function() {
            signupmodal.style.display = "none";
            signinmodal.style.display = "block";
        }

        window.onclick = function(event) {
        if (event.target == signupmodal) {
            signupmodal.style.display = "none";
        }
        if (event.target == signinmodal) {
            signinmodal.style.display = "none";
        }
        }

   

        </script>


    </body>
</html>


