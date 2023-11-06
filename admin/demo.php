<?php

if((!isset($_SESSION['user'])) || (!isset($_SESSION['password']))){
    echo "<script> window.location = 'admin_login.php'; </script>";
}
?>

<?php
    if ($_POST['upload'] )
     {
     $user=$_POST['c'];
     //$filename=basename($_FILES["file"]["name"]);
    
     $tmp=$_FILES["file"]["tmp_name"];
      $extension = explode("/", $_FILES["file"]["type"]);
      $name=$user.".".$extension[1];
    
    move_uploaded_file($tmp, "image/test/" . $user.".".$extension[1]);
     }  
    
 ?>
<html>
   <body>
     <form enctype="multipart/form-data" method="post">
     your city<input type="text" name="c"/><br/>
      Your File Name <input type="file" name="file"/><br/>
    <input type="submit" value="Upload" name="upload"/>
    </form>
   </body>
</html>