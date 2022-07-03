<?php
session_start();
unset($_SESSION['odmsaid']);
session_destroy();
header('Location:index.php');
?>
