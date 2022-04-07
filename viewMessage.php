<?php

if (isset($_POST['search'])) {
  $valueToSearch = $_POST['searchdetails'];
  // search in all table columns
  // using concat mysql function
  $query = "SELECT * FROM `contactus` WHERE 1";
  $search_result = filterTable($query);
} else {
  $query = "SELECT * FROM `contactus` WHERE 1";
  $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
  $connect = mysqli_connect("127.0.0.1", "root", "", "hospital2");
  $filter_Result = mysqli_query($connect, $query);
  return $filter_Result;
}

?>

<!DOCTYPE html>
<html>

<head>

  <!-- link bootstrap -->

  <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">

  <!-- link font awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

  <!-- link css -->

  <link rel="stylesheet" href="css/style.css">

  <title>NSACP HOSPITAL</title>

  <style>
    table,
    tr,
    th,
    td {
      margin: auto;
      border: 1px solid black;
    }
  </style>
</head>

<body>

  <!-- navigation bar -->

  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="Images/logo.jpg" width="50px" height="30px" class="d-inline-block align-top" alt="">
      NSACP
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link text-info font-weight-bold" href="index.html">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.html">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminLogin.html">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="doctorLogin.html">Doctor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactUs.html">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutUs.html">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ml-4" href="login.html">Sign In</a>
        </li>
        <li class="nav-item" style="color: Warning;">
          <a class="nav-link btn btn-info pl-4 pr-4 btn-sm" href="register.html">Join</a>
        </li>
      </ul>
    </div>
  </nav>

  <br>
  <br>



  <section class="vh-200" style="background-color: #0489B1;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-11">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-3 col-lg-12 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <h1 class="text-center"> STD/AIDS Control program Sexual health clinic</h1>

                  <form class="mx-2 my-auto w-100" action="" method="post">

                    <br><br>

                    <table>
                      <tr>
                        <th> Name </th>
                        <th> Message </th>
                        <th> Email </th>
                        <th> Mobile </th>
                      </tr>

                      <!-- populate table from mysql database -->
                      <?php while ($row = mysqli_fetch_array($search_result)) : ?>
                        <tr>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['message']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['mobile']; ?></td>
                        </tr>
                      <?php endwhile; ?>
                    </table>
                  </form>

                  <br>
                  <br>
                      <a href="admin.html" class="nav-link btn-lg text-center" style="color: #55acee;"><i class="fas fa-hand-point-left" style="color: #55acee;"></i> <span>Back</span></a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- footer -->

  <section class="footer">
    <footer class="bg-light text-center text-white">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
          <!-- Facebook -->
          <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

          <!-- Twitter -->
          <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>

          <!-- Google -->
          <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button"><i class="fab fa-google"></i></a>

          <!-- Instagram -->
          <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>

          <!-- Linkedin -->
          <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
          <!-- Github -->
          <a class="btn btn-primary btn-floating m-1" style="background-color: #333333;" href="#!" role="button"><i class="fab fa-github"></i></a>
        </section>
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        &copy 2021 Copyright:
        <a class="text-white" href="#">NSACP.com</a>
      </div>
      <!-- Copyright -->
    </footer>
  </section>

  <!-- link bootstrap js -->

  <script src="Bootstrap/js/bootstrap.js"></script>
  <script src="Bootstrap/js/jquery.min.js"></script>
  <script src="Bootstrap/js/popper.min.js"></script>
  <script src="Bootstrap/js/bootstrap.min.js"></script>

</body>

</html>