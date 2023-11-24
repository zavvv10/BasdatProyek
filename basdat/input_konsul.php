<?php
session_start(); // Mulai session

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika tidak, redirect ke halaman login
    header("Location: http://localhost/basdat/index.html");
}

$koneksikon = mysqli_connect("localhost", "root", "", "baru_db");

if (isset($_POST["submit"])) {
    // Pastikan nama input sesuai dengan formulir HTML
    $user_id = $_SESSION['user_id']; // Ambil user_id dari sesi setelah pengguna login
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $no_hp = isset($_POST['no_hp']) ? $_POST['no_hp'] : ''; // Sesuaikan dengan nama input pada formulir
    
    // Periksa ketersediaan nilai sebelum menjalankan query
    if ($nama && $no_hp) {
        $query = "INSERT INTO daftar_konsultasi (nama, no_hp, user_id) VALUES ('$nama', '$no_hp', '$user_id')";
        
        if (mysqli_query($koneksikon, $query)) {
            echo "Pemesanan berhasil!";
            
            // Tambahkan script JavaScript untuk redirect
            echo '<script>
                function redirectToConsultationHistory() {
                    window.location.href = "http://localhost/basdat/riwayat_konsul.php";
                }
                
                // Memanggil fungsi redirectToConsultationHistory setelah 2 detik
                setTimeout(function() {
                    redirectToConsultationHistory();
                }, 2000);
            </script>';
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksikon);
        }
    } else {
        echo "Formulir tidak lengkap!";
    }
}
?>
