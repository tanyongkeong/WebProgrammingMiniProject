<HTML>
	<HEAD><TITLE>Update Company</TITLE></HEAD>
	<BODY>
	 
	  <?php	    
	     require_once ("config.php");
		 $ID = $_POST["ID"];
		 $A; 
		 if (isset($_POST['buttonDelete'])) {
			$sql = "DELETE FROM `APPLICATION` WHERE `ID` = '$ID';";
			$A = "The Data has been deleted sucessfully";
			echo "DELETE FROM `APPLICATION` WHERE `ID` = '$ID';";
			$query = mysql_query( $sql );			
			if (!$query) die("SQL query error encountered: ".mysql_error() );

			mysql_close($conn);
		} else {
			$NAME = $_POST["CONTACTNAME"];
			$COMPANY = $_POST["COMPANY"];
			$ADDRESS = $_POST["ADDRESS"];
			$CONTACT = $_POST["CONTACT"];
			$EMAIL = $_POST["EMAIL"];
			$JOBAVAILABLE = $_POST["JOBAVAILABLE"];
			$JOBTITLE = $_POST["JOBTITLE"];
			
			$sql = "UPDATE `APPLICATION` SET `CONTACTNAME` = '$CONTACTNAME', `COMPANY` = '$COMPANY', `ADDRESS` = '$ADDRESS', `CONTACT` = '$CONTACT', `EMAIL` = '$EMAIL', `JOBAVAILABLE` = '$JOBAVAILABLE', `JOBTITLE` = '$JOBTITLE' WHERE `ID` = '$ID';";
			$A = "Update was successful";	
			$query = mysql_query( $sql );
			 if (!$query) die("SQL query error encountered: ".mysql_error() );

			mysql_close($conn);
		}


		

	     

	    
		 
	   ?>
	   <B> <?php echo $A ?></B>
	   <BR><BR>
	   <a href="adminPanel.php">Click here to list the table</a>

	</BODY>
	</HTML>