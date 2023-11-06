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
    <a href="../admin/admin.php" class="logo">Admin<span>Panel</span></a>
    <nav class="navbar">
      <a href="../admin/admin.php">Home</a>
      <a href="../admin/appointment.php">Appointments</a>
      <a href="../admin/clinicDetail.php">Clinic Detail</a>
      <a href="../admin/normalUser.php">Normal Users</a>
      <a href="../admin/adminUsers.php">Admin Users</a>
      <a href="../admin/doctor.php">Doctor Users</a>
      <a href="../admin/message.php">Messages</a>
    </nav>
    <div class="icons">
      <div id="menu-btn" class="fas fa-bars py-2"></div>
      <div id="user-btn" class="fas fa-user py-2"></div>
    </div>
    <div class="profile">
      <?php
      $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
      $select_profile->execute([$admin_id]);
      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      ?>
      <p><?= $fetch_profile['name']; ?></p>
      <a href="../admin/update_profile.php" class="main-btn">update profile</a>
      <div class="flex-btn">
        <a href="#" class="option-btn">register</a>
        <a href="#" class="option-btn">login</a>
      </div>
      <a href="../components/admin_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a>
</div>
  </section>
</header>