<div class="offcanvas offcanvas-end" tabindex="-1" id="offCanvaShoppingCart" aria-labelledby="offcanvasShoppingCartLabel">
      <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasShoppingCartLabel">Mi carrito</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
            <?php
            if (isset($_SESSION['products'])) {
                  $cantProd = 0;
                  foreach ($products as $product) {
                        if (isset($_SESSION['products'][strval($product->id)])) {
                              $cantProd += $_SESSION['products'][strval($product->id)];
                        }
                  }
                  if ($cantProd > 0) {
            ?>
                        <table class="table table-striped">
                              <thead>
                                    <tr>
                                          <th>Producto</th>
                                          <th>Nombre</th>
                                          <th>Categoría</th>
                                          <th>Precio</th>
                                          <th>Cantidad</th>
                                          <th>Subtotal</th>
                                          <th>Acciones</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($products as $product) {
                                          if (isset($_SESSION['products'][strval($product->id)])) {
                                                $quantity = $_SESSION['products'][strval($product->id)];
                                                $subtotal = $product->price * $quantity;
                                                $total += $subtotal;
                                    ?>
                                                <tr>
                                                      <td><img class="shopping-img" src="./img/<?= $product->img ?>"></td>
                                                      <td><?= $product->name ?></td>
                                                      <td><?= $product->category ?></td>
                                                      <td>$<?= number_format((float) $product->price, 2, '.', '') ?></td>
                                                      <td><?= $quantity ?></td>
                                                      <td>$<?= number_format((float) $subtotal, 2, '.', '') ?></td>
                                                      <td>
                                                            <a href="./helpers/addToCart.php?product_id=<?= $product->id ?>" class="btn btn-primary">+</a>
                                                            <a href="./helpers/removeOneToCart.php?product_id=<?= $product->id ?>" class="btn btn-danger">-</a>
                                                      </td>
                                                </tr>
                                    <?php
                                          }
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                    <tr>
                                          <td colspan="6" class="text-end"><b>Total</b></td>
                                          <td>$<?= number_format((float) $total, 2, '.', '') ?></td>
                                    </tr>
                              </tfoot>
                        </table>
                        <a href="./helpers/removeShoppingCart.php" class="btn btn-danger">Borrar todos los objetos del carrito</a>
                        <a href="./helpers/quotePrices.php" class="btn btn-primary">Enviar cotización</a>
                  <?php
                  } else {
                  ?>
                        <p>No hay productos en el carrito</p>
                  <?php
                  }
            } else {
                  ?>
                  <p>No hay productos en el carrito</p>
            <?php
            }
            ?>

      </div>
</div>