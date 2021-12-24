<?php
$kalimat = $_GET["kata"];
$kunci = $_GET["key"];
$plain_text=str_split($kalimat);
$n=count($plain_text);
$key=str_split($kunci);
$m=count($key);
$bataskode = 65;
$encrypted_text='';

$bataskode = 65; 

for($i=0;$i<$n;$i++){
$encrypted_text.=chr(((ord($plain_text[$i])-$bataskode +ord($key[$i%$m])-
$bataskode)%26) +$bataskode);} //digabungkan proses enkripsi
echo "kalimat ASLI : ";
for($i=0;$i<$n;$i++)
{
echo $kalimat[$i];
}
echo "<br>";
echo "hasil enkripsi =";
echo $encrypted_text;
?>