<?php

include "../components/connect.php";

session_start();

$admin_id = $_SESSION['admin_id'];



if (isset($_POST['Update'])) {
  $EmailAddress = $_POST['EmailAddress'];


  $query = "UPDATE `users` SET Name='$_POST[Name]',MobileNumber='$_POST[MobileNumber]',Password='$_POST[Password]' where EmailAddress='$_POST[EmailAddress]'";
  $query_run = mysqli_query($connection, $query);

  if ($query_run) {
    header('Location: managePatientDetail.php');
  } else {
    echo '<script type="text/javascript"> alert("Data not Updated")</script>';
  }
}

if (isset($_POST['Delete'])) {
  $EmailAddress = $_POST['EmailAddress'];

  $query = "DELETE FROM `users` WHERE EmailAddress='$EmailAddress' ";
  $query_run = mysqli_query($connection, $query);

  if ($query_run) {
    header('Location: managePatientDetail.php');
  } else {
    echo '<script type="text/javascript"> alert("Data not Deleted")</script>';
  }
}

if (isset($_POST['Add'])) {

  $Name = $_POST['Name'];
  $MobileNumber = $_POST['MobileNumber'];
  $EmailAddress = $_POST['EmailAddress'];
  $Password = $_POST['Password'];


  $query = "INSERT INTO `users`(`Name`, `MobileNumber`, `EmailAddress`, `Password`) VALUES ('$Name','$MobileNumber','$EmailAddress','$Password')";
  $query_run = mysqli_query($connection, $query);

  if ($query_run) {
    header('Location: managePatientDetail.php');
  } else {
    echo '<script type="text/javascript"> alert("Data not Added")</script>';
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- link bootstrap -->

  c<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


  <!-- link font awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- link css -->

  <link rel="stylesheet" href="../css/style.css" />

  <title>NSACP HOSPITAL</title>
</head>

<body>
<?php
include "../components/admin_header.php";
?>

  <section class="vh-200" style="background-color: #0489b1">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem">
            <div class="row g-0">
              <div class="col-md-3 col-lg-12 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <form action="" method="POST">
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-tasks fa-3x mr-2" style="color: #55acee"></i>
                      <span class="h1 fw-bold mb-0">Manage</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px">
                      patient Details
                    </h5>

                    <div class="form-outline mb-4">
                      <input type="text" name="Name" id="form2Example17" class="form-control form-control-lg" placeholder="Enter Name" />
                      <label class="form-label" for="form2Example17">Name</label>
                    </div>
                    <div class="form-outline mb-4">
                      <input type="text" name="MobileNumber" id="form2Example17" class="form-control form-control-lg" placeholder="Enter Mobile Number" />
                      <label class="form-label" for="form2Example17">MobileNumber</label>
                    </div>
                    <div class="form-outline mb-4">
                      <input type="email" name="EmailAddress" id="form2Example27" class="form-control form-control-lg" required="" placeholder=" Enter Email Address" />
                      <label class="form-label" for="form2Example27">EmailAddress</label>
                    </div>
                    <div class="form-outline mb-4">
                      <input type="password" name="Password" id="form2Example17" class="form-control form-control-lg" placeholder="Enter Password" />
                      <label class="form-label" for="form2Example17">Password</label>
                    </div>

                    <div class="pt-1 mb-4 text-center">
                      <button class="btn btn-info pr-5 pl-5" name="Add" type="submit">
                        Add
                      </button>
                      <button class="btn btn-info pr-5 pl-5" name="Update" type="submit">
                        Update
                      </button>
                      <button class="btn btn-info pr-5 pl-5" name="Delete" type="submit">
                        Delete
                      </button>
                      <a href="adminPatientView.php" class="btn btn-info pr-5 pl-5" name="View">
                        View
                      </a>
                      <br />
                      <a href="admin.html" class="nav-link btn-lg" style="color: #55acee;"><i class="fas fa-hand-point-left" style="color: #55acee;"></i> <span>Back</span></a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- footer -->

  <section class="footer">
    <footer class="bg-light text-center text-white">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
          <!-- Facebook -->
          <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

          <!-- Twitter -->
          <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i class="fab fa-twitter"></i></a>

          <!-- Google -->
          <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!" role="button"><i class="fab fa-google"></i></a>

          <!-- Instagram -->
          <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i class="fab fa-instagram"></i></a>

          <!-- Linkedin -->
          <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
          <!-- Github -->
          <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="#!" role="button"><i class="fab fa-github"></i></a>
        </section>
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        &copy 2021 Copyright:
        <a class="text-white" href="#">NSACP.com</a>
      </div>
      <!-- Copyright -->
    </footer>
  </section>


  <script src="./js/admin.js"></script>

  <!-- link bootstrap js -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>