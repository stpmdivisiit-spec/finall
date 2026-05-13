<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
$prodi = 'pemerintahan';
$query = $koneksi->query("SELECT * FROM prodi_berita WHERE prodi = '$prodi' ORDER BY tanggal_publikasi DESC, id DESC");
?>

<div class="container-xl px-4 mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span>Daftar Artikel & Berita</span>
            <a href="index.php?module=prodi_pemerintahan&act=tambah_berita" class="btn btn-sm btn-primary">
                <i class="fas fa-edit me-1"></i> Tulis Berita Baru
            </a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr><th>Tanggal</th><th>Judul Berita</th><th>Status</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                    <?php while($r = $query->fetch_assoc()): ?>
                    <tr>
                        <td><?= date('d M Y', strtotime($r['tanggal_publikasi'])) ?></td>
                        <td>
                            <strong><?= htmlspecialchars($r['judul']) ?></strong><br>
                            <span class="small text-muted">Penulis: <?= htmlspecialchars($r['penulis']) ?></span>
                        </td>
                        <td><span class="badge <?= $r['status']=='Publish' ? 'bg-success' : 'bg-warning text-dark' ?>"><?= $r['status'] ?></span></td>
                        <td>
                            <!-- TOMBOL EDIT DITAMBAHKAN DI SINI -->
                            <a href="index.php?module=prodi_pemerintahan&act=edit_berita&id=<?= $r['id'] ?>" class="btn btn-sm btn-outline-primary" title="Edit Berita"><i data-feather="edit"></i></a>
                            
                            <a href="index.php?module=prodi_pemerintahan&act=hapus_berita&id=<?= $r['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus artikel ini selamanya?')" title="Hapus"><i data-feather="trash-2"></i></a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>