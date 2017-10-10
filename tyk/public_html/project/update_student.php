<HTML>
	<HEAD><TITLE>Update Student</TITLE></HEAD>
	<BODY>

	  <?php

	     $ID = $_POST["hiddenID"];
	     $companyID = $_POST["hiddenCID"];
	     $availble = $_POST["hiddenAvailable"];
		 $response = $_POST["result"];

	     require_once ("config.php");

		 if ($response == "accept"){
			$availble = ((int)$availble - 1);
			$sql = "UPDATE `STUDENT` SET `STATUS` = 'A' WHERE `ID` = '$ID';";
			$sql2 = "UPDATE `APPLICATION` SET `JOBAVAILABLE` = $availble WHERE `ID` = '$companyID';" ;
			$query = mysql_query( $sql2 );

			if (!$query) die("SQL query error encountered: ".mysql_error() );
		 }else{
			$sql = "UPDATE `STUDENT` SET `STATUS` = 'R' WHERE `ID` = '$ID';";
		 }

	     $query = mysql_query( $sql );

	     if (!$query) die("SQL query error encountered: ".mysql_error() );

	     mysql_close($conn);
	   ?>

	   <B> Update was successful</B>
	   <BR><BR>
	   <a href="listView.php">Click here to list the table</a>

	</BODY>
	</HTML>