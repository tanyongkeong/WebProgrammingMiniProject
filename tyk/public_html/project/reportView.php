<?php
include('config.php');
?>
<html>
<head>
<title>Student Training Report</title>
<link rel="stylesheet" type="text/css" href="reportViewDesign.css"> 
<script type="text/javascript" src="logoutJS.js"></script>
</head>
<body>
	<div id="banner">
		<img id="logoUTM" class="bannerPic" src="pic//logoUTM.png" alt="UTM Logo"></img>
		<button id="logout"  class="bannerPic"onclick="logout()"> Logout</button>
	</div>
	
	<div id="uploadContainer">
		<form action="upload.php" method ="POST">
			<input type="hidden" name = "id" value="<?php echo $_GET['id']; ?>"></input>
			<input type = "submit" value = "Upload Log File"></input>
		</form>
	</div>
		
	<div id="fileContainer">
		<table id="fileTable" border="1px solid">
			<tr>
				<th>ID</th>
				<th>File</th>
				<th>PATH</th>
				<th>Download</th>
			</tr>
			<?php
			$idGET = $_GET["id"];
			$res = mysql_query("SELECT * FROM `REPORT` WHERE `STUDENTID` = '$idGET'");
			while($row = mysql_fetch_array($res)){
				$id = $row['ID'];
				$name = $row['NAME'];
				$path = $row['PATH'];
			?>
			<tr>
				<td><?php echo $row['ID']?></td>
				<td><?php echo $row['NAME']?></td>
				<td><?php echo $row['PATH']?></td>
				<td><a href='download.php?dow=<?php echo $row['PATH']?>'>Download</a></td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
	<div id="Footer">
		<button>Close</button>
	</div>
</body>
</html>