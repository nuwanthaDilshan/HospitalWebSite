<?php

include './components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = '';
};

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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


  <!-- link css -->

  <link rel="stylesheet" href="css/style.css" />

  <title>NSACP HOSPITAL</title>
</head>

<body>
  <!-- navigation bar -->
  <?php

  include "./components/userheader.php"

  ?>
  <!-- home -->
  <div>
    <div id="hero" class="col-12 min-vh-100 text-center align-items-center d-flex">
      <div class="container">
        <div class="col-12">
          <div>
            <h1 class="heroText text-white">National STD/AIDS Control Program</h1>
            <h2 class="text-white py-3">our sexual health clinic provide lot of information about sex, sex
              education,<br> testing and treatment for STD and advices about safer sex.</h2>
          </div>
          <div class="d-flex justify-content-center">
            <!-- <a href="./clinicDetails.php" class="btn main-btn btn-size" onclick="return confirm('Please Login to See Clinic Details!');"> Clinic Details </a> -->
            <a href="./clinicDetails.php" class="btn main-btn btn-size"> Clinic Details </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- footer -->
  <?php
  include "./components/footer.php"
  ?>

  <script src="./js/script.js"></script>

  <!-- link bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>