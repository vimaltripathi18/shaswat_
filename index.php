<style>
    body{
        min-width: 1300px;
        max-width: 1500px;
    }
    .index{
        width: 100%;
        height: 700px;
        z-index: -1;
        box-shadow: 0px 0px 0px 0px;
    }
    #index{
        left: 0;
        top: 120px;
        position: absolute;
    }
    
    #error404{
        text-align: center;
        padding: 200px 0 ;
        font-family: q1;
        font-size: 30px;
    }
    #error404_2{
        text-align: center;
        padding: 50px 0 ;
        font-family: q1;
        font-size: 30px;
    }
    video {

        border: null;
        
        border-bottom-right-radius: 500px 500px;
    }
    
</style>
<body>
<?php include "head.php";
require "connection.php";
$req = mysqli_query($connect, "select *from data where place = 'news' and d1 = 'enable'");
$row = mysqli_fetch_array($req);
$req2 = mysqli_query($connect, "select *from menu_video where place = 'index'");
$row2 = mysqli_fetch_array($req2);
?>

<marquee style="top:92px; position:relative; fon-family:q1; color:red; font-size:20px;"> <?php echo $row['d2']; ?> </marquee>

<div class="index" id="index">
    <video loop="loop" autoplay="autoplay" id="vid" muted width="100%" style="">
    <?php echo "<source src='video/".$row2['name']."' type='video/mp4'>"; ?>
    </video>
</div>
<hr style="padding:320px; border:0px solid;">
<img src="image/iso.png" width="150px" height="140px" style="position:absolute; right:1.5%; top:79%; color:#014b93; z-index:-1;">

<?php require "footer.php"; ?>


