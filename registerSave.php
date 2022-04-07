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
		if($_POST['sbm']== 'Register'){
			
			// if there are no errors, save user to database
			$sql= "insert into users(Name, MobileNumber, EmailAddress, Password)
	values('$_POST[Name]','$_POST[MobileNumber]','$_POST[EmailAddress]','$_POST[Password]')";
			
		}
	}
	
	if (mysqli_query($conn,$sql)){
		echo "Registered";
	}else{
		echo"Error".mysqli_error($conn);
	}
	mysqli_close($conn);
