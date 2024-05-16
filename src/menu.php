<?php
include "php/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>NMC Restaurant</title>
<meta charset="utf-8">
<link rel="icon" href="images/icon copy.png">
<link rel="shortcut icon" href="images/icon copy.png">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/sForm.js"></script>
<script src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script src="https://kit.fontawesome.com/8e94eefdff.js" crossorigin="anonymous"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>

<script>
$(window).load(function () {
  $('.carousel1').carouFredSel({
      auto: true, 
      prev: '.next4',
      next: '.prev4',
      width: 720,
      items: {
          visible: {
              min: 1,
              max: 4
          },
          height: 'auto',
          width: 240,
      },
      responsive: false,
      scroll: 1,
      mousewheel: false,
      swipe: {
          onMouse: false,
          onTouch: false
      }
  });
});
</script>
<body>
<div class="main">
  <header>
    <div class="container_12">
      <div class="grid_12">
        <h1><a href="index.php"><img src="images/" alt=""></a></h1>
        <div class="menu_block">
          <nav>
            <ul class="sf-menu">
              <li><a href="index.php">Home</a></li>
              <li><a href="about-us.html">About Us</a>
                <ul>
                  <li><a href="#">cuisine</a></li>
                  <li><a href="#">Good rest</a></li>
                  <li><a href="#">Services</a></li>
                </ul>
              </li>
              <li class="current" class="dropmenu"><a  href="menu.php">Menu</a>
                <ul>
                  <li><a href="#">European Foods</a></li>
                  <li><a href="#">VietNam Foods</a></li>
                  
                </ul>
              </li>
              <li><a href="portfolio.html">Moments</a></li>
              <li><a href="news.html">News</a></li>
              <li><a href="contacts.html">Contacts</a></li>
              <li><a href="php/cart.php">Cart</a></li>
              <li class="dropmenu"><a href="php/user-profile.php"> My Account <i class="fas fa-caret-down"></i></a>

                <ul>
                    <li><a href="php/user-profile.php" title="Profile">Profile</a></li>
                    <li><a href="php/user-accsetting.php" title="Settings">Settings</a></li> 
                    <li><a href="php/logout.php" title="Logout">Logout&nbsp;<i class="fas fa-power-off"></i></a></li> 
                    <style>
                   i {
                     transform: translate(0%,15%);
                   }
                 </style>   
                    
                </ul>
  </li>
              
              
            </ul>
          </nav>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div> 
    </div>
  </header>
  

  
      <div class="clear"></div>
      <div class="bottom_block">
        <div class="grid_6">
          <div class="down">
          <h3>Follow Us</h3>
          <div class="socials">  <a href="#"><img class="fb" src="images/fb.jpg" height="30px" width="30px"></a> 
            <a href="#"><img class="ig" style="transform: translate(20%,-5%);" src="images/ig.jpg" height="33px" width="33px"></a> 
            <a href="#"><img class="tw" style="transform: translate(40%,0%);" src="images/tw.png" height="32px" width="32px"></a> 
            <a href="#"><img class="tk" style="transform: translate(34%,2%);" src="images/tk.png" height="30px" width="42px"></a> 
            <a href="#"><img class="ws" style="transform: translate(43%,-3%);" src="images/ws.png" height="35px" width="37px"></a> 
           </div>
          <nav>
            <div class="bt-mn">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="about-us.html">About Us</a></li>
              <li class="current"><a href="menu.php">Menu</a></li>
              <li><a href="portfolio.html">Moments</a></li>
              <li><a href="news.html">News</a></li>
              <li><a href="contacts.html">Contacts</a></li>
              <!-- <li class="signin"><a href="html/signin.html">Sign In</a></li>
              <li class="signup"><a href="html/signup.html">Sign Up</a></li>  -->
            </ul>
          </div>
            <style>
              .socials{
                transform: translate(0%,0%);
              }
             
              .signin{
                transform: translate(140%, 6%);
              }
              .signup{
                transform: translate(790%,-96%);
              }
              .winelist {
                transform: translate(-145%,10%);
              }
              .button1:hover{
                background-color: #e2827e;
              }
              .button2:hover{
                background-color: #e2827e;
              }
              .button3:hover{
                background-color: #e2827e;
              }
              .button4:hover{
                background-color: #e2827e;
              }
              </style>
          </nav>
        </div>
      </div>
        <div class="Email">
        <div class="grid_6">
          <div class="down1">
          <h3>Email </h3>
          <p class="col1">Tham Gia Bằng Cách Đăng Kí Email<br>
            Để Nhận Nhiều Voucher Giảm Giá Và Ưu Đãi</p>
          <form id="newsletter" action="#">
            <div class="success">Your subscribe request has been sent!</div>
            <label class="email">
              <input type="email" value="Nhập Email" >
              <a href="#" class="btn_1" data-type="submit">subscribe</a> <span class="error">*This is not a valid email address.

              </span> 
            </label>
          </form>
        </div>
        </div>
      </div>
      </div>
      <style>
        .Email{
          transform: translate(15%,-500%);
        }
        .prev4 {
	background: url("images/prevnext.png") 0 bottom no-repeat;
	display: block;
	float: right;
	width: 32px;
	z-index: 999;
	height: 30px;
	margin-top: 8px;
}

.prev4:hover {
	background-position: 0 0;
}

.next4 {
	background: url("images/prevnext.png") right bottom no-repeat;
	display: block;
	z-index: 999;
	float: right;
	width: 32px;
	height: 30px;
	margin-top: 8px;
}

.next4:hover {
	background-position: right 0;
}
       
      </style>
      <div class="clear"></div>
    </div>
  </div>
</div>
<footer>
  <div class="container_12">
    <div class="grid_12"> NMC Restaurant &copy; 2024 | <a href="#">Privacy Policy</a> | Design by: <a href="https://www.facebook.com/toilachou203/">Nguyen Minh Chau</a> </div>
    <div class="clear"></div>
  </div>
</footer>
</body>
</html>