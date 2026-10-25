<?php
include 'koneksi.php';


$query = mysqli_query($koneksi, "SELECT * FROM antrean WHERE status='menunggu' ORDER BY id ASC LIMIT 1");

if(mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);
    $id = $data['id'];
    $no = $data['nomor_antrean'];
    $nama = $data['nama_pelanggan'];

    
    mysqli_query($koneksi, "UPDATE antrean SET status='dipanggil' WHERE id='$id'");

    
    echo "OK|" . $no . "|" . $nama;
} else {
    echo "EMPTY";
}
?>