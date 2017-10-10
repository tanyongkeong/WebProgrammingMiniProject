<?php
include("config.php");

if(isset($_POST['submit'])){
	$doc_name = $_POST['doc_name'];
	$name = $_FILES['myfile']['name'];
	$tmp_name = $_FILES['myfile']['tmp_name'];
	
	if($name){
	
		$Location = "$name";
		move_uploaded_file($tmp_name,$Location);
		echo $Location;
		$query = mysql_query("INSERT INTO `REPORT`(`NAME`,`PATH`,`STUDENTID`) VALUES ('$doc_name','$Location','A0001')");
		//header("Location:reportView.php");
		$fullPath = __DIR__ . '/img/' . $name;
		if (move_uploaded_file($tmp_name, $fullPath)) {
			echo 'File was uploaded';
		}
	}
	
	else
		die("Please select a file");
}
?>
<html>
<head>
	<title>Upload Log file</title>
</head>
<body>
	<form action="upload.php" method="POST" enctype="multipart/form-data">
		<label for="name">Document Name</label>
		<input type="text" name="doc_name">
		<input type="file" name="myfile">
		<input type="submit" name="submit" value="Upload">
	</form>
</body>
</html>