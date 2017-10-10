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
		} else {
			$DEPARTMENT = $_POST["DEPARTMENT"];
			$POSITION = $_POST["POSITION"];

			$sql = "UPDATE `COORDINATOR` SET `DEPARTMENT` = '$DEPARTMENT', `POSITION` = '$POSITION' WHERE `ID` = '$ID';";
			$A = "Update was successful";
			$query = mysql_query( $sql );
			 if (!$query) die("SQL query error encountered: ".mysql_error() );

			mysql_close($conn);
			echo '<script language="javascript">';
			 echo 'alert("Update successfully. Your personal information is updated")';
			 echo '</script>';
			 echo "<h1>Redirecting to Your Profile Page</h1>";
    		echo '<script>setTimeout(function() { location.replace("profileCoordinator.php")},3000);</script>';
		}


	   ?>
	   <B> <?php echo $A ?></B>
	   <BR><BR>
	   <a href="profileCoordinator.php?id=<?php echo $ID; ?>">Click here to list the table</a>

	</BODY>
	</HTML>