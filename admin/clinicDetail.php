<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
  header('location:adminLogin.php');
}

if (isset($_POST['delete'])) {
  $clinicdetail_id = $_POST['clinicdetail_id'];
  $delete_clinicdetail = $conn->prepare("DELETE FROM `clinicdetail` WHERE No = ?");
  $delete_clinicdetail->execute([$clinicdetail_id]);
  $message[] = 'clinic detail deleted successfully!';
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
        <p class="text-uppercase fs-1 fw-bolder my-3">Manage Clinic details</p>
      </div>

      <div class="continer text-center align-items-center">
        <div class="d-flex justify-content-center">
          <div class="mx-2 shadow-lg p-3 bg-body rounded profile_box">
            <?php
            $select_clinicdetail = $conn->prepare("SELECT * FROM `clinicdetail`");
            $select_clinicdetail->execute();
            $number_of_clinicdetail = $select_clinicdetail->rowCount()
            ?>
            <p class="fs-3"><?= $number_of_clinicdetail; ?></p>
            <p class="fs-5">Add Clinic Detail</p>
            <a href="addClinicdetail.php" class="option-btn">Add Clinic Detail</a>
          </div>
        </div>
      </div>
    </div>

  </section>

  <section class="vh-1000" style="background-color: #0489b1">
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
                      <span class="h1 fw-bold mb-0">Clinic Detail</span>
                    </div>
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Disease</th>
                          <th>Treatment</th>
                          <th>Testing</th>
                          <th>Doctor</th>
                          <th>Day</th>
                          <th>Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $select_clinicdetail = $conn->prepare("SELECT * FROM `clinicdetail`");
                        $select_clinicdetail->execute();
                        while ($row = $select_clinicdetail->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                          <tr>
                            <td><?= $row['Disease']; ?></td>
                            <td><?= $row['Treatment']; ?></td>
                            <td><?= $row['Testing']; ?></td>
                            <td><?= $row['Doctor']; ?></td>
                            <td><?= $row['Day']; ?></td>
                            <td><?= $row['Time']; ?></td>
                            <td>
                              <form method="POST" action="">
                                <input type="hidden" name="clinicdetail_id" value="<?= $row['No']; ?>">
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