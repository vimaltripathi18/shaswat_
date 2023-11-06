<style>
    .button{
        width: 50;
        height: 50;
        padding: 10;
        top: 85%;
        right: 5%;
        position: fixed;
        z-index: 1;
        display: none;
    }
</style>

<style>
    .count_box{
        height: 50px;
        border: solid;
        left: 30px;
        top: 20px;
        display: none;
        position: fixed;
    }
        .vc1{
            float: left;
            top:0;
            position: relative;
            height: 50px;
width: 30px;
        box-shadow: 1.5px .5px 1px 1px blue;
        text-align: justify;
    }
    
    
</style>
<?php require "visit.php"; ?>
<div class="count_box" id="box"> 
    
    <?php
    
    $len = strlen($visit);
    
    for ($i=1; $i <= $len; $i++){
        echo "    <div class=vc1> <h3 style='font-family:q1; padding-top:0px; text-align:center;'>";
        echo substr($visit, $i-1,1)."</h3> </div>";
    }
    ?>
</div>

<img src="image/upwards-arrow.png" class="button" id="top" onclick="toppage()">

<script>

window.onscroll = function() {scrollFunction2()};

function scrollFunction2() {
  if (document.body.scrollTop > 650 || document.documentElement.scrollTop > 650) {
  
      document.getElementById("top").style.display = "block";
      document.getElementById("box").style.display = "block";
  
  } else {
  
      document.getElementById("top").style.display = "none";
      document.getElementById("box").style.display = "none";
  }
}
</script>

<script>
    function toppage(){
        window.location = "";
    }
</script>