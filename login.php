<!DOCTYPE html>

<?php
session_start();
?>
<html>
    <head>

        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="login.css">
       
    </head>
    <body>
    

<div class="container1">
    
   
     
   <?php
    if(isset($_SESSION['userId'])) {
        
        echo   
         '
         <form class="flog" action="logout.inc.php" method="post">
			
            <button type="submit"  name="logout-submit" class="logout" ></button>
		
		</form>
        
    '; }
    else {
        
        
        echo
    '
       
        <form class="flog" action="login.inc.php" method="post">
        <label for="mail">Username: </label>
        <input class="ilog rez1" type="text" id="mail"name="mailuid" placeholder="Username">
        <label for="mail">Password: </label>
        <input class="ilog rez1" type="password" id="pass" name="pwd" placeholder="Password">
        <button type="submit" name="login-submit" class="login">Login</button>
                    
    </form> 
    '; }
    
?> 
    
    
 
    </div>
