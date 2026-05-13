<?php
// CEK KEAMANAN
if (!defined('AKSES_DIIZINKAN')) {
    die("Akses ditolak!");
}

// ==========================================
// QUERY DATA DOSEN
// ==========================================
$queryDosen = "
    SELECT d.*, u.username, u.email as akun_email 
    FROM dosen d
    LEFT JOIN users u ON d.user_id = u.id
    ORDER BY d.nama_lengkap ASC
";
$resultDosen = $koneksi->query($queryDosen);

// ==========================================
// QUERY DATA TENDIK (PEGAWAI)
// ==========================================
$queryTendik = "
    SELECT t.*, u.username, u.email as akun_email 
    FROM tendik t
    LEFT JOIN users u ON t.user_id = u.id
    ORDER BY t.nama_lengkap ASC
";
$resultTendik = $koneksi->query($queryTendik);
?>

<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="users"></i></div>
                        Kelola Data Pegawai & Dosen
                    </h1>
                    <div class="page-header-subtitle">Manajemen master data Dosen dan Tenaga Kependidikan (Tendik).</div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-n10">
    <div class="card mb-4">
        <!-- HEADER TABS -->
        <div class="card-header border-bottom">
            <ul class="nav nav-tabs card-header-tabs" id="pegawaiTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active fw-bold text-indigo" id="dosen-tab" data-bs-toggle="tab" href="#dosen" role="tab" aria-controls="dosen" aria-selected="true">
                        <i class="fas fa-chalkboard-teacher me-1"></i> Data Dosen
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-teal" id="tendik-tab" data-bs-toggle="tab" href="#tendik" role="tab" aria-controls="tendik" aria-selected="false">
                        <i class="fas fa-user-tie me-1"></i> Data Tendik
                    </a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content" id="pegawaiTabContent">
                
                <!-- ========================================== -->
                <!-- TAB 1: DATA DOSEN                          -->
                <!-- ========================================== -->
                <div class="tab-pane fade show active" id="dosen" role="tabpanel" aria-labelledby="dosen-tab">
                    
                    <a href="index.php?module=admin&act=tambah_dosen" class="btn btn-primary btn-sm mb-3">
                        <i class="fas fa-plus me-1"></i> Tambah Dosen
                    </a>

                    <table id="datatablesDosen" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>NIDN / NIP</th>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>Kontak</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($resultDosen && $resultDosen->num_rows > 0): ?>
                                <?php while ($row = $resultDosen->fetch_assoc()): 
                                    // Format Nama Dosen
                                    $nama = $row['nama_lengkap'];
                                    if(!empty($row['gelar_depan'])) $nama = $row['gelar_depan'] . ' ' . $nama;
                                    if(!empty($row['gelar_belakang'])) $nama .= ', ' . $row['gelar_belakang'];
                                    
                                    $nidn = !empty($row['nidn']) ? $row['nidn'] : ($row['nip'] ?? '-');
                                    $status_badge = ($row['status_dosen'] == 'Aktif') ? 'bg-success' : 'bg-warning';
                                ?>
                                <tr>
                                    <td><?= htmlspecialchars($nidn) ?></td>
                                    <td class="fw-bold text-dark"><?= htmlspecialchars($nama) ?></td>
                                    <td><?= htmlspecialchars($row['jabatan_fungsional'] ?? '-') ?></td>
                                    <td>
                                        <div class="small"><?= htmlspecialchars($row['email'] ?? '-') ?></div>
                                        <div class="small text-muted"><?= htmlspecialchars($row['no_hp'] ?? '-') ?></div>
                                    </td>
                                    <td><span class="badge <?= $status_badge ?>"><?= htmlspecialchars($row['status_dosen'] ?? 'Unknown') ?></span></td>
                                    <td>
                                        <a href="index.php?module=admin&act=edit_dosen&id=<?= $row['id'] ?>" class="btn btn-datatable btn-icon btn-transparent-dark me-2" title="Edit Dosen"><i data-feather="edit"></i></a>
                                        <a href="index.php?module=admin&act=hapus_dosen&id=<?= $row['id'] ?>" class="btn btn-datatable btn-icon btn-transparent-dark text-danger" title="Hapus Dosen" onclick="return confirm('Yakin ingin menghapus data Dosen ini?');"><i data-feather="trash-2"></i></a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr><td colspan="6" class="text-center py-3">Belum ada data Dosen.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- ========================================== -->
                <!-- TAB 2: DATA TENDIK (PEGAWAI)               -->
                <!-- ========================================== -->
                <div class="tab-pane fade" id="tendik" role="tabpanel" aria-labelledby="tendik-tab">
                    
                    <a href="index.php?module=admin&act=tambah_pegawai" class="btn btn-primary btn-sm mb-3" style="background-color: #00ac69; border-color: #00ac69;">
                        <i class="fas fa-plus me-1"></i> Tambah Tendik
                    </a>

                    <table id="datatablesTendik" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>NIP / NIK</th>
                                <th>Nama Lengkap</th>
                                <th>L/P</th>
                                <th>Jabatan Struktural</th>
                                <th>Kontak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($resultTendik && $resultTendik->num_rows > 0): ?>
                                <?php while ($row = $resultTendik->fetch_assoc()): 
                                    $nip_nik = !empty($row['nip_nik']) ? $row['nip_nik'] : '-';
                                    $jk = ($row['jenis_kelamin'] == 'Laki-Laki' || $row['jenis_kelamin'] == 'L') ? 'L' : 'P';
                                ?>
                                <tr>
                                    <td><?= htmlspecialchars($nip_nik) ?></td>
                                    <td class="fw-bold text-dark"><?= htmlspecialchars($row['nama_lengkap'] ?? '-') ?></td>
                                    <td class="text-center"><?= $jk ?></td>
                                    <td><?= htmlspecialchars($row['jabatan_struktural'] ?? '-') ?></td>
                                    <td>
                                        <div class="small"><?= htmlspecialchars($row['email'] ?? '-') ?></div>
                                        <div class="small text-muted"><?= htmlspecialchars($row['no_hp'] ?? '-') ?></div>
                                    </td>
                                    <td>
                                        <a href="index.php?module=admin&act=edit_pegawai&id=<?= $row['id'] ?>" class="btn btn-datatable btn-icon btn-transparent-dark me-2" title="Edit Tendik"><i data-feather="edit"></i></a>
                                        <a href="index.php?module=admin&act=hapus_pegawai&id=<?= $row['id'] ?>" class="btn btn-datatable btn-icon btn-transparent-dark text-danger" title="Hapus Tendik" onclick="return confirm('Yakin ingin menghapus data Tendik ini?');"><i data-feather="trash-2"></i></a>
<form action="index.php?module=admin&act=proses_hapus_pegawai" method="POST" class="d-inline">
    <input type="hidden" name="csrf_token" value="<?= generateCSRFToken() ?>">
    <input type="hidden" name="user_id" value="<?= $row['user_id_asli'] ?? $row['user_id'] ?>">
    
    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('PERINGATAN: Yakin ingin menghapus pegawai ini? Semua data terkait (biodata, hak akses) akan ikut terhapus permanen!')" title="Hapus Permanen">
        <i data-feather="trash-2"></i> Hapus
    </button>
</form>
                                    
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr><td colspan="6" class="text-center py-3">Belum ada data Tendik.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof simpleDatatables !== 'undefined') {
            const tableDosen = document.getElementById('datatablesDosen');
            const tableTendik = document.getElementById('datatablesTendik');
            
            if (tableDosen) new simpleDatatables.DataTable(tableDosen);
            if (tableTendik) new simpleDatatables.DataTable(tableTendik);
        }
    });
</script>