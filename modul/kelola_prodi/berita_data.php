<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$is_admin = in_array('admin', $_SESSION['roles'] ?? []);
$query = $koneksi->query("SELECT * FROM prodi_berita WHERE prodi = '$module_url' ORDER BY id DESC");
?>

<div class="container-xl px-4 mt-4">
    <div class="card shadow-sm border-top-lg border-top-primary">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <span class="fw-bold text-primary"><i class="fas fa-newspaper me-2"></i> Kelola Berita Prodi</span>
            <a href="index.php?module=<?= $module_url ?>&act=tambah_berita" class="btn btn-sm btn-primary">
                <i class="fas fa-plus me-1"></i> Tulis Berita
            </a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="bg-light">
                    <tr>
                        <th width="12%">Tanggal</th>
                        <th>Gambar</th>
                        <th width="45%">Judul Berita</th>
                        <th>Penulis</th>
                        <th>Aksi</th>
                        <?php 
                            $allowed_admin = ['admin', 'staf_it_admin', 'operator_sistem'];
                            $is_admin = !empty(array_intersect($allowed_admin, $_SESSION['roles'] ?? []));
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $query->fetch_assoc()): ?>
                    <tr>
                        <td><span class="badge bg-secondary"><?= date('d M Y', strtotime($row['tanggal_publikasi'])) ?></span></td>
                        <td>
                            <?php if(!empty($row['gambar_thumbnail'])): ?>
                                <img src="uploads/prodi/berita/<?= $row['gambar_thumbnail'] ?>" width="80" class="rounded border">
                            <?php else: ?>
                                <span class="small text-muted">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td><strong class="text-dark"><?= htmlspecialchars($row['judul']) ?></strong></td>
                        <td><i class="fas fa-user-edit text-muted me-1"></i> <?= htmlspecialchars($row['penulis']) ?></td>
                        
                        <?php if($is_admin): ?>
                        <td class="text-center align-middle">
                            <a href="index.php?module=<?= $module_url ?>&act=edit_berita&id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary"><i data-feather="edit"></i></a>
                            <a href="index.php?module=<?= $module_url ?>&act=hapus_berita&id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus berita ini?')"><i data-feather="trash-2"></i></a>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>