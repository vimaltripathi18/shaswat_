<?php include "head.php"; ?>

<style>
     .gallery{
         top: 120px;
         min-height: 60%;
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
        .cl1{
        text-align: center;
        font-family: q1;
        font-size: 30px;
        padding-top: 25px;
    }
    .scroll {
        overflow-y: auto;
        width: 92%;
        
    }
    .nav{
        width: 250px;
        height: 250px;
        float: left;
        margin: 10px;
    }
</style>

<div class="gallery">
    <div class="cl1">
    Gallery
</div>
<br><hr width="60%"><br>
    <center>
    <div class="scroll">
        <?php
        require "connection.php";
        $req = mysqli_query($connect, "select *from gallery");
        while ($row=mysqli_fetch_array($req)) {
            echo "<div class='nav'> <a href='gal.php?id=".$row['name']."'>  <img src='gal/".$row['name']."' width='100%' height='100%'>   </a> </div>  "  ;
        }
        ?>
            
    
        
    </div>
        </center>
</div>

<?php include "footer.php"; ?>