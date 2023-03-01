<?php
$product_id = $_GET['product_id'];
session_start();
unset($_SESSION['products']);
header('Location: ../index.php');
