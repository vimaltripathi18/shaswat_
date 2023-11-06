<?php

$default = 'India';

//Get user ip address
$ip_address=$_SERVER['REMOTE_ADDR'];

/*Get user ip address details with geoplugin.net*/
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
/*Get City name by return array*/
$city = $addrDetailsArr['geoplugin_city'];
$state = $addrDetailsArr['geoplugin_region'];
/*Get Country name by return array*/
$country = $addrDetailsArr['geoplugin_countryName'];
/*Comment out these line to see all the posible details*/
/*echo '<pre>';
print_r($addrDetailsArr);
die();*/
if(!$city){
   $city='Not Define';
}if(!$state){
   $state='Not Define';
}if(!$country){
   $country='Not Define';
}

echo $country;


require "connection.php";

$date = date("Y-m-d");

mysqli_query($connect, "insert into visitor values ('','".$ip_address."','".$date."','valid')");
$visit = 1;
$req = mysqli_query($connect, "select *from visitor");
while($row = mysqli_fetch_array($req))
{
    if($row['ip'] != '') {
     $visit += 4*$row['id'];   
    }
}
echo $visit;
?>
