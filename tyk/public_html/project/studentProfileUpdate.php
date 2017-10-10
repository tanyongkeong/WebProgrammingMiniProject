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
		} else {
			$CONTACT = $_POST["CONTACT"];
			$EMAIL = $_POST["EMAIL"];

			$sql = "UPDATE `STUDENT` SET `EMAIL` = '$EMAIL', `CONTACT` = '$CONTACT' WHERE `ID` = '$ID';";
			$A = "Update was successful";
			$query = mysql_query( $sql );
			 if (!$query) die("SQL query error encountered: ".mysql_error() );

			mysql_close($conn);
			echo '<script language="javascript">';
			 echo 'alert("Update successfully. Your personal information is updated")';
			 echo '</script>';
			 echo "<h1>Redirecting to Your Profile Page</h1>";
    		echo '<script>setTimeout(function() { location.replace("profileStudent.php")},3000);</script>';
		}








	   ?>
	   <B> <?php echo $A ?></B>
	   <BR><BR>
	   <a href="profileStudent.php?id=<?php echo $ID; ?>">Click here to list the table</a>

	</BODY>
	</HTML>