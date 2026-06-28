<?php
// 1. Ambil semua MK untuk Pemerintahan
$query = $koneksi->query("SELECT * FROM prodi_kurikulum WHERE prodi = 'pemerintahan' ORDER BY semester ASC, jenis_mk DESC, nama_mk ASC");

// 2. Kelompokkan MK berdasarkan Semesternya
$kurikulum = [];
while ($row = $query->fetch_assoc()) {
    $smt = $row['semester'];
    $kurikulum[$smt][] = $row; 
}
?>

<main>
    <header class="page-header page-header-dark bg-success pb-10">
        <div class="container-xl px-4 pt-5">
            <h1 class="page-header-title text-white"><i data-feather="book-open" class="me-2"></i> Kurikulum Pemerintahan</h1>
            <div class="page-header-subtitle text-white-50">Struktur mata kuliah berbasis Outcome-Based Education (OBE) & Merdeka Belajar.</div>
        </div>
    </header>
    
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4 p-md-5">
                
                <h5 class="fw-bold text-dark mb-4 border-bottom pb-2">Sebaran Mata Kuliah Per Semester</h5>

                <div class="accordion accordion-flush" id="accordionKurikulum">
                    
                    <?php 
                    if(!empty($kurikulum)):
                        foreach ($kurikulum as $smt => $mks): 
                            // Hitung Total SKS per Semester
                            $total_sks = 0;
                            foreach($mks as $mk) { $total_sks += $mk['sks']; }
                            
                            // Buka Accordion pertama saja secara default
                            $isOpen = ($smt == 1) ? 'show' : '';
                            $isCollapsed = ($smt == 1) ? '' : 'collapsed';
                    ?>
                    
                    <div class="accordion-item border border-success border-opacity-25 mb-3 rounded overflow-hidden shadow-none">
                        <h2 class="accordion-header" id="headingSmt<?= $smt ?>">
                            <button class="accordion-button <?= $isCollapsed ?> fw-bold text-success bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSmt<?= $smt ?>" aria-expanded="true" aria-controls="collapseSmt<?= $smt ?>">
                                Semester <?= $smt ?> (<?= $total_sks ?> SKS)
                            </button>
                        </h2>
                        <div id="collapseSmt<?= $smt ?>" class="accordion-collapse collapse <?= $isOpen ?>" aria-labelledby="headingSmt<?= $smt ?>" data-bs-parent="#accordionKurikulum">
                            <div class="accordion-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped mb-0 small">
                                        <thead class="text-muted border-bottom">
                                            <tr>
                                                <th width="15%" class="ps-4">Kode MK</th>
                                                <th width="50%">Nama Mata Kuliah</th>
                                                <th width="15%" class="text-center">Sifat</th>
                                                <th width="20%" class="text-center pe-4">SKS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($mks as $mk): ?>
                                            <tr>
                                                <td class="ps-4 text-muted"><?= htmlspecialchars($mk['kode_mk']) ?></td>
                                                <td class="fw-bold text-dark"><?= htmlspecialchars($mk['nama_mk']) ?></td>
                                                <td class="text-center">
                                                    <?= ($mk['jenis_mk'] == 'Wajib') ? '<span class="text-success"><i class="fas fa-check-circle"></i> Wajib</span>' : '<span class="text-warning text-dark"><i class="fas fa-star"></i> Pilihan</span>' ?>
                                                </td>
                                                <td class="text-center pe-4 fw-bold"><?= $mk['sks'] ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; else: ?>
                        <div class="alert alert-light text-center py-4 border">Data Kurikulum belum tersedia.</div>
                    <?php endif; ?>

                </div>
                <div class="text-center mt-5">
                    <button class="btn btn-outline-success rounded-pill px-4 fw-bold"><i class="fas fa-file-pdf me-2"></i> Unduh Dokumen Kurikulum Lengkap (PDF)</button>
                </div>

            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>