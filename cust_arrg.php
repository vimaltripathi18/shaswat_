<?php require "header.php"; ?> 
<style>

    .selector{
        width: 50%;
        padding: 5px;
        border-radius: 20px;
        font-family: q1;
        font-size: 20px;
        background-color: cornflowerblue;
        border: 1px solid;
        box-shadow: 1px 1px 0px 0px;
        cursor: pointer;
        margin: 30px 0;
    }
    .selector:active{
        box-shadow: 0px 0px 0px 0px;
    }

</style>

<center>
<h2 style="font-family:q1;">Customized Arrangement</h2> <br><br>
    
    
    <div class="selector" onclick="btp()">
        <p style="padding:0 0px 0 50; cursor:pointer;" align="left"> Birthday Party 
        <rem style="padding:0 50px 0 0; float:right;"> > </rem></p>
    </div>
    
    <div class="selector" onclick="wed()">
        <p style="padding:0 0px 0 50; cursor:pointer;" align="left"> Wedding 
        <rem style="padding:0 50px 0 0; float:right;"> > </rem></p>
    </div>
    
    <script>
        function btp(){
            window.location = "cust_arrg_bir.php";
        }
        
        function wed(){
            window.location = "cust_arrg_wed.php";
        }
    </script>
    
    