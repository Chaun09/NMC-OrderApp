<?php 
session_start();
include 'php/config.php'; 

$userid = $_SESSION['id'];
if(!isset($_SESSION['id']))
{
  echo '<script>alert("You must log in to your account first.")</script>';
  echo '<script>location.href="php/index.php"</script>';
}

if(isset($_SESSION['id']))
{
 
  $sql = "SELECT * FROM users WHERE user_id = '$userid'";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result);
  echo '<script>alert("Welcome '.$row['full_name'].' To NMC Restaurant. We Hope You Have A Nice Day And Best Experience ❤️ ❤️ ❤️")</script>';
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>NMC Restaurant</title>
<meta charset="utf-8">
<link rel="icon" href="images/icon copy.png">
<link rel="shortcut icon" href="images/icon copy.png">
<link rel="stylesheet" href="php/css/chatbot.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/slider.css">

<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/sForm.js"></script>
<script src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script src="js/tms-0.4.1.js"></script>
<script src="https://kit.fontawesome.com/8e94eefdff.js" crossorigin="anonymous"></script>


<script>
$(window).load(function () {
    $('.slider')._TMS({
        show: 0,
        pauseOnHover: false,
        prevBu: '.prev',
        nextBu: '.next',
        playBu: false,
        duration: 800,
        preset: 'fade',
        pagination: true, //'.pagination',true,'<ul></ul>'
        pagNums: false,
        slideshow: 8000,
        numStatus: false,
        banners: false,
        waitBannerAnimation: false,
        progressBar: false
    })
});

$(window).load(function () {
    $('.carousel1').carouFredSel({
        auto: true,
        prev: '.next1',
        next: '.prev1',
        width: 960,
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

$(window).load(function () {
    $('.carousel2').carouFredSel({
        auto: true,
        prev: '.next',
        next: '.prev',
        width: 960,
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

</head>
<body>
<div class="main">
  <header>
    <div class="container_12">
      <div class="grid_12">
        <h1><a href="index.php"><img src="images/" alt=""></a></h1>
        <style>
          .grid_12 img {
            height: 70px;
            width: 70px;

          }
        </style>
        <div class="menu_block">
          <nav>
            <ul class="sf-menu">
              <li class="current"><a href="index.php">Home</a></li>
              <li class="with_ul"><a href="about-us.html">About Us</a>
                <ul>
                  <li><a href="#">Cuisine</a></li>
                  <li><a href="#">Good rest</a></li>
                  <li><a href="#">Services</a></li>
                </ul>
              </li>
              <style>
                .dropmenu ul li{
                  font-size: 5px;

                  

                }
                .btn99{
                border: white;
                
              }
             
              .btn99:hover{
                background-color: #e2827e;
                
              }
              .font-1{
              transform: translate(0%,21%);
            }
              </style>
              
              <li class="dropmenu"><a href="menu.php">Menu</a>
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
 
  <div class="slider-relative">
    <div class="slider-block">
      <div class="slider">
        <ul class="items">
          <li><img src="images/slide.jpg" alt=""></li>
          <li><img src="images/slide1.jpg" alt=""></li>
          <li class="mb0"><img src="images/slide2.jpg" alt=""></li>
        </ul>
      </div>
    </div>
  </div>
  
  <div class="content page1">
    <div class="container_12">
      <div class="grid_7">
        <h2>Welcome</h2>
        <div class="page1_block col1"> 
          <img style="transform: translate(-25%,-15%);" src="images/Thiết_kế_chưa_có_tên-removebg-preview.png" alt="">
          <img style="transform: translate(28%,-129%);height: 250px;width: fit-content;" src="images/anhminh-removebg-preview.png" alt="">
          <img src="images/phongdo.jpg" style="height: 175px; width: 175px;  border-radius: 175px; transform: translate(-6%,-163%);">
          
          
          <div class="info1">
          <p class="minh"> Phó Giám Đốc Điều Hành <br>Đỗ Tuấn Phong</p>
          <button class="buttom" style="transform: translate(115%,-90%);"><a href="">About Me </a></button>

          
        </div>
        
        
          <style>
            .minh{
              transform: translate(3%,-30%);
              text-align: center;
            }
            .info1{
              transform: translate(-7%,282%);
            }
            .grid_7 img {
              height: 300px;
              width: 300px;
              transform: translate(-5%,0%);

            }
            div.extra_wrapper{
              transform: translate(-250%,65%);
              height: 150px;
              width: fit-content;
            

          
              
              
            }
         
           
            div.grid_7{
              height: 400px;
            }
            .buttom{
              background-color: salmon;
              border-radius: 7rem;
              transform: translate(-20%,-96%);
            }
        
          </style>
          <div class="extra_wrapper">
            
            <div class="info">
            <p class="chau" style="text-align: center;">CEO Nhà Hàng<br>Nguyễn Minh Châu</p>
            <button class="btn_10"><a href="">About Me </a></button>
            </div>
      

          </div>
          <div class="extra_wrapper1">
            
            <div class="info">
            <p class="phong" style="text-align: center; transform: translate(-35%,-70%);">Giám Đốc Nhà Hàng<br>Trần Anh Minh</p>
            <button class="btn_11" ><a href="">About Me </a></button>
            </div>
      

          </div>
            <style>
              .btn_11{
                transform: translate(-160%,-160%);
              }
              .anvaoday1{
                transform: translate(-148%,-245%);
              }
              .anvaoday{
                transform: translate(20%,0%);
              }
              
              .btn_10{
                transform: translate(35%,85%);
              }
              .chau{ 
                transform: translate(0%,80%);
              }
             
              .btn_1{
                transform: translate(30%,-70%);
              }
            .extra_wrapper{
              transform: translate(-10%,35%);

            }
            .extra_wrapper button{
              background-color: salmon;
              border-radius: 7rem;
            }
            .extra_wrapper1 button{
              background-color: salmon;
              border-radius: 7rem;
            }
            .btn {
              transform: translate(0%,-80%);
            }
     
            </style>
          <div class="clear"></div>
        </div>
      </div>
      <div class="grid_5">
        <h2>Features</h2>
        <ul class="list">
          <li>Ngon Theo Kiểu Châu Á, Chất Theo Kiểu Châu Âu</li>
          <br>
          <li>Đa Dạng Thực Đơn</li>
          <br>
          <li>Phục Vụ Tận Tâm, Nhiệt Tình</li>
          <br>
          <li>Chuyên Nghiệp</li>
          <br>
          <li>Mở 24/24</li>
          <br>
          <li>Giá Cả Phải Chăng</li>
        </ul>
      </div>
      <style>
        .list{
          transform: translate(0%,10%);
        }
      </style>
      <div class="clear">

      </div>
      <div class="grid_12">
        <div class="hor_separator"></div>
      </div>
      
      <div class="grid_12">
        <div class="car_wrap">
          <style>
            .next1{
              transform: translate(-35%,-200%);
            }
            .prev1{
              transform: translate(-35%,-200%);
            }
         
          </style>
          <h2>Best Choices For Europe Food</h2>
          <a href="#" class="next1"></a>
          <a href="#" class="prev1"></a>
          <div  class="caroufredsel_wrapper2">
          <style>
            div.caroufredsel_wrapper2
            {
              transform: translate(0%,-15%);

            }
          </style>
          <ul class="carousel1">
            <li>
              <div>
                <img src="images/page1_img1.jpg"  alt="">
                
                <div class="col1 upp"> <a href="#">Cơm Chiên Kiểu Pháp</a></div>
                <span> Best Seller</span>
                <div class="price">500.000VNĐ</div>
              </div>
              
            </li>
           
            <li>
              <div><img src="images/page1_img2.jpg" alt="">
                <div class="col1 upp"> <a href="#">Cơm Cá Mú</a></div>
                <span>Best Seller</span>
                <div class="price">500.000VNĐ</div>
              </div>
            </li>
            <li>
              <div><img src="images/page1_img3.jpg" alt="">
                <div class="col1 upp"> <a href="#">Bánh Kem Dâu Kiểu Mỹ</a></div>
                <span> Best Seller</span>
                <div class="price">500.000VNĐ</div>
              </div>
            </li>
            <li>
              <div><img src="images/page1_img4.jpg" alt="">
                <div class="col1 upp"> <a href="#">Bánh Ngọt</a></div>
                <span> Best Seller </span>
                <div class="price">500.000VNĐ</div>
              </div>
            </li>
            <li>
              <div>
                <img src="images/page1_img3.jpg" alt="">
                <div class="col1 upp"> <a href="#">Bánh Dâu </a></div>
                <span>Best Seller</span>
                <style>
                  span {
                    color: red;
                    font-size: 15px;
                    justify-content: center;
                  }
                  .price {
                    transform: translate(-70%,0%);

                  }
            
                </style>
                <div class="price">500.000VNĐ</div>
              </div>
            </li>
          </ul>
        </div>
        </div>
      </div>
      <div class="clear">

      </div>
      <div class="grid_12">
        <div class="hor_separator">
        </div>
      </div>
      <div class="grid_12">
        <div class="car_wrap_2">
          <h2>Best Choices For VietNamese Food</h2>
          <a href="#" class="prev"></a>
          <a href="#" class="next"></a>
          <ul class="carousel2">
            <li>
            <?php 
              $query = "SELECT * FROM products WHERE product_id = 2";
              $result = mysqli_query($link, $query);
              $row = mysqli_fetch_array($result);
              ?>
              <div><img src="images/<?php  echo $row['Image']; ?>" alt="">
                <div class="col1 upp"> <a href="#"><?php  echo $row['product_name'];?></a></div>
                <span> Best Seller</span>
                <div class="price_1"><?php echo $row['price']; ?>VNĐ</div>
              </div>
            </li>
            <li>
              <?php 
              $query = "SELECT * FROM products WHERE product_id = 1";
              $result = mysqli_query($link, $query);
              $row = mysqli_fetch_array($result);
              ?>
              <div><img src="images/<?php echo $row['Image']; ?>" alt="">
                <div class="col1 upp"> <a href="#"><?php echo $row['product_name'];?></a></div>
                <span>Best Seller</span>
                <div class="price_1"><?php echo $row['price']; ?>VNĐ</div>
              </div>
            </li>
            <li>
              <?php 
              $query = "SELECT * FROM products WHERE product_id = 11";
              $result = mysqli_query($link, $query);
              $row = mysqli_fetch_array($result);
              ?>
              <div><img src="images/<?php echo $row['Image']; ?>" alt="">
                <div class="col1 upp"> <a href="html/banhcuon.html"><?php echo $row['product_name']; ?></a></div>
                <span> Best Seller</span>
                <div class="price_1"><?php echo $row['price']; ?>VNĐ</div>
              </div>
            </li>
            <li>
              <?php 
              $query = "SELECT * FROM products WHERE product_id = 3";
              $result = mysqli_query($link, $query);
              $row = mysqli_fetch_array($result);
              ?>
              <div><img src="images/<?php echo $row['Image']; ?>" alt="">
                <div class="col1 upp"> <a href="#"><?php echo $row['product_name']; ?></a></div>
                <span> Best Seller </span>
                <div class="price_1"><?php  echo $row['price'];?> VNĐ</div>
              </div>
            </li>
            <li>
              <?php 
              $query = "SELECT * FROM products WHERE product_id = 4";
              $result = mysqli_query($link, $query);
              $row = mysqli_fetch_array($result);
              ?>
              <div><img src="images/<?php echo $row['Image']; ?>" alt="">
                <div class="col1 upp"> <a href="#"><?php echo $row['product_name']; ?></a></div>
                <span>Best Seller</span>
                <style>
                  span {
                    color: red;
                    font-size: 15px;
                    justify-content: center;
                  }
                  .price_1 {
                    transform: translate(-70%,0%);
                  }
                </style>
                <div class="price_1"><?php  echo $row['price'];?>VNĐ</div>
              </div>
            </li>
            <li>
              <div>
              <?php 
              $query = "SELECT * FROM products WHERE product_id = 6";
              $result = mysqli_query($link, $query);
              $row = mysqli_fetch_array($result);
              ?>
                <img src="images/<?php echo $row['Image']; ?>" alt="">
                <div class="col1 upp"><a href="#"> <?php echo $row['product_name']; ?></a></div>
                <span>Best Seller</span>
                <div class="price_1"><?php echo $row['price']; ?>VNĐ</div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <style>
        .carousel2 {
	height: 249px;
}


.carousel2 li {
	float: left;
	width: 240px !important;
	font-size: 12px;
}

.carousel2 li >div {
	padding: 0 10px;
}

.carousel2 li .price_1 {
	display: inline-block;
	background: #699440;
	color: #fff;
	min-width: 35px;
	height: 20px;
	border-radius: 4px;
	font: 20px/20px 'Lobster', cursive;
	text-align: center;
	margin-top: 20px;
}


.carousel2 li span {
	line-height: 16px;
}

.carousel2 img {
	box-shadow: 2px 2px 3px #ddd;
	padding: 4px;
	background: #fff;
	border: 1px solid #e6e4e4;
	 -moz-box-sizing: border-box;
 -webkit-box-sizing: border-box;
 -o-box-sizing: border-box;
 box-sizing: border-box;
 margin-bottom: 19px;
}
.car_wrap_2 {
	position: relative;
	margin: 0 -10px;
	overflow: hidden;
}

.content.page1 .car_wrap_2 h2 {
	padding-left: 10px;
	padding-top: 23px;
	padding-bottom: 3px;
}

      </style>
      <input type="checkbox" id="click">
      <label for="click" class="chatbot">
          <i class="fab fa-facebook-messenger"></i>
          <i class="fas fa-times"></i>
      </label>
      <div class="wrapper">
          <div class="title">Chat With Us Now</div>
              <div class="form">
                  <div class="bot-inbox inbox">
                      <div class="icon">
                          <i class="fas fa-user"></i>
                      </div>
                      <div class="msg-header">
                          <p>Hello there, how can I help you?</p>
                      </div>
                  </div>
              </div>
              <div class="typing-field">
                  <div class="input-data">
                      <input id="data" type="text" placeholder="Type something..." required>
                      <button id="send-btn">Send</button>
                  </div>
              </div>
          </div>
      </div>
      
     
      <div class="clear">

      </div>

     
      <div class="bottom_block">
        <div class="grid_6">
          <h3>Follow Us</h3>
          <div class="socials">  <a href="#"><img class="fb" src="images/fb.jpg" height="30px" width="30px"></a> 
            <a href="#"><img class="ig" style="transform: translate(20%,-5%);" src="images/ig.jpg" height="33px" width="33px"></a> 
            <a href="#"><img class="tw" style="transform: translate(40%,0%);" src="images/tw.png" height="32px" width="32px"></a> 
            <a href="#"><img class="tk" style="transform: translate(34%,2%);" src="images/tk.png" height="30px" width="42px"></a> 
            <a href="#"><img class="ws" style="transform: translate(43%,-3%);" src="images/ws.png" height="35px" width="37px"></a> 
           </div>
          <nav>
            <ul>
              <li class="current"><a href="index.php">Home</a></li>
              <li><a href="about-us.html">About Us</a></li>
              <li><a href="menu.php">Menu</a></li>
              <li><a href="portfolio.html">Moments</a></li>
              <li><a href="news.html">News</a></li>
              <li><a href="contacts.html">Contacts</a></li>
               <!-- <li class="signin"><a href="html/signin.html">Sign In</a></li>
              <li class="signup"><a href="html/signup.html">Sign Up</a></li>  -->
            </ul>
            <style>
              .signin{
                transform: translate(890%, -101.1%);
              }
              .signup{
                transform: translate(800%,-101.1%);
              }
              </style>
          </nav>
        </div>
        <div class="Email">
        <div class="grid_6">
          <h3>Email </h3>
          <p class="col1">Tham Gia Bằng Cách Đăng Kí Email<br>
            Để Nhận Nhiều Voucher Giảm Giá Và Ưu Đãi</p>
          <form id="newsletter" action="#">
            <div class="success">Your subscribe request has been sent!</div>
            <label class="email">
              <input type="email" value="Nhập Email" >
              <a href="#" class="btn_1" data-type="submit">subscribe</a> <span class="error">*This is not a valid email address.</span> </label>
          </form>
        </div>
      </div>
      </div>
      <style>
        .Email{
          transform: translate(15%,0%);
        }
        .btn_1{
          transform: translate(0%,0%);
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