<main>
    <header class="page-header page-header-dark bg-teal pb-10" style="background-color: #20c997;">
        <div class="container-xl px-4 pt-4">
            <h1 class="page-header-title text-white"><div class="page-header-icon text-white"><i class="fas fa-building"></i></div> Fasilitas Perpustakaan</h1>
            <div class="page-header-subtitle text-white-50">Infrastruktur dan ruang pendukung kegiatan literasi dan riset.</div>
        </div>
    </header>
    
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row">
            
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4 p-md-5">
                        <h4 class="fw-bold mb-4">Layanan Ruangan & Infrastruktur</h4>
                        <?php
                        $query = $koneksi->query("SELECT * FROM perpus_fasilitas ORDER BY id ASC");
                        if ($query->num_rows > 0):
                            while ($row = $query->fetch_assoc()) :
                        ?>
                        <div class="d-flex mb-4 p-3 border rounded-3 shadow-sm bg-white hover-lift">
                            <div class="flex-shrink-0 me-4">
                                <?php if (!empty($row['foto'])) : ?>
                                    <img src="uploads/perpustakaan/profil/<?= $row['foto'] ?>" style="width:60px; height:60px; object-fit:cover;" class="rounded-circle shadow-sm">
                                <?php else : ?>
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center border" style="width: 60px; height: 60px;">
                                        <i class="fas <?= htmlspecialchars($row['icon']) ?> fa-2x text-teal"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <h5 class="fw-bold text-dark mb-2"><?= htmlspecialchars($row['nama_fasilitas']) ?></h5>
                                <p class="text-muted mb-0 small" style="line-height: 1.6;"><?= htmlspecialchars($row['deskripsi']) ?></p>
                            </div>
                        </div>
                        <?php 
                            endwhile;
                        else: 
                        ?>
                            <p class="text-muted text-center py-5"><i class="fas fa-box-open fa-3x mb-3"></i><br>Fasilitas belum ditambahkan.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm border-0 bg-dark text-white mb-4">
                    <div class="card-body p-4 text-center">
                        <i class="fas fa-clock fa-3x mb-3" style="color: #20c997;"></i>
                        <h5 class="fw-bold">Info Jam Layanan</h5>
                        <p class="small text-white-50">Silakan cek jadwal operasional dan tata tertib perpustakaan sebelum berkunjung.</p>
                        <a href="index.php?module=perpus_profil_layanan" class="btn btn-teal rounded-pill w-100 mt-2">Lihat Jadwal</a>
                    </div>
                </div>
                
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h6 class="fw-bold border-bottom pb-2 mb-3"><i class="fas fa-headset text-teal me-2"></i> Butuh Bantuan?</h6>
                        <p class="small text-muted mb-0">Jika Anda membutuhkan bantuan pencarian katalog atau referensi, silakan temui staf di <strong>Meja Sirkulasi</strong>.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>
<style>
.hover-lift { transition: transform 0.2s ease, box-shadow 0.2s ease; }
.hover-lift:hover { transform: translateY(-3px); box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15) !important; }
</style>