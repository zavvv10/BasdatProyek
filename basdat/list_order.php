<?php
session_start(); // Mulai session

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/basdat/index.html");
}

$koneksi = mysqli_connect("localhost", "root", "", "baru_db");

$user_id = $_SESSION['user_id'];

// Ambil informasi pesanan saat ini dari database
$query_current_orders = "SELECT * FROM daftar_pesanan WHERE user_id = $user_id";
$result_current_orders = mysqli_query($koneksi, $query_current_orders);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link rel="stylesheet" href="list_order.css">
</head>

<body>
    <h1><form action="homepage/home1.php" method="get">
                        <button type="submit" style="background-color: #008CBA; color: white; border: none; padding: 5px 10px; cursor: pointer;">Dashboard</button>
                    </form>
                </h1>
    <h2>Daftar Pesanan</h2>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. HP</th>
            <th>Item Name</th>
            <th>Status</th
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result_current_orders)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td><?php echo $row['No_HP']; ?></td>
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['status']; ?></td>


                 <!-- Tautan Edit -->
         <!-- Tombol Edit -->
           <!-- Tombol Edit -->
        <td>
            <form action="edit_order.php" method="get">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button type="submit" style="background-color: #4CAF50; color: white; border: none; padding: 5px 10px; cursor: pointer;">Edit</button>
            </form>
        </td>

        <!-- Tombol Delete -->
        <td>
            <form action="delete_order.php" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button type="submit" style="background-color: #f44336; color: white; border: none; padding: 5px 10px; cursor: pointer;">Delete</button>
            </form>
        </td>
        
            </tr>
             <!-- Tombol Menuju Dashboard -->
         
                    
        <?php } ?>
    </table>
</body>

</html>
