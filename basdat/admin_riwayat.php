<?php
session_start(); // Mulai session

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/basdat/index.html");
}

$koneksi = mysqli_connect("localhost", "root", "", "order_db");

$user_id = $_SESSION['user_id'];

// Periksa apakah pengguna adalah admin
$query_check_admin = "SELECT role FROM tbl_users WHERE user_id = $user_id";
$result_check_admin = mysqli_query($koneksi, $query_check_admin);

$is_admin = false;

if ($result_check_admin) {
    $row_check_admin = mysqli_fetch_assoc($result_check_admin);
    $is_admin = ($row_check_admin['role'] == 'admin');
}

// Ambil informasi konsultasi dari database
if ($is_admin) {
    // Jika admin, ambil semua konsultasi
    $query_all_consultations = "SELECT * FROM daftar_konsultasi";
    $result_all_consultations = mysqli_query($koneksi, $query_all_consultations);
} else {
    // Jika bukan admin, ambil hanya konsultasi untuk user yang sedang login
    $query_current_consultations = "SELECT * FROM daftar_konsultasi WHERE user_id = $user_id";
    $result_current_consultations = mysqli_query($koneksi, $query_current_consultations);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Konsultasi</title>
    <link rel="stylesheet" href="admin_riwayat.css">
    <script>
        // function redirectToForm(formType) {
        //     // Ganti dengan URL ke halaman form yang sesuai
        //     if (formType === 'order') {
        //         window.location.href = "http://localhost/basdat/form_order.php";
        //     } else if (formType === 'konsultasi') {
        //         window.location.href = "http://localhost/basdat/form_konsultasi.php";
        //     }
        // }

        function redirectToOrders() {
            // Ganti dengan URL ke halaman daftar pesanan
            window.location.href = "http://localhost/basdat/admin_listorder.php";
        }

        function redirectToConsultationHistory() {
            // Ganti dengan URL ke halaman riwayat konsultasi
            window.location.href = "http://localhost/basdat/admin_riwayat.php";
        }

        function logout() {
            // Redirect ke halaman logout
            window.location.href = "http://localhost/basdat/logout.php";
        }
    </script>
</head>

<body>
    <div class="container">
    <h1>Admin</h1>
        <div class="navbar">
            <ul>
            <li><a onclick="redirectToOrders()">Daftar Pesanan</a></li>
                <li><a onclick="redirectToConsultationHistory()">Riwayat Konsultasi</a></li>
                <li><a onclick="logout()">Logout</a></li>
            </ul>
    </div>
    <div class="content">
    <h2>Riwayat Konsultasi</h2>
    </div>
    <div class="contents">
    <table border="1">
        <tr>
            <th>Consultation ID</th>
            <th>Nama</th>
            <th>No. HP</th>
            <th>Tanggal Konsultasi</th>
            <?php if ($is_admin) { ?>
                <!-- Tambahkan kolom atau informasi tambahan untuk admin -->
               
            <?php } ?>
        </tr>
        <?php
        if ($is_admin) {
            // Loop untuk admin (ambil semua konsultasi)
            while ($row = mysqli_fetch_assoc($result_all_consultations)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['no_HP']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <!-- Tambahkan informasi tambahan untuk admin -->
                    
                </tr>
            <?php }
        } else {
            // Loop untuk user biasa (ambil konsultasi user yang sedang login)
            while ($row = mysqli_fetch_assoc($result_current_consultations)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['no_hp']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                </tr>
        <?php }
        } ?>
    </table>
    </div>
</body>

</html>
