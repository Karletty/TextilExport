<?php
$product_id = $_GET['product_id'];
session_start();


if ($_SESSION['products'][$product_id] == 1) {
      unset($_SESSION['products'][$product_id]);
} else {
      $_SESSION['products'][$product_id] -= 1;
}

header('Location: ../index.php');
