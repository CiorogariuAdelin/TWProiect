<?php
     require'dbh.inc.php';
	 include'settings.php';
	 $newpass = $_POST['newpass'];
	 $currentpass = $_POST['pcpass'];
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

$result = mysqli_query($conn, "SELECT * FROM users
    WHERE username = '$username'");

while ($row = mysqli_fetch_array($result))
{		$pwdCheck=password_verify($currentpass,$row['UserPassword']);
		$newhashpw=password_hash($newpass,PASSWORD_DEFAULT);
       if(empty($newpass) || empty($currentpass))
	{
        header("Location: settings.php?error=emptyfields&uid");
		exit();
    }
	if($pwdCheck == false)
	{
		header("Location: settings.php?error=wrong_password");
		exit();
	}
	
	else{
			$sql="UPDATE users
				SET UserPassword = '$newhashpw'
					WHERE username = '$user';";
				$stmt=mysqli_stmt_init($conn);
				if ($conn->query($sql) === TRUE) {
				$_SESSION['pass'] = $newhashpw;
                header("Location: chat.php?ChangedPasswordSuccessfuly");
              
            }
        
            if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: settings.php?error=sqlerror");
		              exit();
                }     
	}
}
    mysqli_close($conn);
    ?>