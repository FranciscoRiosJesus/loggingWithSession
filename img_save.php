<?php 
include("database.php");

function getFiles() {
    $result = array();
    foreach($_FILES as $name => $fileArray) {
        if (is_array($fileArray['name'])) {
            foreach ($fileArray as $attrib => $list) {
                foreach ($list as $index => $value) {
                    $result[$name][$index][$attrib]=$value;
                }
            }
        } else {
            $result[$name][] = $fileArray;
        }
    }
    return $result;
}


if (isset($_FILES['img'])) {
    $name_img = $_FILES['img']['name'];
    if(move_uploaded_file($_FILES['img']['tmp_name'], "img/".$name_img)) {
      echo "product Added Successfully";
    } else {
      die('img Failed');
    }
}

?>
