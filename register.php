<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = '';
};

if (isset($_POST['submit'])) {

  $name = $_POST['Name'];
  $name = filter_var($name, FILTER_SANITIZE_STRING);
  $MobileNumber = $_POST['MobileNumber'];
  $MobileNumber = filter_var($MobileNumber, FILTER_SANITIZE_STRING);
  $email = $_POST['email'];
  $email = filter_var($email, FILTER_SANITIZE_STRING);
  $pass = sha1($_POST['pass']);
  $pass = filter_var($pass, FILTER_SANITIZE_STRING);
  $cpass = sha1($_POST['cpass']);
  $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

  $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
  $select_user->execute([$email,]);
  $row = $select_user->fetch(PDO::FETCH_ASSOC);

  if ($select_user->rowCount() > 0) {
    $message[] = 'email already exists!';
  } else {
    if ($pass != $cpass) {
      $message[] = 'confirm password not matched!';
    } else {
      $insert_user = $conn->prepare("INSERT INTO `users`(Name, MobileNumber, email, Password) VALUES(?,?,?,?)");
      $insert_user->execute([$name, $MobileNumber, $email, $cpass]);
      $message[] = 'registered successfully, login now please!';
    }
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


  <!-- link font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- link css -->
  <link rel="stylesheet" href="css/style.css" />

  <title>NSACP HOSPITAL</title>
</head>

<body>
  <!-- navigation bar -->
  <?php
  include "./components/userheader.php";
  ?>

  <section class="vh-1000" style="background-color: #0489b1">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem">
            <div class="row g-0">
              <div class="col-md-3 col-lg-12 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <form method="POST" action="">
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-id-badge"></i>
                      <span class="h1 fw-bold mb-0">Register</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px">
                      Sign Up
                    </h5>

                    <div class="form-outline mb-4">
                      <input type="text" name="Name" id="form2Example17" placeholder="Enter your name" required="" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example17">Name</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="text" name="MobileNumber" id="form2Example17" placeholder="Enter your Mobile Number" required="" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example17">Mobile Number</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="email" name="email" placeholder="Enter your email address" required="" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example17">Email Address</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" name="pass" placeholder="Enter password" required="" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example27">Password</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" name="cpass" placeholder="Enter confirm password" required="" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example27">Confirm Password</label>
                    </div>

                    <div class="d-flex justify-content-center">
                      <div class="mt-3">
                        <input type="submit" value="register now" class="btn main-btn btn-lg btn-block" name="submit">
                      </div>
                    </div>
                    <div class="text-center align-items-center ">
                      <div class="">
                        <p class="" style="color: #55acee">
                          have an account?
                          <a href="login.php" style="color: #55acee">Login here</a>
                        </p>
                        <a href="#!" class="small text-muted">Terms of use.</a>
                        <a href="#!" class="small text-muted">Privacy policy</a>
                      </div>
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

  <?php

  include "./components/footer.php"

  ?>

  <script src="./js/script.js"></script>

  <!-- link bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>