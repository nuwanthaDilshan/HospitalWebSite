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

  <section class="dashboard" style="background-color: #0489b1">

    <div class="container">
      <div class="d-flex justify-content-center">
        <p class="text-uppercase fs-1 fw-bolder my-3">user dashboard</p>
      </div>

      <div class="continer text-center align-items-center">
        <div class="row my-4">
          <div class="col-6 mx-2 shadow-lg p-3 mb-5 bg-body rounded profile_box">
            <p class="fs-3">welcome!</p>
            <p class="fs-5"><?= $fetch_profile['Name']; ?></p>
            <a href="update_user.php" class="option-btn">update profile</a>
          </div>

          <div class="col-6 mx-2 shadow-lg p-3 mb-5 bg-body rounded profile_box">
            <?php
            $select_appointments = $conn->prepare("SELECT * FROM `appointment` WHERE user_id = ?");
            $select_appointments->execute([$user_id]);
            $number_of_appointments = $select_appointments->rowCount()
            ?>
            <p class="fs-3"><?= $number_of_appointments; ?></p>
            <p class="fs-5">Make Appointment</p>
            <a href="appointment.php" class="option-btn">Make Appointmet</a>
          </div>
        </div>
      </div>
      <div class="continer text-center align-items-center">
        <div class="row my-4 d-flex justify-content-center">
          <div class=" col-12 mx-2 shadow-lg p-3 mb-5 bg-body rounded profile_box ">
            <?php
            $select_appointments = $conn->prepare("SELECT * FROM `appointment` WHERE user_id = ?");
            $select_appointments->execute([$user_id]);
            $number_of_appointments = $select_appointments->rowCount()
            ?>
            <p class="fs-3"><?= $number_of_appointments; ?></p>
            <p class="fs-5">See Appointments</p>
            <a href="see_appointment.php" class="option-btn">See Appointmets</a>
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