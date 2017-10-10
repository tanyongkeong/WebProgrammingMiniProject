<HTML>
	<HEAD><TITLE>Update Student</TITLE></HEAD>
	<BODY>
<?php
require_once ("config.php");
	Session_start();
	$_SESSION["userid"] = 'C0003';
	$_SESSION["level"] = "1";
	header('Location: http://gmm-student.fc.utm.my/~tyk/project/listView.php');
?>

	</BODY>
</HTML>