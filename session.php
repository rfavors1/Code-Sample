<?php
session_start();
$_SESSION['email'] = $_GET['email'];
echo $_SESSION['email'];
?>