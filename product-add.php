<?php

include_once('database.php');

if(isset($_POST['product_name'])) {
  # echo $_POST['product_name'] . ', ' . $_POST['description'];
  $product_name = $_POST['product_name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $query = "INSERT into products(product_name, description, price, category_id) VALUES ('$product_name', '$description', $price, $category)";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query Failed.');
  }

  echo "product Added Successfully";  

}

?>
