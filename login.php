<?php
session_start();

if ($_POST['password'] == "1234") {
    $_SESSION['admin'] = true;
    header("Location: admin.php");
}
?>

<form method="POST">
  <input type="password" name="password">
  <button>Login</button>
</form>
