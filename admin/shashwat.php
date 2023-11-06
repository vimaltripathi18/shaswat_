<?php

if((!isset($_SESSION['user'])) || (!isset($_SESSION['password']))){
    echo "<script> window.location = 'admin_login.php'; </script>";
}
?>

<br><br><br><br><br><br><br><br><center><img src="..\image/logo.png" width="70%"><br><br><br>

<h1 style="font-family:k1; font-size:32px; padding:0 20px;">Welcome Admin ... </h1>
</center>