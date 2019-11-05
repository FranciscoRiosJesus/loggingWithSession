<?php

include('database.php');

if(isset($_POST['product_name'])) {
  # echo $_POST['product_name'] . ', ' . $_POST['description'];
  $product_name = $_POST['product_name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $category = $_POST['category'];

  // file
  $uploadedFile = '';
  if(!empty($_FILES['img']['name'])){
    $fileName = basename($_FILES['img']['name']);
    $uploadDIr = 'img/';
    $targetFilePath = $uploadDIr . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if(move_uploaded_file($_FILES['img']['tmp_name'], $targetFilePath)) {
      $uploadedFile = $fileName;
    }

    $query = "INSERT into products(product_name, description, price, category_id, img_url) VALUES ('$product_name', '$description', $price, $category, '$targetFilePath')";
    $result = mysqli_query($connection, $query);
    
    if (!$result) {
      die('Query Failed.');
    }
    
    echo "product Added Successfully";  
  } else {

    die('file Failed.');

  }
}

?>
