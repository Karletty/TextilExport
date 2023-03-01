<?php
function printData($shoppingCart)
{
    $total = 0;
    foreach ($shoppingCart as $product) {
        $imgPath = "../img/" . $product['img'];
        include_once "./convertImage.php";
        $img = convertImage($imgPath);
        $subtot = $product['quantity'] * $product['price'];
?>
        <tr>
            <td><img src="<?= $img ?>" width="100" height="100" /></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['category'] ?></td>
            <td>$<?= number_format((float) $product['price'], 2, '.', '')  ?></td>
            <td><?= $product['quantity'] ?></td>
            <td>$<?= number_format((float) $subtot, 2, '.', '')  ?></td>
            <?php
            $total += $subtot;
            ?>
        </tr>
<?php
    }
    return $total;
}
?>