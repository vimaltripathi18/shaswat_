<style>
     @font-face {
        font-family: q2;    src: url(font/Quicksand-Medium.ttf);
        font-family: m1;    src: url(font/MarchMadnessNF.ttf);
        font-family: q1;    src: url(font/Quando-Regular.ttf);
        }
    .index2{
        left: 0;
        top: 0;
        height: 100px;
        width: 100%;
        z-index: 1000;
        position: absolute;
    }
    .menu{
        width: 90px;
        float: right;
        height: 100%;
        padding: 0 15px;
        vertical-align: middle;
        text-align: center;
        cursor: pointer;
         color:#888888;
    }
    .menu2{
        width: 90px;
        float: right;
        height: 100%;
        padding: 0 15px;
        vertical-align: middle;
        text-align: center;
        cursor: pointer;
         color:#888888;
    }
    .menu p{
        padding-top: 20px; font-family:calibri; font-size:20px;
    }
    .menu:hover{
        background-color:#000080;
        color: white;
        height: 100%;
        margin-top: 0;
    }
    .menu p:hover{ color: white; }
<style>
.dropdown {
    float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  border: none;
  outline: none;
  color: white;
  background-color: inherit;
    width: 90px;
    height: 100%;
    text-align: center;
    cursor: pointer;
    color:#888888;
}

.dropdown-content {
  display: none;
  position: absolute;
    right: 10px;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 16px 8px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown:hover .dropdown-content {
  display: block;
}
</style>


<div class="index2" align="center">
    <img src="image/logo.png" alt="logo" width="500" height="100%" align="left" onclick="window.location = 'index.php'">
<!--    <img src="image/iso.jpg" width="100" height="90%" alt="iso" align="left" style="padding:10 40px;">-->
    
    
    <?php
    
    require "connection.php";
    $req = mysqli_query($connect, "select *from menu where valid='active' and file != ''");
    $req2 = mysqli_query($connect, "select count(*)from menu where valid='active' and file != ''");
    $row2 = mysqli_fetch_array($req2);
    if($row2['count(*)'] < 5) {
        while($row = mysqli_fetch_array($req)){
            echo "<div class=menu onclick=Page('".$row['file']."')><p>".$row['page']."</p></div>";
        }
        echo "<div class='menu' onclick=Page('index.php')><p>Home</p></div>";
    } else {
        echo "<div class='menu2'>
    <div class='dropdown'>
        <button class='dropbtn'><img src='image/menu.png' width='20' height='20px'> </button>
            <div class='dropdown-content'>";
        while($row = mysqli_fetch_array($req)){
            echo "<div class=menu onclick=Page('".$row['file']."')><p>".$row['page']."</p></div>";
        }
            echo "</div>
    </div> 
</div>
";
        echo "<div class='menu' onclick=Page('index.php')><p>Home</p></div>";
    }
    ?>
    
<!--
    
    <div class="menu" onclick="port()"><p>Portfolio</p></div>
    <div class="menu" onclick="gal()"><p>Gallery</p></div>
    <div class="menu" onclick="client()"><p>Associate</p></div>
    <div class="menu" onclick="ser()"><p>Services</p></div>
    <div class="menu" onclick="ab()"><p >About Us</p></div>
    <div class="menu" onclick="home()"><p >Home</p></div>
-->
</div>


<script>
    function Page(x){
        window.location = x;
    }
//    function ab(){
//        window.location = "about.php";
//    }
//    function ser(){
//        window.location = "service.php";
//    }
//    function work(){
//        window.location = "work.php";
//    }
//    function client(){
//        window.location = "client.php";
//    }
//    function gal(){
//        window.location = "gallery.php";
//    }
//    function port(){
//        window.location = "port.php";
//    }
//    function cont(){
//        window.location = "contact.php";
//    }
</script>