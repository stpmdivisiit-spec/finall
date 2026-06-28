<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Tarik data profil dan karir khusus untuk Prodi Sosiatri
$q_profil = $koneksi->query("SELECT * FROM profil_prodi WHERE kode_prodi='sosiatri'");
$profil = $q_profil->fetch_assoc();

$q_karir = $koneksi->query("SELECT * FROM prospek_karir WHERE kode_prodi='sosiatri' ORDER BY urutan ASC");
?>

<main>
    <header class="page-header page-header-dark bg-primary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4" data-aos="fade-down">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title fw-black" style="font-size: 2.2rem;">
                            <div class="page-header-icon"><i data-feather="users"></i></div>
                            <?= htmlspecialchars($profil['nama_prodi'] ?? 'Program Studi Pembangunan Sosial (Ilmu Sosiatri)') ?>
                        </h1>
                        <div class="page-header-subtitle fs-5 mt-2 opacity-75">
                            <?= htmlspecialchars($profil['sub_judul'] ?? 'Mewujudkan masyarakat yang berdaya, inklusif, sejahtera, dan berkeadilan sosial.') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row">
            
            <div class="col-lg-8 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-sm border-0 h-100 rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="badge bg-primary bg-soft text-primary rounded-pill px-3 py-2 fw-bold mb-3">Tentang Prodi</div>
                        <h2 class="text-primary fw-bold mb-4"><?= htmlspecialchars($profil['judul_tentang'] ?? 'Membangun Masyarakat Desa & Kota') ?></h2>
                        
                        <div class="text-gray-700 mb-4" style="line-height: 1.8; font-size: 1.1rem;">
                            <?= nl2br(htmlspecialchars($profil['deskripsi_tentang'] ?? 'Deskripsi belum diatur.')) ?>
                        </div>
                        
                        <hr class="my-4">
                        
                        <h5 class="fw-bold text-dark"><i class="fas fa-bullseye text-primary me-2"></i> Visi Keilmuan</h5>
                        <p class="fst-italic text-muted lead px-3 py-2 border-start border-primary border-4 bg-light rounded-end">
                            <?= htmlspecialchars($profil['visi_keilmuan'] ?? 'Visi keilmuan belum diatur.') ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-left" data-aos-delay="200">
                <div class="card shadow-sm border-0 bg-primary text-white h-100 rounded-4" style="box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15) !important;">
                    <div class="card-body p-4 p-md-5 d-flex flex-column align-items-center justify-content-center text-center">
                        <i class="fas fa-medal fa-4x mb-4 text-white-50"></i>
                        <h2 class="text-white fw-black mb-2">Akreditasi <?= htmlspecialchars($profil['akreditasi'] ?? '-') ?></h2>
                        <p class="mb-4 text-white-75 fw-bold">Badan Akreditasi Nasional (BAN-PT)</p>
                        
                        <div class="w-100 text-start bg-white bg-opacity-10 p-4 rounded-3 shadow-sm">
                            <div class="mb-3 d-flex align-items-center"><i class="fas fa-user-graduate me-3 fa-lg opacity-75"></i> <span>Gelar:<br><strong class="fs-5"><?= htmlspecialchars($profil['gelar'] ?? '-') ?></strong></span></div>
                            <div class="mb-3 d-flex align-items-center"><i class="fas fa-clock me-3 fa-lg opacity-75"></i> <span>Masa Studi:<br><strong class="fs-5"><?= htmlspecialchars($profil['masa_studi'] ?? '-') ?></strong></span></div>
                            <div class="d-flex align-items-center"><i class="fas fa-building me-3 fa-lg opacity-75"></i> <span>Jenjang:<br><strong class="fs-5"><?= htmlspecialchars($profil['jenjang'] ?? '-') ?></strong></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5 mb-5" data-aos="fade-up">
            <h3 class="text-dark fw-black">Prospek Karir Lulusan</h3>
            <p class="text-muted">Peluang karir yang luas menanti lulusan Pembangunan Sosial di berbagai sektor industri.</p>
        </div>

        <div class="row gx-4">
            <?php 
            if($q_karir->num_rows > 0): 
                $delay = 0;
                while($karir = $q_karir->fetch_assoc()): 
                    $delay += 100;
            ?>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                    <div class="card border-0 shadow-sm hover-lift h-100 rounded-4">
                        <div class="card-body text-center p-4">
                            <div class="icon-stack icon-stack-xl bg-<?= $karir['warna_ikon'] ?>-soft text-<?= $karir['warna_ikon'] ?> mb-4 mt-2 rounded-circle mx-auto">
                                <i data-feather="<?= htmlspecialchars($karir['ikon']) ?>"></i>
                            </div>
                            <h5 class="fw-bold text-dark"><?= htmlspecialchars($karir['nama_karir']) ?></h5>
                            <p class="text-muted small mb-0" style="line-height: 1.6;">
                                <?= htmlspecialchars($karir['deskripsi']) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php 
                endwhile; 
            else: 
            ?>
                <div class="col-12 text-center text-muted fst-italic py-4" data-aos="fade-in">Prospek karir belum ditambahkan.</div>
            <?php endif; ?>
        </div>
    </div>
</main>

<script>
    // Merender ulang ikon Feather dan mengaktifkan animasi AOS
    if (typeof feather !== 'undefined') feather.replace();
    if (typeof AOS !== 'undefined') AOS.init({ duration: 800, once: true });
</script>