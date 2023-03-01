<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Textil Export</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
      <link rel="stylesheet" href="./styles/style.css">

</head>

<body>
      <?php
      session_start();

      if (!isset($_SESSION['user']) && !isset($_GET['name'])) {
            header('location:./pages/login.php');
      } else if (isset($_GET['name'])) {
            $_SESSION['user'] = array(
                  "name" => $_GET['name'],
                  "email" => $_GET['email'],
            );
            header('location: index.php');
      }
      ?>
      <header class="navbar w-100">
            <div class="container-fluid">
                  <h1>
                        <a class="navbar-brand" href="#">
                              <img src="./img/logo." alt="logo" width="40" height="30" class="d-inline-block align-text-top">
                              Textil Export
                        </a>
                  </h1>
                  <div>
                        <button id="showCart" class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offCanvaShoppingCart" aria-controls="offcanvasShoppingCart">
                              <i class="bi bi-cart4"></i>
                        </button>
                        <a href="./pages/login.php?logout=true" class="btn btn-light">Cerrar sesión</a>
                  </div>
                  <?php
                  $products = simplexml_load_file("./store/products.xml");
                  include_once('./offCanvas/showCart.php');
                  ?>
            </div>
      </header>
      <main class="p-5 d-flex justify-content-center align-items-center">

            <div id="cards-container">
                  <?php
                  foreach ($products as $product) {
                        $shoppingCart[strval($product->id)] = [];
                        include('./helpers/printProduct.php');
                  }
                  ?>
            </div>
      </main>
      <?php
      // $shoppingCart = array(
      //       array(
      //             "img" => "PROD00001.jpg",
      //             "name" => "Camiseta de algodón cuello redondo",
      //             "category" => "Textil",
      //             "price" => 2.50,
      //             "quantity" => 50,
      //       ),
      //       array(
      //             "img" => "PROD00002.jpg",
      //             "name" => "Camiseta de algodón cuello V",
      //             "category" => "Textil",
      //             "price" => 2.90,
      //             "quantity" => 10,
      //       ),
      //       array(
      //             "img" => "PROD00009.jpg",
      //             "name" => "Squeeze",
      //             "category" => "Promocional",
      //             "price" => 3.50,
      //             "quantity" => 20,
      //       ),
      // );
      // include ('./helpers/template.php');
      // include_once './helpers/generatePDF.php';
      // $user = array(
      //       "name" => 'Karletty Elías',
      //       "email" => 'karletty.carolina@gmail.com'
      // );
      // generatePDF($shoppingCart, $user);
      ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>