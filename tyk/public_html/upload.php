<?php
$fileExistsFlag = 0;
$fileName = $_FILES['Filename']['name'];
$link = mysqli_connect("localhost","tyk","","a15cs0204") or die("Error ".mysqli_error($link));
/*
*	Checking whether the file already exists in the destination folder
*/
$query = "SELECT `NAME` FROM 'REPORT' WHERE `NAME` ='$fileName'";
$result = $link->query($query) or die("Error : ".mysqli_error($link));
while($row = mysqli_fetch_array($result)) {
if($row['filename'] == $fileName) {
$fileExistsFlag = 1;
}
}
/*
* If file is not present in the destination folder
*/
if($fileExistsFlag == 0) {
$target = "files/";
$fileTarget = $target.$fileName;
$tempFileName = $_FILES["Filename"]["tmp_name"];
$result = move_uploaded_file($tempFileName,$fileTarget);
/*
*	If file was successfully uploaded in the destination folder
*/
if($result) {
echo "Your file <html><b><i>".$fileName."</i></b></html> has been successfully uploaded";
$query = "INSERT INTO `REPORT`(`NAME`,`PATH`,`STUDENTID`) VALUES ('$doc_name','$Location','A0001')");
$link->query($query) or die("Error : ".mysqli_error($link));
}
else {
echo "Sorry !!! There was an error in uploading your file";
}
mysqli_close($link);
}
/*
* If file is already present in the destination folder
*/
else {
echo "File <html><b><i>".$fileName."</i></b></html> already exists in your folder. Please rename the file and try again.";
mysqli_close($link);
}
?>