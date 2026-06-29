<?php
// Ambil data pengaturan dinamis dari database
$pengaturan = $koneksi->query("SELECT * FROM lpm_pengaturan WHERE id = 1")->fetch_assoc();
if (!$pengaturan) {
    // Default Fallback jika data kosong
    $pengaturan = [
        'nama_lembaga' => 'Lembaga Penjaminan Mutu (LPM) STPM',
        'deskripsi' => 'Menjamin budaya mutu berkelanjutan.',
        'bg_header' => 'demo-ocean-lg.jpg',
        'jam_senin_kamis' => '08:00 - 15:00',
        'jam_jumat' => '08:00 - 14:00',
        'jam_sabtu_minggu' => 'TUTUP',
        'link_kontak' => '#'
    ];
}
?>
<main>
    <header class="page-header page-header-dark bg-success pb-10" style="background-image: url('assets/img/demo/<?= htmlspecialchars($pengaturan['bg_header']) ?>'); background-size: cover; background-position: center; position: relative;">
        <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0, 0, 0, 0.65);"></div>
        
        <div class="container-xl px-4" style="position: relative; z-index: 2;">
            <div class="page-header-content pt-5 text-center">
                <h1 class="page-header-title text-white mb-3 fw-bold">
                    <?= htmlspecialchars($pengaturan['nama_lembaga']) ?>
                </h1>
                <p class="page-header-subtitle text-white-50 mb-4">
                    <?= htmlspecialchars($pengaturan['deskripsi']) ?>
                </p>
                
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="input-group input-group-lg mb-3 shadow">
                            <input type="text" class="form-control border-0 px-4" placeholder="Cari Dokumen Mutu atau Instrumen SPMI...">
                            <button class="btn btn-success px-4" type="button"><i class="fas fa-search"></i> Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-4 mb-5">
        <div class="row gx-4 mt-4">
            
            <div class="col-lg-8 mb-4">
                <h3 class="fw-bold mb-4 text-dark border-bottom pb-2">Sistem Penjaminan Mutu Internal (SPMI)</h3>
                <div class="row gx-3">
                    
                    <div class="col-md-6 mb-4">
                        <a href="index.php?module=lpm_kebijakan" class="text-decoration-none">
                            <div class="card shadow-sm border-0 h-100 hover-lift border-start border-4 border-primary">
                                <div class="card-body d-flex align-items-center p-4">
                                    <div class="icon-circle bg-primary-soft text-primary me-3 flex-shrink-0" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                                        <i class="fas fa-file-contract fa-2x"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold text-dark mb-1">Kebijakan Mutu</h5>
                                        <p class="text-muted small mb-0">Arah dan landasan utama pelaksanaan penjaminan mutu kampus.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <a href="index.php?module=lpm_standar" class="text-decoration-none">
                            <div class="card shadow-sm border-0 h-100 hover-lift border-start border-4 border-success">
                                <div class="card-body d-flex align-items-center p-4">
                                    <div class="icon-circle bg-success-soft text-success me-3 flex-shrink-0" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                                        <i class="fas fa-list-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold text-dark mb-1">Standar Mutu</h5>
                                        <p class="text-muted small mb-0">Tolok ukur pencapaian kinerja akademik dan non-akademik.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <a href="index.php?module=lpm_manual" class="text-decoration-none">
                            <div class="card shadow-sm border-0 h-100 hover-lift border-start border-4 border-warning">
                                <div class="card-body d-flex align-items-center p-4">
                                    <div class="icon-circle bg-warning-soft text-warning me-3 flex-shrink-0" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                                        <i class="fas fa-book fa-2x"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold text-dark mb-1">Manual Mutu</h5>
                                        <p class="text-muted small mb-0">Panduan teknis pelaksanaan (PPEPP) standar mutu.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <a href="index.php?module=lpm_formulir" class="text-decoration-none">
                            <div class="card shadow-sm border-0 h-100 hover-lift border-start border-4 border-danger">
                                <div class="card-body d-flex align-items-center p-4">
                                    <div class="icon-circle bg-danger-soft text-danger me-3 flex-shrink-0" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                                        <i class="fas fa-edit fa-2x"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold text-dark mb-1">Formulir Mutu</h5>
                                        <p class="text-muted small mb-0">Instrumen pendataan dan perekaman dokumen mutu.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm border-0 bg-success text-white h-100 rounded-lg">
                    <div class="card-header bg-transparent border-0 pt-4 pb-0">
                        <h5 class="fw-bold text-white mb-0"><i class="fas fa-clock me-2"></i> Info Operasional</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0 mt-3">
                            <li class="d-flex justify-content-between border-bottom border-white-50 pb-3 mb-3">
                                <span>Senin - Kamis</span>
                                <strong><?= htmlspecialchars($pengaturan['jam_senin_kamis']) ?></strong>
                            </li>
                            <li class="d-flex justify-content-between border-bottom border-white-50 pb-3 mb-3">
                                <span>Jumat</span>
                                <strong><?= htmlspecialchars($pengaturan['jam_jumat']) ?></strong>
                            </li>
                            <li class="d-flex justify-content-between pb-3">
                                <span>Sabtu & Minggu</span>
                                <strong class="text-warning"><?= htmlspecialchars($pengaturan['jam_sabtu_minggu']) ?></strong>
                            </li>
                        </ul>
                        <div class="mt-4 text-center">
                            <a href="<?= htmlspecialchars($pengaturan['link_kontak']) ?>" class="btn btn-light rounded-pill px-4 fw-bold text-success w-100 shadow-sm">
                                <i class="fab fa-whatsapp me-2"></i>Hubungi LPM
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>
<style>
/* Utilities Tambahan */
.bg-primary-soft { background-color: rgba(0, 97, 242, 0.15); }
.bg-success-soft { background-color: rgba(0, 172, 105, 0.15); }
.bg-warning-soft { background-color: rgba(244, 161, 0, 0.15); }
.bg-danger-soft  { background-color: rgba(226, 42, 63, 0.15); }
.hover-lift { transition: transform 0.2s ease, box-shadow 0.2s ease; }
.hover-lift:hover { transform: translateY(-5px); box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; }
</style>