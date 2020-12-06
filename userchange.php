<?php
     require'dbh.inc.php';
	 include'settings.php';
	 $newusername = $_POST['newusername'];
	 $currentpass = $_POST['ucpass'];
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

$result = mysqli_query($conn, "SELECT * FROM users
    WHERE username = '$username'");

while ($row = mysqli_fetch_array($result))
{		$pwdCheck=password_verify($currentpass,$row['UserPassword']);
		$checkuser = mysqli_query($conn,"SELECT * FROM users WHERE username='$newusername'");
	if(mysqli_num_rows($checkuser) > 0)
	{
		header("Location: settings.php?error=userExsists");
		exit();
	}		
       if(empty($newusername) || empty($currentpass))
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
				SET username = '$newusername'
					WHERE username = '$user';";
				$stmt=mysqli_stmt_init($conn);
				if ($conn->query($sql) === TRUE) {
            
                header("Location: chat.php?ChangedNameSuccessfuly");
              
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