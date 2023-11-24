<?php
session_start(); // Mulai session

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/basdat/index.html");
}

// Ambil informasi pengguna dari session
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi-Phone Home</title>
    <link rel="stylesheet" href="teknisi1.css">
</head>
<script>
        // function redirectToForm(formType) {
        //     // Ganti dengan URL ke halaman form yang sesuai
        //     if (formType === 'order') {
        //         window.location.href = "http://localhost/basdat/form_order.php";
        //     } else if (formType === 'konsultasi') {
        //         window.location.href = "http://localhost/basdat/form_konsultasi.php";
        //     }
        // }

        // function redirectToOrders() {
        //     // Ganti dengan URL ke halaman daftar pesanan
        //     window.location.href = "http://localhost/basdat/list_order.php";
        // }

        // function redirectToConsultationHistory() {
        //     // Ganti dengan URL ke halaman riwayat konsultasi
        //     window.location.href = "http://localhost/basdat/riwayat_konsul.php";
        // }

        function logout() {
            // Redirect ke halaman logout
            window.location.href = "http://localhost/basdat/logout.php";
        }
    </script>
<body>
    <div class="container">
        <h1>Hi-Phone</h1>
        <div class="navbar">
            <ul>
                <li><a href="home1.php">HOME</a></li>
                <li><a href="item1.php">ITEM</a></li>
                <li><a href="teknisi1.php">TEKNISI</a></li>
                <li><a href="order.html">ORDER</a></li>
                <li><a onclick="logout()">LOG OUT</a></li>
                
            </ul>
        </div>
    </div>
    <div class="detail">
        <h1>I'm Bobby <span>Kahiaman</span></h1>
        <p>Lulusan D4 Teknik Komputer IPB University<br>
        Cocok di bidang:<br>
        Hape mati total, Hape kemasukan air, Hape Konslet</p>
        <a href="order.html">Opsi 1</a>
    </div>
    <div class="images">
        <img src="cat.png" class="shape">
        <img src="raden1.png" class="teknisi">
    </div>
    <div class="detail2">
        <h1>I'm Bobby <span>Kahiaman</span></h1>
        <p>Lulusan S1 Teknik Elektro Unair<br>
        Cocok di bidang:<br>
        Hape Konslet, Hape Hilang jaringan, Hape Stuck di loading</p>
        <a href="order.html">Opsi 2</a>
    </div>
    <div class="images2">
        <img src="cat.png" class="shape">
        <img src="bib.png" class="teknisi">
    </div>
    <div class="detail3">
        <h1>I'm Bobby <span>Kahiaman</span></h1>
        <p>Lulusan S1 Informatika Undip<br>
        Cocok untuk bidang:<br>
        Baterai mengelembung, IC rusak, Kotor dalam HP
        </p>
        <a href="order.html">Opsi 3</a>
    </div>
    <div class="images3">
        <img src="cat.png" class="shape">
        <img src="raden1.png" class="teknisi">
    </div>
</body>
</html>