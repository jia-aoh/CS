<?php
  include('bradapis.php');

  session_start();

  //沒拿到直接彈到48
  if(!isset($_SESSION['lottery'])){
    header('Location: brad48session.php');

  }

  $lottery = $_SESSION['lottery'];
  $brad = $_SESSION['std1'];

?>

Lottery: <?php var_dump($lottery); ?><hr>
<?php
  echo $brad->getName() . ':' . $brad->sum() . ':' . $brad->avg();
?><hr>
<a href="50_session.php">Logout</a>