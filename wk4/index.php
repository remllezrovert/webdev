
<?php include './includes/header.php';?>
<?php
$products = [
    'Toffee' => 2.99,
    'Mints'  => 1.99,
    'Fudge'  => 3.49,
];
$products['TimTam'] = 3.14;
$products['FredoFrog'] = 1.59;
$products['FunnelWeb'] = 2.64;

//ksort($products); //sort by key
asort($products); //sort by value


?>
<!DOCTYPE html>
<html>
  <head>
    <title>index page</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <h1>The Candy Store</h1>
    <h2>Price List</h2>
    <table>
      <tr>
        <th>Item</th>
        <th>Price</th>
      </tr>
      <?php foreach ($products as $item => $price) {?>
        <tr>
          <td><?= $item ?></td>
          <td>$<?= $price ?></td>
        </tr>
      <?php } ?>
      <?php include './includes/footer.php';?>
    </table>
  </body>
</html>