<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Tarik data slider dari database
$q_slider = $koneksi->query("SELECT * FROM setting_carousel ORDER BY id ASC LIMIT 4");
$sliders = [];
while ($row = $q_slider->fetch_assoc()) {
    $sliders[] = $row;
}
?>

<style>
.carousel-container { border-radius: 1.5rem; overflow: hidden; box-shadow: 0 1rem 3rem rgba(0,0,0,0.175) !important; }
.carousel-content { display: flex; flex-direction: column; height: 100%; }

<?php foreach ($sliders as $index => $sl): ?>
    @media (min-width: 768px) {
        #slide-bg-<?= $sl['id'] ?> {
            background: linear-gradient(to right, rgba(15, 23, 42, 0.9) 0%, rgba(15, 23, 42, 0.23) 40%, rgba(15, 23, 42, 0) 100%), 
                        url('uploads/carousel/<?= $sl['gambar_landscape'] ?>') no-repeat center center;
            background-size: cover; height: 480px;
        }
        #slide-content-<?= $sl['id'] ?> { justify-content: center; align-items: flex-start; width: 65%; padding: 4rem 5rem; }
    }
    @media (max-width: 767px) {
        #slide-bg-<?= $sl['id'] ?> {
            background: linear-gradient(to top, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.7) 40%, rgba(15, 23, 42, 0) 100%), 
                        url('uploads/carousel/<?= $sl['gambar_portrait'] ?>') no-repeat center top;
            background-size: cover; height: 550px;
        }
        #slide-content-<?= $sl['id'] ?> { justify-content: flex-end; align-items: flex-start; width: 100%; padding: 2.5rem 1.5rem; padding-bottom: 4rem; }
    }
<?php endforeach; ?>
</style>

<div class="container-fluid px-lg-5 px-3 mt-4 mt-lg-5 mb-5" data-aos="fade-down" data-aos-duration="1000">
    <div class="carousel-container">
        <div id="carouselHeroKampus" class="carousel slide carousel-fade" data-bs-ride="carousel">
            
            <?php if (count($sliders) > 1): ?>
            <div class="carousel-indicators mb-3">
                <?php foreach ($sliders as $index => $sl): ?>
                    <button type="button" data-bs-target="#carouselHeroKampus" data-bs-slide-to="<?= $index ?>" class="<?= ($index == 0) ? 'active' : '' ?>"></button>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <div class="carousel-inner">
                <?php if (count($sliders) > 0): foreach ($sliders as $index => $sl): ?>
                    <div class="carousel-item <?= ($index == 0) ? 'active' : '' ?>" id="slide-bg-<?= $sl['id'] ?>">
                        <div id="slide-content-<?= $sl['id'] ?>" class="carousel-content">
                            <span class="badge bg-<?= $sl['badge_warna'] ?> text-white rounded-pill mb-3 px-3 py-2 fw-bold text-uppercase" style="letter-spacing: 1px; font-size: 0.75rem;" data-aos="fade-right" data-aos-delay="300">
                                <?= htmlspecialchars($sl['badge_teks']) ?>
                            </span>
                            <h1 class="fw-black mb-3 text-white" style="font-size: clamp(1.8rem, 4vw, 3rem); line-height: 1.2;" data-aos="fade-right" data-aos-delay="400">
                                <?= htmlspecialchars($sl['judul']) ?>
                            </h1>
                            <p class="text-white-50 mb-0" style="font-size: clamp(0.95rem, 2vw, 1.15rem); line-height: 1.6;" data-aos="fade-right" data-aos-delay="500">
                                <?= htmlspecialchars($sl['deskripsi']) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; else: ?>
                    <div class="carousel-item active" style="background: linear-gradient(to right, rgba(15,23,42,0.9), rgba(15,23,42,0.2)), url('/FINAL/assets/img/backgrounds/bg-waves.svg'); height: 480px; background-size: cover;">
                        <div class="carousel-content" style="justify-content: center; padding: 4rem 5rem; width: 65%;">
                            <span class="badge bg-primary rounded-pill mb-3 px-3 py-2 fw-bold text-uppercase">Informasi Kampus</span>
                            <h1 class="fw-black mb-3 text-white" style="font-size: 3rem;">Selamat Datang di STPM Santa Ursula</h1>
                            <p class="text-white-50 mb-0 lead">Atur Banner Slider melalui Dashboard Administrator Anda.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (count($sliders) > 1): ?>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselHeroKampus" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselHeroKampus" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
            <?php endif; ?>

        </div>
    </div>
</div>

<div class="container px-4 mt-5">
    <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
        <div class="me-4 mb-3 mb-sm-0" data-aos="fade-right">
            <h2 class="mb-0 text-primary fw-black" style="letter-spacing: -0.05rem;">Portal Akademik & Informasi</h2>
            <div class="text-muted mt-1 fw-500">
                <i class="far fa-calendar-alt me-1 text-primary"></i>
                <span class="text-dark"><?= date('l') ?></span> &middot; <?= date('d F Y') ?> &middot; <span id="live-clock"><?= date('H:i') ?></span> WITA
            </div>
        </div>
        <div class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-4 py-2 shadow-sm border border-primary border-opacity-25 fs-6" data-aos="fade-left">
            <i class="fas fa-university me-2"></i> Kampus STPM Santa Ursula
        </div>
    </div>

    <div class="row gx-4 mb-5">
        <div class="col-xl-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
            <div class="card border-start-lg border-start-primary h-100 shadow-sm border-0 hover-lift bg-white">
                <div class="card-body py-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-primary mb-1 text-uppercase">Program Studi</div>
                            <div class="h5 fw-black text-dark mb-0">2 Program Sarjana</div>
                        </div>
                        <div class="ms-2"><div class="avatar bg-primary bg-opacity-10 text-primary rounded-circle d-flex justify-content-center align-items-center" style="width:50px;height:50px;"><i class="fas fa-graduation-cap fa-lg"></i></div></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card border-start-lg border-start-success h-100 shadow-sm border-0 hover-lift bg-white">
                <div class="card-body py-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-success mb-1 text-uppercase">Status Akreditasi</div>
                            <div class="h5 fw-black text-dark mb-0">Baik Sekali (BAN-PT)</div>
                        </div>
                        <div class="ms-2"><div class="avatar bg-success bg-opacity-10 text-success rounded-circle d-flex justify-content-center align-items-center" style="width:50px;height:50px;"><i class="fas fa-award fa-lg"></i></div></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card border-start-lg border-start-info h-100 shadow-sm border-0 hover-lift bg-white">
                <div class="card-body py-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-info mb-1 text-uppercase">Sistem Layanan</div>
                            <div class="h5 fw-black text-dark mb-0">Terintegrasi Digital</div>
                        </div>
                        <div class="ms-2"><div class="avatar bg-info bg-opacity-10 text-info rounded-circle d-flex justify-content-center align-items-center" style="width:50px;height:50px;"><i class="fas fa-network-wired fa-lg"></i></div></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card border-start-lg border-start-warning h-100 shadow-sm border-0 hover-lift bg-white">
                <div class="card-body py-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-warning mb-1 text-uppercase">Nilai Karakter</div>
                            <div class="h5 fw-black text-dark mb-0">Serviam (Melayani)</div>
                        </div>
                        <div class="ms-2"><div class="avatar bg-warning bg-opacity-10 text-warning rounded-circle d-flex justify-content-center align-items-center" style="width:50px;height:50px;"><i class="fas fa-heart fa-lg"></i></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5 rounded-3 mb-5 mt-4" id="portal-berita">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-9" data-aos="fade-down">
                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 fw-bold text-uppercase mb-3">Humas Center</span>
                <h2 class="fw-black text-dark mb-3" style="font-size: 2.2rem;">Pusat Pemberitaan & Kabar Terkini</h2>
                <p class="text-muted mb-4 lead">Filter pintar untuk memonitor agenda kegiatan, publikasi riset, dan pengumuman resmi dari seluruh prodi dan unit kerja.</p>
                
                <div class="d-flex justify-content-center mb-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="input-group shadow-sm rounded-pill overflow-hidden border border-2 p-1 bg-light" style="max-width: 600px;">
                        <span class="input-group-text bg-transparent border-0 text-muted ps-3"><i class="fas fa-search"></i></span>
                        <input type="text" id="live-search-berita" class="form-control border-0 bg-transparent py-2 fs-5" placeholder="Cari judul atau isi berita..." oninput="pemicuLiveSearch()">
                    </div>
                </div>

                <div class="d-flex flex-wrap justify-content-center gap-2 mt-3" id="kategori-unit-tabs" data-aos="fade-up" data-aos-delay="300">
                    <button class="btn btn-sm btn-primary rounded-pill px-4 fw-bold active-tab" onclick="gantiUnitKategori('', this)">Semua Kabar</button>
                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold" onclick="gantiUnitKategori('pemerintahan', this)">Ilmu Pemerintahan</button>
                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold" onclick="gantiUnitKategori('sosiatri', this)">Pembangunan Sosial</button>
                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold" onclick="gantiUnitKategori('kemahasiswaan', this)">Kemahasiswaan</button>
                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold" onclick="gantiUnitKategori('lp2m', this)">LP2M</button>
                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold" onclick="gantiUnitKategori('lpm', this)">LPM</button>
                </div>
            </div>
        </div>

        <div id="target-portal-berita" style="min-height: 400px;">
            <div class="text-center py-5">
                <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
                <p class="mt-3 text-muted fw-bold">Memuat berita terbaru...</p>
            </div>
        </div>
    </section>
</div>

<script>
    let unitAktif = '';
    let kataKunciAktif = '';
    let halamanAktif = 1;
    let penundaWaktuKetik;

    // Inisialisasi AOS dasar untuk halaman beranda
    if (typeof AOS !== 'undefined') {
        AOS.init({ duration: 800, once: true });
    }

    function pemicuLiveSearch() {
        clearTimeout(penundaWaktuKetik);
        kataKunciAktif = document.getElementById('live-search-berita').value;
        halamanAktif = 1; 
        tampilkanEfekLoading('Mencari "'+ kataKunciAktif +'"...');
        
        penundaWaktuKetik = setTimeout(function() {
            jalankanMesinAjax(kataKunciAktif, unitAktif, halamanAktif);
        }, 400); 
    }

    function gantiUnitKategori(unit, elemenTombol) {
        unitAktif = unit;
        halamanAktif = 1; 
        
        document.querySelectorAll('#kategori-unit-tabs button').forEach(btn => {
            btn.classList.remove('btn-primary', 'active-tab');
            btn.classList.add('btn-outline-primary');
        });
        elemenTombol.classList.remove('btn-outline-primary');
        elemenTombol.classList.add('btn-primary', 'active-tab');

        tampilkanEfekLoading('Menyaring kategori...');
        jalankanMesinAjax(kataKunciAktif, unitAktif, halamanAktif);
    }

    function gantiHalaman(page) {
        halamanAktif = page;
        tampilkanEfekLoading('Memuat Halaman ' + page + '...');
        jalankanMesinAjax(kataKunciAktif, unitAktif, halamanAktif);
        document.getElementById("portal-berita").scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function tampilkanEfekLoading(pesan) {
        document.getElementById('target-portal-berita').innerHTML = `
            <div class="text-center py-5">
                <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
                <p class="mt-3 text-muted fw-bold">${pesan}</p>
            </div>`;
    }

    function jalankanMesinAjax(keyword, unit, page) {
        let url = 'modul/publik/ajax_berita.php?keyword=' + encodeURIComponent(keyword) + 
                  '&unit=' + encodeURIComponent(unit) + 
                  '&page=' + page;
                  
        fetch(url)
        .then(response => response.text())
        .then(htmlOutput => {
            document.getElementById('target-portal-berita').innerHTML = htmlOutput;
            
            // PENTING: Refresh dan re-init AOS setelah elemen HTML baru dirender
            setTimeout(() => {
                if (typeof AOS !== 'undefined') {
                    AOS.refresh(); 
                }
            }, 100);
        })
        .catch(err => {
            document.getElementById('target-portal-berita').innerHTML = `
                <div class="alert alert-danger text-center shadow-sm m-4 p-4 rounded-4" data-aos="zoom-in">
                    <i class="fas fa-wifi fa-3x mb-3 text-danger opacity-50"></i>
                    <h5 class="fw-bold">Gagal Terhubung ke Server</h5>
                    <p class="mb-0">Periksa koneksi internet Anda atau hubungi Administrator.</p>
                </div>`;
        });
    }

    setInterval(() => {
        const waktu = new Date();
        const jam = String(waktu.getHours()).padStart(2, '0');
        const menit = String(waktu.getMinutes()).padStart(2, '0');
        if(document.getElementById('live-clock')) {
            document.getElementById('live-clock').innerText = jam + ':' + menit;
        }
    }, 1000);

    document.addEventListener("DOMContentLoaded", function() {
        jalankanMesinAjax('', '', 1);
    });
</script>