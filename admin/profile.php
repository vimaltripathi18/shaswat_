<?php

if((!isset($_SESSION['user'])) || (!isset($_SESSION['password']))){
    echo "<script> window.location = 'admin_login.php'; </script>";
}
?>

<br><br> <center> <h2 style="font-family:k1;"> Profile </h2></center>

<style>
    input[type=text],input[type=password] {
        width: 90%;
        padding: 10px 30px;
        margin: 10px;
        border-radius: 10px;
        border: 1px;
    }
    button{
        width: 200px;
        background-color: orangered;
        color: white;
        font-family: calibri;
        padding: 10px;
        font-size: 18px;
        border: solid;
        border-radius: 20px;
    }
       .button{
        background-color: darkgray;
           color: white;
        font-family: calibri;
        padding: 10px 20px;
        font-size: 18px;
        border: 1px solid;
        border-radius: 20px;
           margin-left: 20px;
           width: 100px;
    }
    .box_pass{
        width: 40%;
        height: 45%;
        border: 1px solid;
        background-color: white;
        top: 30%;
        left: 35%;
        position: fixed;
        display: none;
    }
</style>

<div class="box_pass" id="box">

<script>
    function pass(){
        document.getElementById("box").style.display = "block";
      }   
    
    function x(){
        //document.getElementById("box").style.display = "none";
        window.location = "?profile";
      }
</script>
    
    <table border="0" width="100%" height="100%">
        <tr><td height="40px" width="90%" align="center" style="font-family:k1; font-size:20px;"> Change Password </td> 
            <td align="center" style="font-family:k1; font-size:20px; cursor:pointer;" onclick="x()">X</td></tr>
        <tr><td colspan="2">
            <form method="post" name="cp" id="cp_in">
            <table width="90%" border="0" align="center" style="font-family:calibri;">
                <tr><td  width="25%">Current Password</td> 
                    <td width="5%">|</td> <td> <input type='password' name='c' style="border:1px solid;"> </td>
                    
                <tr><td  width="25%">New Password</td> <td width="5%">|</td> <td>
                  <input type='password' name='n' id='c1' style="border:1px solid;" minlength="4" maxlength="24">
                    <rem id="error_c1" style="color:red"></rem>
                    </td></tr>                
                    <tr><td  width="25%">Re-enter</td> <td width="5%">|</td> <td>
                  <input type='password' name='r' id='c2' style="border:1px solid;" onkeyup="check()">
                    </td></tr>
            </table>
            </form>
            </td></tr>
        <tr><td colspan="2"  height="40px" align="center">
            <button onclick="change()">Change</button>
            </td></tr>
    </table>
    
    <script>
        function change(){
            var c = document.getElementById("c1").value;
            var cl = c.length;
            if(cl<4 || cl>24) {
                document.getElementById("c1").style.border = "2px solid red";
                document.getElementById("error_c1").innerHTML = "Min Length = 4 and Max Length = 24";
           }
            else{
            document.getElementById("cp_in").submit();
            }
        }
    </script>
    
    <?php
    if(!isset($_POST['c'])){} else {
        if($_POST['n'] == $_POST['r']) {
        if(mysqli_query($con, "update admin set password='".$_POST['r']."' where user='".$_SESSION['user']."' and password='".$_POST['c']."'")){
            echo "<script> document.getElementById('box').style.display = 'none'; </script>";
            $_SESSION['password'] = $_POST['r'];
            echo "<script> alert('updated !!!') </script>";
        } else {
            echo "<script> alert('Something went wrong !!!') </script>";
        }}
        else {
            echo "<script> alert('Something went wrong !!!') </script>";
        }
    }
    ?>
    
    <script>
        function check(){
            var a = document.getElementById("c1").value;
            var b = document.getElementById("c2").value;
            
            if(a == b){
                document.getElementById("c2").style.border = "2px solid green";
                document.getElementById("c2").style.boxShadow = "1px 2px green";
                
            }
            else {
                document.getElementById("c2").style.border = "2px solid red";
                document.getElementById("c2").style.boxShadow = "1px 2px red";
            }
        }
    </script>
</div>


<?php
require "conn.php";
$req = mysqli_query($con, "select *from admin where user = '".$_SESSION['user']."'");
$row = mysqli_fetch_array($req);
?>

<style>
    #img:hover{
        background-color: black;
        opacity: 0.3;
}
    .img_box{
        width: 300px;
        height: 300px;
        border-radius: 50%;
        z-index: 10;
    }
</style>

<table border="00" width="80%" height="80%" align="center" cellspacing="2">
    <tr>
        <td width="40%" height="400px" align="center">
            
            <div class="img_box">
                <?php 
                if($row['dp'] == '') {
                    echo "<img src='dp/dp_default.png' width='300px' height='300px' style='border-radius:50%; z-index:-10;' id='img' onmouseover='imgac()' onmouseout='img()' onclick='img_c()'>";
                }else {
                    echo "<img src='dp/".$row['dp']."' width='300px' height='300px' style='border-radius:50%; z-index:-10;' id='img' onmouseover='imgac()' onmouseout='img()' onclick='img_c()'>";
                }
                 ?>
                
                <div class="edit_img"></div>
                
                <p style="position:relative; top:-55%; font-size:20px; font-family:calibri; font-weight:bold; display:none;" id="edit_b">Edit</p>
            </div>
           
            <div class="box_pass" id="img_box">

            <form method="post" id="dp" enctype="multipart/form-data">
    <table border="0" width="100%" height="100%">
        <tr><td height="40px" width="90%" align="center" style="font-family:k1; font-size:20px;"> Change DP </td> 
            <td align="center" style="font-family:k1; font-size:20px; cursor:pointer;" onclick="x()">X</td></tr>
        <tr><td colspan="2">
            <table width="90%" border="0" align="center" style="font-family:calibri;">
                <tr><td  width="25%">Select image</td> 
                    <td width="5%">|</td> <td> 
                    <input type='file' name="upload"> 
                    </td>
                </tr>
            </table>
            
            </td></tr>
        <tr><td colspan="2"  height="40px" align="center">
                <input type="submit" name="dp" value="Change" style="background-color:orangered; color: white;font-family: calibri;padding: 10px 20px;font-size: 18px;border: 1px solid;border-radius: 20px;margin-left: 20px;width: 100px;">
            </td></tr>
    </table>
    </form>
                
            </div>
            

            <script>
                function imgac(){
                 document.getElementById("edit_b").style.display = "block";
                } 
                
                function img(){
                 document.getElementById("edit_b").style.display = "none";
                }
                
                function img_c(){
                 document.getElementById("img_box").style.display = "block";
                }
            </script>
            

    
    <?php
    if(!isset($_POST['dp'])){} else {
    $name=$_FILES["upload"]["name"];
    $type=$_FILES["upload"]["type"];
    $size=$_FILES["upload"]["size"];
    $s=$size/8192;
    $tmpname=$_FILES["upload"]["tmp_name"];
    $ext = pathinfo($name, PATHINFO_EXTENSION);
    $link = $_SESSION['user'].".".$ext;
    if(($type == 'image/png') ||($type == 'image/PNG') ||($type == 'image/jpg') ||($type == 'image/JPG')||($type == 'image/jpeg') ||($type == 'image/JPEG') ) {
        
    if(mysqli_query($con, "update admin set dp ='".$link."' where user = '".$_SESSION['user']."'"))
    {
    
        move_uploaded_file($tmpname,"dp/".$link); 
    echo"<script> window.location = '?profile'; </script>";
    } else {
            echo "<center><p style='color:red; font-family:k1; font-weight:bold; top:22px; position:relative; font-size:20px;'>
    Oop's Something wents wrong !!!</p></center>";
    }
    }
    else{
        echo "<center><p style='color:red; font-family:k1; font-weight:bold; top:22px; position:relative; font-size:20px;'>
    Oop's Something wents wrong !!!</p></center>";
    }
    }
    ?>

            
        </td>
        <td> <form method="post" name='in' id="in_fo">
            <table width="80%" border="0" align="center" style="font-family:calibri;">
                <tr><td  width="25%">Name</td> <td width="5%">|</td> <td>
                    <?php echo "<input type='text' name='name' value='".$row['name']."' id='in1' disabled='true'>"; ?>
                    </td></tr>
                <tr><td  width="25%">User id</td> <td width="5%">|</td> <td>
                    <?php echo "<input type='text' name='mob' value='".$row['user']."' id='in2' disabled='true'>"; ?>
                    </td></tr>
     
            </table>
            </form>
            <table width="80%" border="0" align="center" style="font-family:calibri;">
                                <tr><td  width="25%">Password</td> <td width="5%">|</td> <td style="">
                        <button onclick="pass()" id='pas' class='button'>Edit</button>
                    </td></tr>
            <tr><td colspan="3" align="center" style="padding:30 10px;"> <br>
                
                <button onclick="edit()" id='edit'>Edit</button>
                <button onclick="save()" id='save' style="display:none;">Save</button>
        </td>
    </tr>
</table>
        </td></tr></table>

<script>
    function edit(){
        document.getElementById("in1").disabled = false;
        document.getElementById("in2").disabled = false;

        document.getElementById("in1").style.border = "1px solid";
        document.getElementById("in2").style.border = "1px solid";

        document.getElementById("edit").style.display = "none";
        document.getElementById("save").style.display = "block";
        
    }
</script>

<?php
if(!isset($_POST['name'])){} else {
    if(mysqli_query($con, "update admin set name='".$_POST['name']."',  user='".$_POST['mob']."' where user = '".$_SESSION['user']."'"))
    {
        echo "<script>
        window.location = '?profile';
        </script>";
    }
}
?>

<script>
    function save(){
        document.getElementById("in_fo").submit();
        document.getElementById("in1").disabled = true;
        document.getElementById("in2").disabled = true;

        document.getElementById("in1").style.border = "1px";
        document.getElementById("in2").style.border = "1px";

        document.getElementById("edit").style.display = "block";
        document.getElementById("save").style.display = "none";
      }
</script>


