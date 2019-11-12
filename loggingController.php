<?php
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
require('vendor/autoload.php');
include('database.php');

if(isset($_POST['logging'])) {
  
  $email = $_POST['email'];
  $password = $_POST['password'];

  
  $query = "SELECT * FROM users WHERE email='$email' AND pass = md5('$password')";
  $result = mysqli_query($connection, $query);

  
  # $encrypted = '';
  if ($row = mysqli_fetch_array($result)) {
    # $decrypted = decryptIt($encrypted);
    $_SESSION['user'] = $email;
    header("Location: index.php");
  }
  #echo '<br/>' . $encrypted;
  else { # error: 
    $_SESSION['message'] = 'incorrect email or password';
    $_SESSION['message_type'] = 'danger';
    
    header("Location: logging.php");
  }
}

function encryptIt( $q ) {
  $cryptKey = loadEncryptionKeyFromConfig();
  $qEncoded = Crypto::encrypt($q, $cryptKey);
  return( $qEncoded );
}

function decryptIt( $q ) {
  $cryptKey = loadEncryptionKeyFromConfig();
  echo '<br/>' . $q . '<br/>' . $cryptKey;
  $qDecoded = Crypto::decrypt($q, $cryptKey);
  echo '<br/>' . $qDecoded;
  return( $qDecoded );
}

function loadEncryptionKeyFromConfig(){
    $keyAscii = fopen('./file/secret-key.txt', 'r');// ... load the contents of /etc/secret-key.txt
    $key = fgets($keyAscii);
    echo $key;
    return Key::loadFromAsciiSafeString($key);
}

?>