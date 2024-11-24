<?php
// Data produk (hardcoded, sama seperti di dashboard.php)
$produkList = [
    [
        'nama_produk' => 'Nasi Goreng Special',
        'harga' => 25000,
        'deskripsi' => 'Nasi goreng dengan telur, ayam, dan tambahan sambal.',
        'foto' => 'nasgor.jfif'
    ],
    [
        'nama_produk' => 'Mie Ayam Bakso',
        'harga' => 20000,
        'deskripsi' => 'Mie ayam dengan kuah gurih dan bakso lezat.',
        'foto' => 'mieayam.jpeg'
    ],
    [
        'nama_produk' => 'Sate Ayam',
        'harga' => 30000,
        'deskripsi' => 'Sate ayam dengan bumbu kacang spesial.',
        'foto' => 'sate.jfif'
    ],
    [
        'nama_produk' => 'Ayam Geprek',
        'harga' => 25000,
        'deskripsi' => 'Ayam geprek dengan pilihan level pedas dari 1-10.',
        'foto' => 'geprek.jfif'
    ],
    [
        'nama_produk' => 'Pentol Kuah Pedas',
        'harga' => 15000,
        'deskripsi' => 'Pentol daging atau ayam dengan kuah pedas gurih.',
        'foto' => 'pentol.jpg'
    ],
    [
        'nama_produk' => 'Ayam Bakar',
        'harga' => 28000,
        'deskripsi' => 'Ayam bakar khas solo dengan cita rasa manis, asin, gurih.',
        'foto' => 'bakar.jfif'
    ],
];

// Ambil nama produk dari URL
if (isset($_GET['nama'])) {
    $namaProduk = urldecode($_GET['nama']);
    $produkDetail = null;

    // Cari data produk berdasarkan nama
    foreach ($produkList as $produk) {
        if ($produk['nama_produk'] === $namaProduk) {
            $produkDetail = $produk;
            break;
        }
    }

    // Jika tidak ditemukan, redirect ke dashboard
    if (!$produkDetail) {
        header("Location: dashboard.php");
        exit();
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Detail Produk</h1>
        <div class="card mx-auto" style="max-width: 400px;"> <!-- Mengatur ukuran maksimum kartu -->
            <img src="images/<?= $produkDetail['foto']; ?>" class="card-img-top" alt="<?= $produkDetail['nama_produk']; ?>" style="height: 250px; object-fit: cover;"> <!-- Membatasi tinggi gambar -->
            <div class="card-body">
                <h5 class="card-title"><?= $produkDetail['nama_produk']; ?></h5>
                <p class="card-text">Harga: Rp <?= number_format($produkDetail['harga'], 0, ',', '.'); ?></p>
                <p class="card-text"><?= $produkDetail['deskripsi']; ?></p>
                <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>