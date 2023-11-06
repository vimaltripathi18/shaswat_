<?php

if((!isset($_SESSION['user'])) || (!isset($_SESSION['password']))){
    echo "<script> window.location = 'admin_login.php'; </script>";
}
?>



<style>
    .menubar{

        height: 50px;
        background-color: palegoldenrod;
        color: white;
    }
    .menubar a{
        margin: auto;
        float: left;
        display: block;
        text-align: center;
        padding: 10px 30px;
        text-decoration: none;
        font-family: calibri;
        font-size: 20px;
    }
    input[type=text], input[type=submit] {
        width: 100%;
        height: 100%;
        font-size: 18px;
        font-family: q1;
    }
 
    
</style>

 <form method="post" enctype="multipart/form-data"><table width='50%' border=0 style='height:50px; font-size:20px; font-family:q1; position:relative;' align='center'>
        <tr><td style='padding:10px;'><input type='file' name='upload'></td>
        <td width='200px' align='center' style='padding:10px;'> <input type='submit' name='port_send' value='Upload'> </td> </tr>
     </table> </form>
<br><br>
<div class="port" align="center">
                 <?php
                require"conn.php";
                $req = mysqli_query($con, "select *from data where place='port'");
                $row=mysqli_fetch_array($req);
                echo "<iframe src='../file/".$row['d2']."' width='80%' height='400px'></iframe>";
         ?>
     <br><br><br>
</div>

<?php
if(isset($_POST['port_send'])) {
$name=$_FILES["upload"]["name"];
$type=$_FILES["upload"]["type"];
$size=$_FILES["upload"]["size"];
$s=$size/8192;
$tmpname=$_FILES["upload"]["tmp_name"];
$ext=substr($name, strrpos($name,'s'));
require "conn.php";

if($type == 'application/pdf'){
    if(mysqli_query($con, "update data set d2='".$name."' where place='port'")){
   move_uploaded_file($tmpname,"../".$name); } else {
            echo "<center><p style='color:red; font-family:k1; font-weight:bold; top:22px; position:relative; font-size:20px;'>
    Oop's Something wents wrong !!!</p></center>";
    }
} else {
    echo "<center><p style='color:red; font-family:k1; font-weight:bold; top:22px; position:relative; font-size:20px;'>
    Oop's File Type is not Valid</p></center>";
}

}
?>

