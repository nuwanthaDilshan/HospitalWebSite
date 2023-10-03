<?php

include "./components/connect.php";

session_start();

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = '';
};


// if (isset($_POST['search'])) {
//   $valueToSearch = $_POST['searchdetails'];
//   // search in all table columns
//   // using concat mysql function
//   $query = "SELECT * FROM `clinicdetail` WHERE  CONCAT(`No`,`Disease`,`Doctor`,`Treatment`,`Testing`) LIKE '%" . $valueToSearch . "%'";
//   $search_result = filterTable($query);
// } else {
//   $query = "SELECT * FROM `clinicdetail` WHERE 1";
//   $search_result = filterTable($query);
// }

// // function to connect and execute the query
// function filterTable($query)
// {
//   $connect = mysqli_connect("127.0.0.1", "root", "", "hospital");
//   $filter_Result = mysqli_query($connect, $query);
//   return $filter_Result;
// }

?>

<!DOCTYPE html>
<html>

<head>

  <!-- link bootstrap -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


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

  <?php

  include "./components/userheader.php"

  ?>



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
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $select_appointments = $conn->prepare("SELECT * FROM `clinicdetail`");
                        $select_appointments->execute();
                        while ($row = $select_appointments->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                          <tr>
                            <td><?= $row['Disease']; ?></td>
                            <td><?= $row['Treatment']; ?></td>
                            <td><?= $row['Testing']; ?></td>
                            <td><?= $row['Doctor']; ?></td>
                            <td><?= $row['Day']; ?></td>
                            <td><?= $row['Time']; ?></td>
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


  <?php

  include "./components/footer.php"

  ?>

  <script src="./js/script.js"></script>


  <!-- link bootstrap js -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>