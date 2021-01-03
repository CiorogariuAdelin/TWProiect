<?php
$conn=mysqli_connect($servername,$username,$password,$name);
if(isset($_POST['login-submit']))
{
	require'dbh.inc.php';
	
	$mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];
	
	if(empty($mailuid) || empty($password))
	{
		header("Location: signup.php?error=Emptyfields");
		exit();	
	}
	
	else
	{
		$sql = "select * from users where username=? or email=?;";
		
        $stmt=mysqli_stmt_init($conn);
		
        if(!mysqli_stmt_prepare($stmt,$sql))
		{
			header("Location: signup.php?error=sqlError");
		exit();
		}
		
		else
		{
			mysqli_stmt_bind_param($stmt,"ss",$mailuid,$password);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result))
			{
				$pwdCheck=password_verify($password,$row['UserPassword']);
				
				if($pwdCheck == false)
				{
					header("Location: signup.php?error=wrong_password");
						exit();
				}
				
				else if($pwdCheck == true)
				{
					session_start();
					$_SESSION['userId']=$row['id'];
					$_SESSION['username']=$row['username'];
					$_SESSION['pass']=$row['UserPassword'];
					$_SESSION['mail']=$row['email'];
					
					header("Location: chat.php?login=succes");
					exit();
				}
				else
				{
					header("Location: signup.php?error=error_password");
					exit();
				}
			}
			
			else
			
			{
				header("Location: signup.php?error=no_user");
				exit();
			}
		}
	}
}

else
{
	header("Location: signup.php");
	exit();
}