<?php
require'dbh.inc.php';
include 'settings.php';
$username=$_SESSION['username'];
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

$result = mysqli_query($conn, "SELECT * FROM users
    WHERE username = '$username'");

while ($row = mysqli_fetch_array($result))
{
if(isset($_FILES['profile-image'])){
	  $name = $_FILES['profile-image']['name'];
	  $path_parts = pathinfo($name);
		$dirname= $path_parts['dirname'];
		$basename= $path_parts['basename'];
		$extension= $path_parts['extension'];
		$imgData = addslashes(file_get_contents($_FILES['profile-image']['tmp_name']));
	 if($extension == 'jpg' or $extension =='png' or $extension =='jpeg')
	 {echo "succes";
	 			$sql="UPDATE users
				SET img = '$imgData'
					WHERE username = '$username';";

				$stmt=mysqli_stmt_init($conn);
				if ($conn->query($sql) === TRUE) {
                header("Location: chat.php?ImageUploaded");
              
            }
        
            if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: settings.php?error=sqlerror");
		              exit();
                }  
	 
	 }
	 else
	 {
		 header("Location: chat.php?error=WrongfileFormat");	
	 }
   }
   else{
	   header("Location: chat.php?error=sqlError");
   }
}
    mysqli_close($conn);
    ?>