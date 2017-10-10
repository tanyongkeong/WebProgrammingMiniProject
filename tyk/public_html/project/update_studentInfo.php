<HTML>
	<HEAD><TITLE>Update Student</TITLE></HEAD>
	<BODY>
	 
	  <?php	    
	     require_once ("config.php");
		 $ID = $_POST["ID"];
		 $A; 
		 if (isset($_POST['buttonDelete'])) {
			$sql = "DELETE FROM `STUDENT` WHERE `ID` = '$ID';";
			$A = "The Data has been deleted sucessfully";
			$query = mysql_query( $sql );			
			if (!$query) die("SQL query error encountered: ".mysql_error() );

			mysql_close($conn);
		} else if (isset($_POST['buttonEdit'])){
			$PASSWORD = $_POST["PASSWORD"];
			$NAME = $_POST["NAME"];
			$GENDER = $_POST["GENDER"];
			$CONTACT = $_POST["CONTACT"];
			$EMAIL = $_POST["EMAIL"];
			$MATRIC = $_POST["MATRIC"];
			$COURSE = $_POST["COURSE"];
			$CGPA = (float)$_POST["CGPA"];
			$STATUS = $_POST["STATUS"];
			$COORDINATORID = $_POST["COORDINATORID"];
			$COMPANYID = $_POST["COMPANYID"];
			
			if ($STATUS == 'Pending'){
				$STATUS  = 'P';
			}else if ($STATUS == 'Accepted'){
				$STATUS  = 'A';
			}else if ($STATUS == 'Rejected'){
				$STATUS  = 'R';
			}else if ($STATUS == 'Empty'){
				$STATUS  = 'E';
			}
			
			$sql = "UPDATE `STUDENT` SET `PASSWORD` = '$PASSWORD',`NAME` = '$NAME', `GENDER` = '$GENDER', `EMAIL` = '$EMAIL', `MATRIC` = '$MATRIC', `COURSE` = '$COURSE', `CGPA` = '$CGPA', `STATUS` = '$STATUS', `COORDINATORID` = '$COORDINATORID', `COMPANYID` = '$COMPANYID' WHERE `ID` = '$ID';";
			$A = "Update was successful";	
			$query = mysql_query( $sql );
			 if (!$query) die("SQL query error encountered: ".mysql_error() );

			mysql_close($conn);
		}else{
			session_start();
			$_SESSION["ADMIN"] = "YES";
			header("Location:profileStudent.php?id=".$ID);
			
		}
	 
	   ?>
	   <B> <?php echo $A ?></B>
	   <BR><BR>
	   <a href="adminPanel.php">Click here to list the table</a>

	</BODY>
	</HTML>