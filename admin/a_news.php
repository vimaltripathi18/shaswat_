<?php

if((!isset($_SESSION['user'])) || (!isset($_SESSION['password']))){
    echo "<script> window.location = 'admin_login.php'; </script>";
}
?>

<?php
require "conn.php";
$req = mysqli_query($con, "select *from data where place = 'news' and d1 = 'enable'");
$row = mysqli_fetch_array($req);
?>
<center>
    <p style="top:22px; position:relative; fon-family:q1; color:red; font-size:20px;"> <?php echo $row['d2']; ?> </p>
<form method="post">
    <br><br><br><br><br><br><br><br>
    <input type="radio" name="en" value="enable" required> Enable 
    <input type="radio" name="en" value="disable"> Disable <br><br><br>
    <textarea cols="100" rows="10" name="news" required></textarea><br><br><br>
    <input type="submit" name="nw" value="submit">
</form>
</center>


<?php
if(isset($_POST['nw'])){
$reqq = mysqli_query($con, "update data set d1='".$_POST['en']."', d2='".$_POST['news']."' where place = 'news'");
echo "<script> window.location = '?news'; </script>";
}
?>