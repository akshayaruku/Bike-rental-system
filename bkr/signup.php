<?php 
$dbhost = "localhost:3307";
$dbuser = "root";
$dbpass = "";
$dbname = "dreambikes";
$conn1 = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die("Unable to connect to database");


$username = $_POST['username'];
$password = $_POST['password'];
$emaid = $_POST['emailid'];

$phone = $_POST['phoneno'];
$aadhar = $_POST['aadhar'];
$dl = $_POST['driving'];



$salt = "codeflix";
$password_encrypted = sha1($password.$salt);



if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 12500000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				// $sql = "INSERT INTO places(image_url,pname,state,natureof,description) 
				//         VALUES('$new_img_name','$pname','$state','$natureof','$description')";
				// mysqli_query($conn, $sql);

                $sql1 = "INSERT INTO users(username, email,phoneno,aadhar,driving,password,role,image_url) values('$username','$emaid','$phone','$aadhar','$dl','$password_encrypted','user','$new_img_name')";
$res = mysqli_query($conn1, $sql1) or die(mysqli_error($conn1));

                
				header("Location: log2.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: sign.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: sign.php?error=$em");
	}

}else {
	header("Location: sign.php");
}
