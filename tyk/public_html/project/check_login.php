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
    $user_name=$rows['ID'];
    $user_id=$rows['PASSWORD'];
    $user_level=$rows['LEVEL'];

        
    // mysql_num_row is counting table row
    $count=mysql_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row
    
    if($count==1){
            
        $_SESSION["Login"] = "YES";
        
        // Add user information to the session (global session variables)
        $_SESSION['USER'] = $user_name;
        $_SESSION['ID'] = $user_id;
        $_SESSION['LEVEL'] =$user_level;
        
        $cookie_user = $myusername;
        setcookie("USER", $cookie_user, time()+(86400 * 30) , '/' );
        
        echo "<h1>You are now correctly logged in</h1>";
        echo "<p><a href='document.php'>Proceed to site</a></p>";
        echo "admin";
        

    }
    //if not found
    else if ($count == 0){
        $sql="SELECT * FROM `STUDENT` WHERE `ID`='$myusername' and `PASSWORD`='$mypassword'";
        $result=mysql_query($sql);
        $rows=mysql_fetch_array($result);
        $count=mysql_num_rows($result);
        if($count==1){
            
            $_SESSION["Login"] = "YES";
            
            // Add user information to the session (global session variables)
            $_SESSION['USER'] = $user_name;
            $_SESSION['ID'] = $user_id;
            $_SESSION['LEVEL'] =$user_level;

            /*echo "<h1>You are now correctly logged in</h1>";
            echo "<p><a href='document.php'>Proceed to site</a></p>";
            echo "student";*/
			header("Location:profileStudent.php?id='$myusername'");
        
        //if not found
        }else if ($count == 0){
            $sql="SELECT * FROM `COORDINATOR` WHERE `ID`='$myusername' and `PASSWORD`='$mypassword'";
            $result=mysql_query($sql);
            $rows=mysql_fetch_array($result);
            $count=mysql_num_rows($result);
            if($count==1){
                
                $_SESSION["Login"] = "YES";
                
                // Add user information to the session (global session variables)
                $_SESSION['USER'] = $user_name;
                $_SESSION['ID'] = $user_id;
                $_SESSION['LEVEL'] =$user_level;
  

                echo "<h1>You are now correctly logged in</h1>";
                echo "<p><a href='document.php'>Proceed to site</a></p>";
                echo "coordinator";
            //wrong username and password
            }else {
                $_SESSION["Login"] = "NO";
        
                echo "<script type=\"text/javascript\">window.alert('Please enter correct username and password');
                window.location.href = '/~tyk/project';</script>"; 
                exit;
            }
            
        }
    }
        

?>
		 
	  
 
