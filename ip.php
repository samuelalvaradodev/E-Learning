<?php
$archivo = "file.txt";
$manejador = fopen($archivo,"a") or die("Imposible abrir el archivo\n");
/*$ip1 = $_SERVER['REMOTE_ADDR'];
$ip2 = geoip_isp_by_name($ip1);

$fecha=date("d/m/y g:i:s")."\r\n";
$ip = $ip2 .' '. $fecha; */

$ip = 'check';
$access_key = '766955af08d1f92e0fc7b0fad6b8bf18';
$ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
curl_close($ch);
$api_res = json_decode($json, true);
/*echo $api_res['ip']."<br>";
echo $api_res['country_name'].":" . $api_res['location']['capital']."<br>" ;
*/$nombre_host = gethostbyaddr($api_res['ip']);
/*echo $nombre_host;*/
$scnip=$api_res['ip'].", ".$api_res['country_name']." : " . $api_res['location']['capital']."  ".$nombre_host." ---------------PROXIMA ENTRADA:----------------- ";

fwrite($manejador,$scnip);
fclose($manejador);
?> 