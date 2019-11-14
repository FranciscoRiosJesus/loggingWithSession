<?php

  include('database.php');

if(isset($_POST['product_name'])) {
  $product_name = $_POST['product_name']; 
  $description = $_POST['description'];
  $product_id = $_POST['product_id'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $img_url = $_POST['img_url'];

  $query = "UPDATE products SET product_name = '$product_name', description = '$description', category_id = $category, price = $price, img_url = '$img_url' WHERE product_id = $product_id";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query Failed.');
  }
  echo "product Update Successfully";  

}

?>
