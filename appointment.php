<?php

include "./components/connect.php";

if (isset($_POST['Add'])) {

  $PatientName = $_POST['PatientName'];
  $PatientMobileNumber = $_POST['PatientMobileNumber'];
  $Doctor = $_POST['Doctor'];


  $query = "INSERT INTO `appointment`(`PatientName`, `PatientMobileNumber`, `Doctor`) VALUES ('$PatientName','$PatientMobileNumber','$Doctor')";
  $query_run = mysqli_query($connection, $query);

  if ($query_run) {
    header('Location: appointment.php');
  } else {
    echo '<script type="text/javascript"> alert("Data not Added")</script>';
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

  <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="Bootstrap/css/bootstrap.css" />

  <!-- link font awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- link css -->

  <link rel="stylesheet" href="css/style.css" />

  <title>NSACP HOSPITAL</title>
</head>

<body>
  <?php

  include "./components/navbar.php"

  ?>

  <br />
  <br />

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
                      <input type="text" name="PatientName" id="form2Example17" class="form-control form-control-lg" required="" placeholder="Enter Name" />
                      <label class="form-label" for="form2Example17">Patient Name</label>
                    </div>
                    <div class="form-outline mb-4">
                      <input type="text" name="PatientMobileNumber" id="form2Example17" class="form-control form-control-lg" required="" placeholder="Enter Mobile Number" />
                      <label class="form-label" for="form2Example17">Patient Mobile Number</label>
                    </div>
                    <div class="form-outline mb-4">
                      <input type="text" name="Doctor" id="form2Example27" class="form-control form-control-lg" placeholder=" Enter Doctor Name" />
                      <label class="form-label" for="form2Example27">Doctor</label>
                    </div>

                    <div class="pt-1 mb-3 text-center">
                      <button class="btn btn-info pr-5 pl-5" name="Add" type="submit">
                        Create
                      </button>

                      <br />
                      <a href="login.html" class="nav-link btn-lg" style="color: #55acee;"><i class="fas fa-hand-point-left" style="color: #55acee;"></i> <span>Back</span></a>
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

  <!-- link bootstrap js -->
  <script src="./js/script.js"></script>
  
</body>

</html>