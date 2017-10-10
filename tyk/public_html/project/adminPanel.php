<html>
<head>
<title>Student List</title>
<link rel="stylesheet" type="text/css" href="listViewDesign.css"> 
<script type="text/javascript" src="listScript.js"></script>
<script type="text/javascript" src="logoutJS.js"></script>
<script>
var isEdit = false;
function editS(x) {
    var inputs;
	inputs = document.getElementsByClassName('student');
	var k = 0;
	
	if(!isEdit){
		for(var i = ((x.rowIndex -1) * 12); k < 12; i ++){
			console.log(i + "," + x);
			inputs[i].readOnly=false;
			k++;
		}
		document.getElementsByClassName("buttonS")[x.rowIndex - 1].value = 'Done';
		isEdit = true;
		inputs[(x.rowIndex -1) * 12].focus();
	}else{
		if (document.getElementsByClassName("buttonS")[x.rowIndex - 1].value == 'Done'){
			for(var i = ((x.rowIndex -1) * 12); k < 12; i ++){
				console.log(i + "," + x);
				inputs[i].readOnly=true;
				k++;
			}

		isEdit = false;
		document.getElementsByClassName("buttonS")[x.rowIndex - 1].value = 'Edit';
		document.getElementsByClassName("buttonS")[x.rowIndex - 1].type = 'submit';
		document.getElementsByClassName("buttonS")[x.rowIndex - 1].submit();
		}
	}
}

function deleteS(x) {
}

function editCoor(x) {
    var inputs;
	inputs = document.getElementsByClassName('coordinator');
	var k = 0;
	
	if(!isEdit){
		for(var i = ((x.rowIndex -1) * 5); k < 5; i ++){
			console.log(i + "," + x);
			inputs[i].readOnly=false;
			k++;
		}
		document.getElementsByClassName("buttonC")[x.rowIndex - 1].value = 'Done';
		isEdit = true;
		inputs[(x.rowIndex -1) * 12].focus();
	}else{
		if (document.getElementsByClassName("buttonC")[x.rowIndex - 1].value == 'Done'){
			for(var i = ((x.rowIndex -1) * 5); k < 5; i ++){
				console.log(i + "," + x);
				inputs[i].readOnly=true;
				k++;
			}

		isEdit = false;
		document.getElementsByClassName("buttonC")[x.rowIndex - 1].value = 'Edit';
		document.getElementsByClassName("buttonC")[x.rowIndex - 1].type = 'submit';
		document.getElementsByClassName("buttonC")[x.rowIndex - 1].submit();
		}
	}
}

function deleteCoor(x) {
}

function editCom(x) {
    var inputs;
	inputs = document.getElementsByClassName('application');
	var k = 0;
	
	if(!isEdit){
		for(var i = ((x.rowIndex -1) * 8); k < 8; i ++){
			console.log(i + "," + x);
			inputs[i].readOnly=false;
			k++;
		}
		document.getElementsByClassName("buttonCo")[x.rowIndex - 1].value = 'Done';
		isEdit = true;
		inputs[(x.rowIndex -1) * 12].focus();
	}else{
		if (document.getElementsByClassName("buttonCo")[x.rowIndex - 1].value == 'Done'){
			for(var i = ((x.rowIndex -1) * 8); k < 8; i ++){
				console.log(i + "," + x);
				inputs[i].readOnly=true;
				k++;
			}

		isEdit = false;
		document.getElementsByClassName("buttonCo")[x.rowIndex - 1].value = 'Edit';
		document.getElementsByClassName("buttonCo")[x.rowIndex - 1].type = 'submit';
		document.getElementsByClassName("buttonCo")[x.rowIndex - 1].submit();
		}
	}
}

function deleteCom(x) {
}

function initial(){
	var inputs, index;

	inputs = document.getElementsByClassName('student');
	
	for (var i in inputs){
		if(Number.isInteger(parseInt(i))){
			inputs[i].readOnly=true;
		}else
			console.log(i);
	}
	
	inputs = document.getElementsByClassName('coordinator');
	
	for (var i in inputs){
		if(Number.isInteger(parseInt(i))){
			inputs[i].setAttribute('readonly','true');
		}else
			console.log(i);
	}
	
	inputs = document.getElementsByClassName('application');
	
	for (var i in inputs){
		if(Number.isInteger(parseInt(i))){
			inputs[i].setAttribute('readonly','true');
		}else
			console.log(i);
	}
}
</script>
<style>
.glowing-border {
    border: 2px solid #ff0000;
    border-radius: 7px;
}

.glowing-border:focus { 
    outline: none;
    border-color: #ff0000;
    box-shadow: 0 0 10px #ff0000;
}
</style>
	
</head>
<body onload="initial()">
	<div id="banner">
		<img id="logoUTM" class="bannerPic" src="pic//logoUTM.png" alt="UTM Logo"></img>
		<button id="logout"  class="bannerPic"onclick="logout()"> Logout</button>
	</div>
	
	<? echo $_userid;?>
	<?php

		require_once ("config.php");
		/*session_start();
		$_userid = $_SESSION["userid"]; 
		$_userlevel = $_SESSION["level"];
		
		if($_userlevel != "1" && $_userlevel != "2"){
			header('Location: http://gmm-student.fc.utm.my/~tyk/project/restricts.php');
		}*/

		if (empty($_GET)){
			$query = mysql_query("SELECT * FROM `STUDENT` ORDER BY `ID`");
			$queryCoordinator = mysql_query("SELECT * FROM `COORDINATOR` ORDER BY `ID`;");
			$queryApplication = mysql_query("SELECT * FROM `APPLICATION` ORDER BY `ID`;");
		}
		else{
			$value = strtoupper($_GET['sorting']);
			$query = mysql_query("SELECT * FROM `STUDENT` ORDER BY '".$value."';");
			$queryCoordinator = mysql_query("SELECT * FROM `COORDINATOR` ORDER BY '".$value."';");
			$queryApplication = mysql_query("SELECT * FROM `APPLICATION` ORDER BY '".$value."';");
		}

		if (!$query) die("SQL query of student error encountered :".mysql_error() );
		if (!$queryCoordinator) die("SQL query of coordinator error encountered :".mysql_error() );
		if (!$queryApplication) die("SQL query of application error encountered :".mysql_error() );
		
	?>
	<div id="list" style="margin:0%;">
		<H3>Student<H3>
		<table id="studentTable" border="1px solid" wiidth="2320px">
			<tr>
				<th>ID</th>
				<th >PASSWORD</th>
				<th>NAME</th>
				<th >GENDER</th>
				<th>CONTACT</th>
				<th>EMAIL</th>
				<th >MATRIC</th>
				<th>COURSE</th>
				<th >CGPA</th>
				<th >STATUS</th>
				<th>COORDINATOR ID</th>
				<th >COMPANY ID</th>
				<th>VIEW</th>
				<th>EDIT</th>
				<th >DELETE</th>
			</tr>
		
		<?php 
			while ($rows = mysql_fetch_array($query))
			{
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
			<tr>
			<form action="update_studentInfo.php" method="POST">
				<td><input class = "student" type="text" name = "ID" value="<?php echo $rows['ID']; ?>"></input></td>
				<td><input class = "student" type="text" name = "PASSWORD" value="<?php echo $rows['PASSWORD']; ?>"></input></td>
				<td><input class = "student" type="text" name = "NAME" value="<?php echo $rows['NAME']; ?>"></input></td>
				<td><input class = "student" type="text" name = "GENDER" value="<?php echo $rows['GENDER']; ?>"></input></td>
				<td><input class = "student" type="text" name = "CONTACT" value="<?php echo $rows['CONTACT']; ?>"></input></td>
				<td><input class = "student" type="text" name = "EMAIL" value="<?php echo $rows['EMAIL']; ?>"></input></td>
				<td><input class = "student" type="text" name = "MATRIC" value="<?php echo $rows['MATRIC']; ?>"></input></td>
				<td><input class = "student" type="text" name = "COURSE" value="<?php echo $rows['COURSE']; ?>"></input></td>
				<td><input class = "student" type="text" name = "CGPA" value="<?php echo $rows['CGPA']; ?>"></input></td>
				<td><input list="statusChoose" class = "student" type="text" name = "STATUS" value="<?php echo $statusS; ?>"></input></td>
				<datalist id="statusChoose">
					<option value="Pending">
					<option value="Rejected">
					<option value="Accepted">
					<option value="Empty">
				</datalist>
				<td><input class = "student" type="text" name = "COORDINATORID" value="<?php echo $rows['COORDINATORID']; ?>"></input></td>
				<td><input class = "student" type="text" name = "COMPANYID" value="<?php echo $rows['COMPANYID']; ?>"></input></td>
				<td><input class = "buttonS" type="submit" name = "buttonView" value="View" onclick="this.parentNode.setAttribute('onclick', 'editS(this.parentNode)')"></td>
				<td><input class = "buttonS" type="button" name = "buttonEdit" value="Edit" onclick="this.parentNode.setAttribute('onclick', 'editS(this.parentNode)')"></td>
				<td><input class = "buttonS2" type="submit" name = "buttonDelete" value="Delete" onclick="this.parentNode.setAttribute('onclick', 'deleteS(this.parentNode)')"></td>
				</form>
			</tr>

			<?php 
			} ?>
		</table>
	</div>
	
	<div id="list" style="margin:0;">
		<H3>Coordinator<H3>
		<table id="coodinaTable" border="1px solid">
			<tr>
				<th>ID</th>
				<th >PASSWORD</th>
				<th>NAME</th>
				<th >DEPARTMENT</th>
				<th>POSITION</th>
				<th>VIEW</th>
				<th>EDIT</th>
				<th >DELETE</th>
			</tr>
			<?php 
				while ($rows = mysql_fetch_array($queryCoordinator))
			{
			?>
			<tr>
			<form action="update_coordinatorInfo.php" method="POST">
				<td><input class = "coordinator" type="text" name = "ID" value="<?php echo $rows['ID']; ?>"></input></td>
				<td><input class = "coordinator" type="text" name = "PASSWORD" value="<?php echo $rows['PASSWORD']; ?>"></input></td>
				<td><input class = "coordinator" type="text" name = "NAME" value="<?php echo $rows['NAME']; ?>"></input></td>
				<td><input class = "coordinator" type="text" name = "DEPARTMENT" value="<?php echo $rows['DEPARTMENT']; ?>"></input></td>
				<td><input class = "coordinator" type="text" name = "POSITION" value="<?php echo $rows['POSITION']; ?>"></input></td>
				<td><input class = "buttonS" type="submit" name = "buttonView" value="View" onclick="this.parentNode.setAttribute('onclick', 'editC(this.parentNode)')"></td>
				<td><input class = "buttonC" type="button" value="Edit" onclick="this.parentNode.setAttribute('onclick', 'editCoor(this.parentNode)')"></td>
				<td><input class = "buttonC2" type="submit" value="Delete" onclick="this.parentNode.setAttribute('onclick', 'deleteCoor(this.parentNode)')"></td>
			</form>
			</tr>
		<?php 
			} ?>
			
		</table>
		
	</div>
	
	<div id="list" style="margin:0;">
		<H3>Company<H3>
		<table id="applicationTable" border="1px solid">
			<tr>
				<th>ID</th>
				<th >COMPANY</th>
				<th>CONTACT NAME</th>
				<th >ADDRESS</th>
				<th>CONTACT NUMBER</th>
				<th>CONTACT EMAIL</th>
				<th>JOB AVAILABLE</th>
				<th>JOB TITLE</th>
				<th >EDIT</th>
				<th >DELETE</th>
			</tr>
		<?php 
			while ($rows = mysql_fetch_array($queryApplication)){
		?>
			<tr>
			<form action="update_applicationInfo.php" method="POST">
				<td><input class = "application" type="text" name = "ID" value="<?php echo $rows['ID']; ?>"></input></td>
				<td><input class = "application" type="text" name = "COMPANY" value="<?php echo $rows['COMPANY']; ?>"></input></td>
				<td><input class = "application" type="text" name = "CONTACTNAME" value="<?php echo $rows['CONTACTNAME']; ?>"></input></td>
				<td><input class = "application" type="text" name = "ADDRESS" value="<?php echo $rows['ADDRESS']; ?>"></input></td>
				<td><input class = "application" type="text" name = "CONTACT" value="<?php echo $rows['CONTACT']; ?>"></input></td>
				<td><input class = "application" type="text" name = "EMAIL" value="<?php echo $rows['EMAIL']; ?>"></input></td>
				<td><input class = "application" type="text" name = "JOBAVAILABLE" value="<?php echo $rows['JOBAVAILABLE']; ?>"></input></td>
				<td><input class = "application" type="text" name = "JOBTITLE" value="<?php echo $rows['JOBTITLE']; ?>"></input></td>
				<td><input class = "buttonCo" type="button" value="Edit" onclick="this.parentNode.setAttribute('onclick', 'editCom(this.parentNode)')"></td>
				<td><input class = "buttonCo2" type="submit" value="Delete" onclick="this.parentNode.setAttribute('onclick', 'deleteCom(this.parentNode)')"></td>
				</form>
			</tr>
					<?php
			}
			mysql_close($conn);	
		?>
		</table>
	</div>
	
</body>
</html>