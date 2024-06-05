<?php

session_start(); 



include("visitor-header.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/visi-faq.css">
        <link rel="icon" type="image/png" href="Images/skillsoft-favicon.png">
        <title>FAQ Page</title>
    </head>
    <body>

        <div class="faq-title" id="faq-title">
            <p>How can we help you?</p>
        </div>

        <div class="faq-help" id="faq-help">
            <div class="faq-box">
                <div class="account-setup">
                    <i class="fas fa-user"></i>
                    <h1>Account Setup</h1>
                    <h2>Get started on <br>NMC Restaurant</h2>
                    <div class="overlay">
                        <p>Account Setup</p>
                        <div class="questions">
                            <h2><a href="#1">Create a NMC Restaurant Account</a></h2>
                            <h3><a href="#2">Update Account Info</a></h3>
                            <h4><a href="#3">Delete an Account</a></h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="faq-box">
                <div class="enrollment">
                    <i class="fas fa-hamburger"></i>
                    <h1>Order Food</h1>
                    <h2>Order Food on <br>NMC Restaurant</h2>
                    <div class="overlay">
                        <p>Order Food</p>
                        <div class="questions">
                            <h2><a href="#4">Order</a></h2>
                            <h3><a href="#5">Search Food</a></h3>
                            <h4><a href="#6">View Detail</a></h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="faq-box">
                <div class="troubleshooting">
                    <i class="fas fa-wrench"></i>
                    <h1>General</h1>
                    <h2>Common Problems</h2>
                    <div class="overlay">
                        <p>Trouble Shooting</p>
                        <div class="questions">
                            <h2><a href="#7">Unable to Login Account</a></h2>
                            <h3><a href="#8">Can't Solve Your Issues?</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <p class="faq-word" id="faq-word">Frequently Asked Questions</p>
        <div class="faq-container" id="faq-container">
            <div class="faq-content">
                <details id="1">
                    <summary id="faq-question">
                        <span>
                            Create a NMC Restaurant Account
                        </span>
                    </summary>
                        <p style="margin-top: 10px; margin-bottom: 10px; font-size: 18px;">Here are the steps to create an account with a NMC Restaurant </p>
                        <li>1. Login to NNC Restaurant from a browser, and click on the sign-up on the top right corner.</li>
                        <li>2. Select the type of Account best suitable to you. Types of accounts include:User and Admin (Have no permission)</li>
                        <li style="list-style-type: none;">For user, you can register as a "user" </li>
                        <li style="list-style-type: none;">For admin, you can login use your account to login admin panel</li>
                        <li>3. Fill in all the require information.</li>
                        <li>4. Click on "Sign Up" and you are all set! Cheers.</li>
                        <li>5. After that, a verification link will send to your registered email address to verify your account.</li>
                        <li>6. Once account has been verified, you can now login to your account.</li>
                </details>
                <details id="2">
                    <summary id="faq-question">
                        <span>
                            Update Account Info
                        </span>
                    </summary>
                        <p style="margin-top: 10px; margin-bottom: 10px; font-size: 18px;">Here are the steps to update your account</p>
                        <li>1. Login to your NMC Restaurant account, mouse over to "My Account" and click on "Profile" from the drop down list.</li>
                        <li style="list-style-type: none;">In profile settings, you can upload your profile picture, update your username and update your name.</li>
                        <li style="list-style-type: none;">In account settings, you can update you login information such as password and email address.</li>
                        <li>2. Make sure to click on "Save" to update your latest info.</li>
                </details>
                <details id="3">
                    <summary id="faq-question">
                        <span>
                            Delete an Account
                        </span>
                    </summary>
                        <li>To delete your account, just a simple click on "Delete Account" from Account Settings Page.</li>
                        <li style="list-style-type: none;">Please take note that all of your account data including running and completed quizzes, etc. 
                        will be deleted and you will not be able to sign in to this account. You will be logged out from this account once you click on the confirm button below.</li>
                </details>
                <details id="4">
                    <summary id="faq-question">
                        <span>
                           Order Food
                        </span>
                    </summary>
                        <li>1. Search Food.</li>
                        <li style="list-style-type: none;">In NMC Restaurant, we provide all food Vietnamese and European for ur choosen</li>
                        <li>2. Click Food u want to order and select quantity</li>
                        <li>3. You will be redirected to cart and checkout</li>
                        <li style="list-style-type: none;">Submit</li>
                </details>
                <details id="5">
                    <summary id="faq-question">
                        <span>
                            Search Food
                        </span>
                    </summary>
                        <li>1. To search for a food, just simply browse into menu and see you looking for.</li>
                        <li style="list-style-type: none;">For examples: Search bar is every where and u can use search bar to search name food</li>
                </details>
                <details id="6">
                    <summary id="faq-question">
                        <span>
                            View Cart
                        </span>
                    </summary>
                        <li>1. Click on ur cart </li>
                        <li>2. You will be redirected to a what food u select </li>
                       
                </details>
                <details id="7">
                    <summary id="faq-question">
                        <span>
                            Unable to Login Account
                        </span>
                    </summary>
                        <li>1. If you unable to login with the registered information, check the steps below:</li>
                        <li style="list-style-type: none;">Make sure to click on the verification link to verify your account. </li>
                        <li style="list-style-type: none;">Still unable to login? Try to reset your password.</li>
                        <li>2. If you have try the steps above but still unable to login at the end. Please drop us an email to 
                            <a style="color: #5fa022" href="mailto: bangcac24@gmail.com">bangcac24@gmail.com</a>
                        </li>
                </details>
                <details id="8">
                    <summary id="faq-question">
                        <span>
                            Can't Solve Your Issues?
                        </span>
                    </summary>
                        <li style="list-style-type: none;">Please contact us at: <a style="color: #5fa022" href="mailto: bangcac24@gmail.com">bangcac24@gmail.com</a></li>
                </details>
            </div>
        </div>
        <?php include("visitor-footer.php");?>
    </body>
</html>