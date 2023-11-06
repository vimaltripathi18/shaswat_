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
    input[type=text]{
        width: 100%;
        height: 50px;
        padding: 10px;
        border-radius: 10px;
        border: solid;
        cursor: text;
    }
   
</style>

<div class="menubar">
    <a href="?service&ser">Service</a>
    <a href="?service&his">History</a>
</div>


<?php
if(!isset($_GET['ser'])){} else{
    
    echo "<br><br><br><br><form method='post'><table border=00 width='500' align='center'>
    <tr> <td width=30%>Title</td><td> <input type='text' name='title'> </td> </tr>
    <tr> <td>Data</td> <td> <textarea cols='50' rows='10' name='data' style='margin:10px; padding: 10px;border: solid; cursor: text;'></textarea> </td></tr>
    
    <tr><td colspan='2' align='center'> <br><input type='submit' name='sub'></td></tr>
    </table></form>";
    
}

if(isset($_POST['sub'])){
    
    require "conn.php";
    if(mysqli_query($con, "insert into data (place, type, d1, d2) values ('service','text','".$_POST['title']."', '".$_POST['data']."')")){
        echo "<center>uploaded !!!</center>";
    }else { echo "<center>failed !!! reason : ".mysqli_error($con)."</center>"; }
    
}
?>

<style>
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

</style>


<?php
if(!isset($_GET['his'])){} else
{ echo "<div class=ser1>Our Service</div><br><hr width=60%><br>";
 
         require "conn.php";                       
$req = mysqli_query($con, "select *from data where place='service'");
 while($row = mysqli_fetch_array($req)){
    echo"<div class=ser2>
<h3 style='font-family:q1; padding-top:30px; text-align:center;'>".$row['d1']."</h3> <hr width=90%>
    <p style='font-family:q1; padding:20px; text-align:center; font-size:14px;'>
        ".$row['d2']."
    </p>
    <hr> <center> <a href='?service&his&del=".$row['id']."' style='text-decoration:none;'>Delete</a> </center>
</div>
"; 
 }
                                

}?>

<?php if(isset($_GET['del'])){
    
    if(mysqli_query($con, "delete from data where id='".$_GET['del']."'")){
        echo "<script> window.location = '?service&his&suc'; </script>";
    }
    
    if(isset($_GET['suc'])){
       echo "deleted" ;
    }

}?>