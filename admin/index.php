<?php
session_start();
if((!isset($_SESSION['user'])) || (!isset($_SESSION['password']))){
    echo "<script> window.location = 'admin_login.php'; </script>";
} 
?>

<style>
    body {min-width: 1300px;}
    .top
    {
        top: 0;
        left: 0;
        position: absolute;
        min-width: 1300px;
        width: 100%;
        height: 120px;
        background-color:orangered;
        color: white;
        z-index: 1;
    }
   
    .option_page
    {
        width:230;
        top:120px;
        left: 0;
        background-color: orangered;
        position: absolute;
        height: 84vh;
    }

    .option_page a 
    {
        font-family: sans-serif;
        font-size: 24px;
        color: white;
        text-decoration: none;
        text-transform: capitalize;
        padding: 10 90px;
    }
    .option_page a:hover, .b
    {
        background-color: white;
        color: orangered;
    }

     .o-page     {
        font-family: sans-serif;
        font-size: 18px;
        color: white;
        text-decoration: none;
        text-transform: capitalize;
        float: left;
        vertical-align: middle;
        padding: 20px;
    }


    .frame
    {
        width: 85%;
        min-width: 1000px;
        min-height: 80%;
        background-color: white;
        position: absolute;
        top:125px;
        left: 230px;

    }
    @font-face {
        font-family: Q2;    src: url(font/Quicksand-Medium.ttf);
        font-family: m1;    src: url(font/MarchMadnessNF.ttf);
        font-family: q1;    src: url(font/Quando-Regular.ttf);
        font-family: k1;    src: url(font/KaushanScript-Regular.otf);
        }
</style>

<div class="top"> <br>

    <table border="0" width="95%" height="70" align="center">
        <tr>
            <td width="30%"> <h1 style="font-family:k1; font-size:48px; color:white; padding:0 20px;">Control Panel</h1></td>
          <td style="float:right;">
                <div class="o-page">
                    
                     <?php
                        require "conn.php";
                        $req = mysqli_query($con, "select dp from admin where user = '".$_SESSION['user']."'");
                        $row2 = mysqli_fetch_array($req);
                        
                        if($row2['dp'] == '') {
                            echo "<a> <img src='dp/dp_default.png' style='vertical-align:middle; border-radius:50%;' width=40 height=40> </a>";
                        }
                    else {
                     echo "<a><img src='dp/".$row2['dp']."' style='vertical-align:middle; border-radius:50%;' width=40 height=40> </a>"; }
                        ?>
                    
                    <a href="?profile" style="font-family: sans-serif; font-size: 18px; color: white; text-decoration: none; text-transform: capitalize; padding: 0 20px;">
                    <?php
                        require "conn.php";
                        $req = mysqli_query($con, "select name from admin where user = '".$_SESSION['user']."'");
                        $row2 = mysqli_fetch_array($req);
                        echo $row2['name'];
                        ?></a>

                    <a href="index.php" style="font-family: sans-serif; font-size: 18px; color: white; text-decoration: none; text-transform: capitalize; padding: 0 20px;">Home</a>
                    <a href=logout.php style="font-family: sans-serif; font-size: 18px; color: white; text-decoration: none; text-transform: capitalize; padding: 0 20px;">Log out</a>
                </div>
            </td>
        </tr>
    </table>

</div>

<div class="option_page" id="op"> 
<center><br>
<?php
   //if(!isset($_GET['dash'])){ echo "<a href='?dash'> Dashboard </a> <br><br>";} else { echo "<a href='?dash' class=b style='color:orangered;'> Dashboard </a> <br><br>"; }
   if(!isset($_GET['index'])){ echo "<a href='?index'> Index </a> <br><br>";} else { echo "<a href='?index' class=b style='color:orangered;'> Index </a> <br><br>"; }
    if(!isset($_GET['about'])){ echo "<a href='?about'> About </a> <br><br>";} else { echo "<a href='?about' class=b style='color:orangered;'> About </a> <br><br>"; }
   if(!isset($_GET['service'])){ echo "<a href='?service'> Service </a> <br><br>";} else { echo "<a href='?service' class=b style='color:orangered;'> Service </a> <br><br>"; } 
    if(!isset($_GET['port'])){ echo "<a href='?port'> Portfolio </a> <br><br>";} else { echo "<a href='?port' class=b style='color:orangered;'> Portfolio </a> <br><br>"; }
    if(!isset($_GET['gallery'])){ echo "<a href='?gallery'> Gallery </a> <br><br>";} else { echo "<a href='?gallery' class=b style='color:orangered;'> Gallery </a> <br><br>"; }
    if(!isset($_GET['news'])){ echo "<a href='?news'> News </a> <br><br>";} else { echo "<a href='?news' class=b style='color:orangered;'> News </a> <br><br>"; }
    if(!isset($_GET['link'])){ echo "<a href='?link'> Links </a> <br><br>";} else { echo "<a href='?Link' class=b style='color:orangered;'> Links </a> <br><br>"; }
 ?>
</center>
</div>

<div class="frame">
<?php
    if(empty($_GET)) {require_once "shashwat.php";}
if(!isset($_GET['dash'])) {} else { require_once "a_dash.php"; }
if(!isset($_GET['index'])) {} else { require_once "a_index.php"; }
if(!isset($_GET['about'])) {} else { require_once "a_about.php"; }
if(isset($_GET['Message'])){echo "<script> document.getElementById('op').style.height = '130vh'; </script>";}
if(!isset($_GET['service'])) {} else { require_once "a_service.php"; }
if(!isset($_GET['port'])) {} else { require_once "a_port.php"; }
if(!isset($_GET['gallery'])) {} else { require_once "a_gallery.php"; }
if(!isset($_GET['news'])) {} else { require_once "a_news.php"; }
if(!isset($_GET['link'])) {} else { require_once "a_link.php"; }
if(!isset($_GET['profile'])) {} else { require_once "profile.php"; }
?>
</div>

