<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
$prodi = 'pemerintahan';
$kategori = $act; 

if ($kategori == 'seminar') {
    $title = "Seminar"; $lbl_desc = "Pembicara / Deskripsi Singkat"; $lbl_file = "Poster Seminar (Gambar)"; $tampil_lok = true;
} elseif ($kategori == 'pengumuman') {
    $title = "Pengumuman"; $lbl_desc = "Isi Pengumuman"; $lbl_file = "File Edaran (PDF) Opsional"; $tampil_lok = false;
} else {
    $title = "Agenda Kegiatan"; $lbl_desc = "Keterangan Agenda"; $lbl_file = "Surat/Dokumen Opsional"; $tampil_lok = true;
}

$query = $koneksi->query("SELECT * FROM prodi_info_agenda WHERE prodi='$prodi' AND kategori='$kategori' ORDER BY tanggal_mulai DESC");
?>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <!-- FORM -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-top-lg border-top-info">
                <div class="card-header fw-bold text-info">Buat <?= $title ?></div>
                <div class="card-body">
                    <form action="index.php?module=prodi_pemerintahan&act=proses_info" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="prodi" value="<?= $prodi ?>">
                        <input type="hidden" name="kategori" value="<?= $kategori ?>">
                        
                        <div class="mb-3">
                            <label class="small fw-bold">Judul <?= $title ?></label>
                            <input class="form-control" name="judul" type="text" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold"><?= $lbl_desc ?></label>
                            <textarea class="form-control" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small fw-bold">Mulai Tgl</label>
                                <input class="form-control" name="tanggal_mulai" type="date" required>
                            </div>
                            <div class="col-md-6">
                                <label class="small fw-bold">Selesai Tgl</label>
                                <input class="form-control" name="tanggal_selesai" type="date">
                            </div>
                        </div>
                        
                        <?php if($tampil_lok): ?>
                        <div class="mb-3">
                            <label class="small fw-bold">Lokasi Pelaksanaan</label>
                            <input class="form-control" name="lokasi" type="text">
                        </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label class="small fw-bold"><?= $lbl_file ?></label>
                            <input class="form-control" name="file_lampiran" type="file" accept=".pdf,.jpg,.png">
                        </div>
                        <button class="btn btn-info text-white w-100" type="submit">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- TABEL -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">Data <?= $title ?></div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr><th>Tgl Pelaksanaan</th><th>Judul & Detail</th><th>File/Lampiran</th><th>Aksi</th></tr>
                        </thead>
                        <tbody>
                            <?php while($r = $query->fetch_assoc()): ?>
                            <tr>
                                <td><span class="badge bg-primary"><?= $r['tanggal_mulai'] ?></span></td>
                                <td>
                                    <strong><?= htmlspecialchars($r['judul']) ?></strong><br>
                                    <span class="small text-muted"><?= htmlspecialchars($r['deskripsi']) ?></span>
                                    <?php if($tampil_lok && !empty($r['lokasi'])): ?><br><span class="badge bg-light text-dark border mt-1"><i class="fas fa-map-marker-alt"></i> <?= $r['lokasi'] ?></span><?php endif; ?>
                                </td>
                                <td>
                                    <?php if(!empty($r['file_lampiran'])): ?>
                                    <a href="uploads/informasi/<?= $r['file_lampiran'] ?>" target="_blank" class="btn btn-sm btn-success">Buka File</a>
                                    <?php endif; ?>
                                </td>
                                <td><a href="index.php?module=prodi_pemerintahan&act=hapus_info&id=<?= $r['id'] ?>&redir=<?= $kategori ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus?')"><i data-feather="trash-2"></i></a></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>