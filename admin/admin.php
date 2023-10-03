<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
  header('location:adminLogin.php');
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

<body style="background-color: #0489b1">
  <!-- navigation bar -->
  <?php

  include "../components/admin_header.php";
  ?>

  <section class="dashboard">

    <div class="container">
      <div class="d-flex justify-content-center">
        <p class="text-uppercase fs-1 fw-bolder my-3">dashboard.</p>
      </div>

      <div class="continer text-center align-items-center">
        <div class="row my-4">
          <div class="col-4 mx-2 shadow-lg p-3 mb-5 bg-body rounded box">
            <p class="fs-3">welcome!</p>
            <p class="fs-5"><?= $fetch_profile['name']; ?></p>
            <a href="update_profile.php" class="option-btn">update profile</a>
          </div>

          <div class="col-4 mx-2 shadow-lg p-3 mb-5 bg-body rounded box">
            <?php
            $select_orders = $conn->prepare("SELECT * FROM `appointment`");
            $select_orders->execute();
            $number_of_orders = $select_orders->rowCount()
            ?>
            <p class="fs-3"><?= $number_of_orders; ?></p>
            <p class="fs-5">Appointment</p>
            <a href="placed_orders.php" class="option-btn">See Appointmet</a>
          </div>

          <div class="col-4 mx-2 shadow-lg p-3 mb-5 bg-body rounded box">
            <?php
            $select_products = $conn->prepare("SELECT * FROM `clinicdetail`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount()
            ?>
            <p class="fs-3"><?= $number_of_products; ?></p>
            <p class="fs-5">Clinic Detail</p>
            <a href="products.php" class="option-btn">See Clinic Detail</a>
          </div>

        </div>

        <div class="row">
          <div class="col-4 mx-2 shadow-lg p-3 mb-5 bg-body rounded box">
            <?php
            $select_users = $conn->prepare("SELECT * FROM `users`");
            $select_users->execute();
            $number_of_users = $select_users->rowCount()
            ?>
            <p class="fs-3"><?= $number_of_users; ?></p>
            <p class="fs-5">Normal Users</p>
            <a href="users_accounts.php" class="option-btn">See Users</a>
          </div>

          <div class="col-4 mx-2 shadow-lg p-3 mb-5 bg-body rounded box">
            <?php
            $select_admins = $conn->prepare("SELECT * FROM `admins`");
            $select_admins->execute();
            $number_of_admins = $select_admins->rowCount()
            ?>
            <p class="fs-3"><?= $number_of_admins; ?></p>
            <p class="fs-5">Admin Users</p>
            <a href="admin_accounts.php" class="option-btn">See Admins</a>
          </div>

          <div class="col-4 mx-2 shadow-lg p-3 mb-5 bg-body rounded box">
            <?php
            $select_messages = $conn->prepare("SELECT * FROM `contactus`");
            $select_messages->execute();
            $number_of_messages = $select_messages->rowCount()
            ?>
            <p class="fs-3"><?= $number_of_messages; ?></p>
            <p class="fs-5">New Messages</p>
            <a href="messages.php" class="option-btn">See Messages</a>
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