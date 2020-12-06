
<html>
<head>
<meta charset="UTF-8">	
<title>MyChat</title>
<link rel="stylesheet" type="text/css" href="chat.css">

</head>
	<?php include'login.php';?>
	&nbsp;
    <?php 
	$mail= $_SESSION['mail'];
	$username = $_SESSION['username'];?>
    <body>
     
        <div id="wrapper">
            <div id="left_pannel">
                
                <div style="padding: 10px;">
                    <img class="profile_pic" src="imagini/bkk.jpg">
                    <br>
                    <p><?php echo $username; ?></p>
                    
                    <span style="font-size: 12px; opacity: 0.5"><?php echo $mail; ?></span>
                <br>
                <br>
                <br>
                <div >
                    <label id="label_chat" for="radio_chat">Chat<img class= "label_chat" src="imagini/chat.png"></label>
                    
                    <label id="label_contacts" for="radio_contacts">Contacts<img class= "label_chat" src="imagini/contacts.png"></label>
                    
                    <label id="label_settings" for="radio_settings"><a href="settings.php">Settings</a><img class= "label_chat" src="imagini/settings.png"></label>
                </div>
                </div>
            </div>
            
            <div id="right_pannel">
                <div id="header">My Chat</div>
                    <div id="container">
                        
                        <div id="inner_left_pannel">
                           
                        </div>
                        
                            <input type="radio" id="radio_chat" name="myradio" style="display: none;">
                            <input type="radio" id="radio_contacts" name="myradio" style="display: none;">
                            <input type="radio" id="radio_settings" name="myradio" style="display: none;">
                        
                       
                        
                        <div id="inner_right_pannel">
						
                        </div>
                    </div>
                </div>
            </div>

    </body>
    
    
    <footer>
        <?php
            require('footer.html');
        ?>
    </footer>
</html>