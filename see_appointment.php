<?php

include './components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = '';
};

if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  $delete_order = $conn->prepare("DELETE FROM `appointment` WHERE id = ?");
  $delete_order->execute([$delete_id]);
  header('location:see_appointment.php');
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



  <section class="dashboard">

    <div class="container">
      <div class="d-flex justify-content-center">
        <p class="text-uppercase fs-1 fw-bolder my-3">Your Appointment</p>
      </div>

      <?php
      $select_orders = $conn->prepare("SELECT * FROM `appointment`");
      $select_orders->execute();
      if ($select_orders->rowCount() > 0) {
        while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
      ?>

          <div class="continer text-center align-items-center">
            <div class="row my-4">
              <div class="col-3 mx-2 shadow-lg p-3 mb-5 bg-body rounded box">
                <p> Patient Name : <span><?= $fetch_orders['PatientName']; ?></span> </p>
                <p> Patient Mobile Number : <span><?= $fetch_orders['PatientMobileNumber']; ?></span> </p>
                <p> Doctor : <span><?= $fetch_orders['Doctor']; ?></span> </p>
                <form action="" method="post">
                  <div class="flex-btn">
                    <a href="see_appointment.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
                  </div>
                </form>
              </div>
            </div>
          </div>

      <?php
        }
      } else {
        echo '<p class="empty">no orders placed yet!</p>';
      }
      ?>
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