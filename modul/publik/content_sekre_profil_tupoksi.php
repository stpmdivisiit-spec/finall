<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Ambil Informasi Dasar dari Database (Tabel Informasi Umum Sekretariat)
$info_dasar = $koneksi->query("SELECT tentang_kami, jam_senin_kamis, jam_jumat FROM sekretariat_info WHERE id=1")->fetch_assoc();

// Ambil Daftar Tugas Pokok Dinamis dari Database
$q_tupoksi_publik = $koneksi->query("SELECT * FROM sekretariat_tupoksi ORDER BY urutan ASC");
?>

<main>
    <header class="page-header page-header-dark bg-teal pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4" data-aos="fade-down" data-aos-duration="1000">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white fw-black" style="font-size: 2.3rem;">
                            <div class="page-header-icon text-white"><i data-feather="briefcase"></i></div>
                            Tugas Pokok & Fungsi
                        </h1>
                        <div class="page-header-subtitle text-white-50 fs-5 mt-2">Pusat administrasi umum, persuratan, dan kearsipan STPM Santa Ursula.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-n10 mb-5">
        
        <div class="card shadow-sm border-0 mb-5 rounded-4 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
            <div class="card-body p-4 p-md-5 d-flex align-items-center bg-white">
                <div class="avatar bg-teal bg-opacity-10 text-teal rounded-circle d-none d-md-flex justify-content-center align-items-center flex-shrink-0 me-4" style="width: 70px; height: 70px;">
                    <i class="fas fa-building fa-2x"></i>
                </div>
                <p class="mb-0 text-dark fw-500 lead shadow-none" style="line-height: 1.8; font-size: 1.1rem;">
                    <?= htmlspecialchars($info_dasar['tentang_kami'] ?? 'Sekretariat Kampus STPM Santa Ursula adalah unsur pelaksana administrasi institusi yang berada langsung di bawah koordinasi Ketua STPM.') ?>
                </p>
            </div>
        </div>

        <div class="row gx-4">
            <div class="col-lg-7 mb-4" data-aos="fade-right" data-aos-delay="200">
                <div class="card shadow-sm border-0 h-100 rounded-4 border-top border-teal border-4">
                    <div class="card-header bg-white border-bottom border-light p-4">
                        <h5 class="fw-bold text-dark mb-0"><i class="fas fa-tasks text-teal me-2"></i> Tugas Pokok Sekretariat</h5>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <ul class="list-group list-group-flush text-dark" style="font-size: 1.05rem; line-height: 1.6;">
                            <?php 
                            if($q_tupoksi_publik && $q_tupoksi_publik->num_rows > 0): 
                                while($tupoksi = $q_tupoksi_publik->fetch_assoc()): 
                            ?>
                                <li class="list-group-item bg-white border-0 pb-3 d-flex align-items-start px-0">
                                    <div class="text-teal me-3 mt-1" style="width: 20px;"><i class="<?= htmlspecialchars($tupoksi['ikon']) ?>"></i></div>
                                    <span class="text-gray-700"><?= htmlspecialchars($tupoksi['teks_tupoksi']) ?></span>
                                </li>
                            <?php 
                                endwhile; 
                            else: 
                            ?>
                                <li class="list-group-item bg-white border-0 text-center fst-italic text-muted">Komponen tupoksi belum dirilis admin.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5 mb-4" data-aos="fade-left" data-aos-delay="300">
                <div class="card shadow-sm border-0 h-100 bg-teal text-white text-center p-4 p-md-5 d-flex flex-column justify-content-center rounded-4" style="box-shadow: 0 0.5rem 1.5rem rgba(0, 128, 128, 0.15) !important;">
                    <i class="fas fa-clock fa-4x mb-4 text-white opacity-50"></i>
                    <h3 class="fw-black mb-3 text-white">Jam Operasional Layanan</h3>
                    
                    <div class="bg-white text-dark p-3 rounded-3 mb-4 shadow-sm mx-auto w-100" style="max-width: 320px;">
                        <div class="fw-bold text-teal mb-1"><i class="fas fa-calendar-day me-2"></i>Senin - Jumat</div>
                        <div class="fw-black fs-5"><?= htmlspecialchars($info_dasar['jam_senin_kamis'] ?? '08:00 - 15:00 WITA') ?></div>
                    </div>
                    
                    <p class="small text-white opacity-75 mb-0" style="line-height: 1.6;">*Istirahat pelayanan staff dilaksanakan pada pukul 12:00 - 13:00 WITA. Loket pelayanan tutup pada hari libur nasional dan tanggal merah.</p>
                </div>
            </div>
        </div>
        
    </div>
</main>

<script>
    if (typeof feather !== 'undefined') feather.replace();
    if (typeof AOS !== 'undefined') AOS.init({ duration: 800, once: true });
</script>