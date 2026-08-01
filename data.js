const umkmData = {
    categories: [
        { id: 1, name: 'Faizah Rosa Ecoprint', icon: 'fa-shoe-prints' },
        { id: 2, name: 'Jajan Sadis', icon: 'fa-pepper-hot' },
        { id: 3, name: 'Kerupuk ABC', icon: 'fa-cookie' },
        { id: 4, name: 'Soto Ayam Semarang Pak Is', icon: 'fa-bowl-food' },
        { id: 5, name: 'Bakso & Mie Ayam Sugeng Rawuh', icon: 'fa-bowl-rice' },
        { id: 6, name: 'Martabak Bang Dion', icon: 'fa-circle-dot' },
        { id: 7, name: 'Kerupuk Pak Sony', icon: 'fa-bag-shopping' },
        { id: 8, name: 'Aqila Donut', icon: 'fa-ring' },
        { id: 9, name: 'Susu Kedelai Bu Kati', icon: 'fa-mug-hot' },
        { id: 10, name: 'Rajut Bu Ratih', icon: 'fa-scissors' },
        { id: 11, name: 'Snack Choiriyah', icon: 'fa-cookie-bite' }
    ],
    products: [
        // Category 1 - Faizah Rosa Ecoprint
        { id: 1, category_id: 1, name: 'Sandal Ecoprint', description: 'Sandal dengan motif ecoprint handmade yang unik dan artistik. Nyaman dipakai sehari-hari.', image: 'Sandal.jpeg', whatsapp: '6287859221157' },
        { id: 2, category_id: 1, name: 'Topi Ecoprint', description: 'Topi dengan desain ecoprint eksklusif. Cocok untuk acara formal dan casual.', image: 'Topi Ecoprint.jpeg', whatsapp: '6287859221157' },
        { id: 3, category_id: 1, name: 'Tas Ecoprint', description: 'Tas handmade dengan motif ecoprint yang elegan. Ukuran besar, muat banyak barang.', image: 'Tas Ecoprint.jpeg', whatsapp: '6287859221157' },
        { id: 4, category_id: 1, name: 'Mug Ecoprint', description: 'Mug keramik dengan motif ecoprint yang cantik. Cocok untuk hadiah atau koleksi pribadi.', image: 'Mug.jpeg', whatsapp: '6287859221157' },
        { id: 5, category_id: 1, name: 'Kemeja Ecoprint', description: 'Kemeja dengan motif ecoprint yang unik.', image: 'Kemeja.jpeg', whatsapp: '6287859221157' },
        
        // Category 2 - Jajan Sadis
        // Category 2 - Jajan Sadis (TANPA GAMBAR untuk Baso Aci & Kerupuk Pedas)
        { id: 6, category_id: 2, name: 'Macaroni Sadis', description: 'Macaroni dengan bumbu pedas yang menggigit. Bikin ketagihan!', image: 'macaroni sadis.png', whatsapp: '6285727745411' },
        { id: 7, category_id: 2, name: 'Cemilan Sadis', description: 'Aneka cemilan pedas dengan level kepedasan yang bisa disesuaikan.', image: 'kerupuk makaroni.png', whatsapp: '6285727745411' },
        { id: 8, category_id: 2, name: 'Baso Aci Sadis', description: 'Baso aci instan dengan rasa pedas yang nendang.', image: null, whatsapp: '6285727745411' },
        { id: 9, category_id: 2, name: 'Mie Lidi', description: 'Mie lidi dengan pilihan rasa pedas atau original.', image: 'kerupuk seblak.png', whatsapp: '6285727745411' },
        { id: 10, category_id: 2, name: 'Kerupuk Pedas', description: 'Kerupuk dengan bumbu pedas yang khas.', image: null, whatsapp: '6285727745411' },
        
        // Category 3 - Kerupuk ABC
        { id: 11, category_id: 3, name: 'Kerupuk Asmara', description: 'Kerupuk ikan kerapu yang renyah dan gurih.', image: 'kerupuk ikan kerapu.png', whatsapp: '6285225266270' },
        { id: 12, category_id: 3, name: 'Kerupuk Bawang', description: 'Kerupuk bawang dengan aroma bawang yang kuat.', image: 'Kerupuk Bawang.png', whatsapp: '6285225266270' },
        { id: 13, category_id: 3, name: 'Kerupuk Putih', description: 'Kerupuk putih polos yang renyah.', image: 'Kerupuk Putih.png', whatsapp: '6285225266270' },
        
        // Category 4 - Soto Ayam
        { id: 14, category_id: 4, name: 'Soto Ayam', description: 'Soto ayam khas Semarang dengan kuah bening yang gurih.', image: 'Soto Ayam.png', whatsapp: '6285602226617' },
        { id: 15, category_id: 4, name: 'Sate Puyuh', description: 'Sate telur puyuh yang dibakar dengan bumbu kecap.', image: 'Sate Telur Puyuh.png', whatsapp: '6285602226617' },
        { id: 16, category_id: 4, name: 'Perkedel', description: 'Perkedel kentang goreng yang renyah di luar.', image: 'Perkedel.jpg', whatsapp: '6285602226617' },
        { id: 17, category_id: 4, name: 'Tempe Goreng', description: 'Tempe goreng krispi yang gurih.', image: 'Gorengan.png', whatsapp: '6285602226617' },
        { id: 18, category_id: 4, name: 'Mendoan', description: 'Tempe mendoan yang digoreng setengah matang.', image: 'Mendoan.png', whatsapp: '6285602226617' },
        
        // Category 5 - Bakso
        { id: 19, category_id: 5, name: 'Bakso Bungkam Janda', description: 'Bakso besar dengan isian telur dan daging. Porsi jumbo.', image: 'Bakso Bungkam Janda.png', whatsapp: '6285728529567' },
        { id: 20, category_id: 5, name: 'Telur Puyuh', description: 'Telur puyuh rebus yang gurih.', image: 'Telur Puyuh.jpg', whatsapp: '6285728529567' },
        { id: 21, category_id: 5, name: 'Mie Ayam Tetelan', description: 'Mie ayam dengan topping tetelan ayam.', image: 'Bakso tetelan.png', whatsapp: '6285728529567' },
        { id: 22, category_id: 5, name: 'Mie Ayam Bakso', description: 'Kombinasi mie ayam dengan bakso dan tetelan.', image: 'Bakso tetelan.png', whatsapp: '6285728529567' },
        { id: 23, category_id: 5, name: 'Gorengan', description: 'Aneka gorengan hangat.', image: 'Gorengan.png', whatsapp: '6285728529567' },
        
        // Category 6 - Martabak
        { id: 24, category_id: 6, name: 'Kue Bandung', description: 'Kue tradisional khas Bandung dengan rasa manis.', image: 'kue bandung original.png', whatsapp: '6281228771344' },
        { id: 25, category_id: 6, name: 'Martabak Telor', description: 'Martabak telor dengan isian daging dan telur.', image: 'martabak telur ayam.png', whatsapp: '6281228771344' },
        
        // Category 7 - Kerupuk Pak Sony
        { id: 26, category_id: 7, name: 'Keripik Seblak', description: 'Keripik dengan bumbu seblak kencur yang pedas.', image: 'kerupuk seblak.png', whatsapp: '6285790311641' },
        { id: 27, category_id: 7, name: 'Keripik Kerapu', description: 'Keripik ikan kerapu yang renyah dan gurih.', image: 'kerupuk ikan kerapu.png', whatsapp: '6285790311641' },
        
        // Category 8 - Donut
        { id: 28, category_id: 8, name: 'Donat', description: 'Donat lembut dengan berbagai topping menarik.', image: 'donat meses.png', whatsapp: '6285640191507' },
        { id: 29, category_id: 8, name: 'Roti Goreng', description: 'Roti goreng renyah di luar, lembut di dalam.', image: 'roti pisang.png', whatsapp: '6285640191507' },
        { id: 30, category_id: 8, name: 'Pizza Mini', description: 'Pizza mini dengan topping lengkap.', image: 'kue lapis.png', whatsapp: '6285640191507' },
        
        // Category 9 - Susu Kedelai
        { id: 31, category_id: 9, name: 'Susu Kedelai Original', description: 'Susu kedelai murni tanpa pemanis buatan.', image: 'Susu Kedelai Original.png', whatsapp: '6285727297792' },
        { id: 32, category_id: 9, name: 'Susu Kedelai Strawberry', description: 'Susu kedelai dengan rasa strawberry yang segar.', image: 'Susu Kedelai Strawberry.png', whatsapp: '6285727297792' },
        { id: 33, category_id: 9, name: 'Susu Kedelai Chocolate', description: 'Susu kedelai dengan rasa coklat yang creamy.', image: 'Susu Kedelai Cokelat.png', whatsapp: '6285727297792' },
        
        // Category 10 - Rajut Bu Ratih
        { id: 35, category_id: 10, name: 'Tas Rajut', description: 'Tas rajut handmade Bu Ratih dengan desain unik.', image: 'tas rajut.png', whatsapp: '6285712345678' },
        { id: 36, category_id: 10, name: 'Topi Rajut', description: 'Topi rajut lembut dan hangat buatan Bu Ratih.', image: 'keychain rajut (1).png', whatsapp: '6285712345678' },
        { id: 37, category_id: 10, name: 'Dompet Rajut', description: 'Dompet rajut kecil yang lucu dan praktis.', image: 'Dompet Rajut.png', whatsapp: '6285712345678' },
        { id: 38, category_id: 10, name: 'Bunga Rajut', description: 'Bunga rajut hiasan yang tidak akan layu.', image: 'keychain rajut.png', whatsapp: '6285712345678' },

        // Category 11 - Snack Choiriyah
        { id: 39, category_id: 11, name: 'Roti Pisang', description: 'Roti pisang lembut dengan isian pisang asli yang manis dan gurih.', image: 'roti pisang.png', whatsapp: '6285876434103' },
        { id: 40, category_id: 11, name: 'Risoles', description: 'Risoles renyah dengan isian ragout ayam dan sayuran yang lezat.', image: 'risoles.png', whatsapp: '6285876434103' },
        { id: 41, category_id: 11, name: 'Kue Lapis', description: 'Kue lapis tradisional dengan lapisan warna-warni yang lembut dan manis.', image: 'kue lapis.png', whatsapp: '6285876434103' },
        { id: 42, category_id: 11, name: 'Donat Meses', description: 'Donat lembut dengan topping meses coklat yang manis dan menggoda.', image: 'donat meses.png', whatsapp: '6285876434103' },
        { id: 43, category_id: 11, name: 'Bolu Gulung', description: 'Bolu gulung dengan berbagai varian rasa yang lembut dan creamy.', image: 'bolu gulung.png', whatsapp: '6285876434103' }
    ]
};
