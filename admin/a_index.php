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
    
    .menu_option_one{
        top: 100px;
        left: 25%;
        position: absolute;
        border: 1px solid;
        width: 50%;
        z-index: 100;
    }
    .scroll_menu
    {
        width: 100%;
        overflow-y: auto;
        height: 250px;
    }
    input[type=text], input[type=submit] {
        width: 100%;
        height: 100%;
        font-size: 18px;
        font-family: q1;
    }
    
</style>
<img src="..\image/logo.png" width="70%" style="opacity: .2;position: absolute;top: 200;left: 200px;">

<div class="menubar">
    <a href="?index&Menu">Menu</a>
    <a href="?index&Video">Video</a>
</div>

<?php 
if(isset($_GET['Menu'])){
    require "conn.php";
    $req = mysqli_query($con, "select *from menu where valid = 'disable' or valid ='active'");
    echo "<form method='POST' enctype='multipart/form-data'><div class='menu_option_one'> <div class='scroll_menu'> 
    <table width='100%' border=0 style='height:50px; font-size:20px; font-family:q1;'>";
    while($row = mysqli_fetch_array($req)){
    
       echo " <tr style='padding:10px;'> 
       <td width='50px' style='padding:10px;'>".$row['id']." </td>
       <td  style='padding:10px;'>".$row['page']."  </td>
       <td  style='padding:10px;' width='50px'> ";
        if($row['file'] == ''){
            echo "<p style='color:red; font-family:k1; font-weight:bold;'>Error</p>";
        }else{
            
        }
        if($row['valid'] == 'active') {
        echo "</td><td width='120px' align='center' style='padding:10px;'>
        
        <a href='?index&Menu&edit=".$row['id']."' style='text-decoration:none; padding-right:10px;'> <img src='image/settings.png' width='20px'> </a> 
        <a href='?index&Menu&delete=".$row['id']."' style='text-decoration:none; padding-right:10px;'> <img src='image/delete.png' width='20px'> </a> 
        <a href='?index&Menu&disable=".$row['id']."' style='text-decoration:none; '> <img src='image/disabled.png' width='20px'> </a> 
        
        </td> </tr>";} else {
            echo "<td width='120px' align='center' style='padding:10px;'>
            <a href='?index&Menu&enable=".$row['id']."' style='text-decoration:none; '> <img src='image/notifications.png' width='20px'> </a> 
            </td> </tr>";
        }
    
    }
    echo "</table>
    </div></div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
    <table width='50%' border=0 style='height:50px; font-size:20px; font-family:q1; position:relative;' align='center'>
        <tr> <td width='400px' style='padding:10px;'><input type='text' name='link' placeholder='menu option name'> </td>
        <td style='padding:10px;'><input type='file' name='upload'></td>
        <td width='150px' align='center' style='padding:10px;'> <input type='submit' name='menu_sub' value='Upload'> </td> </tr>
    </table></form> ";
    
}
?>

<?php 
if(isset($_GET['Video'])){
    require "conn.php";
    $req = mysqli_query($con, "select *from menu_video where place='index'");
    echo "<form method='POST' enctype='multipart/form-data'><div class='menu_option_one' style='border:0px solid;'>";
    $row = mysqli_fetch_array($req);
        echo "<video loop='loop' autoplay='autoplay' id='vid' muted width='100%' height='350px'>
                    <source src='../video/".$row['name']."' type='video/mp4'>
            </video></div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
    <table width='50%' border=0 style='height:50px; font-size:20px; font-family:q1; position:relative;' align='center'>
        <td><input type='file' name='upload'></td>
        <td width='150px' align='center' style='padding:10px;'> <input type='submit' name='video' value='Change'> </td> </tr>
    </table> </div></div> </form>";
    
}
?>

<?php
if(isset($_POST['menu_sub'])) {
$name=$_FILES["upload"]["name"];
$type=$_FILES["upload"]["type"];
$size=$_FILES["upload"]["size"];
$s=$size/8192;
$tmpname=$_FILES["upload"]["tmp_name"];
$ext=substr($name, strrpos($name,'s'));
require "conn.php";
if($type == 'application/octet-stream'){
    if(mysqli_query($con, "insert into menu values ('', '".$_POST['link']."','".$name."','active')")){
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

<?php
if(isset($_POST['video'])) {
$name=$_FILES["upload"]["name"];
$type=$_FILES["upload"]["type"];
$size=$_FILES["upload"]["size"];
$s=$size/8192;
$tmpname=$_FILES["upload"]["tmp_name"];
$ext=substr($name, strrpos($name,'s'));
require "conn.php";
if($type == 'video/mp4'){
    if(mysqli_query($con, "update menu_video set name='".$name."',size='".$size."' where place = 'index'")){
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


<?php
if(isset($_GET['disable'])) {
    require "conn.php";
    mysqli_query($con, "update menu set valid= 'disable' where id='".$_GET['disable']."'");
    echo "<script> window.location = '?index&Menu'; </script>";
}
    ?>
<?php
if(isset($_GET['enable'])) {
    require "conn.php";
    mysqli_query($con, "update menu set valid= 'active' where id='".$_GET['enable']."'");
    echo "<script> window.location = '?index&Menu'; </script>";
}
    ?>
<?php
if(isset($_GET['delete'])) {
    require "conn.php";
    mysqli_query($con, "update menu set valid= 'delete' where id='".$_GET['delete']."'");
    echo "<script> window.location = '?index&Menu'; </script>";
}
    ?>