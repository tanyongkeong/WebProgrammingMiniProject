<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/LoginCSS.css" rel="stylesheet">
</head>

<body>

    <?php
    	session_start();
		require_once('config.php');
        if (isset($_COOKIE['USER']) ){
            $myusername=$_COOKIE['USER'];
            $sql="SELECT * FROM ADMIN WHERE id='$myusername'";
            $result=mysql_query($sql);
			$rows=mysql_fetch_array($result);
			$user_name=$rows['NAME'];
			$user_id=$rows['ID'];
			$user_level=$rows['LEVEL'];


			// mysql_num_row is counting table row
			$count=mysql_num_rows($result);
			// If result matched $myusername and $mypassword, table row must be 1 row

			if($count==1){

				$_SESSION["Login"] = "YES";
				$user_name=$rows['NAME'];
				$user_id=$rows['ID'];
				$user_level=$rows['LEVEL'];
				// Add user information to the session (global session variables)
				$_SESSION['USER'] = $user_name;
				$_SESSION['ID'] = $user_id;
				$_SESSION['LEVEL'] =$user_level;

				$cookie_user = $myusername;
				setcookie("USER", $cookie_user, time()+(86400 * 30) , '/' );

				header("Location:project/adminPanel.php?id='$myusername'");


			}else if ($count == 0){

				$sql="SELECT * FROM STUDENT WHERE id='$myusername'";
				$result=mysql_query($sql);
				$rows=mysql_fetch_array($result);
				$count=mysql_num_rows($result);
				if($count==1){
					$user_name=$rows['NAME'];
					$user_id=$rows['ID'];
					$user_level=$rows['LEVEL'];
					$_SESSION["Login"] = "YES";

					// Add user information to the session (global session variables)
					$_SESSION['USER'] = $user_name;
					$_SESSION['ID'] = $user_id;
					$_SESSION['LEVEL'] =$user_level;

					/*echo "<h1>You are now correctly logged in</h1>";
					echo "<p><a href='document.php'>Proceed to site</a></p>";
					echo "student";*/
					//echo $_SESSION['ID'];
					$cookie_user = $myusername;
					setcookie("USER", $cookie_user, time()+(86400 * 30) , '/' );
					header("Location:project/profileStudent.php");

				//if not found
				}else if ($count == 0){

					$sql="SELECT * FROM COORDINATOR WHERE id='$myusername'";
					$result=mysql_query($sql);
					$rows=mysql_fetch_array($result);
					$count=mysql_num_rows($result);
					if($count==1){
						$user_name=$rows['NAME'];
						$user_id=$rows['ID'];
						$user_level=$rows['LEVEL'];
						$_SESSION["Login"] = "YES";

						// Add user information to the session (global session variables)
						$_SESSION['USER'] = $user_name;
						$_SESSION['ID'] = $user_id;
						$_SESSION['LEVEL'] =$user_level;
						$cookie_user = $myusername;
						setcookie("USER", $cookie_user, time()+(86400 * 30) , '/' );

						header("Location:project/profileCoordinator.php?id='$myusername'");
					}else {
						echo
							'
							<div class="containmain" style="display: block;">
								<div class="profile">
								</div><br>
								<h1> STUDENT PRACTICAL TRAINING MANAGEMENT SYSTEM</h1>
								<div class="center">
									<form class="form" method="POST" action="check_login.php" autocomplete="on">
										<input id="username"type="text" class="topform" placeholder="Username" name="username"><br>
										<input id="password" type="password" class="bottomform" placeholder="Password" name="password"><br>
										<input type="submit" value="LOGIN">
									</form>
								</div>
							</div>
							';
					}

				}
			}

        }else{
            echo
            '

            <div class="containmain" style="display: block;">
                <div class="profile">
                </div><br>
                <h1> STUDENT PRACTICAL TRAINING MANAGEMENT SYSTEM</h1>
                <div class="center">
                    <form class="form" method="POST" action="check_login.php" autocomplete="on">
                        <input id="username"type="text" class="topform" placeholder="Username" name="username"><br>
                        <input id="password" type="password" class="bottomform" placeholder="Password" name="password"><br>
                        <input type="submit" value="LOGIN">
                    </form>
                </div>
            </div>
            ';
        }

    ?>

</body>

</html>