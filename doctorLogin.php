<?php
$email = $_POST['EmailAddress'];
$password = $_POST['Password'];

$con = new mysqli("127.0.0.1", "root", "", "hospital2");
if ($con->connect_error) {
    die("failed :" . $con->connect_error);
} else {
    $stmt = $con->prepare("select * from 	doctor where EmailAddress = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['Password'] === $password) {
            header('Location: doctor.php');
        } else {
            echo "<h2>invalid Email or Password</h2>";
        }
    } else {
        echo "<h2>invalid Email or Password</h2>";
    }
}
