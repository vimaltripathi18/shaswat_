<?php include "head.php"; ?>
<style>
        body
{
    width:                             1500px;
}

        .about{
            top: 120px;
            position: relative;
        border-bottom: 1px solid;
        height: 80%;
        background-color: white;
        box-shadow: 1px 1px 1px 1px;
        vertical-align:baseline;
        border-bottom-left-radius: 50px;
        border-top-right-radius: 50px;
        margin-bottom: 10px;
    }
    .ab1{
        text-align: center;
        font-family: q1;
        font-size: 30px;
        padding-top: 25px;
    }
    
    .ab2{
        text-align: center;
        font-family: q2;
        font-size: 18px;
        margin: 20 80px;
        text-align: justify;
        width: 90%;
    }
</style>



<div class="about">

<div class="ab1">
    About Us
</div>
<hr width="60%">
<center>
    <?php
                require"connection.php";
                $req2 = mysqli_query($connect, "select *from data where place='rate'");
                $row2=mysqli_fetch_array($req2);
    
    for($i=0; $i<$row2['d1']; $i++ ) {
        echo "<span style='font-size:40px;'>&#9734;</span>";
    }
                
                ?>
</center>
<div class="ab2">
    <table border="0" width="100%">
        <tr>
                        <td align="center" width="40%">
                Customer Review<br>
                            <?php
                require"connection.php";
                $req2 = mysqli_query($connect, "select *from menu_video where place='review'");
                $row2=mysqli_fetch_array($req2);
                
                ?>
                            <br>
                            
        <video width="80%" style="opacity:.5; border-radius:50%;" onmouseover="x()" onmouseout="y()" id='ve' poster="image/logo.png">
    <?php echo "<source src='video/".$row2['name']."' type='video/mp4'>"; ?>
    </video>
                            <script>
                            function x(){
                                var vid = document.getElementById("ve");
                                vid.controls = true;
                            }
                            function y(){
                                var vid = document.getElementById("ve");
                                vid.controls = false;
                            }
                            </script>
            </td>
     
            <td width="60%">
                
                <?php
                require"connection.php";
                $req = mysqli_query($connect, "select *from data where place='about'");
                $row=mysqli_fetch_array($req);
                echo $row['d2'];
                ?>
                
            </td>
        </tr>
    </table>
    

</div>
</div>
<?php include "footer.php"; ?>