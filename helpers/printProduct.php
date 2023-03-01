<div class="card p-3">
      <div class="card-img-container"><img src="./img/<?= $product->img ?>" class="card-img"></div>
      <div class="card-body">
            <div class="d-flex justify-content-between">
                  <h4><?= $product->name ?></h4>
                  <a class="btn btn-primary m-1 p-1 d-flex align-items-center h-50" href="./helpers/addToCart.php?product_id=<?= $product->id ?>">
                        <i class="bi bi-bag-plus-fill "></i>
                  </a>
            </div>
            <div>
                  <p><?= $product->category ?></p>
            </div>
            <span class="price">$<?= number_format((float) $product->price, 2, '.', '') ?></span>
      </div>
</div>