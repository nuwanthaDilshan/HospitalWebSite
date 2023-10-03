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
  $email = $_POST['email'];
  $email = filter_var($email, FILTER_SANITIZE_STRING);
  $number = $_POST['MobileNumber'];
  $number = filter_var($number, FILTER_SANITIZE_STRING);

  $update_profile = $conn->prepare("UPDATE `users` SET name = ?, email = ?, MobileNumber = ? WHERE id = ?");
  $update_profile->execute([$name, $email, $number, $user_id]);

  $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
  $prev_pass = $_POST['prev_pass'];
  $old_pass = sha1($_POST['old_pass']);
  $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
  $new_pass = sha1($_POST['new_pass']);
  $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
  $cpass = sha1($_POST['cpass']);
  $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

  if ($old_pass == $empty_pass) {
    $message[] = 'please enter old password!';
  } elseif ($old_pass != $prev_pass) {
    $message[] = 'old password not matched!';
  } elseif ($new_pass != $cpass) {
    $message[] = 'confirm password not matched!';
  } else {
    if ($new_pass != $empty_pass) {
      $update_user_pass = $conn->prepare("UPDATE `users` SET Password = ? WHERE id = ?");
      $update_user_pass->execute([$cpass, $user_id]);
      $message[] = 'password updated successfully!';
    } else {
      $message[] = 'please enter a new password!';
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- link bootstrap -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- link font awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


  <!-- link css -->

  <link rel="stylesheet" href="css/style.css" />

  <title>NSACP HOSPITAL</title>

</head>

<body>

  <?php include 'components/userheader.php' ?>

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
                      <span class="h1 fw-bold mb-0">Update Profile</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px">
                      Sign Up
                    </h5>

                    <input type="hidden" name="prev_pass" value="<?= $fetch_profile["Password"]; ?>">

                    <div class="form-outline mb-4">
                      <input type="text" name="Name" placeholder="Enter your name" required="" class="form-control form-control-lg" value="<?= $fetch_profile["Name"]; ?>" />
                      <label class="form-label" for="form2Example17">Name</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="text" name="MobileNumber" placeholder="Enter your Mobile Number" required="" class="form-control form-control-lg" value="<?= $fetch_profile["MobileNumber"]; ?>" />
                      <label class="form-label" for="form2Example17">Mobile Number</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="email" name="email" placeholder="Enter your email address" required="" class="form-control form-control-lg" value="<?= $fetch_profile["email"]; ?>" />
                      <label class="form-label" for="form2Example17">Email Address</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" name="old_pass" placeholder="Enter old password" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example27">Password</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" name="new_pass" placeholder="Enter password" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example27">Password</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" name="cpass" placeholder="Enter confirm password" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example27">Confirm Password</label>
                    </div>

                    <div class="d-flex justify-content-center">
                      <div class="mt-3">
                        <input type="submit" value="Update now" class="btn main-btn btn-lg btn-block" name="submit">
                      </div>
                    </div>
                    <div class="text-center align-items-center ">
                      <a href="#!" class="small text-muted">Terms of use.</a>
                      <a href="#!" class="small text-muted">Privacy policy</a>
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

  <?php include 'components/footer.php'; ?>

  <script src="js/script.js"></script>

</body>

</html>