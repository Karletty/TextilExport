<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Cotización</h1>
        <br />
        <table class="table table-sm table-striped ">
            <thead>
                <th scope="col">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoria</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Subtotal</th>
            </thead>
            <tbody>
                <?php
                include_once('./printData.php');
                $total = printData($shoppingCart);
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5">Total</th>
                    <td>$<?= number_format((float) $total, 2, '.', '') ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>