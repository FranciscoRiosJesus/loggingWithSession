<?php 
if (isset($_FILES['img'])) {
    $name_img = $_FILES['img']['name'];
    if(move_uploaded_file($_FILES['img']['tmp_name'], "img/".$name_img)) {
      echo "product Added Successfully";
    } else {
      die('img Failed');
    }
}

?>
