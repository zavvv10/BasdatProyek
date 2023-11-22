<?php

session_start(); // Mulai session

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika tidak, redirect ke halaman login
    header("Location: http://localhost/basdat/index.html");
}
$koneksikon = mysqli_connect("localhost", "root", "", "order_db");

if (isset($_POST["submit"])) {
    // Pastikan nama input sesuai dengan formulir HTML
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $no_hp = isset($_POST['no_hp']) ? $_POST['no_hp'] : ''; // Sesuaikan dengan nama input pada formulir
    
    // Periksa ketersediaan nilai sebelum menjalankan query
    if ($nama && $no_hp) {
        $query = "INSERT INTO daftar_konsultasi (nama, no_hp) VALUES ('$nama', '$no_hp')";
        
        if (mysqli_query($koneksikon, $query)) {
            echo "Pemesanan berhasil!";
            echo '<td><button type="status" name="tblstatus">Cek Status Pesanan</button></td>';
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksikon);
        }
    } else {
        echo "Formulir tidak lengkap!";
    }
}
?>
