<?php ob_start();
session_start();
unset($_SESSION['uname']);
unset($_SESSION['pass']);
session_destroy();
header("Location:index.php");
?>
