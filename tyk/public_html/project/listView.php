<html>
<head>
<title>Student List</title>
<link rel="stylesheet" type="text/css" href="listViewDesign.css"> 
<script type="text/javascript" src="listScript.js"></script>
<script type="text/javascript" src="logoutJS.js"></script>
	
</head>
<body >
	<div id="banner">
		<img id="logoUTM" class="bannerPic" src="pic//logoUTM.png" alt="UTM Logo"></img>
		<button id="logout"  class="bannerPic"onclick="logout()"> Logout</button>
	</div>
	
	<div id="sort">
		<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<p style="display:inline;">sort by</p>
			<select name="sorting">
			  <option value="name">name</option>
			  <option value="id">ID</option>
			  <option value="status">Status</option>
			</select>
			<input type="submit" value="Sort"></input>
		</form>
	</div>
	
	<?php
		echo $_userid;
		require_once ("config.php");
		session_start();
		$_userid = $_SESSION["ID"]; 
		$_userlevel = $_SESSION["LEVEL"];
		
		if($_userlevel != "1" && $_userlevel != "2"){
			header('Location: http://gmm-student.fc.utm.my/~tyk/project/restricts.php');
		}

		if (empty($_GET['sorting'])){
			$query = mysql_query("SELECT * FROM `STUDENT` WHERE `COORDINATORID` = '$_userid' ORDER BY `MATRIC`;");
		}
		else{
			$value = strtoupper($_GET['sorting']);
			$query = mysql_query("SELECT * FROM `STUDENT` WHERE `COORDINATORID` = '$_userid' ORDER BY `".$value."`;");
		}

		if (!$query) die("SQL query error encountered :".mysql_error() );
		
	?>
	<div id="list">
		<table id="studentTable" border="1px solid">
			<tr>
				<th>ID</th>
				<th >Student Name</th>
				<th>Status</th>
				<th width="10%">View</th>
				<th width="10%">Delete</th>
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
				<td><?php echo $rows['MATRIC']; ?></td>
				<td><?php echo $rows['NAME']; ?></td>
				<td><?php echo $statusS; ?></td>
				<?php
					if ($statusS != 'Empty'){
						echo '<td align=\"center\"> <a href="',"applicationView.php",'?id=',$rows['ID'],'" target="_blank">View</a> </td>';
						echo '<td align=\"center\"> <a href="',"delete.php",'?id=',$rows['ID'],'" target="_blank">Delete</a> </td>';
					}
					else{
						echo "<td></td>";
						echo "<td></td>";
					}
				?>
			</tr>
		<?php
			}
			mysql_close($conn);
			
		?>
		</table>
	</div>
	
	<div id="Footer">
		<a href="applicationView.php?id=A0004">
			<button>Home</button>
		</a>
	</div>
</body>
</html>