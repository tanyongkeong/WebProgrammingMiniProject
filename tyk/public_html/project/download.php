<?php

include('config.php');
session_start();
$path = $_GET['dow'];

	
//$res = mysql_query("SELECT * FROM `REPORT` WHERE `path` ='$path'");
//if(is_file($path)) {
	switch(strtolower(substr(strrchr($path, '.'), 1))) {
		case 'pdf': $mime = 'application/pdf'; break;
		case 'zip': $mime = 'application/zip'; break;
		case 'jpeg':
		case 'jpg': $mime = 'image/jpg'; break;
		default: $mime = 'application/force-download';
	}
	header('Pragma: public'); 	// required
	header('Expires: 0');		// no cache
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($path)).' GMT');
	header('Cache-Control: private',false);
	header('Content-Type: '.$mime);
	header('Content-Disposition: attachment; filename="'.basename($path).'"');
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: '.filesize($path));	// provide file size
	header('Connection: close');
	readfile($path);		// push it out
	exit();
//}else{
//	echo "File does not exist";
//}

?>