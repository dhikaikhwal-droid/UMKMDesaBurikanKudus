<?php
require_once 'config.php';

// Ambil ID kategori dari URL
$category_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil data kategori
$query_category = "SELECT * FROM categories WHERE id = $category_id";
$result_category = $conn->query($query_category);
$category = $result_category->fetch_assoc();

if (!$category) {
    header('Location: index.php');
    exit();
}

// Ambil semua produk dari kategori ini
$query_products = "SELECT * FROM products WHERE category_id = $category_id ORDER BY id";
$result_products = $conn->query($query_products);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($category['name']); ?> - UMKM Desa Burikan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1e3a2f;
            --secondary: #2d5a45;
            --accent: #f4a261;
            --light: #f8f9fa;
            --dark: #1a1a1a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--light);
            overflow-x: hidden;
            color: var(--dark);
        }

        .category-header {
            background: linear-gradient(135deg, rgba(30, 58, 47, 0.95), rgba(45, 90, 69, 0.95)),
                        url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=1920') center/cover fixed;
            color: white;
            padding: 100px 0 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .category-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(244, 162, 97, 0.1) 0%, transparent 70%);
            animation: rotate-bg 20s linear infinite;
        }

        @keyframes rotate-bg {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .category-header-content {
            position: relative;
            z-index: 2;
        }

        .category-header h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 15px;
            animation: fadeInDown 1s ease;
        }

        .category-header .subtitle {
            font-size: 1.3rem;
            opacity: 0.95;
            animation: fadeInUp 1s ease 0.3s both;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .btn-back {
            background: white;
            color: var(--primary);
            border: 2px solid white;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
            transition: all 0.3s;
            position: relative;
            z-index: 2;
        }

        .btn-back:hover {
            background: var(--accent);
            color: white;
            border-color: var(--accent);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(244, 162, 97, 0.4);
            text-decoration: none;
        }

        .products-section {
            padding: 80px 0;
            background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%);
            position: relative;
        }

        .products-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(244, 162, 97, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 50%, rgba(45, 90, 69, 0.05) 0%, transparent 50%);
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
            position: relative;
            z-index: 2;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .section-title p {
            color: #666;
            font-size: 1.1rem;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
            animation: slideUp 0.6s ease both;
        }

        .product-card:nth-child(1) { animation-delay: 0.1s; }
        .product-card:nth-child(2) { animation-delay: 0.2s; }
        .product-card:nth-child(3) { animation-delay: 0.3s; }
        .product-card:nth-child(4) { animation-delay: 0.4s; }
        .product-card:nth-child(5) { animation-delay: 0.5s; }
        .product-card:nth-child(6) { animation-delay: 0.6s; }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .product-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }

        .product-image-container {
            height: 280px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-image-container img {
            transform: scale(1.1);
        }

        .product-image-container .no-image {
            text-align: center;
            color: rgba(255,255,255,0.8);
        }

        .product-image-container .no-image i {
            font-size: 5rem;
            opacity: 0.5;
        }

        .product-image-container .no-image span {
            display: block;
            margin-top: 10px;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: linear-gradient(135deg, #ffd700, #ffed4e);
            color: #333;
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 700;
            z-index: 2;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            animation: pulse-badge 2s ease-in-out infinite;
        }

        @keyframes pulse-badge {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .product-badge i {
            margin-right: 5px;
            color: #f39c12;
        }

        .product-info {
            padding: 30px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .product-description {
            color: #666;
            font-size: 1rem;
            line-height: 1.7;
            margin-bottom: 25px;
            flex-grow: 1;
        }

        .btn-whatsapp {
            background: linear-gradient(135deg, #25D366, #20ba5a);
            color: white;
            border: none;
            border-radius: 30px;
            padding: 15px 30px;
            font-weight: 600;
            font-size: 1.05rem;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            text-decoration: none;
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-whatsapp::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255,255,255,0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-whatsapp:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-whatsapp:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 12px 35px rgba(37, 211, 102, 0.4);
            color: white;
            text-decoration: none;
        }

        .btn-whatsapp i {
            font-size: 1.3rem;
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
        }

        .empty-state i {
            font-size: 6rem;
            color: #ddd;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 2rem;
            color: #666;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #999;
            font-size: 1.1rem;
        }

        .footer {
            background: var(--dark);
            color: white;
            padding: 60px 0 30px;
            margin-top: 80px;
        }

        .footer-brand {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-brand i {
            color: var(--accent);
        }

        .footer-desc {
            color: #aaa;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 30px;
            margin-top: 40px;
            text-align: center;
            color: #888;
        }

        .footer-bottom i {
            color: #e74c3c;
            animation: heartbeat 1.5s ease-in-out infinite;
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--accent);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
            box-shadow: 0 5px 20px rgba(244, 162, 97, 0.4);
            z-index: 999;
        }

        .scroll-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .scroll-top:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(244, 162, 97, 0.6);
        }

        @media (max-width: 768px) {
            .category-header h1 { font-size: 2rem; }
            .category-header .subtitle { font-size: 1rem; }
            .section-title h2 { font-size: 1.8rem; }
            .product-image-container { height: 220px; }
            .product-name { font-size: 1.3rem; }
            .btn-whatsapp { font-size: 0.95rem; padding: 12px 20px; }
        }
    </style>
</head>
<body>
    <!-- Category Header -->
    <section class="category-header">
        <div class="container category-header-content">
            <a href="index.php" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
            <h1><i class="fas <?php echo htmlspecialchars($category['icon']); ?> me-3"></i><?php echo htmlspecialchars($category['name']); ?></h1>
            <p class="subtitle">Daftar menu <?php echo htmlspecialchars($category['name']); ?> terbaik dan terlaris</p>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section">
        <div class="container">
            <div class="section-title">
                <h2><i class="fas fa-utensils me-2"></i>Menu Tersedia</h2>
                <p>Pilih menu favorit Anda dan pesan langsung via WhatsApp</p>
            </div>

            <?php if($result_products->num_rows > 0): ?>
                <div class="row g-4">
                    <?php while($product = $result_products->fetch_assoc()): ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="product-card">
                                <!-- Product Image -->
                                <div class="product-image-container">
                                    <?php
                                    // ==========================================
                                    // LOGIKA PENGECEKAN GAMBAR - DIPERBAIKI
                                    // ==========================================
                                    $productName = $product['name'];
                                    $imageFound = false;
                                    $imagePath = '';
                                    
                                    // Daftar kemungkinan nama file gambar berdasarkan nama produk
                                    $possibleImages = [
                                        // Category 1 - Ecoprint
                                        'Sandal Ecoprint' => 'Sandal.jpeg',
                                        'Sepatu Heels Ecoprint' => 'Topi Ecoprint.jpeg',
                                        'Tas Ecoprint' => 'Tas Ecoprint.jpeg',
                                        'Mug Ecoprint' => 'Mug.jpeg',
                                        'Kemeja Ecoprint' => 'Kemeja.jpeg',
                                        
                                        // Category 2 - Jajan Sadis
                                        'Macaroni Sadis' => 'macaroni sadis.png',
                                        'Cemilan Sadis' => 'kerupuk makaroni.png',
                                        'Baso Aci Sadis' => 'bolu gulung.png',
                                        'Mie Lidi' => 'kerupuk seblak.png',
                                        'Kerupuk Pedas' => 'kerupuk makaroni.png',
                                        
                                        // Category 3 - Kerupuk ABC
                                        'Kerupuk Asmara' => 'kerupuk ikan kerapu.png',
                                        'Kerupuk Bawang' => 'Kerupuk Bawang.png',
                                        'Kerupuk Putih' => 'Kerupuk Putih.png',
                                        
                                        // Category 4 - Soto
                                        'Soto Ayam' => 'Soto Ayam.png',
                                        'Sate Puyuh' => 'Sate Telur Puyuh.png',
                                        'Perkedel' => 'Perkedel.jpg',
                                        'Tempe Goreng' => 'Gorengan.png',
                                        'Mendoan' => 'Mendoan.png',
                                        
                                        // Category 5 - Bakso
                                        'Bakso Bungkam Janda' => 'Bakso Bungkam Janda.png',
                                        'Telur Puyuh' => 'Telur Puyuh.jpg',
                                        'Mie Ayam Tetelan' => 'Bakso tetelan.png',
                                        'Mie Ayam Bakso' => 'Bakso tetelan.png',
                                        'Gorengan' => 'Gorengan.png',
                                        
                                        // Category 6 - Martabak
                                        'Kue Bandung' => 'kue bandung original.png',
                                        'Martabak Telor' => 'martabak telur ayam.png',
                                        
                                        // Category 7 - Kerupuk Pak Sony
                                        'Keripik Seblak' => 'kerupuk seblak.png',
                                        'Keripik Kerapu' => 'kerupuk ikan kerapu.png',
                                        
                                        // Category 8 - Donut
                                        'Donat' => 'donat meses.png',
                                        'Roti Goreng' => 'roti pisang.png',
                                        'Pizza Mini' => 'kue lapis.png',
                                        
                                        // Category 9 - Susu Kedelai
                                        'Susu Kedelai Original' => 'Susu Kedelai Original.png',
                                        'Susu Kedelai Strawberry' => 'Susu Kedelai Strawberry.png',
                                        'Susu Kedelai Chocolate' => 'Susu Kedelai Cokelat.png',
                                        
                                        // Category 10 - Rajut
                                        'Tas Rajut' => 'tas rajut.png',
                                        'Topi Rajut' => 'keychain rajut (1).png',
                                        'Dompet Rajut' => 'Dompet Rajut.png',
                                        'Bunga Rajut' => 'keychain rajut.png',
                                    ];
                                    
                                    // Cek apakah ada gambar yang cocok untuk produk ini
                                    foreach ($possibleImages as $prodName => $imgFile) {
                                        if (stripos($productName, $prodName) !== false) {
                                            // Cek apakah file ada di root folder
                                            if (file_exists(__DIR__ . '/' . $imgFile)) {
                                                $imagePath = $imgFile;
                                                $imageFound = true;
                                                break;
                                            }
                                        }
                                    }
                                    
                                    // Jika gambar ditemukan, tampilkan
                                    if ($imageFound) {
                                    ?>
                                        <img src="<?= htmlspecialchars($imagePath) ?>" 
                                             alt="<?= htmlspecialchars($product['name']) ?>" 
                                             loading="lazy"
                                             style="width: 100%; height: 100%; object-fit: cover;">
                                    <?php
                                    } else {
                                    ?>
                                        <!-- Jika tidak ada gambar, tampilkan icon -->
                                        <div class="no-image">
                                            <i class="fas <?php echo htmlspecialchars($category['icon']); ?>"></i>
                                            <span><?= htmlspecialchars($product['name']) ?></span>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    
                                    <!-- Badge -->
                                    <span class="product-badge">
                                        <i class="fas fa-star"></i>Best Seller
                                    </span>
                                </div>
                                
                                <!-- Product Info -->
                                <div class="product-info">
                                    <h3 class="product-name"><?= htmlspecialchars($product['name']) ?></h3>
                                    <p class="product-description"><?= htmlspecialchars($product['description']) ?></p>
                                    
                                    <?php
                                        $waText = urlencode("Halo, saya tertarik dengan *" . $product['name'] . "* dari " . $category['name'] . ". Bisa info lebih lanjut?");
                                        $waLink = "https://wa.me/" . $product['whatsapp_number'] . "?text=" . $waText;
                                    ?>
                                    <a href="<?= $waLink ?>" target="_blank" class="btn-whatsapp">
                                        <i class="fab fa-whatsapp"></i> Pesan via WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-clipboard-list"></i>
                    <h3>Belum ada menu</h3>
                    <p>Menu untuk kategori ini akan segera ditambahkan.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-brand">
                        <i class="fas fa-store"></i>
                        UMKM Desa Burikan
                    </div>
                    <p class="footer-desc">
                        Platform digital untuk mempromosikan dan mendukung produk unggulan dari pelaku UMKM Desa Burikan.
                    </p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h4 class="footer-title">Menu Cepat</h4>
                    <ul class="list-unstyled">
                        <li><a href="index.php" style="color: #aaa; text-decoration: none;">Beranda</a></li>
                        <li><a href="#kategori" style="color: #aaa; text-decoration: none;">Kategori UMKM</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h4 class="footer-title">Kontak Kami</h4>
                    <p style="color: #aaa;"><i class="fas fa-map-marker-alt me-2"></i> Desa Burikan, Indonesia</p>
                    <p style="color: #aaa;"><i class="fas fa-phone me-2"></i> +62 812-3456-7890</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">&copy; 2026 UMKM Desa Burikan. Semua Hak Dilindungi. | Dibuat dengan <i class="fas fa-heart"></i> untuk UMKM Indonesia</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <div class="scroll-top" id="scrollTop" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
        <i class="fas fa-arrow-up"></i>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Scroll to top button visibility
        window.addEventListener('scroll', function() {
            const scrollTop = document.getElementById('scrollTop');
            if (window.pageYOffset > 300) {
                scrollTop.classList.add('visible');
            } else {
                scrollTop.classList.remove('visible');
            }
        });
    </script>
</body>
</html>