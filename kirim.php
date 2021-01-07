<?php
session_start();

include "koneksi.php";
include "caesarcipher.php";
include "vigenerecipher.php";

$nick = $_SESSION['nick'];
$pesan = strip_tags($_POST['pesan']);
$waktu = date("h:m:s");

$query = $koneksi->prepare("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'kuychat' AND TABLE_NAME = 'pesan'");
$query->execute();
$hasil = $query->fetch();

$keyc = $hasil['AUTO_INCREMENT'] % 26;
$pesan = Encipherc($pesan, $keyc);

$keyv = "cipher";
$pesan = Encipherv($pesan, $keyv);

$masukan = $koneksi->prepare("insert into pesan (nick,pesan,waktu) values (:nick,:pesan,:waktu) ");
$masukan->BindParam(":nick", $nick);
$masukan->BindParam(":pesan", $pesan);
$masukan->BindParam(":waktu", $waktu);
$masukan->execute();

if ($masukan->rowCount() == 1) {
	print "terkirim";
} else {
	print "gagal";
}
