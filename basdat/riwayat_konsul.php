<?php
session_start(); // Mulai session

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/basdat/index.html");
}

$koneksi = mysqli_connect("localhost", "root", "", "order_db");

$user_id = $_SESSION['user_id'];

// Ambil informasi konsultasi saat ini dari database
$query_current_consultations = "SELECT * FROM daftar_konsultasi WHERE user_id = $user_id";
$result_current_consultations = mysqli_query($koneksi, $query_current_consultations);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Konsultasi</title>
</head>

<body>
    <h2>Riwayat Konsultasi</h2>
    <table border="1">
        <tr>
            <th>Consultation ID</th>
            <th>Nama</th>
            <th>No. HP</th>
            <th>Tanggal Konsultasi</th>
           
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result_current_consultations)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['no_hp']; ?></td>
                <td><?php echo $row['tanggal']; ?></td>
               
                
                <!-- Tombol Menuju Dashboard -->
                <td>
                    <form action="dashboard.php" method="get">
                        <button type="submit" style="background-color: #008CBA; color: white; border: none; padding: 5px 10px; cursor: pointer;">Dashboard</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>
