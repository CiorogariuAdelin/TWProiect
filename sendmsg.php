<?php
	 require'dbh.inc.php';
	include'settings.php';
	 
if(isset($_POST['send']))
{
$result = mysqli_query($conn, "SELECT * FROM messages");
$user1=$_SESSION['username'];
$message=$_POST['message'];
$date = date('Y-m-d H:i:s');
$user2=$_POST['touser'];
	if(empty($message))
	{
		header("Location: chat.php");
	}
	else
	{$sql= "INSERT INTO messages (FromUser, ToUser, Message,Date,Status)
  VALUES ('$user1', '$user2', '$message','$date','unread')";

				$stmt=mysqli_stmt_init($conn);
				if ($conn->query($sql) === TRUE) {
               header("Location: chat.php?user2=$user2");
              
            }
        
            if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: chat.php?error=sqlerror");
		              exit();
                } 
		
		
	}	

    mysqli_close($conn);
}
else
{
	header("Location: chat.php");
	exit();
}
    ?>
