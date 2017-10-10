<?php 
    require_once('config.php');
	
    // username and password sent from form
    $department=$_POST['department'];
    $coordinator=$_POST['coordinator'];
    $company=$_POST['company'];
    $desiredJob=$_POST['jobTitle'];
    session_start();
    $userID  = $_SESSION['ID'];
    $sql = "UPDATE STUDENT SET STATUS = 'P', COORDINATORID = '$coordinator', COMPANYID = '$company' WHERE ID = '$userID'";
    $query = mysql_query( $sql );
    
	if (!$query) die("SQL query error encountered: ".mysql_error() );

	mysql_close($conn);   
    echo '<script language="javascript">';
    echo 'alert("Submit successfully. Your application is now being approved")';
    echo '</script>';
    echo "<h1>Redirecting to Your Profile Page</h1>";
    echo '<script>setTimeout(function() { location.replace("profileStudent.php")},3000);</script>'
?>
		 
	  
 


