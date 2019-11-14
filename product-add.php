<?php

include('database.php');

if (isset($_POST['product_name'])) {
  $product_name = $_POST['product_name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $img_url = $_POST['img_url'];

  $query = "INSERT into products(product_name, description, price, category_id, img_url) VALUES ('$product_name', '$description', $price, $category, '$img_url')";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query Failed.');
  }

  echo "product Added Successfully";
}
