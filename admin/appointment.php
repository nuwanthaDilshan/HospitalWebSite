<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
  header('location:adminLogin.php');
}

if (isset($_POST['delete'])) {
  $user_id = $_POST['user_id'];
  $delete_user = $conn->prepare("DELETE FROM `appointment` WHERE id = ?");
  $delete_user->execute([$user_id]);
  $message[] = 'User deleted successfully!';
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

  <section class="dashboard" style="background-color: #0489b1">

    <div class="container">
      <div class="d-flex justify-content-center">
        <p class="text-uppercase fs-1 fw-bolder my-3">user dashboard</p>
      </div>

      <div class="continer text-center align-items-center">
        <div class="d-flex justify-content-center">
          <div class="mx-2 shadow-lg p-3 bg-body rounded profile_box">
            <?php
            $select_appointments = $conn->prepare("SELECT * FROM `appointment`");
            $select_appointments->execute();
            $number_of_appointments = $select_appointments->rowCount()
            ?>
            <p class="fs-3"><?= $number_of_appointments; ?></p>
            <p class="fs-5">Make Appointment</p>
            <a href="makeAppointment.php" class="option-btn">Make Appointmet</a>
          </div>
        </div>
      </div>
    </div>

  </section>

  <section class="vh-200" style="background-color: #0489b1">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem">
            <div class="row g-0">
              <div class="col-md-3 col-lg-12 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <form action="" method="POST">
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-tasks fa-3x mr-2" style="color: #55acee"></i>
                      <span class="h1 fw-bold mb-0">Appointments</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px">
                      Manage Appointments
                    </h5>

                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Patient Name</th>
                          <th>Patient Mobile Number</th>
                          <th>Doctor</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $select_appointments = $conn->prepare("SELECT * FROM `appointment`");
                        $select_appointments->execute();
                        while ($row = $select_appointments->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                          <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['PatientName']; ?></td>
                            <td><?= $row['PatientMobileNumber']; ?></td>
                            <td><?= $row['Doctor']; ?></td>
                            <td>
                              <form method="POST" action="">
                                <input type="hidden" name="user_id" value="<?= $row['id']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                              </form>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
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