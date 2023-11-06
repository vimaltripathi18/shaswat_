<?php include "head.php"; ?>
<style>
    .service{
        top: 120px;
        position: relative;
        border-bottom: 1px solid;
        width: 100%
        background-color: white;
        box-shadow: 1px 1px 1px 1px;
        vertical-align:baseline;
        border-bottom-left-radius: 50px;
        border-top-right-radius: 50px;
        margin-bottom: 10px;
    }
    .ser1{
        text-align: center;
        font-family: q1;
        font-size: 30px;
        padding-top: 25px;
    }
    .ser2{
        float: left;
        margin-left: 50px;
        margin-bottom: 50px;
        min-width: 200px;
        max-width: 300px;
        height: 300px;
        box-shadow: 2.5px 2.5px 2px 2px grey;
        border-radius: 10%;
    }
    .scroll {
        width: 100%;
        overflow-y: hidden;
    }
</style>

<div class="service">
    <div class="ser1">
    Our Services
</div>
<br><hr width="60%"><br>
    <div class="scroll">
    <?php
     require "connection.php";                       
$req = mysqli_query($connect, "select *from data where place='service'");
 while($row = mysqli_fetch_array($req)){
    echo"<div class=ser2>
<h3 style='font-family:q1; padding-top:30px; text-align:center;'>".$row['d1']."</h3> <hr width=90%>
    <p style='font-family:q1; padding:20px; text-align:center; font-size:14px;'>
        ".$row['d2']."
    </p>
</div>
"; }
     ?>

    </div>

</div>
<?php include "footer.php"; ?>