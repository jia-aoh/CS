<?php
session_start();
session_destroy();
header('Location: 60_sessionLogin.php');

?>