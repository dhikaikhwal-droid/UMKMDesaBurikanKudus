// script.js - Logika untuk menampilkan data

// Fungsi untuk memuat kategori di halaman utama
function loadCategories() {
    const categoryList = document.getElementById('categoryList');
    if (!categoryList) return;

    const gradients = [
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

    umkmData.categories.forEach((category, index) => {
        const productCount = umkmData.products.filter(p => p.category_id === category.id).length;
        const gradient = gradients[index % gradients.length];
        
        const categoryHTML = `
            <div class="col-md-6 col-lg-3">
                <a href="detail-kategori.html?id=${category.id}" class="category-item" style="--card-gradient: ${gradient};">
                    <div class="category-icon-wrapper">
                        <div class="category-icon">
                            <i class="fas ${category.icon}"></i>
                        </div>
                    </div>
                    <div class="category-content">
                        <div>
                            <h3 class="category-name">${category.name}</h3>
                            <div class="category-count">
                                <i class="fas fa-utensils"></i>
                                ${productCount} Menu Tersedia
                            </div>
                        </div>
                        <span class="btn-explore">
                            Lihat Menu <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>
                </a>
            </div>
        `;
        categoryList.innerHTML += categoryHTML;
    });
}

// Fungsi untuk memuat produk di halaman detail
function loadProducts() {
    const productList = document.getElementById('productList');
    const categoryTitle = document.getElementById('categoryTitle');
    const categorySubtitle = document.getElementById('categorySubtitle');
    
    if (!productList) return;

    // Ambil ID kategori dari URL
    const urlParams = new URLSearchParams(window.location.search);
    const categoryId = parseInt(urlParams.get('id'));
    
    if (!categoryId) {
        window.location.href = 'index.html';
        return;
    }

    // Cari kategori
    const category = umkmData.categories.find(c => c.id === categoryId);
    if (!category) {
        window.location.href = 'index.html';
        return;
    }

    // Update judul
    categoryTitle.innerHTML = `<i class="fas ${category.icon} me-3"></i>${category.name}`;
    categorySubtitle.textContent = `Daftar menu ${category.name} terbaik dan terlaris`;

    // Filter produk berdasarkan kategori
    const products = umkmData.products.filter(p => p.category_id === categoryId);

    // Mapping nama produk ke file gambar
    const imageMapping = {
        'Sandal Ecoprint': 'Sandal.jpeg',
        'Sepatu Heels Ecoprint': 'Topi Ecoprint.jpeg',
        'Tas Ecoprint': 'Tas Ecoprint.jpeg',
        'Mug Ecoprint': 'Mug.jpeg',
        'Kemeja Ecoprint': 'Kemeja.jpeg',
        'Macaroni Sadis': 'macaroni sadis.png',
        'Cemilan Sadis': 'kerupuk makaroni.png',
        'Baso Aci Sadis': 'bolu gulung.png',
        'Mie Lidi': 'kerupuk seblak.png',
        'Kerupuk Pedas': 'kerupuk makaroni.png',
        'Kerupuk Asmara': 'kerupuk ikan kerapu.png',
        'Kerupuk Bawang': 'Kerupuk Bawang.png',
        'Kerupuk Putih': 'Kerupuk Putih.png',
        'Soto Ayam': 'Soto Ayam.png',
        'Sate Puyuh': 'Sate Telur Puyuh.png',
        'Perkedel': 'Perkedel.jpg',
        'Tempe Goreng': 'Gorengan.png',
        'Mendoan': 'Mendoan.png',
        'Bakso Bungkam Janda': 'Bakso Bungkam Janda.png',
        'Telur Puyuh': 'Telur Puyuh.jpg',
        'Mie Ayam Tetelan': 'Bakso tetelan.png',
        'Mie Ayam Bakso': 'Bakso tetelan.png',
        'Gorengan': 'Gorengan.png',
        'Kue Bandung': 'kue bandung original.png',
        'Martabak Telor': 'martabak telur ayam.png',
        'Keripik Seblak': 'kerupuk seblak.png',
        'Keripik Kerapu': 'kerupuk ikan kerapu.png',
        'Donat': 'donat meses.png',
        'Roti Goreng': 'roti pisang.png',
        'Pizza Mini': 'kue lapis.png',
        'Susu Kedelai Original': 'Susu Kedelai Original.png',
        'Susu Kedelai Strawberry': 'Susu Kedelai Strawberry.png',
        'Susu Kedelai Chocolate': 'Susu Kedelai Cokelat.png',
        'Tas Rajut': 'tas rajut.png',
        'Topi Rajut': 'keychain rajut (1).png',
        'Dompet Rajut': 'Dompet Rajut.png',
        'Bunga Rajut': 'keychain rajut.png'
    };

    products.forEach((product, index) => {
        const imageName = imageMapping[product.name] || product.image;
        const imagePath = imageName; // Gambar ada di folder yang sama
        
        const productHTML = `
            <div class="col-md-6 col-lg-4">
                <div class="product-card" style="animation-delay: ${index * 0.1}s">
                    <div class="product-image-container">
                        <img src="${imagePath}" 
                             alt="${product.name}"
                             onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'no-image\'><i class=\'fas ${category.icon}\'></i><span>${product.name}</span></div>'"
                             style="width: 100%; height: 100%; object-fit: cover;">
                        
                        <span class="product-badge">
                            <i class="fas fa-star"></i>Best Seller
                        </span>
                    </div>
                    
                    <div class="product-info">
                        <h3 class="product-name">${product.name}</h3>
                        <p class="product-description">${product.description}</p>
                        
                        <a href="https://wa.me/${product.whatsapp}?text=${encodeURIComponent('Halo, saya tertarik dengan *' + product.name + '* dari ' + category.name + '. Bisa info lebih lanjut?')}" 
                           target="_blank" 
                           class="btn-whatsapp">
                            <i class="fab fa-whatsapp"></i> Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        `;
        productList.innerHTML += productHTML;
    });
}

// Scroll to top button visibility
window.addEventListener('scroll', function() {
    const scrollTop = document.getElementById('scrollTop');
    if (scrollTop) {
        if (window.pageYOffset > 300) {
            scrollTop.classList.add('visible');
        } else {
            scrollTop.classList.remove('visible');
        }
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

// Load data saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('categoryList')) {
        loadCategories();
    }
    if (document.getElementById('productList')) {
        loadProducts();
    }
});