<?php session_start(); ?>

<style>
        body
{
    width:                             1500px;
}

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
        height: 600px;
        top:120px;
        left: 0;
        background-color: orangered;
        position: absolute;
        min-height: 90%;
    }
    .option_page a 
    {
        font-family: sans-serif;
        font-size: 24px;
        color: white;
        text-align: center;
        text-decoration: none;
        text-transform: capitalize;
        padding: 10 85px;
    }
    .option_page a:hover, .b
    {
        background-color: white;
        color: blueviolet;
        padding: 10 85px;
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
        width: 80%;
        min-width: 1000px;
        min-height: 80%;
        background-color: white;
        position: absolute;
        top:115px;
        left: 280px;
    }
               @font-face {
        font-family: Q2;    src: url(font/Quicksand-Medium.ttf);
        font-family: m1;    src: url(font/MarchMadnessNF.ttf);
        font-family: q1;    src: url(font/Quando-Regular.ttf);
        font-family: k1;    src: url(font/KaushanScript-Regular.otf);
        }
</style>

<div class="top"> <br>

    <table border="0" width="95%" height="80%" align="center">
        <tr>
            <td width="150px"> <h1 style="font-family:k1; font-size:48px; color:white; padding:10 40px;">Subharambh</h1></td>
          <td style="float:right;">
                <div class="o-page">
                    <?php
                        require "connect.php";
                        $req = mysqli_query($connect, "select dp from user where mobile = '".$_SESSION['user']."'");
                        $row2 = mysqli_fetch_array($req);
                        echo "<a><img src='dp/".$row2['dp']."' style='vertical-align:middle; border-radius:50%;' width=45 height=50> </a>";
                        ?>
                    
                    <a href="account.php" style="font-family: sans-serif; font-size: 18px; color: white; text-decoration: none; text-transform: capitalize; padding: 0 20px;">
                    <?php
                        require "connect.php";
                        $req = mysqli_query($connect, "select name from user where mobile = '".$_SESSION['user']."'");
                        $row2 = mysqli_fetch_array($req);
                        echo $row2['name'];
                        ?></a>
                    <a href="index.php" style="font-family: sans-serif; font-size: 18px; color: white; text-decoration: none; text-transform: capitalize; padding: 0 20px;">Home</a>
                    <a href="plan.php" style="font-family: sans-serif; font-size: 18px; color: white; text-decoration: none; text-transform: capitalize; padding: 0 20px;">Plan's</a>
                    <a href=logout.php style="font-family: sans-serif; font-size: 18px; color: white; text-decoration: none; text-transform: capitalize; padding: 0 20px;">Log out</a>
                </div>
            </td>
        </tr>
    </table>

</div>

<div class="option_page"> <br>
<center><br>
<?php
    if(!isset($_GET['dash'])){ echo "<a href='?dash'> Dashboard </a> <br><br>";} else { echo "<a href='?dash' class=b style='color:blueviolet;'> Dashboard </a> <br><br>"; }
    
    if(!isset($_GET['Event'])){ echo "<a href='?Event'> Event </a> <br><br>";} else { echo "<a href='?Event' class=b style='color:blueviolet;'> Event </a> <br><br>"; }
    
    if(!isset($_GET['Payment'])){ echo "<a href='?Payment'> Payment </a> <br><br>";} else { echo "<a href='?Payment' class=b style='color:blueviolet;'> Payment </a> <br><br>"; }
    

      if(!isset($_GET['Setting'])){ echo "<a href='?Setting'> Setting </a> <br><br>";} else { echo "<a href='?Setting' class=b style='color:blueviolet;'> Setting </a> <br><br>"; }
    
    
    ?>
</center>
</div>

<div class="frame">
<?php
    if(empty($_GET)) {require_once "account/dash.php";}
if(!isset($_GET['dash'])) {} else { require_once "account/dash.php"; }
if(!isset($_GET['Payment'])) {} else { require_once "account/Payment.php"; }

?>
</div>