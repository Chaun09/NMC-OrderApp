


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/cards.css">
        <link rel="stylesheet" href="css/chatbot.css">
        <link rel="icon" type="image/png" href="../images/icon copy.png">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://jquery.carouFredSel/jquery-6.1.0-packed.js"></script>
        <script src="https://kit.fontawesome.com/8e94eefdff.js" crossorigin="anonymous"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <title>NMC Restaurant</title>
    </head>
   
    <body>
        <?php include("visitor-header.php");?>
       
        


        <div class="quiz-list-column" id="quiz-list-column"> 
        <div style="display:flex;">   
        <div class="search-bar">
                <form method="GET" action="" autocomplete="off">
                    <input id="search-input" name="search" type="text" placeholder="Search food here...">
                    <input id="real-submit" type="submit" hidden>
                    <button id="search-btn" type="submit" name="submit" value="Search"><i class="fas fa-search"></i></button>
                </form>
        </div>
        <h1 style="transform:translate(53%,-50%); text-align: center;">VIETNAMESE FOOD</h1>
        </div>
            <div class="quiz-box">
                <?php
                include("config.php");
                $sql = ("select * from products where country = 'vietnam'");
                $result = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($result))
                {
                ?>
                <a class="quiz-link">
                    
                    <div class="quiz-card">
                        
                        <img class="quiz-cover-pic" src="../images/<?php echo $row['Image']?>" alt="Quiz cover picture">
                        <p class="quiz-title" style="text-align:center; font-size:30px;"><?php echo $row['product_name']?></p>
                        <div class="quiz-tag">
                            <p class="quiz-subject"><?php echo $row['description']?></p>
                            <p class="quiz-question"><?php echo $row['price']?>VNĐ</p>
                            <p class="quiz-play"><?php echo $row['stock_quantity']?>STQ</p>
                        </div>
                    
                    </div>
               
                </a>
                <?php
                }
                ?>
            </div>
            
        </div>

        <div class="quiz-list-column" id="quiz-list-column">
        <div style="display:flex;">   
        <div class="search-bar">
                <form method="GET" action="" autocomplete="off">
                    <input id="search-input" name="search" type="text" placeholder="Search food here...">
                    <input id="real-submit" type="submit" hidden>
                    <button id="search-btn" type="submit" name="submit" value="Search"><i class="fas fa-search"></i></button>
                </form>
        </div>
        <h1 style="transform:translate(60%,-50%); text-align: center;">EUROPEAN FOOD</h1>
        </div>
            <div class="quiz-box">
                <?php
                include("config.php");
                $sql = ("select * from products where country = 'euro'");
                $result = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($result)){
                ?>
                <a class="quiz-link">
                    <div class="quiz-card">
                        <img class="quiz-cover-pic" src="../images/<?php echo $row['Image']?>" alt="Quiz cover picture">
                        <p class="quiz-title" style="text-align:center; font-size:30px;"><?php echo $row['product_name']?></p>
                        <div class="quiz-tag">
                            <p class="quiz-subject"><?php echo $row['description']?></p>
                            <p class="quiz-question"><?php echo $row['price']?>$</p>

                            <p class="quiz-play"><?php echo $row['stock_quantity']?>STQ</p>
                        </div>
                    </div>
                </a>
                <?php
                }
                ?>
            </div>
         
        </div>

       

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
        <?php include("visitor-footer.php");?>

        <script type="text/javascript">
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: 'chatbot.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
        </script>
    </body>
</html>