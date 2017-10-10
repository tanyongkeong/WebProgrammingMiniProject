<?php
	
	
   if(isset($_FILES['doc'])){
	require_once('config.php');	
	session_start();
      $errors= array();
	$doc_name = $_POST['doc_name'];
      $file_name = $_FILES['doc']['name'];
      $file_size =$_FILES['doc']['size'];
      $file_tmp =$_FILES['doc']['tmp_name'];
      $file_type=$_FILES['doc']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['doc']['name'])));
      
      $expensions= array("docx","doc","txt");
	$exist_path = realpath('./').'/documents';
	if(chmod(($exist_path),0777)){
    		echo "Create sucess";
	}
	else{	
		echo $exist_path."chmod error"."</br>";
	}
      	$path = realpath('./').'/documents2/';
	 if (!file_exists( $path)) {
    		if(mkdir($path)){
			if(chmod(($path),0777))
    				echo "Create sucess";
			else
				echo "chmod error";
		}
    		else{
    			echo "directory cannot create</br>";
			echo $path."</br>";
		}
	}else
		  echo "documents dir is existed</br>";
	$target_path = realpath('./')."/documents/".$file_name;
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a .doc or .docx file.";
      }
      
      if($file_size > 10097152){
         $errors[]='File size must be excately 10 MB';
      }
      
      if(empty($errors)==true){
         if(move_uploaded_file($file_tmp,$target_path)){
			echo "Success";
			echo $target_path;
			$filepath = addslashes($target_path);
			$id = $_POST['id'];
			$sql = ("INSERT INTO REPORT (NAME,PATH,STUDENTID) VALUES ('$doc_name','$target_path','$id')");
			echo $sql;
			$query = mysql_query( $sql );
			if (!$query) die("SQL query error encountered: ".mysql_error() );
			header("location:reportView.php?id=$id");
		 }else{
			echo $target_path."</br>";
			echo "unable to upload";
		 }
      }else{
         print_r($errors);
      }
	  
	/*  //cURL method
	  $file_name = $_FILES['doc']['name'];
      $file_size =$_FILES['doc']['size'];
      $file_tmp =$_FILES['doc']['tmp_name'];
      $file_type=$_FILES['doc']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['doc']['name'])));
	  
	  if(mkdir("/documents2/", 0777, true)){
		echo "documents dir created</br>";
	  }else
		  echo "documents dir is existed</br>";
	  $target_url = "http://gmm-student.fc.utm.my/~tyk/project/accept.php";
	  $file_name_with_full_path = $file_tmp;
		$post = array('extra_info' => '123456','file_contents'=>'@'.$file_name_with_full_path);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$target_url);
		curl_setopt($ch, CURLOPT_POST,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		$result=curl_exec ($ch);
		echo curl_exec($ch); 
		curl_close ($ch);*/
   }
?>

<html>
<head>
	<title>Upload Log file</title>
</head>
<body>
	<form action="upload.php?" method="POST" enctype="multipart/form-data">
	<input type="hidden" name = "id" value = "<?php echo $_POST['id']; ?>" ></input>
	<label>File Name</label>
	<input type="text" name="doc_name" required/>
         <input type="file" name="doc" />
         <input type="submit"/>
      </form>
</body>
</html>