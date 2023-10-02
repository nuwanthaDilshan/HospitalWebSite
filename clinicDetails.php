<?php

include "./components/connect.php";

  session_start();

  if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
  } else {
    $user_id = '';
  };


if (isset($_POST['search'])) {
  $valueToSearch = $_POST['searchdetails'];
  // search in all table columns
  // using concat mysql function
  $query = "SELECT * FROM `clinicdetail` WHERE  CONCAT(`No`,`Disease`,`Doctor`,`Treatment`,`Testing`) LIKE '%" . $valueToSearch . "%'";
  $search_result = filterTable($query);
} else {
  $query = "SELECT * FROM `clinicdetail` WHERE 1";
  $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
  $connect = mysqli_connect("127.0.0.1", "root", "", "hospital");
  $filter_Result = mysqli_query($connect, $query);
  return $filter_Result;
}

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



  <section class="vh-1000" style="background-color: #0489B1;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-11">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-3 col-lg-12 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <h1 class="text-center"> STD/AIDS Control program Sexual health clinic</h1>

                  <form class="mx-2 my-auto w-100" action="clinicDetails.php" method="post">
                    <div class="d-flex justify-content-center my-3">
                      <input class="form-control mr-sm-2 mx-3" type="text" name="searchdetails" placeholder=" Search Details">
                      <input class="btn btn-info float-right my-2 my-sm-0 " type="submit" name="search" value="Search">
                    </div>

                    <table>
                      <tr>
                        <th> No </th>
                        <th> Disease </th>
                        <th> Treatment </th>
                        <th> Testing </th>
                        <th> Doctor </th>
                        <th> Day </th>
                        <th> Time </th>
                      </tr>

                      <!-- populate table from mysql database -->
                      <?php while ($row = mysqli_fetch_array($search_result)) : ?>
                        <tr>
                          <td><?php echo $row['No']; ?></td>
                          <td><?php echo $row['Disease']; ?></td>
                          <td><?php echo $row['Treatment']; ?></td>
                          <td><?php echo $row['Testing']; ?></td>
                          <td><?php echo $row['Doctor']; ?></td>
                          <td><?php echo $row['Day']; ?></td>
                          <td><?php echo $row['Time']; ?></td>
                        </tr>
                      <?php endwhile; ?>
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