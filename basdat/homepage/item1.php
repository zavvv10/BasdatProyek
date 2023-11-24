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
    <link rel="stylesheet" href="item1.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
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
    <div class="title">
        <div class="items-content">
            <div class="items">
                <h1>Items</h1>
                <div class="card">
                    <i class="bx bx-desktop"></i>
                    <h2>Home Bar</h2>
                    <p>Menu pada home akan menyajikan tampilan pengantar dari bisnis kami dan nikmati kinerja dari website kami!.</p>
                </div>
                <div class="card">
                    <i class="bx bxs-devices"></i>
                    <h2>Teknisi Hi-Phone</h2>
                    <p>Penasaran siapa saja teknisi kami? Ragu? Tenang Teknisi kami andal dan terpercaya, Percayakan pada kami!</p>
                </div>
                <div class="card">
                    <i class="bx bxs-palette"></i>
                    <h2>Konsultasi Hi-Phone</h2>
                    <p>Masih banyak hal yang dipertanyakan? Jangan ragu tanyakan dan konsultasikan saja pada ahli di website kami</p>
                </div>
                <div class="card">
                    <i class="bx bx-desktop"></i>
                    <h2>Order Hi-Phone</h2>
                    <p>Langsung saja buatlah pesanan di kami dan tunggu saja hingga hape anda selesai dikerjakan.</p>
                </div>
                <div class="card">
                    <i class="bx bxs-devices"></i>
                    <h2>Status</h2>
                    <p>Bingung pesanan anda sudah dikerjakan atau belum? Tenang ada fitur di website ini yang dapat memantau progress pengerjaan HP anda.</p>
                </div>
                <div class="card">
                    <i class="bx bxs-devices"></i>
                    <h2>Admin Care</h2>
                    <p>Jangan sungkan untuk email ke admin care kami untuk info lebih lanjut!</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>