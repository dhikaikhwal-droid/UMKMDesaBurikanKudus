<?php
require_once 'config.php';

echo "<h1>🔍 Cek Status Gambar</h1>";
echo "<p>Database: <strong>$database</strong></p>";
echo "<hr>";

// Ambil semua produk
$query = "SELECT p.id, p.name, p.image, c.name as category_name 
          FROM products p 
          JOIN categories c ON p.category_id = c.id 
          ORDER BY p.id";
$result = $conn->query($query);

$ada = 0;
$tidak = 0;

while($row = $result->fetch_assoc()) {
    // Coba beberapa kemungkinan path
    $paths = [
        __DIR__ . '/public/' . $row['image'],
        __DIR__ . '/' . $row['image'],
        __DIR__ . '/public/image/' . basename($row['image']),
    ];
    
    $found = false;
    $correctPath = '';
    
    foreach ($paths as $path) {
        if (file_exists($path)) {
            $found = true;
            $correctPath = $path;
            break;
        }
    }
    
    echo "<div style='margin:15px; padding:15px; border:1px solid #ddd; border-radius:10px;";
    echo $found ? "background:#d4edda;'" : "background:#f8d7da;'>";
    echo "<strong>ID {$row['id']}</strong> - {$row['name']}<br>";
    echo "Kategori: {$row['category_name']}<br>";
    echo "Image di DB: <code>{$row['image']}</code><br>";
    
    if ($found) {
        echo "✅ File ditemukan!<br>";
        echo "Path: <code>$correctPath</code><br>";
        echo "<img src='" . $row['image'] . "' width='150' style='margin-top:10px; border:2px solid green;'><br>";
        $ada++;
    } else {
        echo "❌ File TIDAK ditemukan!<br>";
        echo "Coba path:<br>";
        foreach ($paths as $p) {
            echo "<code>$p</code><br>";
        }
        $tidak++;
    }
    echo "</div>";
}

echo "<hr>";
echo "<h2>📊 Ringkasan</h2>";
echo "✅ Gambar ada: $ada<br>";
echo "❌ Gambar tidak ada: $tidak<br>";

$conn->close();
?>