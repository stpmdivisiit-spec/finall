<?php
$query = $koneksi->query("SELECT * FROM kema_prestasi WHERE prodi='sosiatri' ORDER BY tahun DESC, id DESC");
?>
<main>
    <div class="bg-success text-white pt-5 pb-10">
        <div class="container-xl px-4 pt-5">
            <h1 class="fw-bold text-white mb-2"><i class="fas fa-award me-2"></i> Prestasi Mahasiswa</h1>
            <p class="lead text-white-50">Catatan kebanggaan akademis maupun non-akademis mahasiswa Pembangunan Sosial.</p>
        </div>
    </div>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4 justify-content-center">
            <?php if($query->num_rows > 0): while($row = $query->fetch_assoc()): ?>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 rounded-4 h-100">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="avatar-lg bg-light rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 me-4" style="width: 70px; height: 70px;">
                            <?php if($row['tingkat'] == 'Institusi') echo '<i class="fas fa-running fa-2x text-info"></i>';
                                  elseif($row['tingkat'] == 'Regional') echo '<i class="fas fa-trophy fa-2x text-warning"></i>';
                                  else echo '<i class="fas fa-medal fa-2x text-primary"></i>'; ?>
                        </div>
                        <div>
                            <h5 class="fw-bold text-dark mb-1"><?= htmlspecialchars($row['prestasi']) ?></h5>
                            <div class="small fw-bold text-success mb-2">Tingkat <?= htmlspecialchars($row['tingkat']) ?> (<?= $row['tahun'] ?>)</div>
                            <p class="small text-muted mb-0"><?= htmlspecialchars($row['deskripsi']) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; else: ?>
                <div class="col-12 text-center text-muted"><div class="card shadow-sm border-0 py-5">Belum ada data prestasi tercatat.</div></div>
            <?php endif; ?>
        </div>
    </div>
</main>