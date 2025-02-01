<?php
$host = "localhost";
$user = "root"; // Ganti jika berbeda
$pass = ""; // Kosongkan jika tidak ada password MySQL
$dbname = "dimsumolagi";

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari AJAX
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["saran"])) {
    $saran = $conn->real_escape_string($_POST["saran"]);

    // Simpan ke database
    $sql = "INSERT INTO footer (saran) VALUES ('$saran')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Saran berhasil disimpan.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>
