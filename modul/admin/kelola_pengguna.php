<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Query yang sudah disesuaikan agar lolos dari Strict Mode MySQL
$query = "
    SELECT u.id, u.nama_lengkap, u.username, u.email, u.jenis_pegawai, u.status_aktif,
           GROUP_CONCAT(r.keterangan SEPARATOR ' || ') as daftar_hak_akses
    FROM users u
    LEFT JOIN user_roles ur ON u.id = ur.user_id
    LEFT JOIN roles r ON ur.role_id = r.id
    GROUP BY u.id, u.nama_lengkap, u.username, u.email, u.jenis_pegawai, u.status_aktif
    ORDER BY u.nama_lengkap ASC
";

$result = $koneksi->query($query);

// PENDETEKSI ERROR DATABASE
if (!$result) {
    echo "<div class='container-xl px-4 mt-4'>
            <div class='alert alert-danger fw-bold'>
                <i class='fas fa-exclamation-triangle me-2'></i> Oops! Ada masalah pada Database: <br>
                <span class='fw-normal'>" . $koneksi->error . "</span>
            </div>
          </div>";
    exit; // Hentikan eksekusi agar tidak muncul Fatal Error
}
?>

<div class="container-xl px-4 mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span class="fw-bold"><i class="fas fa-users me-2"></i> Kelola Pengguna Sistem</span>
            <a href="index.php?module=admin&act=pengguna_tambah" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Tambah Akun
            </a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover" id="datatablesSimple">
                <thead class="bg-light">
                    <tr>
                        <th>Nama & Kontak</th>
                        <th>Username (Login)</th>
                        <th>Status & Tipe</th>
                        <th width="35%">Hak Akses (Roles)</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td>
                            <strong><?= htmlspecialchars($row['nama_lengkap']) ?></strong><br>
                            <span class="small text-muted"><?= htmlspecialchars($row['email'] ?? '-') ?></span>
                        </td>
                        <td class="fw-bold text-primary"><?= htmlspecialchars($row['username']) ?></td>
                        <td>
                            <span class="badge <?= $row['jenis_pegawai'] == 'Dosen' ? 'bg-info' : 'bg-secondary' ?>"><?= htmlspecialchars($row['jenis_pegawai']) ?></span>
                            <span class="badge <?= $row['status_aktif'] == 1 ? 'bg-success' : 'bg-danger' ?>"><?= $row['status_aktif'] == 1 ? 'Aktif' : 'Non-Aktif' ?></span>
                        </td>
                        <td>
                            <?php 
                            if (!empty($row['daftar_hak_akses'])) {
                                $roles_array = explode(' || ', $row['daftar_hak_akses']);
                                foreach ($roles_array as $role_desc) {
                                    echo "<span class='badge bg-dark me-1 mb-1 fw-normal'>$role_desc</span>";
                                }
                            } else {
                                echo "<span class='badge bg-warning text-dark'>Belum ada hak akses</span>";
                            }
                            ?>
                        </td>
                        <td class="text-center align-middle">
                            <a href="index.php?module=admin&act=pengguna_edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-primary" title="Edit Hak Akses"><i data-feather="edit-2"></i></a>
                            <a href="index.php?module=admin&act=pengguna_hapus&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus akun ini?')" title="Hapus"><i data-feather="trash-2"></i></a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>