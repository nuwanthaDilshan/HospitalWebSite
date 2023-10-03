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
  $delete_appointment = $conn->prepare("DELETE FROM `appointment` WHERE id = ?");
  $delete_appointment->execute([$delete_id]);
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
        <p class="text-uppercase fs-1 fw-bolder my-3">My Appointments</p>
      </div>

      <div class="row">
        <?php
        $select_appointments = $conn->prepare("SELECT * FROM `appointment` WHERE user_id = ?");
        $select_appointments->execute([$user_id]);
        $counter = 0;
        while ($fetch_appointments = $select_appointments->fetch(PDO::FETCH_ASSOC)) {
          if ($counter % 3 == 0) {
            echo '</div><div class="row my-4">';
          }
        ?>

          <div class="col-md-3 mx-2 shadow-lg p-3 mb-5 bg-body rounded box">
            <p> Patient Name : <span><?= $fetch_appointments['PatientName']; ?></span> </p>
            <p> Patient Mobile Number : <span><?= $fetch_appointments['PatientMobileNumber']; ?></span> </p>
            <p> Doctor : <span><?= $fetch_appointments['Doctor']; ?></span> </p>
            <form action="" method="post">
              <div class="flex-btn">
                <a href="see_appointment.php?delete=<?= $fetch_appointments['id']; ?>" class="delete-btn" onclick="return confirm('delete this appointment?');">delete</a>
              </div>
            </form>
          </div>

        <?php
          $counter++;
        }
        ?>
      </div>

      <?php
      if ($counter == 0) {
        echo '<p class="empty">no appointments placed yet!</p>';
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