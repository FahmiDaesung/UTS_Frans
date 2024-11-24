<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Data produk (tanpa database)
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
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Tambahkan background untuk halaman */
        body {
            background: url('images/makanan.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9);
            /* Lebih tebal agar lebih jelas */
            border-radius: 10px;
            color: #333;
            /* Teks lebih gelap */
        }

        .card .card-title {
            font-weight: bold;
            /* Teks judul lebih tebal */

        }

        .card .card-text {
            font-size: 14px;
            /* Ukuran teks lebih kecil */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            /* Bayangan pada teks */
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
            /* Transparansi hitam pada navbar */
        }

        h1,
        h2 {
            
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            /* Bayangan pada judul */
        }
    </style>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">RUMAH MAKAN FRANS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container mt-5">
        <h1 class="text-center">Selamat datang, <?= $_SESSION['username']; ?>!</h1>
        <h2 class="mt-4">List Makanan</h2>

        <div class="row mt-3">
            <?php foreach ($produkList as $produk): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="images/<?= $produk['foto']; ?>" class="card-img-top" alt="<?= $produk['nama_produk']; ?>" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $produk['nama_produk']; ?></h5>
                            <p class="card-text">Harga: Rp <?= number_format($produk['harga'], 0, ',', '.'); ?></p>
                            <a href="detail_produk.php?nama=<?= urlencode($produk['nama_produk']); ?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>