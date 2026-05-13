<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
$prodi = 'pemerintahan';
$query = $koneksi->query("SELECT * FROM prodi_kurikulum WHERE prodi = '$prodi' ORDER BY semester ASC, nama_mk ASC");
?>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <!-- FORM TAMBAH -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Tambah Mata Kuliah</div>
                <div class="card-body">
                    <form action="index.php?module=prodi_pemerintahan&act=proses_kurikulum" method="POST">
                        <input type="hidden" name="prodi" value="<?= $prodi ?>">
                        
                        <div class="mb-3">
                            <label class="small mb-1">Semester</label>
                            <input class="form-control" name="semester" type="number" min="1" max="8" required>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Kode MK</label>
                            <input class="form-control" name="kode_mk" type="text" required>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Nama Mata Kuliah</label>
                            <input class="form-control" name="nama_mk" type="text" required>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1">SKS</label>
                                <input class="form-control" name="sks" type="number" min="1" max="6" required>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1">Jenis</label>
                                <select class="form-control" name="jenis_mk">
                                    <option value="Wajib">Wajib</option>
                                    <option value="Pilihan">Pilihan</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100" type="submit">Simpan MK</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- TABEL DATA -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">Data Kurikulum</div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Smt</th>
                                <th>Kode</th>
                                <th>Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['semester'] ?></td>
                                <td><?= $row['kode_mk'] ?></td>
                                <td><?= $row['nama_mk'] ?></td>
                                <td><?= $row['sks'] ?></td>
                                <td><?= $row['jenis_mk'] ?></td>
                                <td>
                                    <a href="index.php?module=prodi_pemerintahan&act=hapus_kurikulum&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus MK ini?')"><i data-feather="trash-2"></i></a>
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