<?php
  include('bradapis.php');
  session_start();

  if(!isset($_SESSION['member'])){
    header('Location: 60_sessionLogin.php');
  }
  $member = $_SESSION['member'];
  ?>
  brad company
  <hr>
  Main Page
  <hr>
  Welcome, <?php echo $member->getName(); ?>
  <hr>
  <!-- 圖片格式;儲存格式;那串base64 -->
  <img src="data:image/png;base64,<?php echo base64_encode($member->getIcon()); ?>" alt="">
  <hr>
  <a href="60_logout.php">Logout</a>
  <hr>
