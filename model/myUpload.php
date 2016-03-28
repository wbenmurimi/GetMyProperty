<?php
session_start();
// print_r($_SESSION["pics"]);
if(isset($_FILES['image'])){
	$errors= array();
	$file_name = $_FILES['image']['name'];
	$file_size =$_FILES['image']['size'];
	$file_tmp =$_FILES['image']['tmp_name'];
	$file_type=$_FILES['image']['type'];   
	$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

	$expensions= array("jpeg","jpg","png","gif"); 		
	if(in_array($file_ext,$expensions)=== false){
		header("location:../add-property/free-plan.php");
		$errors[]="Picture extension not allowed, please choose a JPEG,GIF,JPG or PNG file.";
	}

		// Check if file already exists
	if (file_exists($file_name)) {
		echo "Sorry, file already exists.";
		
	}
	// unset($_SESSION["pics"]);

	if(!isset($_SESSION["pics"])){
		 $_SESSION["pics"]=array();		
	}
if(!isset($_SESSION["new_pics"])){
     $_SESSION["new_pics"]=array();   
  }

	if($file_size > 2097152){
		$errors[]='File size must be excately 2 MB';
	}
	$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	$randNo=uniqid();
	$new_name=$randNo.".".$ext;

	


	if(empty($errors)==true){
		array_push($_SESSION["pics"],"../uploads/".$new_name);

		move_uploaded_file($file_tmp,"../uploads/".$new_name);
		header("location:../add-property/free-plan.php");
		// echo "Success";
	}
	else{
		print_r($errors);
	}
		// 2882656ddf46c815717.58212068  28
		// 56ddf5ab31137 13
}
else{
	header("location:../add-property/free-plan.php");
}
?>

<!-- <form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="image" />
<input type="submit"/>
</form> -->