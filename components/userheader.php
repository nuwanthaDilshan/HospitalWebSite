<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
         <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
   }
}
?>

<header class="header">
   <section class="flex container">
      <a href="./index.php" class="logo">NSACP<span>.</span></a>
      <nav class="navbar">
         <a href="./index.php">Home</a>
         <a href="./aboutUs.php">About</a>
         <a href="./services.php">Services</a>
         <a href="./contactUs.php">Contact</a>
      </nav>
      <div class="icons">
         <div id="menu-btn" class="fas fa-bars py-2"></div>
         <!-- <a href="search_page.php"><i class="fas fa-search"></i></a> -->
         <div id="user-btn" class="fas fa-user py-2"></div>
      </div>
      <div class="profile">
         <?php
         $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
         $select_profile->execute([$user_id]);
         if ($select_profile->rowCount() > 0) {
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
            <p><?= $fetch_profile["Name"]; ?></p>
            <div class="row">
               <div class="col-6">
                  <a href="./user_profile.php" class="btn option-btn">update profile</a>
               </div>
               <div class="col-6">
                  <a href="./appointment.php" class="btn option-btn">Make Appointment</a>
               </div>
            </div>
            <div class="flex-btn">
               <!-- <a href="register.php" class="option-btn">register</a>
               <a href="login.php" class="option-btn">login</a> -->
            </div>
            <a href="./components/userlogout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a>
         <?php
      
      } else {
         ?>
            <p>please login or register first!</p>
            <div class="flex-btn">
               <a href="register.php" class="option-btn">register</a>
               <a href="login.php" class="option-btn">login</a>
            </div>
         <?php
         }
         ?>
      </div>
   </section>
</header>