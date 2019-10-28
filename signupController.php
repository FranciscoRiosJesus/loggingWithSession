<?php

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
        $query = "INSERT into users(name, last_name, email, pass) VALUES ('$name', '$last_name', '$email', '$password')";
        $result = mysqli_query($connection, $query);
        
        if ( !$result ) {
            $_SESSION['message'] = 'error - user no created';
            $_SESSION['message_type'] = 'danger';
            header("Location: signup.php");
        } else {
            $_SESSION['user'] = $name;

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
    if($result){
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
?>