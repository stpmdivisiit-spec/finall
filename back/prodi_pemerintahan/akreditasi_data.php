<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
$prodi = 'pemerintahan';
$query = $koneksi->query("SELECT * FROM prodi_akreditasi WHERE prodi = '$prodi' ORDER BY tahun_sk DESC");
?>

<div class="container-xl px-4 mt-4">
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-danger text-white">Data Akreditasi Program Studi</div>
        <div class="card-body">
            
            <a href="index.php?module=prodi_pemerintahan&act=tambah_akreditasi" class="btn btn-primary btn-sm mb-3">
                <i class="fas fa-plus"></i> Tambah Akreditasi
            </a>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nilai</th>
                        <th>Nomor SK</th>
                        <th>Tahun</th>
                        <th>Masa Berlaku</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($query->num_rows > 0): ?>
                        <?php while ($row = $query->fetch_assoc()): ?>
                        <tr>
                            <td><span class="badge bg-danger fs-6"><?= htmlspecialchars($row['nilai_akreditasi']) ?></span></td>
                            <td><?= htmlspecialchars($row['no_sk']) ?></td>
                            <td><?= htmlspecialchars($row['tahun_sk']) ?></td>
                            <td><?= htmlspecialchars($row['masa_berlaku']) ?></td>
                            <td>
                                <!-- Tombol aksi standar -->
                                <a href="index.php?module=prodi_pemerintahan&act=edit_akreditasi&id=<?= $row['id'] ?>" class="btn btn-sm btn-light text-primary"><i data-feather="edit"></i></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="text-center">Belum ada data akreditasi.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>