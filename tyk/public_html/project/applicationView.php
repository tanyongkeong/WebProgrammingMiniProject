<html>
<head>
<title>Request Practical Training</title>
<link rel="stylesheet" type="text/css" href="applicationViewDesign.css">
<script type="text/javascript" src="logoutJS.js"></script>
</head>
<body>

	<?php
		require_once ("config.php");
		session_start();
		$user_id  = $_SESSION['ID'];
		
		if (isset($_SESSION['ID']) && $_SESSION['Login'] == "YES"){
			$query = mysql_query("SELECT * FROM `STUDENT` WHERE `ID` = '".$_GET["id"]."'");
			
			echo "SELECT * FROM `STUDENT` WHERE `ID` = '".$GET["id"]."'";
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
					<td id="sContactNumber"><?php echo $rows['CONTACT']; ?></td>
					<th>Contact email</th>
					<td id="ScontactEmail"><?php echo $rows['EMAIL']; ?></td>
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
					<?php 
						if($rows['STATUS'] == "A"){
							echo '<tr>';
							echo '<th>Training Log</th>';
							echo '<td align=\"center\"> <a href="',"reportView.php",'?id=',$rows['ID'],'" target="_blank">Report</a> </td>';
							echo '</tr>';
						}
					?>
			</table>
		</fieldset>
	</div>
	
	<div id="profileImg">
		<img src="pic//profile.png"></img>
	</div>
	
	
	<div id="company" >
		<fieldset>
		<legend style="text-align:left">Company Information</legend>
			<table border="1px solid" width="100%">
				<tr>
					<th>Company ID</th>
					<td colspan="5" id="campanyID"><?php echo $rowsCompany['ID']; ?></td>
				</tr>
				<tr>
					<th>Company Name</th>
					<td colspan="5" id="campanyName"><?php echo $rowsCompany['COMPANY']; ?></td>
				</tr>
				<tr>
					<th width="10%">Contact Name</th>
					<td width="10%" id="contactName"><?php echo $rowsCompany['CONTACTNAME']; ?></td>
					<th width="20%">Contact number</th>
					<td width="20%" id="contactNo"><?php echo $rowsCompany['CONTACT']; ?></td>
					<th width="15%">Contact email</th>
					<td width="15%" id="contactEmail"><?php echo $rowsCompany['EMAIL']; ?></td>
				</tr>
				<tr>
					<th>Company Addresss</th>
					<td colspan="5" id="address"><?php echo $rowsCompany['ADDRESS']; ?></td>
				</tr>
				<tr>
					<th>Job title</th>
					<td colspan="5" id="job"><?php echo $rowsCompany['JOBTITLE']; ?></td>
				</tr>
				<tr>
					<th>Job Availablity</th>
					<td colspan="5" id="jobAvailable"><?php echo $rowsCompany['JOBAVAILABLE']; ?></td>
				</tr>
			</table>
		</fieldset>
	</div>
	
	<?php
		if($_SESSION['LEVEL'] == "2" || $_SESSION['LEVELB'] == "2"){ 	
		if($rows['STATUS'] == "P" && $rowsCompany['JOBAVAILABLE'] > 0){
			echo '<div id="response">';	
			echo '<form action="update_student.php" method="POST">';
			echo '<input type=\'hidden\' name="hiddenID" value="',$rows['ID'],'" />'; 
			echo '<input type=\'hidden\' name="hiddenCID" value="',$rowsCompany['ID'],'" />'; 
			echo '<input type=\'hidden\' name="hiddenAvailable" value="',$rowsCompany['JOBAVAILABLE'],'" />'; 
			echo '<button name = "result" id = "accept" value = "accept">Accept</button>';
			echo '<button name = "result" id = "reject" value = "reject">Reject</button>';
			echo '</form>';
			echo '</div>';
		}else if ($rows['STATUS'] == "P" && $rowsCompany['JOBAVAILABLE'] == 0){
			echo '<form action="update_student.php" method="POST">';			
			echo '<div id="response">';
			echo '<input type=\'hidden\' name="hiddenID" value= "',$rows['ID'],'" />'; 
			echo '<input type=\'hidden\' name="hiddenCID" value= "',$rowsCompany['ID'],'" />'; 
			echo '<input type=\'hidden\' name="hiddenAvailable" value= "',$rowsCompany['JOBAVAILABLE'],'" />'; 
			
			echo '<button name = "result" id = "reject" value = "reject">Reject</button>';
			echo '</form>';
			echo '</div>';
		}
		}
		if($_SESSION["ADMIN"] == "YES")
		{
			echo '<div style="background-color:rgb(209, 203, 202);position:relative;display:block;width:100%;padding:1%;font-size:0.8em;align-items:center; text-align:center;">';
			echo '<H3>Admin Mode</H3>';
			echo '</div>';
		}
	?>
</body>
</html>