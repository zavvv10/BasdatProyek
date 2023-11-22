<?php
session_start(); // Mulai session

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/basdat/index.html");
}

$koneksi = mysqli_connect("localhost", "root", "", "order_db");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Query delete pesanan
    $query_delete_order = "DELETE FROM daftar_pesanan WHERE id = $id";

    if (mysqli_query($koneksi, $query_delete_order)) {
        echo "Pesanan berhasil dihapus!";
        // Jika ingin kembali ke halaman list_orders.php, gunakan header berikut:
        // header("Location: http://localhost/basdat/list_orders.php");
    } else {
        echo "Error: " . $query_delete_order . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "Order ID tidak valid.";
    exit;
}
?>
