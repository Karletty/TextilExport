<?php
include_once('./generatePDF.php');
$products = simplexml_load_file("../store/products.xml");
$shoppingCart = [];
session_start();

foreach ($products as $product) {
      if (isset($_SESSION['products'][strval($product->id)])) {
            array_push($shoppingCart, array(
                  "img" => $product->img,
                  "name" => $product->name,
                  "category" => $product->category,
                  "price" => $product->price,
                  "quantity" => $_SESSION['products'][strval($product->id)],
            ));
      }
}

generatePDF($shoppingCart, $_SESSION['user']);

header('Location: ../index.php');
