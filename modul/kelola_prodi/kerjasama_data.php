<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
$prodi = 'pemerintahan';

// Seting Dinamis Berdasarkan URL
if ($act == 'mitra_pemerintah') {
    $kategori = 'pemerintah';
    $judul_halaman = "Kerja Sama Pemerintah & Desa";
} elseif ($act == 'mitra_sosial') {
    $kategori = 'sosial';
    $judul_halaman = "Kerja Sama Sosial & Lembaga";
} elseif ($act == 'mitra_mbkm') {
    $kategori = 'mbkm';
    $judul_halaman = "Mitra Program MBKM";
} else {
    $kategori = 'penelitian';
    $judul_halaman = "Kerja Sama Penelitian";
}

// Ambil Data dari Database
$query = $koneksi->query("SELECT * FROM prodi_kerjasama WHERE prodi = '$prodi' AND kategori = '$kategori' ORDER BY id DESC");
?>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <!-- FORM TAMBAH -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-top-lg border-top-primary">
                <div class="card-header fw-bold text-primary">Tambah <?= $judul_halaman ?></div>
                <div class="card-body">
                    <form action="index.php?module=prodi_pemerintahan&act=proses_kerjasama" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="prodi" value="<?= $prodi ?>">
                        <input type="hidden" name="kategori" value="<?= $kategori ?>">
                        <input type="hidden" name="act_redir" value="<?= $act ?>">
                        
                        <div class="mb-3">
                            <label class="small fw-bold">Nama Mitra / Instansi</label>
                            <input class="form-control" name="nama_mitra" type="text" placeholder="Contoh: Pemprov NTT" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Judul Kerja Sama / MoU</label>
                            <textarea class="form-control" name="judul_kerjasama" rows="2" placeholder="Contoh: MoU Pengembangan Desa Mandiri..." required></textarea>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small fw-bold">Tgl. Mulai</label>
                                <input class="form-control" name="tanggal_mulai" type="date" required>
                            </div>
                            <div class="col-md-6">
                                <label class="small fw-bold">Tgl. Selesai</label>
                                <input class="form-control" name="tanggal_selesai" type="date" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Upload Dokumen (PDF MoU/MoA/IA)</label>
                            <input class="form-control" name="file_dokumen" type="file" accept=".pdf">
                        </div>
                        <button class="btn btn-primary w-100" type="submit">Simpan Kemitraan</button>
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
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Mitra Kerja Sama</th>
                                    <th>Judul & Durasi</th>
                                    <th class="text-center">Dokumen</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = $query->fetch_assoc()): ?>
                                <tr>
                                    <td class="fw-bold text-primary"><?= htmlspecialchars($row['nama_mitra']) ?></td>
                                    <td>
                                        <div><?= htmlspecialchars($row['judul_kerjasama']) ?></div>
                                        <div class="small text-muted mt-1">
                                            <i class="far fa-calendar-alt"></i> <?= $row['tanggal_mulai'] ?> s/d <?= $row['tanggal_selesai'] ?>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <?php if(!empty($row['file_dokumen'])): ?>
                                            <a href="uploads/kerjasama/<?= $row['file_dokumen'] ?>" target="_blank" class="badge bg-success text-decoration-none">Lihat PDF</a>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Tidak ada</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="index.php?module=prodi_pemerintahan&act=hapus_kerjasama&id=<?= $row['id'] ?>&redir=<?= $act ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data kemitraan ini beserta file fisiknya?')">
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