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
  <?php

  include "./components/userheader.php";

  ?>

  <section class="aboutMain">
    <div class="container text-white pb-5">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-sm-12 col-12">
          <h1>
            YOUR SMILE <br />
            OUR <span style="color: #5bc0de">PASSION</span><br />
            YOUR LIFE
          </h1>
        </div>
      </div>
    </div>
  </section>

  <section class="about">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
          <img src="Images/about.jpg" class="img-fluid" style="border-radius: 40px" alt="" />
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-12 text-center">
          <h1 class="py-2 text-center" style="color: #5bc0de">About Us</h1>
          <p class="text-center pl-5">
            The National STD/AIDS Control program of the ministory of health
            is the main goverment organization which coordinate the national
            responce to sexual transmitted infections including HIV/AIDS in
            sri lanka
          </p>
          <div class="d-flex justify-content-center">
            <a class="btn main-btn mt-3 " style="width: 25%;">
              Read More
            </a>
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