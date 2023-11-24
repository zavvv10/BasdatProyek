<?php
session_start(); // Mulai session

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika tidak, redirect ke halaman login
    header("Location: http://localhost/basdat/index.html");
}

$koneksi = mysqli_connect("localhost", "root", "", "baru_db");

if (isset($_POST["tblsubmit"])) {
    // Pastikan nama input sesuai dengan formulir HTML
    $user_id = $_SESSION['user_id']; // Ambil user_id dari sesi setelah pengguna login
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    $No_HP = isset($_POST['No_HP']) ? $_POST['No_HP'] : ''; // Ganti dengan No_HP yang sesuai dengan formulir Anda
    $item_name = isset($_POST['pilihan_jasa']) ? $_POST['pilihan_jasa'] : ''; // Ganti dengan Pilihan_jasa yang sesuai dengan formulir Anda

    // Periksa ketersediaan nilai sebelum menjalankan query
    if ($nama && $alamat && $No_HP && $item_name) {
        $query = "INSERT INTO daftar_pesanan (nama, alamat, no_hp, item_name, user_id) VALUES ('$nama', '$alamat', '$No_HP', '$item_name', '$user_id')";
        
        if (mysqli_query($koneksi, $query)) {
            echo "Pemesanan berhasil!";
            
            // Tambahkan script JavaScript untuk redirect
            echo '<script>
                    function redirectToOrders() {
                        window.location.href = "http://localhost/basdat/list_order.php";
                    }
                    setTimeout(function() {
                        redirectToOrders();
                    }, 2000);
                  </script>';
                  
            // echo '<td><button type="button" name="tblstatus" onclick="redirectToOrders()">Cek Status Pesanan</button></td>';
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Formulir tidak lengkap!";
    }
}
?>
