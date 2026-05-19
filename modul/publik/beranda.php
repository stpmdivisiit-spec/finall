<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
?>


<div class="container-fluid px-5 mt-5">
      <div class="card card-waves mb-4 shadow-sm border-0 overflow-hidden fade-in-up">
        <div class="card-body p-0">
            <div id="carouselHeroKampus" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselHeroKampus" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#carouselHeroKampus" data-bs-slide-to="1"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" style="background: linear-gradient(135deg, rgba(0,97,242,0.9) 0%, rgba(0,186,252,0.8) 100%), url('/FINAL/assets/img/backgrounds/bg-waves.svg'); height: 320px;">
                        <div class="p-5 text-white h-100 d-flex flex-column justify-content-center m-lg-5">
                            <span class="badge bg-white text-primary rounded-pill mb-2 px-3 py-2 fw-bold align-self-start shadow-sm">Penerimaan Mahasiswa Baru 2026</span>
                            <h2 class="display-6 fw-black mb-2 text-white">Membentuk Pemimpin Berkarakter Melayani</h2>
                            <p class="text-white-50 max-width-xl mb-0">Selamat datang di gerbang digital sistem manajemen terintegrasi. Akses kurikulum, pengumuman, penelitian, dan administrasi akademik dalam satu platform aman.</p>
                        </div>
                    </div>
                    <div class="carousel-item" style="background: linear-gradient(135deg, rgba(105,0,242,0.9) 0%, rgba(190,0,252,0.8) 100%), url('/FINAL/assets/img/backgrounds/bg-angles.svg'); height: 320px;">
                        <div class="p-5 text-white h-100 d-flex flex-column justify-content-center m-lg-5">
                            <span class="badge bg-white text-purple rounded-pill mb-2 px-3 py-2 fw-bold align-self-start shadow-sm">Sertifikasi & Mutu</span>
                            <h2 class="display-6 fw-black mb-2 text-white">Standar Pendidikan Tinggi Terakreditasi</h2>
                            <p class="text-white-50 max-width-xl mb-0">Melalui Lembaga Penjaminan Mutu (LPM), kami berkomitmen menjaga konsistensi penyelenggaraan pendidikan bermutu tinggi berbasis pilar Tri Dharma Perguruan Tinggi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xl px-4 mt-5">
    <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4 fade-in-up">
        <div class="me-4 mb-3 mb-sm-0">
            <h1 class="mb-0 text-primary fw-black" style="letter-spacing: -0.05rem;">Portal Akademik & Informasi Terpadu</h1>
            <div class="small text-muted mt-1">
                <i data-feather="calendar" class="me-1 text-primary" style="width: 14px; height: 14px;"></i>
                <span class="fw-bold text-dark"><?= date('l') ?></span> &middot; <?= date('d F Y') ?> &middot; <span id="live-clock"><?= date('H:i') ?></span> WIB
            </div>
        </div>
        <div class="badge bg-primary bg-soft text-primary rounded-pill px-3 py-2 shadow-sm border border-primary-soft">
            <i class="fas fa-university me-1"></i> Kampus STPM Santa Ursula
        </div>
    </div>

  

    <div class="row gx-4 fade-in-up">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start-lg border-start-primary h-100 shadow-sm border-0 shadow-none">
                <div class="card-body py-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-primary mb-1">Fakultas / Prodi</div>
                            <div class="h5 fw-black text-dark mb-0">2 Program Sarjana</div>
                        </div>
                        <div class="ms-2"><i class="fas fa-graduation-cap fa-2x text-gray-200"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start-lg border-start-success h-100 shadow-sm border-0 shadow-none">
                <div class="card-body py-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-success mb-1">Status Akreditasi</div>
                            <div class="h5 fw-black text-dark mb-0">Baik Sekali (BAN-PT)</div>
                        </div>
                        <div class="ms-2"><i class="fas fa-award fa-2x text-gray-200"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start-lg border-start-info h-100 shadow-sm border-0 shadow-none">
                <div class="card-body py-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-info mb-1">Sistem Layanan</div>
                            <div class="h5 fw-black text-dark mb-0">Online & Terintegrasi</div>
                        </div>
                        <div class="ms-2"><i class="fas fa-network-wired fa-2x text-gray-200"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start-lg border-start-warning h-100 shadow-sm border-0 shadow-none">
                <div class="card-body py-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-warning mb-1">Nilai Karakter</div>
                            <div class="h5 fw-black text-dark mb-0">Serviam (Melayani)</div>
                        </div>
                        <div class="ms-2"><i class="fas fa-heart fa-2x text-gray-200"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row gx-4 mt-2 fade-in-up" id="login-section">
        <div class="col-lg-6 mb-4">
            <div class="card bg-light border-0 h-100 shadow-none rounded-3">
                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center p-4 p-md-5">
                    <img src="/FINAL/assets/img/illustrations/windows.svg" style="width: 100%; max-width: 220px;" class="mb-4">
                    <h4 class="fw-bold text-dark">Otorisasi Sistem Informasi Terpusat</h4>
                    <p class="text-muted small mb-0 px-md-3">Gerbang login khusus civitas akademika STPM Santa Ursula (Dosen, Tenaga Kependidikan, Admin, Unit, dan Lembaga). Silakan masukkan kredensial resmi Anda untuk mengakses dasbor admin internal.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-header bg-white border-bottom-0 pt-4 pb-0 text-center">
                    <div class="h4 fw-bold text-primary mb-0"><i class="fas fa-lock me-2"></i>Otorisasi Pengguna</div>
                </div>
                <div class="card-body p-4 p-md-5">
                    <?php 
                        if (isset($_GET['error'])) {
                            echo '<div class="alert alert-danger alert-icon border-start-lg border-start-danger mb-4" role="alert">
                                    <div class="alert-icon-content"><i class="fas fa-exclamation-triangle"></i></div>
                                    <div class="alert-content small">';
                                    if ($_GET['error'] == 'pass') echo 'Kata sandi salah!';
                                    elseif ($_GET['error'] == 'user') echo 'Email tidak terdaftar!';
                                    elseif ($_GET['error'] == 'empty') echo 'Isi kolom email dan kata sandi!';
                                    elseif ($_GET['error'] == 'banned') echo 'Akun ini dinonaktifkan Admin!';
                            echo '</div></div>';
                        }
                    ?>
                    <form action="login.php" method="POST">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" required />
                            <label for="inputEmail"><i class="fas fa-envelope text-muted me-2"></i>Alamat Email Akun</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" required />
                            <label for="inputPassword"><i class="fas fa-lock text-muted me-2"></i>Kata Sandi</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" id="rememberMe" type="checkbox" />
                                <label class="form-check-label text-muted small" for="rememberMe">Ingat perangkat ini</label>
                            </div>
                            <a class="small text-decoration-none" href="#">Lupa Password?</a>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm rounded-pill">Masuk ke Dasbor Internal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5 bg-white rounded-3 shadow-sm border border-light mb-5 mt-4" id="portal-berita">
        <div class="container px-4">
            
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-9">
                    <span class="badge bg-blue-soft text-blue rounded-pill px-3 py-2 fw-bold text-uppercase mb-2">Humas Center</span>
                    <h2 class="fw-black text-dark mb-3" style="font-size: 2rem;">Pusat Pemberitaan & Kabar Informasi Terkini</h2>
                    <p class="text-muted mb-4">Sistem penyaring cerdas real-time untuk memonitor agenda kegiatan, publikasi riset, dan berita resmi dari seluruh unit kerja kampus.</p>
                    
                    <div class="d-flex justify-content-center mb-4">
                        <div class="input-group shadow-sm rounded-pill overflow-hidden border border-1 p-1 bg-light" style="max-width: 520px;">
                            <span class="input-group-text bg-transparent border-0 text-muted ps-3"><i class="fas fa-search"></i></span>
                            <input type="text" id="live-search-berita" class="form-control border-0 bg-transparent py-2" placeholder="Ketik kata kunci berita (Judul/Isi)..." oninput="pemicuLiveSearch()">
                        </div>
                    </div>

                    <div class="d-flex flex-wrap justify-content-center gap-2" id="kategori-unit-tabs">
                        <button class="btn btn-sm btn-primary rounded-pill px-3 active-tab" onclick="gantiUnitKategori('', this)">Semua Berita</button>
                        <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="gantiUnitKategori('pemerintahan', this)">Ilmu Pemerintahan</button>
                        <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="gantiUnitKategori('sosiatri', this)">Pembangunan Sosial</button>
                        <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="gantiUnitKategori('kemahasiswaan', this)">Kemahasiswaan</button>
                        <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="gantiUnitKategori('lp2m', this)">LP2M</button>
                        <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="gantiUnitKategori('lpm', this)">LPM</button>
                        <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="gantiUnitKategori('perpustakaan', this)">Perpustakaan</button>
                        <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="gantiUnitKategori('sekretariat', this)">Sekretariat</button>
                    </div>
                </div>
            </div>

            <div id="target-portal-berita">
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status"></div>
                    <p class="mt-2 text-muted fw-bold small">Menghubungkan ke pusat server berita...</p>
                </div>
            </div>

        </div>
    </section>
</div>

<script>
    // Menyimpan state data filter global agar pagination & search tidak bertubrukan
    let unitAktif = '';
    let kataKunciAktif = '';
    let penundaWaktuKetik;

    // 1. Pemicu Live Search otomatis dengan teknik Debounce (Menghemat Request Server)
    function pemicuLiveSearch() {
        clearTimeout(penundaWaktuKetik);
        kataKunciAktif = document.getElementById('live-search-berita').value;
        
        tampilkanEfekLoading('Mencari "'+ kataKunciAktif +'"...');
        
        penundaWaktuKetik = setTimeout(function() {
            jalankanMesinAjax(kataKunciAktif, unitAktif, 1);
        }, 400); // Eksekusi query dikunci 0.4 detik setelah user berhenti mengetik
    }

    // 2. Fungsi Klik Ganti Kategori Unit Kerja
    function gantiUnitKategori(unit, elemenTombol) {
        unitAktif = unit;
        
        // Reset Style Aktif Tombol Kategori
        document.querySelectorAll('#kategori-unit-tabs button').forEach(btn => {
            btn.classList.remove('btn-primary', 'active-tab');
            btn.classList.add('btn-outline-primary');
        });
        elemenTombol.classList.remove('btn-outline-primary');
        elemenTombol.classList.add('btn-primary', 'active-tab');

        tampilkanEfekLoading('Menyaring kategori...');
        jalankanMesinAjax(kataKunciAktif, unitAktif, 1);
    }

    // 3. Render Efek Loading Spinner
    function tampilkanEfekLoading(pesan) {
        document.getElementById('target-portal-berita').innerHTML = `
            <div class="text-center py-5">
                <div class="spinner-border text-primary" role="status"></div>
                <p class="mt-2 text-muted small fw-bold">${pesan}</p>
            </div>`;
    }

    // 4. Inti Fungsi AJAX Fetch Engine
    function jalankanMesinAjax(keyword, unit, page) {
        let url = 'modul/publik/ajax_berita.php?keyword=' + encodeURIComponent(keyword) + 
                  '&unit=' + encodeURIComponent(unit) + 
                  '&page=' + page;
                  
        fetch(url)
        .then(response => response.text())
        .then(htmlOutput => {
            document.getElementById('target-portal-berita').innerHTML = htmlOutput;
        })
        .catch(err => {
            document.getElementById('target-portal-berita').innerHTML = `
                <div class="alert alert-danger text-center shadow-sm m-4">
                    <i class="fas fa-exclamation-circle me-1"></i> Gagal memuat data dari server. Periksa jaringan database Anda.
                </div>`;
            console.error(err);
        });
    }

    // 5. Jam Digital Real-Time di Header
    setInterval(() => {
        const waktu = new Date();
        const jam = String(waktu.getHours()).padStart(2, '0');
        const menit = String(waktu.getMinutes()).padStart(2, '0');
        if(document.getElementById('live-clock')) {
            document.getElementById('live-clock').innerText = jam + ':' + menit;
        }
    }, 1000);

    // 6. Otomatis Muat Semua Berita di Awal Saat Halaman Terbuka
    document.addEventListener("DOMContentLoaded", function() {
        jalankanMesinAjax('', '', 1);
    });
</script>