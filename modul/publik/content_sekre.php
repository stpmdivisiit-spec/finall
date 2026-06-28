<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Tarik data profil & kontak dinamis
$info = $koneksi->query("SELECT * FROM sekretariat_info WHERE id=1")->fetch_assoc();

// Tarik berkas pusat unduhan (Menggunakan tabel sekretariat_arsip generik yang baru)
// Filter dengan kategori 'formulir' (atau kategori apa pun yang Anda jadikan sebagai formulir unduhan)
$q_download = $koneksi->query("SELECT * FROM sekretariat_arsip WHERE kategori_arsip = 'formulir' ORDER BY tanggal DESC LIMIT 10");
?>

<main>
    <header class="page-header page-header-dark bg-teal pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4" data-aos="fade-down" data-aos-duration="1000">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title fw-black" style="font-size: 2.3rem;">
                            <div class="page-header-icon"><i data-feather="inbox"></i></div>
                            Bagian Sekretariat Kampus
                        </h1>
                        <div class="page-header-subtitle fs-5 mt-2 opacity-75">Pusat layanan administrasi akademik, kepegawaian, dan informasi umum STPM Santa Ursula.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-n10 mb-5">
        
        <div class="row gx-4 mb-4">
            <div class="col-lg-8 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-sm border-0 h-100 rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="badge bg-teal bg-opacity-10 text-teal rounded-pill mb-3 px-3 py-2 fw-bold">Tentang Kami</div>
                        <h2 class="text-teal fw-bold mb-3">Pusat Administrasi & Tata Usaha</h2>
                        <p class="lead text-gray-700 mb-4" style="line-height: 1.7;">
                            <?= htmlspecialchars($info['tentang_kami'] ?? '') ?>
                        </p>
                        <p class="text-muted" style="line-height: 1.8;">
                            <?= htmlspecialchars($info['fokus_utama'] ?? '') ?>
                        </p>
                        
                        <hr class="my-5">
                        
                        <div class="row text-center">
                            <div class="col-md-4 mb-3 mb-md-0" data-aos="zoom-in" data-aos-delay="200">
                                <div class="h3 fw-black text-dark mb-1">1x24 Jam</div>
                                <div class="small text-muted fw-bold">Estimasi Proses Surat</div>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0" data-aos="zoom-in" data-aos-delay="300">
                                <div class="h3 fw-black text-dark mb-1">Sistem 1 Pintu</div>
                                <div class="small text-muted fw-bold">Layanan Terpadu</div>
                            </div>
                            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="400">
                                <div class="h3 fw-black text-dark mb-1">100%</div>
                                <div class="small text-muted fw-bold">Digital Arsip</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-left" data-aos-delay="200">
                <div class="card shadow-sm border-0 bg-teal text-white h-100 rounded-4" style="box-shadow: 0 0.5rem 1.5rem rgba(0, 128, 128, 0.15) !important;">
                    <div class="card-header bg-transparent border-0 pt-5 pb-0 text-center">
                        <i class="fas fa-headset fa-4x mb-3 text-white opacity-50"></i>
                        <h4 class="fw-bold text-white mb-0">Pusat Bantuan</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="bg-white bg-opacity-10 p-4 rounded-3 mb-4 border border-white border-opacity-10">
                            <h6 class="fw-bold border-bottom border-white border-opacity-25 pb-2 mb-3"><i class="far fa-clock me-2"></i>Jam Operasional</h6>
                            <div class="d-flex justify-content-between small mb-3">
                                <span>Senin - Kamis</span>
                                <strong><?= htmlspecialchars($info['jam_senin_kamis'] ?? '08:00 - 15:00 WITA') ?></strong>
                            </div>
                            <div class="d-flex justify-content-between small mb-3">
                                <span>Jumat</span>
                                <strong><?= htmlspecialchars($info['jam_jumat'] ?? '08:00 - 14:00 WITA') ?></strong>
                            </div>
                            <div class="d-flex justify-content-between small">
                                <span>Sabtu, Minggu & Libur</span>
                                <strong class="badge bg-warning text-dark px-2">TUTUP</strong>
                            </div>
                        </div>
                        
                        <h6 class="fw-bold mb-1"><i class="far fa-envelope me-2"></i>Email Resmi</h6>
                        <p class="small text-white-70 mb-4 fw-bold"><?= htmlspecialchars($info['email_resmi'] ?? '') ?></p>
                        
                        <a href="https://wa.me/<?= htmlspecialchars($info['nomor_wa'] ?? '') ?>" target="_blank" class="btn btn-white w-100 rounded-pill fw-bold text-teal shadow py-2">
                            <i class="fab fa-whatsapp me-2 fa-lg"></i> Hubungi Admin Pelayanan
                        </a>
                    </div>
                </div>
            </div>
        </div>


<h3 class="text-dark fw-black mt-5 mb-4 border-bottom pb-2" data-aos="fade-right">Layanan Utama Sekretariat</h3>
        
        <div class="row gx-3 mb-5">
            <div class="col-lg-6 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm hover-lift h-100 rounded-3">
                    <div class="card-body p-3 d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center flex-shrink-0 me-3" style="width: 50px; height: 50px;">
                            <i data-feather="file-text"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Surat Keterangan Aktif</h6>
                            <p class="text-muted small mb-0 lh-sm">Pembuatan surat keterangan aktif kuliah untuk keperluan beasiswa, BPJS, atau tunjangan orang tua.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="150">
                <div class="card border-0 shadow-sm hover-lift h-100 rounded-3">
                    <div class="card-body p-3 d-flex align-items-center">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-flex align-items-center justify-content-center flex-shrink-0 me-3" style="width: 50px; height: 50px;">
                            <i data-feather="award"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Legalisir Ijazah</h6>
                            <p class="text-muted small mb-0 lh-sm">Layanan pengesahan fotokopi ijazah dan transkrip nilai bagi para alumni STPM Santa Ursula.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm hover-lift h-100 rounded-3">
                    <div class="card-body p-3 d-flex align-items-center">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-3 d-flex align-items-center justify-content-center flex-shrink-0 me-3" style="width: 50px; height: 50px;">
                            <i data-feather="monitor"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Peminjaman Fasilitas</h6>
                            <p class="text-muted small mb-0 lh-sm">Reservasi penggunaan ruang kelas, aula, proyektor, atau fasilitas kampus untuk agenda kegiatan ORMAWA.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="250">
                <div class="card border-0 shadow-sm hover-lift h-100 rounded-3">
                    <div class="card-body p-3 d-flex align-items-center">
                        <div class="bg-danger bg-opacity-10 text-danger rounded-3 d-flex align-items-center justify-content-center flex-shrink-0 me-3" style="width: 50px; height: 50px;">
                            <i data-feather="file-minus"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Cuti Akademik</h6>
                            <p class="text-muted small mb-0 lh-sm">Proses administrasi pengajuan cuti akademik mahasiswa (BSS) beserta persyaratan pendukungnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="card shadow-sm border-0 bg-white rounded-4 mb-5 overflow-hidden" data-aos="fade-up">
            <div class="card-header bg-light border-bottom border-light fw-bold text-dark p-4 fs-5">
                <i class="fas fa-cloud-download-alt text-teal me-2"></i> Pusat Unduhan Formulir & Dokumen Resmi
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <?php if($q_download->num_rows > 0): while($dl = $q_download->fetch_assoc()): 
                        // Ekstraksi ekstensi file cerdas (misal: PDF, DOCX)
                        $ekstensi = pathinfo($dl['file_lampiran'], PATHINFO_EXTENSION);
                        if (empty($ekstensi)) $ekstensi = 'FILE';
                    ?>
                        <div class="list-group-item d-flex align-items-center justify-content-between p-4 bg-white hover-bg-light transition-all">
                            <div>
                                <div class="fw-bold text-dark fs-6"><?= htmlspecialchars($dl['judul_arsip']) ?></div>
                                <div class="small text-muted mt-1">
                                    Format <span class="badge bg-secondary bg-opacity-10 text-secondary border px-2 py-1 text-uppercase"><?= $ekstensi ?></span> 
                                    &bull; Diperbarui <?= date('d M Y', strtotime($dl['tanggal'])) ?>
                                </div>
                            </div>
                            <?php if(!empty($dl['file_lampiran'])): ?>
                                <a href="uploads/sekretariat/dokumen/<?= htmlspecialchars($dl['file_lampiran']) ?>" download class="btn btn-outline-teal btn-sm rounded-pill px-4 fw-bold shadow-none">
                                    <i class="fas fa-download me-2"></i>Unduh
                                </a>
                            <?php else: ?>
                                <button class="btn btn-light btn-sm rounded-pill px-4 text-muted disabled">Tidak Tersedia</button>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; else: ?>
                        <div class="p-5 text-center text-muted fst-italic bg-white">
                            <i class="far fa-folder-open fa-2x mb-2 d-block opacity-50"></i>
                            Belum ada formulir atau dokumen yang tersedia untuk diunduh pada kategori ini.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</main>

<style>
.hover-bg-light:hover { background-color: #f8f9fa !important; }
</style>

<script>
    if (typeof feather !== 'undefined') feather.replace();
    if (typeof AOS !== 'undefined') AOS.init({ duration: 800, once: true });
</script>