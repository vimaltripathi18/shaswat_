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
    .scroll{
        width: 100%;
        overflow-y: scroll;
    }
    .h{
        width: 100;
        height: 100;
        float: left;
        padding: 40px;
    }
    .del{
        border-radius: 20px;
        border: 1px solid;
        top: 30%; left: 40%;
        background-color: black;
        color: white;
        position: absolute;
        float: left;
        padding: 40px;
    }
</style>


<div class="menubar">
    <a href="?gallery&upload">Upload</a>
    <a href="?gallery&history">History</a>
</div>

<?php 
if(isset($_GET['upload'])){
    echo "
    <br><br><br><br><br><br><br>
    <form method='post' enctype='multipart/form-data'>
    <table width='50%' border=0 style='height:50px; font-size:20px; font-family:q1; position:relative;' align='center'>
        <td><input type='file' name='upload'></td>
        <td width='150px' align='center' style='padding:10px;'> <input type='submit' name='gal' value='Upload'> </td> </tr>
    </table> </div></div> </form>";
    
}

if(isset($_GET['history'])){
           require "conn.php";
    echo "<div class='scroll'> ";
        $req = mysqli_query($con, "select *from gallery");
        while ($row=mysqli_fetch_array($req)) {
            echo "<div class='h'>  <a href='index.php?gallery&history&id=".$row['id']."&del'> <img src='..\gal/".$row['name']."' width='100' height='100'> </a>   </div>  "  ;
        }
    echo"</div>";
    
}

if(!isset($_GET['del'])){} else{
    if($_GET['del'] == ''){
           echo "<div class='del'>
    <rem> You want to delete ?  </rem> <br><br> <center>
    <a href='?gallery&history&id=".$_GET['id']."&del=yes' style='text-decoration:none; margin:10px; color:white; background-color:grey; padding:10px; border-radius:10px;'> Yes </a>
    <a href='?gallery&history&id=".$_GET['id']."&del=no' style='text-decoration:none; margin:10px; color:white; background-color:grey; padding:10px; border-radius:10px;'> No </a>
    </center></div>"; 
    }
if($_GET['del'] == 'yes'){
           mysqli_query($con, "delete from gallery where id='".$_GET['id']."'");
    echo "<script> window.location = '?gallery&history'; </script>";
    }
}
?>


<?php
if(isset($_POST['gal'])) {
    require "conn.php";
$name=$_FILES["upload"]["name"];
$type=$_FILES["upload"]["type"];
$size=$_FILES["upload"]["size"];
$tmpname=$_FILES["upload"]["tmp_name"];
$extension = explode("/", $_FILES["upload"]["type"]);
$date = date("Y-m-d");
    $cnt = 0;
    $req = mysqli_query($con, "select *from gallery"); while ($row=mysqli_fetch_array($req)) { $cnt = $row['id']; }
    $f = $cnt+1;
    $user = "shashwat_".$f;
    $database_path = $user.".".$extension[1];

if(($type == 'image/png') || ($type == 'image/jpg') || ($type == 'image/jpeg')) {
    if(mysqli_query($con, "insert into gallery values('', '".$database_path."', '".$type."', '".$size."', '".$date."')")){
        
        move_uploaded_file($tmpname,"../gal/".$user.".".$extension[1]);
        
    echo "<script> alert(' Sucessfully Uploaded !!!'); </script>";
    } 
    else {
            echo "<center><p style='color:red; font-family:k1; font-weight:bold; font-size:20px;'>
    Oop's Something wents wrong !!!</p></center>";
    }
} else {
    echo "<center><p style='color:red; font-family:k1; font-weight:bold;  font-size:20px;'>
    Oop's File Type is not Valid - ".$type."</p></center>";
}

}
?>
