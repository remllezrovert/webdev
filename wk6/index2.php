<?php
$products = [
  'Toffee' => 2.99,
  'Mints'  => 1.99,
  'Fudge'  => 3.49,
  'Dark Chocolate' => 10.29,
  'Milk Chocolate' => 4.19,
];
//add a single new element at the end in an array 
//+= operator to add new element to associative array
$products['Mint Chocolate'] = 3.99;
$products += ['White Chocolate' => 3.99];

//sort array by value
//asort($products); 
//sort array by key
ksort($products);

?>
<?php include "includes/header2.php"; ?>
<h2>Price List</h2>
<table>
  <tr>
    <th>Item</th>
    <th>Price</th>
  </tr>
  <?php foreach ($products as $item => $price) { ?>
    <tr>
      <td><?= $item ?></td>
      <td>$<?= $price ?></td>
    </tr>
  <?php } ?>
</table>

<?php include 'includes/footer2.php'; ?>