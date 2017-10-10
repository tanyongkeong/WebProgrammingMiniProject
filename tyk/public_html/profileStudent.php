<html>
<head>
<title>Request Practical Training</title>
<link rel="stylesheet" type="text/css" href="applicationViewDesign.css">
</head>
<body>

	<?php
		require_once ("config.php");
		<?
		    session_start();
			$id  = $_SESSION['ID'];

		if (!isset($_SESSION['ID'])){
			$query = mysql_query("SELECT * FROM `STUDENT` WHERE `ID` = '".$id."'");
			
			if (!$query) die("SQL query error encountered :".mysql_error() );
			
		}
		else{
			header('Location:restricts.php');
		}
		
		$rows = mysql_fetch_array($query);
		$query2 = mysql_query("SELECT * FROM `APPLICATION` WHERE `ID` = '".$rows['COMPANYID']."'");	//GET COMPANY INFORMATION
		if (!$query2) die("SQL query error encountered :".mysql_error() );
		$rowsCompany = mysql_fetch_array($query2);
		
	?>
	
	<div id="banner">
		<img id="logoUTM" class="bannerPic" src="pic//logoUTM.png" alt="UTM Logo"></img>
		<button id="logout"  class="bannerPic" onclick="logout()"> Logout</button>
	</div>
	
	<div id="student">
		<fieldset>
		<legend style="text-align:left">Student Information</legend>
		<form action="studentProfileUpdate.php" method="POST">
			<table border="1px solid">
				<tr>
					<?php 
						$statusS = $rows['STATUS'];							
						if($statusS == 'E')
							$statusS = 'Empty';
						else if ($statusS == 'P')
							$statusS = 'Pending';
						else if ($statusS == 'A')
							$statusS = 'Accepted';
						else if ($statusS == 'R')
							$statusS = 'Rejected';
						else
							$statusS = 'Error';	
					?>
					<th>Application Status</th>
					<td colspan="5" id="studentStatus"><font><b><?php echo $statusS; ?></b></font></td>
				</tr>
				<tr>
					<th>Student ID</th>
					<td colspan="5" id="studentName"><?php echo $rows['ID']; ?></td>
				</tr>
				<tr>
					<th width="10%">Student Name</th>
					<td width="20%" id="studentName"><?php echo $rows['NAME']; ?></td>
					<th width="10%">Gender</th>
					<td width="20%" id="sGender"><?php echo $rows['GENDER']; ?></td>
				</tr>
				<tr>
					<th>Contact Number</th>
					<td id="sContactNumber"><input type="text" name = "CONTACT" value="<?php echo $rows['CONTACT']; ?>"></input></td>
					<th>Contact email</th>
					<td id="ScontactEmail"><input type="text" name = "EMAIL" value="<?php echo $rows['EMAIL']; ?>"></input></td>
				</tr>
				<tr>
					<th>Matric Number</th>
					<td id="matric"><?php echo $rows['MATRIC']; ?></td>
					<th>Course</th>
					<td id="course"><?php echo $rows['COURSE']; ?></td>
				</tr>
				<tr>
					<th>CGPA</th>
					<td id="cgpa"><?php echo $rows['CGPA']; ?></td>
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
	<input type="button" value="Apply"></input>
	<a href="applicationView.php?id=<?php echo $rows['ID']; ?>">
	<input type="button" value="Result"></input>
	</a>
	</div>
</body>
</html>