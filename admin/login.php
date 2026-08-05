<?php

session_start();


if(isset($_POST['login'])){


$username = $_POST['username'];
$password = $_POST['password'];



if($username == "admin" && $password == "12345"){


$_SESSION['admin'] = true;


header("Location: admin.php");

exit;


}else{


$error="Wrong username or password";


}

}

?>
