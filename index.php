<?php
require_once 'config.php';

// Ambil semua kategori dengan jumlah produk
$query = "SELECT c.*, COUNT(p.id) as product_count 
          FROM categories c 
          LEFT JOIN products p ON c.id = p.category_id 
          GROUP BY c.id 
          ORDER BY c.id";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Desa Burikan - Kuliner & Produk Unggulan</title>
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

        /* Animated Background Particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(244, 162, 97, 0.3);
            animation: float-particle 15s infinite ease-in-out;
        }

        .particle:nth-child(1) { width: 80px; height: 80px; top: 10%; left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 60px; height: 60px; top: 20%; left: 80%; animation-delay: 2s; }
        .particle:nth-child(3) { width: 100px; height: 100px; top: 60%; left: 30%; animation-delay: 4s; }
        .particle:nth-child(4) { width: 70px; height: 70px; top: 80%; left: 70%; animation-delay: 6s; }
        .particle:nth-child(5) { width: 90px; height: 90px; top: 40%; left: 50%; animation-delay: 8s; }

        @keyframes float-particle {
            0%, 100% { transform: translate(0, 0) rotate(0deg); opacity: 0.3; }
            25% { transform: translate(50px, -50px) rotate(90deg); opacity: 0.6; }
            50% { transform: translate(-30px, -100px) rotate(180deg); opacity: 0.4; }
            75% { transform: translate(-80px, -50px) rotate(270deg); opacity: 0.5; }
        }

        /* Hero Section dengan Animasi Bergerak */
        .hero-section {
            background: linear-gradient(135deg, rgba(30, 58, 47, 0.95), rgba(45, 90, 69, 0.95)), 
                        url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=1920') center/cover fixed;
            color: white;
            padding: 120px 0 100px;
            text-align: center;
            position: relative;
            overflow: hidden;
            min-height: 600px;
            display: flex;
            align-items: center;
        }

        /* Animated Circles Background */
        .hero-section::before {
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

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-section h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 20px;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
            animation: fadeInDown 1s ease, glow 3s ease-in-out infinite;
        }

        @keyframes glow {
            0%, 100% { text-shadow: 2px 2px 10px rgba(0,0,0,0.3); }
            50% { text-shadow: 2px 2px 30px rgba(244, 162, 97, 0.8); }
        }

        .hero-section .subtitle {
            font-size: 1.6rem;
            font-weight: 300;
            margin-bottom: 15px;
            opacity: 0.95;
            animation: fadeInUp 1s ease 0.3s both;
        }

        .hero-section .tagline {
            font-size: 1.2rem;
            opacity: 0.85;
            animation: fadeInUp 1s ease 0.6s both;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Floating Icons */
        .floating-icon {
            position: absolute;
            font-size: 3rem;
            opacity: 0.2;
            animation: float 6s ease-in-out infinite;
        }

        .floating-icon:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; }
        .floating-icon:nth-child(2) { top: 60%; left: 85%; animation-delay: 2s; }
        .floating-icon:nth-child(3) { top: 80%; left: 15%; animation-delay: 4s; }
        .floating-icon:nth-child(4) { top: 30%; left: 75%; animation-delay: 1s; }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(10deg); }
        }

        .hero-wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .hero-wave svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 80px;
            animation: wave-move 3s ease-in-out infinite;
        }

        @keyframes wave-move {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(-20px); }
        }

        /* Category Section dengan Animasi Bergerak */
        .category-section {
            padding: 100px 0;
            background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%);
            position: relative;
            overflow: hidden;
        }

        /* Animated Background Pattern */
        .category-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(244, 162, 97, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 50%, rgba(45, 90, 69, 0.1) 0%, transparent 50%);
            animation: pattern-move 10s ease-in-out infinite;
        }

        @keyframes pattern-move {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.1) rotate(5deg); }
        }

        .section-header {
            text-align: center;
            margin-bottom: 70px;
            position: relative;
            z-index: 2;
        }

        .section-header h2 {
            font-size: 3rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
            animation: fadeInDown 1s ease;
        }

        .section-header h2::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 5px;
            background: linear-gradient(90deg, var(--accent), #e89550);
            border-radius: 3px;
            animation: expand-width 2s ease-in-out infinite;
        }

        @keyframes expand-width {
            0%, 100% { width: 100px; }
            50% { width: 150px; }
        }

        .section-header p {
            color: #666;
            font-size: 1.2rem;
            max-width: 600px;
            margin: 30px auto 0;
            animation: fadeInUp 1s ease 0.3s both;
        }

        .category-item {
            background: white;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            position: relative;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            animation: slideUp 0.8s ease both;
        }

        .category-item:nth-child(1) { animation-delay: 0.1s; }
        .category-item:nth-child(2) { animation-delay: 0.2s; }
        .category-item:nth-child(3) { animation-delay: 0.3s; }
        .category-item:nth-child(4) { animation-delay: 0.4s; }

        .category-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--card-gradient);
            transition: height 0.3s;
            animation: shimmer 3s ease-in-out infinite;
        }

        @keyframes shimmer {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .category-item:hover {
            transform: translateY(-20px) scale(1.03);
            box-shadow: 0 25px 70px rgba(0,0,0,0.2);
        }

        .category-item:hover::before {
            height: 10px;
        }

        .category-icon-wrapper {
            padding: 50px 20px 20px;
            text-align: center;
            position: relative;
        }

        .category-icon {
            width: 130px;
            height: 130px;
            background: var(--card-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            color: white;
            font-size: 3.5rem;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            transition: all 0.4s;
            position: relative;
            animation: rotate-icon 8s linear infinite;
        }

        @keyframes rotate-icon {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .category-item:hover .category-icon {
            animation-play-state: paused;
            transform: rotate(0deg) scale(1.15);
        }

        .category-icon::before {
            content: '';
            position: absolute;
            inset: -10px;
            border-radius: 50%;
            background: var(--card-gradient);
            opacity: 0.3;
            z-index: -1;
            animation: ripple 2s ease-in-out infinite;
        }

        @keyframes ripple {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.2); opacity: 0.1; }
        }

        .category-content {
            padding: 25px 30px 35px;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .category-name {
            font-size: 1.7rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 15px;
            transition: color 0.3s;
        }

        .category-item:hover .category-name {
            color: var(--accent);
        }

        .category-count {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #f0f0f0;
            padding: 10px 25px;
            border-radius: 25px;
            font-size: 1rem;
            color: #666;
            margin-bottom: 25px;
            transition: all 0.3s;
        }

        .category-count i {
            color: var(--accent);
            animation: bounce-icon 1.5s infinite;
        }

        @keyframes bounce-icon {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-3px); }
        }

        .btn-explore {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 16px 40px;
            background: var(--card-gradient);
            color: white;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.05rem;
            text-decoration: none;
            transition: all 0.3s;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border: none;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .btn-explore::before {
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

        .btn-explore:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-explore:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 35px rgba(0,0,0,0.25);
            color: white;
        }

        .btn-explore i {
            transition: transform 0.3s;
        }

        .category-item:hover .btn-explore i {
            transform: translateX(8px);
        }

        /* CTA Section dengan Animasi */
        .cta-section {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            padding: 100px 0;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: rgba(244, 162, 97, 0.15);
            border-radius: 50%;
            animation: pulse-circle 4s ease-in-out infinite;
        }

        .cta-section::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
            animation: pulse-circle 5s ease-in-out infinite 1s;
        }

        @keyframes pulse-circle {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 0.8; }
        }

        .cta-section h2 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 25px;
            position: relative;
            z-index: 2;
            animation: fadeInUp 1s ease;
        }

        .cta-section p {
            font-size: 1.3rem;
            opacity: 0.95;
            margin-bottom: 40px;
            position: relative;
            z-index: 2;
            animation: fadeInUp 1s ease 0.3s both;
        }

        .btn-cta {
            background: var(--accent);
            color: white;
            padding: 18px 50px;
            border-radius: 35px;
            font-weight: 600;
            font-size: 1.1rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s;
            box-shadow: 0 15px 40px rgba(244, 162, 97, 0.5);
            position: relative;
            z-index: 2;
            animation: bounce-cta 2s ease-in-out infinite;
        }

        @keyframes bounce-cta {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .btn-cta:hover {
            background: #e89550;
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 50px rgba(244, 162, 97, 0.6);
            color: white;
            animation: none;
        }

        /* Footer Modern */
        .footer {
            background: var(--dark);
            color: white;
            padding: 80px 0 30px;
            position: relative;
        }

        .footer-brand {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .footer-brand i {
            color: var(--accent);
            animation: spin 10s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .footer-desc {
            color: #aaa;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .footer-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: white;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--accent);
            animation: expand-width 2s ease-in-out infinite;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 15px;
        }

        .footer-links a {
            color: #aaa;
            text-decoration: none;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-links a:hover {
            color: var(--accent);
            transform: translateX(10px);
        }

        .footer-social {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .footer-social a {
            width: 50px;
            height: 50px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
            animation: float-social 3s ease-in-out infinite;
        }

        .footer-social a:nth-child(1) { animation-delay: 0s; }
        .footer-social a:nth-child(2) { animation-delay: 0.5s; }
        .footer-social a:nth-child(3) { animation-delay: 1s; }
        .footer-social a:nth-child(4) { animation-delay: 1.5s; }

        @keyframes float-social {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .footer-social a:hover {
            background: var(--accent);
            transform: translateY(-5px) scale(1.1);
            animation: none;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 30px;
            margin-top: 50px;
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

        /* Scroll to Top Button */
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

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5rem;
            }
            .hero-section .subtitle {
                font-size: 1.2rem;
            }
            .section-header h2 {
                font-size: 2rem;
            }
            .category-icon {
                width: 100px;
                height: 100px;
                font-size: 2.8rem;
            }
            .category-name {
                font-size: 1.4rem;
            }
            .cta-section h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Background Particles -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Hero Section -->
    <section class="hero-section">
        <!-- Floating Icons -->
        <i class="fas fa-utensils floating-icon"></i>
        <i class="fas fa-shopping-bag floating-icon"></i>
        <i class="fas fa-store floating-icon"></i>
        <i class="fas fa-heart floating-icon"></i>

        <div class="container hero-content">
            <h1><i class="fas fa-utensils me-3"></i>UMKM Desa Burikan</h1>
            <p class="subtitle">Pusat Kuliner dan Produk Unggulan Terbaik</p>
            <p class="tagline">
                <span>Temukan berbagai menu lezat dan produk lokal berkualitas</span>
            </p>
        </div>
        <div class="hero-wave">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#f8f9fa"></path>
            </svg>
        </div>
    </section>

    <!-- Category Section -->
    <section class="category-section">
        <div class="container">
            <div class="section-header">
                <h2>Pilih Jenis UMKM</h2>
                <p>Jelajahi berbagai kategori produk unggulan dari pelaku UMKM Desa Burikan</p>
            </div>
            
            <div class="row g-4">
                <?php 
                $gradients = [
                    'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                    'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)',
                    'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)',
                    'linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)',
                    'linear-gradient(135deg, #fa709a 0%, #fee140 100%)',
                    'linear-gradient(135deg, #a8edea 0%, #fed6e3 100%)',
                    'linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%)',
                    'linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%)',
                    'linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%)',
                    'linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%)'
                ];
                $index = 0;
                while($category = $result->fetch_assoc()): 
                    $gradient = $gradients[$index % count($gradients)];
                    $index++;
                ?>
                    <div class="col-md-6 col-lg-3">
                        <a href="detail-kategori.php?id=<?php echo $category['id']; ?>" 
                           class="category-item" 
                           style="--card-gradient: <?php echo $gradient; ?>;">
                            <div class="category-icon-wrapper">
                                <div class="category-icon">
                                    <i class="fas <?php echo htmlspecialchars($category['icon']); ?>"></i>
                                </div>
                            </div>
                            <div class="category-content">
                                <div>
                                    <h3 class="category-name"><?php echo htmlspecialchars($category['name']); ?></h3>
                                    <div class="category-count">
                                        <i class="fas fa-utensils"></i>
                                        <?php echo $category['product_count']; ?> Menu Tersedia
                                    </div>
                                </div>
                                <span class="btn-explore">
                                    Lihat Menu <i class="fas fa-arrow-right"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Dukung UMKM Lokal!</h2>
            <p>Mari bersama-sama memajukan ekonomi desa dengan membeli produk lokal</p>
            <a href="#kategori" class="btn-cta">
                <i class="fas fa-shopping-bag"></i> Mulai Belanja Sekarang
            </a>
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
                        Platform digital untuk mempromosikan dan mendukung produk unggulan dari pelaku UMKM Desa Burikan. Bersama kita bangkitkan ekonomi lokal!
                    </p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <h4 class="footer-title">Menu Cepat</h4>
                    <ul class="footer-links">
                        <li><a href="index.php"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                        <li><a href="#kategori"><i class="fas fa-chevron-right"></i> Kategori UMKM</a></li>
                        <li><a href="#tentang"><i class="fas fa-chevron-right"></i> Tentang Kami</a></li>
                        <li><a href="#kontak"><i class="fas fa-chevron-right"></i> Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h4 class="footer-title">Kontak Kami</h4>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Desa Burikan, Indonesia</a></li>
                        <li><a href="tel:+6281234567890"><i class="fas fa-phone"></i> +62 812-3456-7890</a></li>
                        <li><a href="mailto:info@umkmburikan.id"><i class="fas fa-envelope"></i> info@umkmburikan.id</a></li>
                        <li><a href="#"><i class="fas fa-clock"></i> Senin - Minggu: 08.00 - 21.00</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">&copy; 2026 UMKM Desa Burikan. Semua Hak Dilindungi. | Dibuat oleh <i class="fas fa-heart"></i> KKN UMK DESA BURIKAN 2026</p>
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

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>