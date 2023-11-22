<?php
$koneksikon = mysqli_connect("localhost", "root", "", "order_db");

if (mysqli_connect_errno()) {
    echo "Koneksi gagal: " . mysqli_connect_error();
}
?>