<?php

include "./components/connect.php";

session_start();

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = '';
};

if (isset($_POST['submit'])) {

  $name = $_POST['PatientName'];
  $name = filter_var($name, FILTER_SANITIZE_STRING);
  $MobileNumber = $_POST['PatientMobileNumber'];
  $MobileNumber = filter_var($MobileNumber, FILTER_SANITIZE_STRING);
  $Doctor = $_POST['Doctor'];
  $Doctor = filter_var($Doctor, FILTER_SANITIZE_STRING);

  $select_user = $conn->prepare("SELECT * FROM `appointment` WHERE PatientName = ? AND PatientMobileNumber = ? AND Doctor = ? ");
  $select_user->execute([$name, $MobileNumber, $Doctor,]);
  $row = $select_user->fetch(PDO::FETCH_ASSOC);

  if ($select_user->rowCount() > 0) {
    $message[] = 'appointment already exists!';
  } else {
    $insert_user = $conn->prepare("INSERT INTO `appointment`(user_id, PatientName, PatientMobileNumber, Doctor) VALUES(?,?,?,?)");
    $insert_user->execute([$user_id, $name, $MobileNumber, $Doctor]);
    $message[] = 'appointment successfully';
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


  <!-- link css -->
  <link rel="stylesheet" href="css/style.css" />

  <title>NSACP HOSPITAL</title>
</head>

<body>
  <?php

  include "./components/userheader.php"

  ?>
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
                      <span class="h1 fw-bold mb-0">Appointment</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px">
                      Appointment Details
                    </h5>

                    <div class="form-outline mb-4">
                      <input type="text" name="PatientName" id="form2Example17" class="form-control form-control-lg" required="" placeholder="Enter Name" value="<?= $fetch_profile["Name"]; ?>" />
                      <label class="form-label" for="form2Example17">Patient Name</label>
                    </div>
                    <div class="form-outline mb-4">
                      <input type="text" name="PatientMobileNumber" id="form2Example17" class="form-control form-control-lg" required="" placeholder="Enter Mobile Number" value="<?= $fetch_profile["MobileNumber"]; ?>" />
                      <label class="form-label" for="form2Example17">Patient Mobile Number</label>
                    </div>
                    <div class="form-outline mb-4">
                      <input type="text" name="Doctor" required="" class="form-control form-control-lg" placeholder=" Enter Doctor Name" />
                      <label class="form-label" for="form2Example27">Doctor</label>
                    </div>

                    <div class="pt-1 mb-3 text-center">
                      <div class="d-flex justify-content-center">
                        <div class="mt-3">
                          <input type="submit" value="Make Appointment" class="btn main-btn btn-lg btn-block" name="submit">
                        </div>
                      </div>
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

  <!-- footer -->
  <?php
  include "./components/footer.php"
  ?>

  <script src="./js/script.js"></script>

  <!-- link bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>