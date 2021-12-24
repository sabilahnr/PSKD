<?php

$kalimat = $_GET["kata"];
$kunci1 = $_GET["key1"]; 
$kunci2 = $_GET["key2"];
if(ctype_upper($kalimat)){
    $bataskode = 65;
} else {
    $bataskode = 97;
}

for ($i = 0; $i < strlen($kalimat); $i++) {
    $kode[$i]=ord($kalimat[$i]);  //rubah ASCII ke decimal
    $b[$i]=((($kunci1*($kode[$i] - $bataskode)) + $kunci2) % 26)+$bataskode;   //proses enkripsi
    $c[$i]=chr($b[$i]); //rubah desimal ke ASCII
}
echo "Kalimat Asli : ";
for ($i = 0; $i < strlen($kalimat); $i++) {
    echo $kalimat[$i];
}
echo "<br>";
echo "Hasil Enkripsi : ";
$hsl = '';
for ($i = 0; $i < strlen($kalimat); $i++) {
    echo $c[$i];
    $hsl = $hsl . $c[$i];
}
echo "<br>";
//simpan data di file
$fp = fopen("enkripsi.txt", "w");
fputs($fp, $hsl);
fclose($fp);

?>