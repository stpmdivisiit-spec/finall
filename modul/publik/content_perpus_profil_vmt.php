<?php
// Mengambil data VMT dari database
$stmt = $koneksi->prepare("SELECT konten FROM perpus_profil WHERE kategori = 'vmt'");
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

// Ekstrak data JSON, berikan default jika data masih kosong
$vmt = json_decode($data['konten'] ?? '', true);
if (!$vmt || !is_array($vmt)) {
    $vmt = [
        'visi' => 'Data Visi belum diatur oleh Admin.',
        'misi' => ['Data Misi belum diatur.'],
        'tujuan' => [['judul' => 'Belum diatur', 'deskripsi' => 'Deskripsi belum diatur.']]
    ];
}

// Daftar ikon otomatis untuk memvariasikan ikon pada daftar tujuan
$icon_tujuan = ['fa-book-reader', 'fa-server', 'fa-archive', 'fa-chart-line', 'fa-lightbulb', 'fa-layer-group', 'fa-cogs'];
?>
<main>
    <header class="page-header page-header-dark bg-teal pb-10" style="background-color: #20c997;">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i data-feather="target"></i></div>
                            Visi, Misi & Tujuan
                        </h1>
                        <div class="page-header-subtitle text-white-50">Arah strategis pengembangan layanan literasi dan informasi perpustakaan.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="container-xl px-4 mt-n10 mb-5">
        
        <div class="card shadow-sm border-0 mb-4 bg-dark text-white text-center p-5 position-relative overflow-hidden">
            <div class="position-absolute" style="top: -20px; right: -20px; opacity: 0.1;">
                <i class="fas fa-eye fa-10x text-white"></i>
            </div>
            <div class="position-relative z-index-1">
                <i class="fas fa-lightbulb fa-3x mb-3" style="color: #20c997;"></i>
                <h2 class="fw-bold mb-4" style="color: #20c997;">VISI PERPUSTAKAAN</h2>
                <p class="lead mb-0 mx-auto" style="max-width: 800px;">"<?= htmlspecialchars($vmt['visi']) ?>"</p>
            </div>
        </div>

        <div class="row gx-4">
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm border-0 h-100 border-top border-3" style="border-top-color: #20c997 !important;">
                    <div class="card-header bg-transparent border-bottom p-4">
                        <h5 class="fw-bold text-dark mb-0"><i class="fas fa-tasks me-2" style="color: #20c997;"></i>Misi UPT Perpustakaan</h5>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-group list-group-flush text-muted">
                            <?php 
                            $total_misi = count($vmt['misi']);
                            foreach ($vmt['misi'] as $i => $misi) : 
                                // Menambahkan class 'pb-3' untuk jarak, kecuali pada item paling akhir
                                $class_pb = ($i == $total_misi - 1) ? '' : 'pb-3';
                            ?>
                            <li class="list-group-item border-0 <?= $class_pb ?> d-flex">
                                <i class="fas fa-check-circle me-3 mt-1" style="color: #20c997;"></i> 
                                <span><?= htmlspecialchars($misi) ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm border-0 h-100 border-top border-3 border-dark">
                    <div class="card-header bg-transparent border-bottom p-4">
                        <h5 class="fw-bold text-dark mb-0"><i class="fas fa-flag-checkered text-dark me-2"></i>Tujuan Pelayanan</h5>
                    </div>
                    <div class="card-body p-4">
                        <?php 
                        $total_tujuan = count($vmt['tujuan']);
                        foreach ($vmt['tujuan'] as $i => $tujuan) : 
                            // Mengatur margin-bottom (mb-4) agar item terakhir tidak memiliki margin berlebih di bawah
                            $class_mb = ($i == $total_tujuan - 1) ? '' : 'mb-4'; 
                            
                            // Merotasi otomatis jenis ikon berdasarkan daftar $icon_tujuan di atas
                            $ikon_pilihan = $icon_tujuan[$i % count($icon_tujuan)]; 
                        ?>
                        <div class="d-flex align-items-start <?= $class_mb ?>">
                            <div class="icon-stack bg-light text-dark flex-shrink-0 me-3 shadow-sm">
                                <i class="fas <?= $ikon_pilihan ?>"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1"><?= htmlspecialchars($tujuan['judul']) ?></h6>
                                <p class="small text-muted mb-0"><?= htmlspecialchars($tujuan['deskripsi']) ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>