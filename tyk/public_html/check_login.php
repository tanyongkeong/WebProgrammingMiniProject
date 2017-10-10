<?php
    // Start up your PHP Session
    session_start();

    require_once('config.php');

    // username and password sent from form
    $myusername=$_POST['username'];
    $mypassword=$_POST['password'];



    $sql="SELECT * FROM ADMIN WHERE id='$myusername' and password='$mypassword'";

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


    }
    //if not found
    else if ($count == 0){

        $sql="SELECT * FROM STUDENT WHERE id='$myusername' and password='$mypassword'";
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

            $sql="SELECT * FROM COORDINATOR WHERE id='$myusername' and password='$mypassword'";
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
            //wrong username and password
            }else {
                $_SESSION["Login"] = "NO";

                echo "<script type=\"text/javascript\">window.alert('Please enter correct username and password');
                window.location.href = '/~tyk/index.php';</script>";
                exit;
            }

        }
    }


?>



