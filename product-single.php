<?php

include('database.php');

if (isset($_POST['product_id'])) {
  #$product_id = mysqli_real_escape_string($connection, $_POST['product_id']);
  $product_id = $_POST['product_id'];

  $query = "SELECT * from products WHERE product_id = $product_id";

  $result = mysqli_query($connection, $query);
  if (!$result) {
    die('Query Failed' . mysqli_error($connection));
  }

  $json = array();
  while ($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'product_name' => $row['product_name'],
      'description' => $row['description'],
      'product_id' => $row['product_id'],
      'price' => $row['price'],
      'category_id' => $row['category_id']
    );
  }
  $jsonstring = safe_json_encode($json[0]);
  echo $jsonstring;
}
function safe_json_encode($value) {
  if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
    $encoded = json_encode($value, JSON_PRETTY_PRINT);
  } else {
    $encoded = json_encode($value);
  }
  switch (json_last_error()) {
    case JSON_ERROR_NONE:
      return $encoded;
    case JSON_ERROR_DEPTH:
      return 'Maximum stack depth exceeded'; // or trigger_error() or throw new Exception()
    case JSON_ERROR_STATE_MISMATCH:
      return 'Underflow or the modes mismatch'; // or trigger_error() or throw new Exception()
    case JSON_ERROR_CTRL_CHAR:
      return 'Unexpected control character found';
    case JSON_ERROR_SYNTAX:
      return 'Syntax error, malformed JSON'; // or trigger_error() or throw new Exception()
    case JSON_ERROR_UTF8:
      $clean = utf8ize($value);
      return safe_json_encode($clean);
    default:
      return 'Unknown error'; // or trigger_error() or throw new 
      Exception();
  }
}


function utf8ize($mixed)
{
  if (is_array($mixed)) {
    foreach ($mixed as $key => $value) {
      $mixed[$key] = utf8ize($value);
    }
  } else if (is_string($mixed)) {
    return utf8_encode($mixed);
  }
  return $mixed;
}
