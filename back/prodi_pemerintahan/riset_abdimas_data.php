<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$prodi = 'pemerintahan';

// Deteksi Kategori dari URL
$kategori = $act;

// Setup Label Dinamis Berdasarkan Kategori
if ($kategori == 'penelitian_dosen') {
    $judul_halaman = "Penelitian Dosen";
    $lbl_utama = "Ketua Peneliti";
    $lbl_pendamping = "Anggota Peneliti (Dosen/Mhs)";
    $tampil_lokasi = false;
} elseif ($kategori == 'riset_mahasiswa') {
    $judul_halaman = "Riset Mahasiswa";
    $lbl_utama = "Nama Mahasiswa";
    $lbl_pendamping = "Dosen Pembimbing";
    $tampil_lokasi = false;
} else {
    $kategori = 'abdimas';
    $judul_halaman = "Pengabdian Masyarakat (Abdimas)";
    $lbl_utama = "Ketua Pelaksana";
    $lbl_pendamping = "Anggota Pelaksana";
    $tampil_lokasi = true;
    $lbl_lokasi = "Lokasi Pelaksanaan / Mitra";
}

// Ambil Data dari Database
$query = $koneksi->query("SELECT * FROM prodi_riset_abdimas WHERE prodi = '$prodi' AND kategori = '$kategori' ORDER BY tahun DESC, id DESC");
?>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <!-- FORM TAMBAH -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-top-lg border-top-primary">
                <div class="card-header text-primary fw-bold">Tambah Data <?= $judul_halaman ?></div>
                <div class="card-body">
                    <form action="index.php?module=prodi_pemerintahan&act=proses_riset_abdimas" method="POST" enctype="multipart/form-data">
                        
                        <input type="hidden" name="prodi" value="<?= $prodi ?>">
                        <input type="hidden" name="kategori" value="<?= $kategori ?>">
                        <input type="hidden" name="act_redir" value="<?= $act ?>"> <!-- Untuk redirect -->
                        
                        <div class="mb-3">
                            <label class="small mb-1 fw-bold">Judul <?= $judul_halaman ?> *</label>
                            <textarea class="form-control" name="judul" rows="2" required></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="small mb-1 fw-bold"><?= $lbl_utama ?> *</label>
                            <input class="form-control" name="personil_utama" type="text" placeholder="Nama lengkap & gelar" required>
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1 fw-bold"><?= $lbl_pendamping ?></label>
                            <input class="form-control" name="personil_pendamping" type="text" placeholder="Kosongkan jika tidak ada">
                        </div>

                        <?php if ($tampil_lokasi): ?>
                        <div class="mb-3">
                            <label class="small mb-1 fw-bold"><?= $lbl_lokasi ?> *</label>
                            <input class="form-control" name="keterangan_lokasi" type="text" placeholder="Cth: Desa Oebelo, Kupang" required>
                        </div>
                        <?php else: ?>
                            <input type="hidden" name="keterangan_lokasi" value="-">
                        <?php endif; ?>

                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1 fw-bold">Tahun Pelaksanaan *</label>
                                <input class="form-control" name="tahun" type="number" min="2000" max="2099" value="<?= date('Y') ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1 fw-bold">File Laporan (PDF) *</label>
                                <input class="form-control" name="file_dokumen" type="file" accept=".pdf" required>
                            </div>
                        </div>

                        <button class="btn btn-primary w-100" type="submit"><i class="fas fa-save me-1"></i> Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- TABEL DATA -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">Daftar <?= $judul_halaman ?></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="datatablesSimple">
                            <thead class="bg-light">
                                <tr>
                                    <th>Tahun</th>
                                    <th>Informasi Dokumen</th>
                                    <th>File PDF</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = $query->fetch_assoc()): ?>
                                <tr>
                                    <td class="text-center fw-bold text-primary"><?= $row['tahun'] ?></td>
                                    <td>
                                        <div class="fw-bold mb-1"><?= htmlspecialchars($row['judul']) ?></div>
                                        <div class="small text-muted">
                                            <i class="fas fa-user-tie me-1"></i> <?= $lbl_utama ?>: <?= htmlspecialchars($row['personil_utama']) ?>
                                        </div>
                                        <?php if(!empty($row['personil_pendamping'])): ?>
                                        <div class="small text-muted">
                                            <i class="fas fa-users me-1"></i> <?= $lbl_pendamping ?>: <?= htmlspecialchars($row['personil_pendamping']) ?>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($tampil_lokasi && !empty($row['keterangan_lokasi']) && $row['keterangan_lokasi'] != '-'): ?>
                                        <div class="small text-danger mt-1">
                                            <i class="fas fa-map-marker-alt me-1"></i> <?= htmlspecialchars($row['keterangan_lokasi']) ?>
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="uploads/riset_abdimas/<?= $row['file_dokumen'] ?>" target="_blank" class="btn btn-sm btn-outline-danger" title="Lihat PDF">
                                            <i class="far fa-file-pdf"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="index.php?module=prodi_pemerintahan&act=hapus_riset_abdimas&id=<?= $row['id'] ?>&redir=<?= $act ?>" class="btn btn-sm btn-transparent-dark text-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof simpleDatatables !== 'undefined') {
            const datatablesSimple = document.getElementById('datatablesSimple');
            if (datatablesSimple) {
                new simpleDatatables.DataTable(datatablesSimple);
            }
        }
    });
</script>