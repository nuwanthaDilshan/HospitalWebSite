<?php

include "../components/connect.php";

session_start();

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $name = filter_var($name, FILTER_SANITIZE_STRING);
  $pass = sha1($_POST['pass']);
  $pass = filter_var($pass, FILTER_SANITIZE_STRING);

  $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND Password = ?");
  $select_admin->execute([$name, $pass]);
  $row = $select_admin->fetch(PDO::FETCH_ASSOC);

  if ($select_admin->rowCount() > 0) {
    $_SESSION['admin_id'] = $row['id'];
    header('location:../admin.php');
  } else {
    $message[] = 'incorrect username or password!';
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

  <link rel="stylesheet" href="../css/style.css" />

  <title>NSACP HOSPITAL</title>
</head>

<body>

  <?php
  if (isset($message)) {
    foreach ($message as $message) {
      echo '
         <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
    }
  }
  ?>

  <section class="vh-100" style="background-color: #0489b1">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem">
            <div class="row g-0">
              <div class="col-md-3 col-lg-12 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <form action="" method="POST">
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #55acee"></i>
                      <span class="h1 fw-bold mb-0">Admin Login</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px">
                      Sign into Admin
                    </h5>

                    <div class="form-outline mb-4">
                      <input type="text" name="name" required="" class="form-control form-control-lg" placeholder="Enter your Name" />
                      <label class="form-label" for="form2Example17">Name</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" name="pass" id="form2Example27" required="" class="form-control form-control-lg" placeholder="Enter password" />
                      <label class="form-label" for="form2Example27">Password</label>
                    </div>

                    <div class="d-flex justify-content-center">
                      <div class="mt-3">
                        <input type="submit" value="login now" class="btn main-btn btn-lg btn-block" name="submit">
                      </div>
                    </div>
                    <div class="text-center align-items-center">
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

  <script src="../js/admin.js"></script>

  <!-- link bootstrap js -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>