<?php
session_start();
if(isset($_SESSION['user'])) {
    echo "<script> window.location = 'index.php'; </script>";
}
?>

<style>
html, body {
    height: 100%;
}

html {
    display: table;
    margin: auto;
}

body {
    display: table-cell;
    vertical-align: middle;
}

    @font-face {
        font-family: k1;    src: url(font/KaushanScript-Regular.otf);
        }
    input[type=text],input[type=password]{
        width: 95%;
        padding: 20px;
        margin: 10px;
        border-radius: 10px;
        border: 1px solid;
        font-family: calibri;
        font-size: 18px;
    }
    input[type=submit]{
        width: 95%;
        padding: 10px;
        margin: 10px;
        border-radius: 10px;
        
        font-family: calibri;
        font-size: 18px;
    }
    .box{
        width: 60%;
        border: groove;
    }
</style>

<center>
    <rem style="font-family:k1; font-size:40px; color:orangered;"> Shashwat Mass Media Services Pvt Ltd. </rem><br>
<rem style="font-family:k1; font-size:40px; color:#000080;" align="center"> C Panel </rem>
<br><br>
<div class="box"> <form method="post">
<table border="0" align="center" width="100%">
    <tr><td><input type="text" name="user" placeholder="User Id" required></td></tr>
    <tr><td><input type="password" name="pass" placeholder="Password" required></td></tr>
    <tr><td><input type="Submit" name="a_login" value="Login"></td></tr>
    </table></form>
</div>
<br>
<rem style="font-family:calibri; font-size:18px; color:#000080;" align="center"> Design by SUV Solutions </rem></center>


<?php
if(!isset($_POST['a_login'])) { } else {
    
    require "conn.php";
    
    $sess = mysqli_query($con, "select COUNT(*) from admin where user = '".$_POST['user']."' and password = '".$_POST['pass']."'");
    $row = mysqli_fetch_array($sess);
    if($row['COUNT(*)'] == 1) {
        
        $_SESSION['user'] = $_POST['user'];        
        $_SESSION['password'] = $_POST['pass'];
        echo "<script>window.location ='index.php';</script>";
    } else {
        echo "<script>alert('Invalid Access !!!');</script>";
        echo "Error : ".mysqli_error($con);
    }
    
}
?>