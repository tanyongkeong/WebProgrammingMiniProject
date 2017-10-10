<HTML>
	<HEAD><TITLE>Delete Student</TITLE></HEAD>
	<BODY>
	 
	  <?php	    
	     
	     
		 $ID = $_GET["id"];
		 
	     require_once ("config.php");

	     $sql = "DELETE FROM `STUDENT` WHERE `STUDENT`.`ID` = '$ID'";
		
	     $query = mysql_query( $sql );
		echo $query; 
	     if (!$query) die("SQL query error encountered: ".mysql_error() );

	     mysql_close($conn);
	   ?>
	   <B> Delete was successful</B>
	   <BR><BR>
	   <a href="listView.php">Click here to list the table</a>

	</BODY>
</HTML>