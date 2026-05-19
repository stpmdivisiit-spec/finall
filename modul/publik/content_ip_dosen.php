<?php
// AMBIL HANYA DOSEN YANG SUDAH DITAMBAHKAN ADMIN KE TABEL TAMPIL
$sql_dosen = "SELECT dt.*, d.gelar_depan, d.nama_lengkap, d.gelar_belakang 
              FROM prodi_dosen_tampil dt
              JOIN dosen d ON dt.dosen_id = d.id
              WHERE dt.prodi = 'pemerintahan'";
$query_dosen = $koneksi->query($sql_dosen);
?>
<main>
    <div class="bg-primary text-white text-center pt-5 pb-10" style="min-height: 40vh;">
        <div class="container-xl px-4 pt-5">
            <h1 class="fw-bold text-white mb-2"><i class="fas fa-users me-2"></i> Profil Dosen Tetap</h1>
            <p class="lead text-white-50">Tenaga pendidik profesional dan pakar di bidang Ilmu Pemerintahan.</p>
        </div>
    </div>

    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row justify-content-center gx-4">
            
            <?php 
            if($query_dosen && $query_dosen->num_rows > 0):
                while($d = $query_dosen->fetch_assoc()): 
                    $nama = trim($d['gelar_depan'] . ' ' . $d['nama_lengkap'] . ', ' . $d['gelar_belakang'], ' ,');
                    
                    // Cek apakah ada foto_web, jika tidak pakai gambar default
                    $foto = (!empty($d['foto_web'])) ? 'uploads/profil/'.$d['foto_web'] : 'assets/img/illustrations/profiles/profile-2.png';
            ?>
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card shadow-lg border-0 rounded-4 h-100 py-4 text-center">
                    <div class="card-body">
                        <div class="avatar-lg bg-light rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center overflow-hidden" style="width: 120px; height: 120px; border: 4px solid #f8f9fa;">
                            <img src="<?= $foto ?>" alt="<?= htmlspecialchars($nama) ?>" class="img-fluid w-100 h-100" style="object-fit: cover;">
                        </div>
                        <h5 class="fw-bold text-dark mb-1"><?= htmlspecialchars($nama) ?></h5>
                        <div class="fw-bold text-primary small mb-3"><?= htmlspecialchars($d['jabatan_web']) ?></div>
                        <p class="small text-muted mb-0"><strong>Keahlian:</strong> <?= htmlspecialchars($d['keahlian_web']) ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; else: ?>
                <div class="col-12 text-center mt-5">
                    <div class="alert alert-light border border-primary text-primary d-inline-block p-4">
                        <i class="fas fa-info-circle fa-2x mb-2"></i><br>
                        <h5>Belum ada profil dosen yang dipublikasikan.</h5>
                        <p class="small mb-0">Silakan tambahkan data melalui Dashboard Admin.</p>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>