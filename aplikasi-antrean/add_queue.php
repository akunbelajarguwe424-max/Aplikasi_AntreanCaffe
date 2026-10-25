<?php
include 'koneksi.php';


$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';

if(!empty($nama)) {
   
    $query_cek = mysqli_query($koneksi, "SELECT MAX(nomor_antrean) AS max_no FROM antrean");
    $data = mysqli_fetch_assoc($query_cek);
    
   
    $nomor_berikutnya = ($data['max_no']) ? $data['max_no'] + 1 : 1;

   
    $query_insert = "INSERT INTO antrean (nomor_antrean, nama_pelanggan, status) VALUES ('$nomor_berikutnya', '$nama', 'menunggu')";
    
    if(mysqli_query($koneksi, $query_insert)) {
        echo "SUCCESS";
    } else {
        echo "ERROR_DB";
    }
} else {
    echo "EMPTY_NAME";
}
?>