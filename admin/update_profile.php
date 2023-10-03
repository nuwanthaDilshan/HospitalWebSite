<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
  header('location:admin_login.php');
}

if (isset($_POST['submit'])) {

  $name = $_POST['Name'];
  $name = filter_var($name, FILTER_SANITIZE_STRING);

  $update_profile_name = $conn->prepare("UPDATE `admins` SET name = ? WHERE id = ?");
  $update_profile_name->execute([$name, $admin_id]);

  $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
  $prev_pass = $_POST['prev_pass'];
  $old_pass = sha1($_POST['old_pass']);
  $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
  $new_pass = sha1($_POST['new_pass']);
  $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
  $confirm_pass = sha1($_POST['cpass']);
  $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

  if ($old_pass == $empty_pass) {
    $message[] = 'please enter old password!';
  } elseif ($old_pass != $prev_pass) {
    $message[] = 'old password not matched!';
  } elseif ($new_pass != $confirm_pass) {
    $message[] = 'confirm password not matched!';
  } else {
    if ($new_pass != $empty_pass) {
      $update_admin_pass = $conn->prepare("UPDATE `admins` SET password = ? WHERE id = ?");
      $update_admin_pass->execute([$confirm_pass, $admin_id]);
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
  <title>update profile</title>

  <!-- link bootstrap -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- link font awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


  <!-- link css -->

  <link rel="stylesheet" href="../css/style.css" />

</head>

<body>

  <?php include '../components/admin_header.php'; ?>

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

                    <input type="hidden" name="prev_pass" value="<?= $fetch_profile["password"]; ?>">

                    <div class="form-outline mb-4">
                      <input type="text" name="Name" placeholder="Enter your name" required="" class="form-control form-control-lg" value="<?= $fetch_profile["name"]; ?>" />
                      <label class="form-label" for="form2Example17">Name</label>
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
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="../js/admin.js"></script>

</body>

</html>