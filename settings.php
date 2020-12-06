<html>
<head>
<meta charset="UTF-8">	
<title>Inregistrare</title>
<link rel="stylesheet" type="text/css" href="chat.css">
  <link rel="stylesheet" type="text/css" href="settings.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <?php
        require("login.php");
    ?>
	<?php 	$user = $_SESSION['username'];
	$pw = $_SESSION['pass'];
	$mail= $_SESSION['mail'];
	$username = $_SESSION['username'];
	?>
    <body>
		<div id="usernamechange" class="userform">
			<form class="setform" autocomplete="off" action="userchange.php" method="post">
				<h1>Change username </h1>
				<h3> Enter your new username and current password </h3>
				<label>New Username </label>
				<input class="setimp" type="text" name="newusername"> <br>
				<label>Confirm Password </label>
				<input id="upwlabel" class="setimp1" type="password" name="ucpass"><i id="upw" class="fa fa-eye" style="font-size:24px;margin-left:-4%"></i><br>
				<button class="confirm" type="submit" name="userchange"> Confirm </button>
				<button id="cancelUser" class="cancel" type="button">Cancel </button>
				
			</form>
	
	
	</div>
	
			<div id="emailchange" class="userform">
			<form class="setform" autocomplete="off" action="emailchange.php" method="post">
				<h1>Change Email </h1>
				<h3> Enter your new email adress and current password </h3>
				<label>New Email</label>
				<input class="setimp" type="text" name="newemail"> <br>
				<label>Confirm Password </label>
				<input id="epwlabel" class="setimp1" type="password" name="ecpass"><i id="epw" class="fa fa-eye" style="font-size:24px;margin-left:-4%"></i><br>
				<button class="confirm" type="submit" name="emailchange"> Confirm </button>
				<button id="cancelMail" class="cancel" type="button">Cancel </button>
			</form>
	
	
	</div>
	
		</div>
	
			<div id="passwordchange" class="userform">
			<form class="setform" autocomplete="off" action="passwordchange.php" method="post">
				<h1>Change Password </h1>
				<label>New Password</label>
				<input id="ppwlabel1" class="setimp1" type="password" name="newpass"><i id="ppw1" class="fa fa-eye" style="font-size:24px;margin-left:-4%"></i><br>
				<label>Current Password </label>
				<input id="ppwlabel2" class="setimp1" type="password" name="pcpass"><i id="ppw2" class="fa fa-eye" style="font-size:24px;margin-left:-4%"></i><br>
				<button class="confirm" type="submit" name="passwordchange"> Confirm </button>
				<button id="CancelPass" class="cancel" type="button">Cancel </button>
			</form>
	
	
	</div>
	<div class="setcont"> 
	<div class="setlabel"> <label class="l1"> Username </label> <br> <div class="lab"> <?php echo $username ?></div> <div id="UserShow" class="setedit"><p>Edit</div> </div>
	<div class="setlabel"> <label class="l1"> Email </label> <br>  <div class="lab"> <?php echo $mail ?> </div>  <div id="MailEdit"class="setedit"><p>Edit</div></div>
	<div id="ChangePW" class="cpw"><br>Change Password </div>
	<a class="settingslink" href="chat.php"><div class="CancelSettings"><br>Cancel </div></a>
	
	</div>

     <script src="scripts/cancel.js"> </script>    
    </body>
</html>