<?php

include "koneksi.php";
include "caesarcipher.php";
include "vigenerecipher.php";

$ambil = $koneksi->prepare("select * from pesan order by id");
$ambil->execute();

while ($ulangi = $ambil->fetch()) {
	$keyc = $ulangi['id'] % 26;
	$pesan = $ulangi['pesan'];
	$keyv = "cipher";
	
	$pesan = Decipherv($pesan, $keyv);
	$pesan = Decipherc($pesan, $keyc);

	$symbol = array();
	$icon = array();
	$pesan = str_replace($symbol, $icon, $pesan);


	// this is emoticon's operation bro 
	echo "<p><span class='text-info pl-3'> " . $ulangi['nick'] . " </span><small>&nbsp;" . $pesan . "</small></p>";
}
?>

