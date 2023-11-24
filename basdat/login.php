<?php
require 'koneksilog.php';
session_start();

// Periksa apakah data formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Periksa apakah koneksi berhasil
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Periksa kueri SQL
    $query_sql = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password'";
    echo "SQL Query: $query_sql<br>";

    // Eksekusi kueri SQL
    $result = mysqli_query($conn, $query_sql);

    // Periksa apakah kueri berhasil dieksekusi
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Periksa jumlah baris hasil kueri
    if(mysqli_num_rows($result) > 0) {
        // Ambil informasi pengguna dari hasil kueri
        $user_data = mysqli_fetch_assoc($result);

        // Set session untuk pengguna yang berhasil login
        $_SESSION['user_id'] = $user_data['user_id'];
        $_SESSION['email'] = $user_data['email'];

        // Periksa peran (role) pengguna
        if ($user_data['role'] == 'admin') {
            // Redirect ke halaman admin dashboard
            header("Location: http://localhost/basdat/admin_dashboard.php");
            // ubah direct ke home1html
        } else {
            // Redirect ke halaman user dashboard
            header("Location: http://localhost/basdat/homepage/home1.php");
        }
    } else {
        echo "<center><h1>Email atau Password anda salah. Silahkan Coba Login Kembali.</h1>
            <button><strong><a href='index.html'>Login</a></strong></button></center>";
    }
}
?>
