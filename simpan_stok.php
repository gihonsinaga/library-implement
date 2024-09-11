<?php

include "koneksi.php";


$id_buku=$_POST["id_buku"];
$judul=$_POST["judul"];
$genre=$_POST["genre"];
$harga=$_POST["harga"];
$tgl_terbit=$_POST["tgl_terbit"];
$penerbit=$_POST["penerbit"];
$review=$_POST["review"];

  $sql="INSERT INTO stok_buku (id_buku,judul,genre,harga,tgl_terbit,penerbit,review) values
		('$nama_barang','$judul','$genre','$harga','$jtgl_terbit','$penerbit','$review')";
  $hasil=mysqli_query($kon,$sql);

  if ($hasil) {
	echo "Berhasil insert data";
	exit;
  }
else {
	echo "Gagal insert data";
	exit;
}  
?>