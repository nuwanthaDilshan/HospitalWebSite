<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = '';
};

if (isset($_POST['send'])) {

  $name = $_POST['name'];
  $name = filter_var($name, FILTER_SANITIZE_STRING);
  $email = $_POST['email'];
  $email = filter_var($email, FILTER_SANITIZE_STRING);
  $number = $_POST['number'];
  $number = filter_var($number, FILTER_SANITIZE_STRING);
  $msg = $_POST['msg'];
  $msg = filter_var($msg, FILTER_SANITIZE_STRING);

  $select_message = $conn->prepare("SELECT * FROM `contactus` WHERE name = ? AND email = ? AND number = ? AND message = ?");
  $select_message->execute([$name, $email, $number, $msg]);

  if ($select_message->rowCount() > 0) {
    $message[] = 'already sent message!';
  } else {

    $insert_message = $conn->prepare("INSERT INTO `contactus`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
    $insert_message->execute([$user_id, $name, $email, $number, $msg]);

    $message[] = 'sent message successfully!';
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- link css -->
  <link rel="stylesheet" href="css/style.css" />

  <title>NSACP HOSPITAL</title>
</head>

<body>

  <!-- navigation bar -->
  <?php
  include "./components/userheader.php"
  ?>

  <br />
  <br />

  <!-- call -->
  <section class="call">
    <div class="container text-center py-5">
      <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
          <a class="nav-link" style="color: #000" href=""><span style="color: #55acee; font-size: 40px"><i class="fas fa-phone-alt"></i></span>
            <h5>Give Us a Short call</h5>
            <p>+94 112345879</p>
          </a>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
          <a class="nav-link" style="color: #000" href="https://www.google.com/"><span style="color: #55acee; font-size: 40px"><i class="fab fa-google"></i></span>
            <h5>Search Us on Google</h5>
          </a>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
          <a class="nav-link" style="color: #000" href=""><span style="color: #55acee; font-size: 40px"><i class="fas fa-envelope"></i></span>
            <h5>nsacp@gmail.com</h5>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- contact -->
  <section class="contact" id="contact">
    <div class="container text-white py-5">
      <h1 class="text-center">Contact Us</h1>
      <div class="row">
        <div class="col-lg-5 col-md-12 col-sm-12 col-12">
          <form method="POST" action="" class="form-group">
            Name
            <input type="text" class="form-control mb-3" style="
                  background-color: rgba(0, 0, 0, 0) important;
                  color: black;
                " name="name" placeholder="Enter your name.." required="" />
            Email
            <input type="email" class="form-control mb-3" style="
                  background-color: rgba(0, 0, 0, 0) important;
                  color: black;
                  " name="email" placeholder="Enter your email.." />
            Mobile Number
            <input type="text" class="form-control mb-3" style="
                  background-color: rgba(0, 0, 0, 0) important;
                  color: black;
                  " name="number" placeholder="Enter your mobile number.." required="" />
            Message
            <input type="text" class="form-control mb-3" style="
                              background-color: rgba(0, 0, 0, 0) important;
                              color: black;
                            " name="msg" placeholder="Enter your message.." required="" />
            <div class="d-flex justify-content-center">
              <input type="submit" value="send message" name="send" class="btn option-btn btn-size float-right py-2">
            </div>
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- footer -->
  <?php

  include "./components/footer.php";
  ?>


  <script src="./js/script.js"></script>


  <!-- link bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>