<?php
     require'dbh.inc.php';
	 include'settings.php';
	 $newemail = $_POST['newemail'];
	 $currentpass = $_POST['ecpass'];
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

$result = mysqli_query($conn, "SELECT * FROM users
    WHERE username = '$username'");

while ($row = mysqli_fetch_array($result))
{		$pwdCheck=password_verify($currentpass,$row['UserPassword']);
		$checkuser = mysqli_query($conn,"SELECT * FROM users WHERE email='$newemail'");
	if(mysqli_num_rows($checkuser) > 0)
	{
		header("Location: settings.php?error=emailAlreadyUsed");
		exit();
	}		
       if(empty($newemail) || empty($currentpass))
	{
        header("Location: settings.php?error=emptyfields&uid");
		exit();
    }
	if($pwdCheck == false)
	{
		header("Location: settings.php?error=wrong_password");
		exit();
	}
	if (!filter_var($newemail, FILTER_VALIDATE_EMAIL)) {
	header("Location: settings.php?error=InvalidEmail");
		exit();
}
	else{
			$sql="UPDATE users
				SET email = '$newemail'
					WHERE username = '$user';";

				$stmt=mysqli_stmt_init($conn);
				if ($conn->query($sql) === TRUE) {
				$_SESSION['mail'] = $newemail;
                header("Location: chat.php?ChangedEmailSuccessfully");
              
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