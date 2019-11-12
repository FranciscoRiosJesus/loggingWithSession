<?php
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
require('vendor/autoload.php');
include('database.php');

if(isset($_POST['signup'])) {
  
    $name = $_POST['name'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    /* ya existe el email? */
    if( existEmail($email) ) {
        $_SESSION['message'] = 'email use for another user ';
        $_SESSION['message_type'] = 'danger';
        header("Location: signup.php");
    } else {

        # $decrypted = decryptIt( $encrypted );
        # $passwordEncrypt = encryptIt($password);
        # echo $passwordEncrypt;
        $query = "INSERT into users(name, last_name, email, pass) VALUES ('$name', '$last_name', '$email', md5('$password'))";
        $result = mysqli_query($connection, $query);
        print_r($result);
        echo '<br7>';
        if (!$result) {
            print_r(mysqli_fetch_array($result));
            $_SESSION['message'] = 'error - user no created';
            $_SESSION['message_type'] = 'danger';
            # header("Location: signup.php");
        } else {
            $_SESSION['user'] = $email;

            $_SESSION['message'] = 'user created';
            $_SESSION['message_type'] = 'success';
            header("Location: index.php");
        }

    }

}

function existEmail($email){  
    $connection = mysqli_connect(
        'localhost', 'root', '', 'ecommerce'
      );

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connection, $query);
    if (mysqli_fetch_array($result)){
        return true;
    }else{
        return false;
    }
}

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
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