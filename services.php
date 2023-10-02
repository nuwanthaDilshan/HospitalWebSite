<?php

include 'components/connect.php';

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

  <!-- service -->

  <section class="service" id="service">
    <div class="container text-center py-5">
      <h1>Our Services</h1>
      <hr />
      <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 mb-3">
          <span><i class="fas fa-user-nurse"></i></span>
          <h2 class="font-weight-light">Team of Nurses</h2>
          <p>
            we have well trained nurses. they have good knowledge and best experiance. they took to you kindly
          </p>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 mb-3">
          <span><i class="fas fa-briefcase-medical"></i></span>
          <h2 class="font-weight-light">Aid Boxes</h2>
          <p>
            we have best medicine in best brands. local and imported.
          </p>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 mb-3">
          <span><i class="fas fa-syringe"></i></span>
          <h2 class="font-weight-light">Better Treatment</h2>
          <p>
            we provide best treatment for you. we sure you will get better from it
          </p>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
          <span><i class="fas fa-microscope"></i></span>
          <h2 class="font-weight-light">Disease Recovery</h2>
          <p>
            we promice you, you will get well soon with happiest mind and knowing about safer sex
          </p>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
          <span><i class="fas fa-stethoscope"></i></span>
          <h2 class="font-weight-light">Ckeck-up Time</h2>
          <p>
            we have best doctors. They have best knowledge and best experiance. you can get help from them 24 hours.
          </p>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
          <span><i class="fas fa-ambulance"></i></span>
          <h2 class="font-weight-light">Active Emergency</h2>
          <p>
            if you know about something or get service from us immediatly, we are standing for you
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- footer -->

  <?php

  include "./components/footer.php";

  ?>



  <script src="./js/script.js"></script>


  <!-- link bootstrap js -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>