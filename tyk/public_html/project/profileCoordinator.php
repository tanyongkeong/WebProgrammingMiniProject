<html>
<head>
<title>Request Practical Training</title>
<link rel="stylesheet" type="text/css" href="applicationViewDesign.css">
<script  type='text/javascript' src='logoutJS.js'></script>
</head>
<body>

	<?php
		require_once ("config.php");
		session_start();
		$user_id  = $_SESSION['ID'];
		
		if($_SESSION['ADMIN'] == "YES" && $_SESSION['Login'] == "YES" && isset($_GET['id']) != null){
			$query = mysql_query("SELECT * FROM `COORDINATOR` WHERE `ID` = '".$_GET['id']."'");

			if (!$query) die("SQL query error encountered :".mysql_error() );
		}
		else if (isset($_SESSION['ID']) && $_SESSION['Login'] == "YES" && $_SESSION['ADMIN'] != "YES"){
			$query = mysql_query("SELECT * FROM `COORDINATOR` WHERE `ID` = '".$user_id."'");
			
			
			if (!$query) die("SQL query error encountered :".mysql_error() );
			
		}
		else{
			header('Location:restricts.php');
		}
		
		$rows = mysql_fetch_array($query);
		
	?>
	
	<div id="banner">
		<img id="logoUTM" class="bannerPic" src="pic//logoUTM.png" alt="UTM Logo"></img>
		<button id="logout"  class="bannerPic" onclick="logout()"> Logout</button>
	</div>
	
	<div id="student">
		<fieldset>
		<legend style="text-align:left">Coordinator Information</legend>
		<form action="coordinatorProfileUpdate.php" method="POST">
			<table border="1px solid">
				<tr>
					<th>Coordinator ID</th>
					<td colspan="5" id="studentName"><?php echo $rows['ID']; ?></td>
				</tr>
				<tr>
					<th width="10%">COORDINATOR Name</th>
					<td width="20%" id="studentName"><?php echo $rows['NAME']; ?></td>
				</tr>
				<tr>
					<th>Department</th>
					<td id="sContactNumber"><input type="text" name = "DEPARTMENT" value="<?php echo $rows['DEPARTMENT']; ?>"></input></td>
					<th>Position</th>
					<td id="ScontactEmail"><input type="text" name = "POSITION" value="<?php echo $rows['POSITION']; ?>"></input></td>
				</tr>
			</table>
			<input type="hidden" name = "ID" value= "<?php echo $rows['ID']; ?>"></input>
			<input type="submit" value="Update"></input>
	</form>
		</fieldset>
	</div>
	
	<div id="profileImg">
		<img src="pic//profile.png"></img>
	</div>
	
	<div style="text-align:center">
	<a href="listView.php?id=<?php echo $rows['ID']; ?>">
	<input type="button" value="List of Student"></input>
	</a>
	</div>
</body>
</html>