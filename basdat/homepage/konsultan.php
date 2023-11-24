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
    <title>Hi-Phone Konsultan</title>
    <link rel="stylesheet" href="konsultan.css">
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
    <div class="content">
        <h1>Masih Bingung dengan Kondisi HP Anda? <br>
            Tanyakan saja pada kami.</h1>
            <p>Nikmati sensasi kinerja dari kami yang akan memuaskan anda dalam  proses pengerjaan hape anda.<br> Mari coba untuk konsultasikan saja kepada kami!</p>
    </div>
    <div class="edit">
        <a href="pesan_konsul.php">Konsultasi disini!</a>
        <a href="/basdat/riwayat_konsul.php">Riwayat</a>
    </div>
</body>
</html>