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
		header("Location: chat.php?error=userExsists");
		exit();
	}		
       if(empty($newusername) || empty($currentpass))
	{
        header("Location: chat.php?error=emptyfields&uid");
		exit();
    }
	if($pwdCheck == false)
	{
		header("Location: chat.php?error=wrong_password");
		exit();
	}
	
	else{
											$read = mysqli_query($conn, "SELECT * FROM messages
									");

									while ($row3 = mysqli_fetch_array($read))
											{	
														$sql2="UPDATE messages
															SET FromUser = '$newusername'
																WHERE FromUser = '$user';";
														$sql3="UPDATE messages
															SET ToUser = '$newusername'
																WHERE ToUser = '$user';";
														$stmt2=mysqli_stmt_init($conn);
														if ($conn->query($sql2) === TRUE) {
														
              
            }
        
							if(!mysqli_stmt_prepare($stmt2,$sql2))
                {
                    echo"fail";

                } 
												$stmt3=mysqli_stmt_init($conn);
														if ($conn->query($sql3) === TRUE) {
														
              
            }
        
							if(!mysqli_stmt_prepare($stmt3,$sql3))
                {
                    echo"fail";

                } 
				

											}
											
											
										}
		
		
			$sql="UPDATE users
				SET username = '$newusername'
					WHERE username = '$user';";
					
				$stmt=mysqli_stmt_init($conn);
				if ($conn->query($sql) === TRUE) {
				$_SESSION['username'] = $newusername;
                header("Location: chat.php?ChangedNameSuccessfuly");
              
            }
        
            if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: chat.php?error=sqlerror");
		              exit();
                }     
	}

    mysqli_close($conn);
    ?>