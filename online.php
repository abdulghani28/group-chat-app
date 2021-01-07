<?php
include "koneksi.php";
$ambil=$koneksi->prepare("select nick from online order by id desc");
$ambil->execute();
while($list=$ambil->fetch())
{
	echo "<i class='icon-user'></i><span class='label label-info p-3'>".$list['nick']."</span><br>";
}
?>