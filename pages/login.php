<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
      <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
      <?php
      session_start();
      require_once '../helpers/authentication.php';
      $authenticated = 2;

      if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
      }
      if (isset($_GET['logout'])) {
            logout();
            header('location:login.php');
      }
      if (isset($_SESSION['user'])) {
            header('location:../index.php');
      }
      if (isset($_POST['login-btn'])) {
            $users = simplexml_load_file('../store/users.xml');
            if (!empty(trim($_POST['email'])) && !empty(trim($_POST['pass']))) {
                  $authenticated = login($users, $_POST['email'], $_POST['pass']);
                  if ($authenticated == 1) {
                        header('location:../index.php?name=' . $_SESSION['user']['name'] . '&email=' . $_SESSION['user']['email']);
                  }
            }
      }
      ?>
      <header class="navbar w-100">
            <div class="container-fluid">
                  <h1>
                        <a class="navbar-brand" href="#">
                              <img src="../img/logo." alt="logo" width="40" height="30" class="d-inline-block align-text-top">
                              Textil Export
                        </a>
                  </h1>
            </div>
      </header>
      <main>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" class="login" method="post">
                  <h1>Login</h1>
                  <div class="mb-3">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="email" name="email" value='<?= $authenticated == -1 || $authenticated == 2 ? '' : $_POST['email'] ?>'>
                  </div>
                  <div class="mb-3">
                        <label for="pass" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="email" name="pass">
                  </div>
                  <?php
                  if ($authenticated == 0) {
                        echo "<p class='error'>Las credenciales fueron incorrectas</p>";
                  }
                  if ($authenticated == -1) {
                        echo "<p class='error'>El usuario no existe</p>";
                  }
                  ?>
                  <div>
                        <input type="submit" class="btn btn-primary mb-3" value="Ingresar" name="login-btn">
                        <a href="./signup.php" class="btn btn-primary mb-3">No tengo un usuario</a>
                  </div>
            </form>
      </main>
</body>

</html>