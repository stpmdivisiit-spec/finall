<main>
    <header class="page-header page-header-dark bg-teal pb-10" style="background-color: #20c997;">
        <div class="container-xl px-4 pt-5">
            <h1 class="page-header-title text-white fw-bold"><i class="fas fa-calendar-alt me-3"></i>Acara & Agenda</h1>
            <p class="page-header-subtitle text-white-50">Jadwal kegiatan literasi, seminar, dan agenda penting Perpustakaan.</p>
        </div>
    </header>
    
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row">
            <?php
            // Menampilkan acara yang sudah ada (diurutkan berdasarkan tanggal terbaru)
            $query = $koneksi->query("SELECT * FROM perpus_info_acara ORDER BY tanggal_acara DESC");
            if($query->num_rows > 0):
                while ($row = $query->fetch_assoc()) :
                    $poster = !empty($row['gambar_poster']) ? "uploads/perpustakaan/informasi/".$row['gambar_poster'] : "assets/img/demo/demo-logo.svg";
                    
                    // Format Tanggal (Misal: 15 Agustus 2024)
                    $tgl_format = date('d M Y', strtotime($row['tanggal_acara']));
            ?>
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100 overflow-hidden hover-lift">
                    <div class="row g-0 h-100">
                        <div class="col-md-4 bg-light d-flex align-items-center justify-content-center border-end">
                            <img src="<?= $poster ?>" class="img-fluid p-3" style="object-fit: contain; max-height: 200px;" alt="Poster Acara">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h5 class="fw-bold text-teal mb-2"><?= htmlspecialchars($row['judul_acara']) ?></h5>
                                <p class="small text-muted mb-3" style="line-height: 1.6;"><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>
                                
                                <ul class="list-unstyled mb-0 small fw-bold text-dark">
                                    <li class="mb-1"><i class="fas fa-calendar-day text-secondary me-2"></i> <?= $tgl_format ?></li>
                                    <li class="mb-1"><i class="fas fa-clock text-secondary me-2"></i> <?= htmlspecialchars($row['waktu_acara']) ?></li>
                                    <li><i class="fas fa-map-marker-alt text-secondary me-2"></i> <?= htmlspecialchars($row['lokasi']) ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                endwhile;
            else:
            ?>
                <div class="col-12 text-center bg-white shadow-sm rounded p-5">
                    <i class="fas fa-calendar-times fa-4x text-muted opacity-50 mb-3"></i>
                    <h5 class="text-muted fw-bold">Belum ada acara atau agenda mendatang.</h5>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>
<style>
.hover-lift { transition: transform 0.2s ease, box-shadow 0.2s ease; }
.hover-lift:hover { transform: translateY(-5px); box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; }
</style>