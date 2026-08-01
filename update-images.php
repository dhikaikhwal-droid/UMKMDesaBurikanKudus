<?php
require_once 'config.php';

// Mapping produk ke gambar
$productImages = [
    // Category 1 - Ecoprint
    1 => 'Sandal.jpeg',
    2 => 'Tas Ecoprint.jpeg',
    3 => 'Topi Ecoprint.jpeg',
    4 => 'Mug.jpeg',
    5 => 'Kemeja.jpeg',
    
    // Category 2 - Jajan Sadis
    6 => 'macaroni sadis.png',
    7 => 'kerupuk makaroni.png',
    8 => 'kue lapis.png',
    9 => 'kerupuk seblak.png',
    10 => 'kerupuk makaroni.png',
    
    // Category 3 - Kerupuk ABC
    11 => 'kerupuk ikan kerapu.png',
    12 => 'Kerupuk Bawang.png',
    13 => 'Kerupuk Putih.png',
    
    // Category 4 - Soto
    14 => 'Soto Ayam.png',
    15 => 'Sate Telur Puyuh.png',
    16 => 'Perkedel.jpg',
    17 => 'Gorengan.png',
    18 => 'Mendoan.png',
    
    // Category 5 - Bakso
    19 => 'Bakso Bungkam Janda.png',
    20 => 'Telur Puyuh.jpg',
    21 => 'Bakso tetelan.png',
    22 => 'Bakso tetelan.png',
    23 => 'Gorengan.png',
    
    // Category 6 - Martabak
    24 => 'kue bandung original.png',
    25 => 'martabak telur ayam.png',
    
    // Category 7 - Kerupuk Pak Sony
    26 => 'kerupuk seblak.png',
    27 => 'kerupuk ikan kerapu.png',
    
    // Category 8 - Donut
    28 => 'donat meses.png',
    29 => 'roti pisang.png',
    30 => 'kue lapis.png',
    
    // Category 9 - Susu Kedelai
    31 => 'Susu Kedelai Original.png',
    32 => 'Susu Kedelai Strawberry.png',
    33 => 'Susu Kedelai Cokelat.png',
    34 => 'Susu Kedelai Original.png',
    
    // Category 10 - Rajut
    35 => 'tas rajut.png',
    36 => 'keychain rajut (1).png',
    37 => 'Dompet Rajut.png',
    38 => 'keychain rajut.png',
];

$updated = 0;
$failed = 0;

foreach ($productImages as $productId => $imageName) {
    $imagePath = 'image/' . $imageName;
    
    // Cek file ada atau tidak
    $fullPath = __DIR__ . '/public/' . $imagePath;
    if (file_exists($fullPath)) {
        $sql = "UPDATE products SET image = '$imagePath' WHERE id = $productId";
        if ($conn->query($sql)) {
            echo "✅ Product ID $productId - $imageName<br>";
            $updated++;
        } else {
            echo "❌ Product ID $productId - Gagal update database<br>";
            $failed++;
        }
    } else {
        echo "️ Product ID $productId - File tidak ada: $imageName<br>";
        $failed++;
    }
}

echo "<hr>";
echo "<h3>Selesai!</h3>";
echo "Updated: $updated<br>";
echo "Failed: $failed<br>";
echo "<br><a href='index.php'>Kembali ke Home</a>";

$conn->close();
?>