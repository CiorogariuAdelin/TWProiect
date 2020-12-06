<html>
<head>
<meta charset="UTF-8">	
<title>Inregistrare</title>
<link rel="stylesheet" type="text/css" href="signup.css">

</head>

<body>
<?php require("login.php") ?>


<div class="a">
 <h1><span>Nu sunteti logat! Pentru a incepe o conversatie trebuie sa va logati.</span><span>Nu aveti inca un cont?</span><span>Inregistrati-va !</span></h1>
</div>
<div class="sign">
<div class="wrap">
 
    <h2>INREGISTRARE</h2>
<!--
<?php
	if(isset($_GET['error'])){
		
		if(($_GET['error'])=="emptyfields")
			
			{
				echo '<p class= "signuperror">Toate campurile sunt obligatorii! Va rugam completati toate spatiile. </p>';
			}
		
		else if(($_GET['error'])=='invalidmail')
			{
			
				echo '<p class="signuperror">Adresa de e-mail este invalida!</p>';
			}
		
		else if(($_GET['error'])=='usertaken')
			{
			
				echo '<p class="signuperror">Numele de utilizator nu este disponibil!</p>';
			}
		
		else if(($_GET['error'])=='passwordcheck')
			{
			
				echo '<p class="signuperror">Cele doua parole nu coincid!</p>';
			}
		
		else if(($_GET['error'])=='succes')
			{
			
				echo '<p class="signuperror">Inregistrarea a avut succes. Va multumim!</p>';
			}
		
		
	}
?> -->
<section>
<form action="signup.inc.php" method="post">

			<input class="res isign" type="text" name="uid" placeholder="Username">
			
			<input class="res isign" type="text" name="mail" placeholder="E-mail">	
			<input class="res isign" type="password" name="pwd" placeholder="Password">	
		
			<input class="res isign" type="password" name="pwd-repeat" placeholder="Repeat password">
					
			<button type="submit" name="signup-submit">Submit</button>	
		</form>
	</section>
    </div>
	   </div>

    </body>
	
	<?php require("footer.html");?>
</html>