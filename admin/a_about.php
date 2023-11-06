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
        overflow-y: scroll;
        height: 250px;
    }
</style>

<img src="..\image/logo.png" width="70%" style="opacity: .2;position: absolute;top: 200;left: 200px;">

<div class="menubar">
    <a href="?about&Message">Message</a>
    <a href="?about&creview">customer review</a>
    <a href="?about&rating">Rating</a>
</div>



<?php 
if(isset($_GET['Message'])){
    require "conn.php";
    $req = mysqli_query($con, "select *from data where place='about'");
    echo "<div class='menu_option_one'> <div class='scroll_menu'>";
    $row = mysqli_fetch_array($req);
        echo $row['d2']."</div></div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <form method='get'>
    <table width='50%' border=0 style='height:50px; font-size:20px; font-family:q1; position:relative;' align='center'>
        <td><textarea cols='100' rows='20' name='msg' id='newine'></textarea>
        <script src='http://js.nicedit.com/nicEdit-latest.js' type='text/javascript'></script>
        <script type='text/javascript'>bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
        </td> 
        </tr> <tr>
        <td width='150px' align='center' style='padding:10px;'> <input type='submit' name='a_send' value='Change'> </td> </tr>
    </table> </form>";
    
}

if(!isset($_GET['a_send'])) {} else{
    require"conn.php";
    mysqli_query($con, "update data set d2 = '".$_GET['msg']."' where place='about'");
}
?>
<?php 
if(isset($_GET['creview'])){
    require "conn.php";
    $req = mysqli_query($con, "select *from menu_video where place='review'");
    echo " <form method='POST' enctype='multipart/form-data'><div class='menu_option_one' style='border:0px solid;'>";
    $row = mysqli_fetch_array($req);
        echo "<video width='100%' height='350px' controls>
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
if(isset($_POST['video'])) {
$name=$_FILES["upload"]["name"];
$type=$_FILES["upload"]["type"];
$size=$_FILES["upload"]["size"];
$s=$size/8192;
$tmpname=$_FILES["upload"]["tmp_name"];
$ext=substr($name, strrpos($name,'s'));
require "conn.php";
if($type == 'video/mp4'){
    if(mysqli_query($con, "update menu_video set name='".$name."',size='".$size."' where place = 'review'")){
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


if(!isset($_GET['rating'])) {} else{
    echo "<center>  <form method='post'>
    <br> <br>
    <select name='rate'> 
    <option value='1'> 1 </option> 
    <option value='2'> 2 </option> 
    <option value='3'> 3 </option> 
    <option value='4'> 4 </option> 
    <option value='5'> 5 </option> 
    </select>
    
    <input type='submit' name='rate_sub' value='Submit'>
    
    
    </form></center>";
}

if(!isset($_POST['rate_sub'])) {} else {
    require "conn.php";
    mysqli_query($con, "update data set d1='".$_POST['rate']."' where place='rate'");
}
?>