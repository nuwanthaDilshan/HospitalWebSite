<?php
// connect to the database
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "hospital2";
    $conn = mysqli_connect ($servername,$username,$password,$dbname);
	
	if(!$conn){
		echo"Connection Failed".mysqli_connect_error();
	}
    
// if the OK button is clicked
	if(isset($_POST['sbm'])){
		if($_POST['sbm']== 'save'){
			
			// if there are no errors, save user to database
			$sql= "insert into contactus(name, message, email, mobile)
	values('$_POST[name]','$_POST[message]','$_POST[email]','$_POST[mobile]')";
			
		}
	}
	
	if (mysqli_query($conn,$sql)){
		echo "Submitted";
	}else{
		echo"Error".mysqli_error($conn);
	}
	mysqli_close($conn);
?>