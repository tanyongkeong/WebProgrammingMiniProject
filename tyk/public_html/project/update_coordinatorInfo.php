<HTML>
	<HEAD><TITLE>Update Student</TITLE></HEAD>
	<BODY>
	 
	  <?php	    
	     require_once ("config.php");
		 $ID = $_POST["ID"];
		 $A; 
		 if (isset($_POST['buttonDelete'])) {
			$sql = "DELETE FROM `COORDINATOR` WHERE `ID` = '$ID';";
			$A = "The Data has been deleted sucessfully";
			$query = mysql_query( $sql );			
			if (!$query) die("SQL query error encountered: ".mysql_error() );

			mysql_close($conn);
		} else if (isset($_POST['buttonEdit'])){
			$PASSWORD = $_POST["PASSWORD"];
			$NAME = $_POST["NAME"];
			$DEPARTMENT = $_POST["DEPARTMENT"];
			$POSITION = $_POST["POSITION"];
			
			$sql = "UPDATE `COORDINATOR` SET `PASSWORD` = '$PASSWORD',`NAME` = '$NAME', `DEPARTMENT` = '$DEPARTMENT', `POSITION` = '$POSITION' WHERE `ID` = '$ID';";
			$A = "Update was successful";	
			$query = mysql_query( $sql );
			 if (!$query) die("SQL query error encountered: ".mysql_error() );

			mysql_close($conn);
		}else{
			session_start();
			$_SESSION["ADMIN"] = "YES";
			header("Location:profileCoordinator.php?id=".$ID);
			
		}

		
	     
	    
		 
	   ?>
	   <B> <?php echo $A ?></B>
	   <BR><BR>
	   <a href="adminPanel.php">Click here to list the table</a>

	</BODY>
	</HTML>