<?php

require'dbh.inc.php';
$conn=mysqli_connect($servername,$username,$password,$name);
session_start();

    if(!isset($_SESSION['userId']))
    {
        header('location:signup.php');
    }
    
    $id = $_SESSION['userId'];
    
    $query = "SELECT * FROM users WHERE id= " .$id;
    
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
    }


?>

<?php

require'dbh.inc.php';
$conn=mysqli_connect($servername,$username,$password,$name);

    $query = "SELECT * FROM avatar WHERE id=1";
    
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $avatar = $row['img'];
		
    }


?>

<html>
<head>
<meta charset="UTF-8">	
<title>MyChat</title>
 <link rel="stylesheet" type="text/css" href="chat.css">
 <link rel="stylesheet" type="text/css" href="settings.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
    
    <body>
       
        <div id="wrapper">
            <div id="left_pannel">
                
                <div id="user_info" style="padding: 10px;">
                     
                    
                    <?php 
                            $query = "SELECT * FROM users WHERE id= " .$id;
    
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){
                               $row = mysqli_fetch_assoc($result);
                            }
                                
                            if($row['img'] != NULL){
                                
                                   
                                   echo  '<img class ="profile_pic" src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'"/>';
                                 //echo  '<img class ="profile_pic" src="uploads/jpeg;base64,'.base64_encode($row['img']).'"/>';
                                
        
                                }
                                
                               else 
                               {
                                   
                                    $query2 = "SELECT * FROM avatar WHERE id=1";

                                    $result2 = mysqli_query($conn, $query2);

                                    if(mysqli_num_rows($result2) > 0){

                                       $row2 = mysqli_fetch_assoc($result2);
                                    
                                     echo 
                                        
                                        '<img class ="profile_pic" src="data:image/jpeg;base64,'.base64_encode($row2['img'] ).'"/>';
                                    
                                   
                               }
                            }
                            
                                    echo 
                                       "<a href='?profile=open' class='profiles'>Select_Image</a>";
                    ?>
                    
                    <?php
                    
                    if(isset($_GET['profile']))
                    {
                         if($_GET['profile'] == 'close')
                         {
                             echo "
                             
                                <style>
                                 .profile-image-upload-div
                                 {
                                    display:none;
                                 }
                                </style>
                             ";
                         }
                        
                        else 
                        {
                             echo "
                             
                                <style>
                                 .profile-image-upload-div
                                 {
                                    display:flex;
                                 }
                                </style>
                             ";
                        }
                    }
                    ?>
                    
                   <div class="profile-image-upload-div">
                       
                       <a id="cls" href="?profile=close">Close</a>
                       
                       <form action="uploadprofile.php" method="post" enctype="multipart/form-data" id="profile-form" >
                           
                           <h2>Upload Profile Picture</h2>
                           <input type="file" name="profile-image" required id="input-file"/>
                           <input type="submit" name="submit-profile" form="profile-form" id="input-file">
                       
                       </form>
                   </div>
                    
                    
                    <br>
                    <br>
                    <span id="username">Hi, <?php echo $_SESSION['username']; ?></span>
                    <br>
                    
                    <span id="email" style="font-size: 12px; opacity: 0.5"><?php echo $email; ?></span>
                <br>
                <br>
                <br>
                    
                <div>
                  
                    <label id="label_chat" for="radio_chat">Chat<img class= "label_chat" src="imagini/chat.png"></label>
                                        <script>
						document.getElementById("label_chat").addEventListener("click", function(){
					document.getElementById("cmsg").style.display = "block";
					document.getElementById("settings").style.display = "none";
				document.getElementById("right_pannel").style.display = "block";
						});
					</script>
                    <label id="label_contacts" for="radio_contacts">Contacts<img class= "label_chat" src="imagini/contacts.png"></label>
                                        <script>
						document.getElementById("label_contacts").addEventListener("click", function(){
					document.getElementById("cmsg").style.display = "none";
					document.getElementById("settings").style.display = "none";
					document.getElementById("right_pannel").style.display = "block";
						});
					</script>
                    <label  id="label_settings" for="radio_settings" >Settings<img class= "label_chat" src="imagini/settings.png"></label>
                                        <script>
						document.getElementById("label_settings").addEventListener("click", function(){
					document.getElementById("settings").style.display = "block";
					document.getElementById("right_pannel").style.display = "none";
						});
					</script>
                    <label id="log_out" for="radio_contacts" ><a id="a1" href = "logout.inc.php">Log Out</a><img class= "label_chat" src="imagini/contacts.png" ></label>
                   
                </div>
                </div>
            </div>
            
            <div id="right_pannel">
                <div id="header">My Chat</div>
                    <div id="container">
                        
                        <div id="inner_left_pannel">
								
								<?php 
								  function readmessage() {
									
								$servername= "localhost";
								$username="root";
								$password="";
								$name="tw";


										$conn=mysqli_connect($servername,$username,$password,$name);

											if(!$conn)
												{
										die("Connection failed: ".mysqli_connect_error());
										}

									  $user2 = $_GET['user2'];
									  $username=$_SESSION['username'];
									$read = mysqli_query($conn, "SELECT * FROM messages
									WHERE ToUser = '$username'");

									while ($row3 = mysqli_fetch_array($read))
											{	
														$sql="UPDATE messages
															SET Status = 'read'
																WHERE FromUser = '$user2';";

														$stmt=mysqli_stmt_init($conn);
														if ($conn->query($sql) === TRUE) {
														
              
            }
        
							if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    echo"fail";
		              exit();
                } 
											}
										}

									if (isset($_GET['user2'])) {
										readmessage();
										}
								$result = mysqli_query($conn, "SELECT * FROM users");
								$message =	 mysqli_query($conn, "SELECT FromUser,Status FROM messages");
								$class='contact';
								while ($row = mysqli_fetch_array($result))
								{	$class='contact';	
										$sql = "SELECT  * FROM messages";
										$rez = $conn->query($sql);

											if ($rez->num_rows > 0) {
										
													while($row2 = $rez->fetch_assoc()) {
													if(($row['username']==$row2['FromUser'])and ($row2['Status']=='unread'))
														$class='contactunread';
												}
														} else {
															
																			}
										if(($row['username'] != $_SESSION['username'])and ($row['img']!=NULL))
										echo ' <a class="userlink" href="chat.php?user2='.$row['username'].'"> 
										<div id="big">
										 <div id="'.$class.'">
										<img class ="userprofile"  src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'"/>
										<br> '.$row['username'].'
										</div>
										</div></a> 
										';
										else if(($row['username'] != $_SESSION['username'])and ($row['img']==NULL))
																				echo ' <a class="userlink" href="chat.php?user2='.$row['username'].'"> 
										<div id="big">
										 <div id="'.$class.'">
										<img class ="userprofile"  src="data:image/jpeg;base64,'.base64_encode($avatar ).'"/>
										<br> '.$row['username'].'
										</div>
										</div></a> 
										';
											

								}
								?>
								

                        </div>
                        
                            <input type="radio" id="radio_chat" name="myradio" style="display: none;">
                            <input type="radio" id="radio_contacts" name="myradio" style="display: none;">
                            <input type="radio" id="radio_settings" name="myradio" style="display: none;">
                        
                       
                        
                        <div id="inner_right_pannel">
						
						<form id="cmsg" action="sendmsg.php" method="post">

								<div id="recieve" style="background-color:white;color:black">
								
								 <?php 
								$result = mysqli_query($conn, "SELECT messages.FromUser,messages.ToUser,messages.Message,messages.Date,messages.Status,users.username,users.img FROM messages,users ORDER BY Date ASC");
								if(isset($_GET['user2']))
								{while ($row = mysqli_fetch_array($result))
								{	if($row['username']==$_SESSION['username'])
									{
										if($row['img']!=NULL)
										$You=$row['img'];
										else
										{
											$You=$avatar;
										}
										
									}
									if($row['username']==$_GET['user2'])
									{  if($row['img']!=NULL)
										$other=$row['img'];
										else
										{
											$other=$avatar;
										}
									}
									if(($row['username'] == $_SESSION['username'])and ($_SESSION['username']==$row['FromUser'])and($_GET['user2']==$row['ToUser']))
									{
										echo '<div class="chatmsgSend"> 
										<div class="content"><p class="textR">'.$row['Message'].'</div>
										<img class="chatimgS"  src="data:image/jpeg;base64,'.base64_encode($You).'"/>
										</div><br><br><br>';
									}
									else if(($row['username'] == $row['ToUser'])and ($_GET['user2']==$row['FromUser']))
									{
										echo '<div class="chatmsgREC"> 
										<div class="contentr"><p class="textR">'.$row['Message'].'</div>
										<img class="chatimgR"  src="data:image/jpeg;base64,'.base64_encode($other).'"/>
										</div><br><br><br>';
									}
								
								}
								}?>
								
								</div>
								<script> var scrollbot = document.getElementById('recieve');  
									scrollbot.scrollTop = scrollbot.scrollHeight;</script>
								<br>
								<input type="text" id="send" autocomplete="off"name="message"><br><br>
								<input type="submit" class="send" name="send" autocomplete="off" value="Send">
								<input type="text"name="touser" value="<?php 
								if(isset($_GET['user2']))
								{
									echo $_GET['user2'];
								}?>" style='display:none;'></input>
							</form>
                        </div>
                    </div>

                </div>
				<div id="settings">
				<div id="header">My Chat</div>
				<?php 	$user = $_SESSION['username'];
	$pw = $_SESSION['pass'];
	$mail= $_SESSION['mail'];
	$username = $_SESSION['username'];
	?>
<div id="usernamechange" class="userform">
			<form class="setform" autocomplete="off" action="userchange.php" method="post">
				<h1>Change username </h1>
                <label><p id ="lb2">New Username </p></label>
				<input class="setimp" type="text" name="newusername"> <br>
                <label><p id ="lb2">Confirm Password </p></label>
				<input id="upwlabel" class="setimp1" type="password" name="ucpass"><i id="upw" class="fa fa-eye" style="font-size:24px;margin-left:-5%"></i><br>
				<button class="confirm" type="submit" name="userchange"> Confirm </button>
				<button id="cancelUser" class="cancel" type="button">Cancel </button>
				
			</form>
	
	
	</div>
	
			<div id="emailchange" class="userform">
			<form class="setform" autocomplete="off" action="emailchange.php" method="post">
				<h1>Change Email </h1>
                <label><p id ="lb2">New Email</p></label>
				<input class="setimp" type="text" name="newemail"> <br>
                <label><p id ="lb2">Confirm Password </p></label>
				<input id="epwlabel" class="setimp1" type="password" name="ecpass"><i id="epw" class="fa fa-eye" style="font-size:24px;margin-left:-5%"></i><br>
				<button class="confirm" type="submit" name="emailchange"> Confirm </button>
				<button id="cancelMail" class="cancel" type="button">Cancel </button>
			</form>
	
	
	</div>
	
	
	
			<div id="passwordchange" class="userform">
			<form class="setform" autocomplete="off" action="passwordchange.php" method="post">
				<h1>Change Password </h1>
                <label><p id ="lb2">New Password</p></label>
				<input id="ppwlabel1" class="setimp1" type="password" name="newpass"><i id="ppw1" class="fa fa-eye" style="font-size:24px;margin-left:-5%"></i><br>
                <label><p id ="lb2">Current Password </p></label>
				<input id="ppwlabel2" class="setimp1" type="password" name="pcpass"><i id="ppw2" class="fa fa-eye" style="font-size:24px;margin-left:-5%"></i><br>
				<button class="confirm" type="submit" name="passwordchange"> Confirm </button>
				<button id="CancelPass" class="cancel" type="button">Cancel </button>
			</form>
	
	
	</div>
	<div class="setcont"> 
        <div class="setlabel"> <label class="l1"> Username : </label> <br> <div class="lab"> <?php echo $username ?></div> <div id="UserShow" class="setedit"><p id= "ch">Change</p></div> </div>
        <div class="setlabel"> <label class="l1"> Email : </label> <br>  <div class="lab"> <?php echo $mail ?> </div>  <div id="MailEdit"class="setedit"><p id ="ch">Change</p></div></div>
        <div id="ChangePW" class="cpw"><p id="change"><p id="ch">Change Password </p></div>
	<a class="settingslink" href="chat.php"><div class="CancelSettings"><br></div></a>
	
	</div>

     <script src="scripts/cancel.js"> </script>    


					
				</div>
            </div>
	<div class="block">
	&nbsp;
	</div>
    </body>
    
  
    <footer>
        <?php
            require('footer.html');
        ?>
    </footer>
</html>


<script type="text/javascript">

    
</script>