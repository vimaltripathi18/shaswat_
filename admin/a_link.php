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
    .xyz{
        margin: auto;
        width: 100%;
    }
    
</style>

<div class="menubar">
    <a href="?link&copyright">Copyright</a>
    <a href="?link&hyper">Hyperlink</a>
    <a href="?link&tandc">term & Condition</a>
    <a href="?link&privacy">Privacy </a>
    <a href="?link&dis">Disclaimer</a>

</div>
<div class="xyz" align="center">
<?php 
if(isset($_GET['copyright'])) {
    echo "<br> <br> <h1>Copyright Statement </h1>  <form method='post'> 
        <table width='50%' border=0 style='height:50px; font-size:20px; font-family:q1; position:relative;' align='center'>
        <td><textarea cols='100' rows='20' name='msg' id='newine'></textarea>
        <script src='http://js.nicedit.com/nicEdit-latest.js' type='text/javascript'></script>
        <script type='text/javascript'>bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
        </td> 
        </tr> <tr>
        <td width='150px' align='center' style='padding:10px;'> <input type='submit' name='copyright' value='Upload'></td> </tr>
    </table> </form>";
    
} else
if(isset($_GET['hyper'])) {
    echo "<br> <br> <h1>Hyperlinking Policy</h1>   <form method='post'> 
        <table width='50%' border=0 style='height:50px; font-size:20px; font-family:q1; position:relative;' align='center'>
        <td><textarea cols='100' rows='20' name='msg_2' id='newine'></textarea>
        <script src='http://js.nicedit.com/nicEdit-latest.js' type='text/javascript'></script>
        <script type='text/javascript'>bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
        </td> 
        </tr> <tr>
        <td width='150px' align='center' style='padding:10px;'> <input type='submit' name='hyper' value='Upload'></td> </tr>
    </table> </form>";
} else
if(isset($_GET['tandc'])) {
    echo "<br> <br>  <h1>Terms & Conditions </h1>   <form method='post'> 
        <table width='50%' border=0 style='height:50px; font-size:20px; font-family:q1; position:relative;' align='center'>
        <td><textarea cols='100' rows='20' name='msg_3' id='newine'></textarea>
        <script src='http://js.nicedit.com/nicEdit-latest.js' type='text/javascript'></script>
        <script type='text/javascript'>bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
        </td> 
        </tr> <tr>
        <td width='150px' align='center' style='padding:10px;'> <input type='submit' name='tandc' value='Upload'></td> </tr>
    </table> </form>";
} else 
if(isset($_GET['privacy'])) {
    echo "<br> <br>  <h1>Privacy Policy </h1>   <form method='post'> 
        <table width='50%' border=0 style='height:50px; font-size:20px; font-family:q1; position:relative;' align='center'>
        <td><textarea cols='100' rows='20' name='msg_4' id='newine'></textarea>
        <script src='http://js.nicedit.com/nicEdit-latest.js' type='text/javascript'></script>
        <script type='text/javascript'>bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
        </td> 
        </tr> <tr>
        <td width='150px' align='center' style='padding:10px;'> <input type='submit' name='privacy' value='Upload'></td> </tr>
    </table> </form>";
} else
if(isset($_GET['dis'])) {
     echo "<br> <br>  <h1>Disclaimer</h1>   <form method='post'> 
        <table width='50%' border=0 style='height:50px; font-size:20px; font-family:q1; position:relative;' align='center'>
        <td><textarea cols='100' rows='20' name='msg_5' id='newine'></textarea>
        <script src='http://js.nicedit.com/nicEdit-latest.js' type='text/javascript'></script>
        <script type='text/javascript'>bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
        </td> 
        </tr> <tr>
        <td width='150px' align='center' style='padding:10px;'> <input type='submit' name='dis' value='Upload'></td> </tr>
    </table> </form>";
} 

if(!isset($_POST['copyright'])) {} else{
    require"conn.php";
    if(mysqli_query($con, "update data set d2 = '".$_POST['msg']."' where place='copyright'")) {
        echo "Updated !!!";
    } else {
        echo "Error : ".mysqli_error($con);
    }
    
}
    
if(!isset($_POST['hyper'])) {} else{
    require"conn.php";
    if(mysqli_query($con, "update data set d2 = '".$_POST['msg_2']."' where place='hyper'")) {
        echo "Updated !!!";
    } else {
        echo "Error : ".mysqli_error($con);
    }
}
    
if(!isset($_POST['tandc'])) {} else{
    require"conn.php";
    if(mysqli_query($con, "update data set d2 = '".$_POST['msg_3']."' where place='tandc'")) {
        echo "Updated !!!";
    } else {
        echo "Error : ".mysqli_error($con);
    }}
    
if(!isset($_POST['privacy'])) {} else{
    require"conn.php";
    if(mysqli_query($con, "update data set d2 = '".$_POST['msg_4']."' where place='privacy'")) {
        echo "Updated !!!";
    } else {
        echo "Error : ".mysqli_error($con);
    }}
    
if(!isset($_POST['dis'])) {} else{
    require"conn.php";
    if(mysqli_query($con, "update data set d2 = '".$_POST['msg_5']."' where place='dis'")) {
        echo "Updated !!!";
    } else {
        echo "Error : ".mysqli_error($con);
    }}
?>
</div>