<?php if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!"); 
// C:\xampp\htdocs\FINAL\modul\perpustakaan\profil_data.php

$kat = $_GET['kat'] ?? 'tentang';

if ($kat == 'vmt') $judul_form = 'Visi, Misi & Tujuan';
elseif ($kat == 'layanan') $judul_form = 'Jam Layanan & Tata Tertib';
elseif ($kat == 'fasilitas') $judul_form = 'Fasilitas Ruangan';
else $judul_form = ucwords(str_replace('_', ' ', $kat));
?>

<div class="container-fluid px-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><i class="fas fa-edit me-2"></i>Kelola Profil: <?= $judul_form ?></h1>
        <?php if ($kat == 'fasilitas') : ?>
        <button class="btn btn-primary shadow-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalTambahFasilitas">
            <i class="fas fa-plus me-1"></i> Tambah Fasilitas
        </button>
        <?php endif; ?>
    </div>

    <?php if ($kat == 'fasilitas') : ?>
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Fasilitas Perpustakaan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="datatablesSimple">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%" class="text-center">Ikon/Foto</th>
                                <th width="25%">Nama Fasilitas</th>
                                <th width="45%">Deskripsi</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = $koneksi->query("SELECT * FROM perpus_fasilitas ORDER BY id DESC");
                            while ($row = $query->fetch_assoc()) :
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td class="text-center">
                                    <?php if (!empty($row['foto'])) : ?>
                                        <img src="uploads/perpustakaan/profil/<?= $row['foto'] ?>" width="50" class="img-thumbnail rounded">
                                    <?php else: ?>
                                        <i class="fas <?= htmlspecialchars($row['icon']) ?> fa-2x text-teal"></i>
                                    <?php endif; ?>
                                </td>
                                <td class="fw-bold text-teal"><?= htmlspecialchars($row['nama_fasilitas']) ?></td>
                                <td class="small"><?= htmlspecialchars($row['deskripsi']) ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditFasilitas<?= $row['id'] ?>"><i class="fas fa-edit"></i></button>
                                    <a href="index.php?module=perpustakaan&act=hapus_profil&kat=fasilitas&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus fasilitas ini?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                            <div class="modal fade" id="modalEditFasilitas<?= $row['id'] ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content border-0 shadow">
                                        <div class="modal-header bg-light">
                                            <h5 class="modal-title fw-bold">Edit Fasilitas</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="index.php?module=perpustakaan&act=proses_profil" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body text-start">
                                                <input type="hidden" name="aksi" value="edit_fasilitas">
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                <input type="hidden" name="foto_lama" value="<?= $row['foto'] ?>">
                                                
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Nama Fasilitas</label>
                                                    <input type="text" class="form-control" name="nama_fasilitas" value="<?= htmlspecialchars($row['nama_fasilitas']) ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Deskripsi</label>
                                                    <textarea class="form-control" name="deskripsi" rows="3" required><?= htmlspecialchars($row['deskripsi']) ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Pilih Ikon (FontAwesome)</label>
                                                    <select class="form-select" name="icon">
                                                        <option value="fa-book-reader" <?= ($row['icon'] == 'fa-book-reader') ? 'selected' : '' ?>>Ruang Baca (fa-book-reader)</option>
                                                        <option value="fa-users" <?= ($row['icon'] == 'fa-users') ? 'selected' : '' ?>>Ruang Diskusi (fa-users)</option>
                                                        <option value="fa-desktop" <?= ($row['icon'] == 'fa-desktop') ? 'selected' : '' ?>>Komputer/Katalog (fa-desktop)</option>
                                                        <option value="fa-wifi" <?= ($row['icon'] == 'fa-wifi') ? 'selected' : '' ?>>WiFi/Internet (fa-wifi)</option>
                                                        <option value="fa-archive" <?= ($row['icon'] == 'fa-archive') ? 'selected' : '' ?>>Koleksi Khusus (fa-archive)</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Atau Upload Foto Baru</label>
                                                    <input type="file" class="form-control" name="foto" accept="image/jpeg, image/png, image/webp">
                                                    <small class="text-muted">Jika diisi, ikon tidak akan ditampilkan (opsional).</small>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalTambahFasilitas" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title fw-bold">Tambah Fasilitas Baru</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="index.php?module=perpustakaan&act=proses_profil" method="POST" enctype="multipart/form-data">
                        <div class="modal-body text-start">
                            <input type="hidden" name="aksi" value="tambah_fasilitas">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Fasilitas</label>
                                <input type="text" class="form-control" name="nama_fasilitas" placeholder="Cth: Ruang Diskusi" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="3" placeholder="Jelaskan fasilitas ini..." required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Pilih Ikon</label>
                                <select class="form-select" name="icon">
                                    <option value="fa-book-reader">Ruang Baca (fa-book-reader)</option>
                                    <option value="fa-users">Ruang Diskusi (fa-users)</option>
                                    <option value="fa-desktop">Komputer/Katalog (fa-desktop)</option>
                                    <option value="fa-wifi">WiFi/Internet (fa-wifi)</option>
                                    <option value="fa-archive">Koleksi Khusus (fa-archive)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Upload Foto (Opsional)</label>
                                <input type="file" class="form-control" name="foto" accept="image/jpeg, image/png, image/webp">
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php elseif ($kat == 'layanan') : 
        $stmt = $koneksi->prepare("SELECT konten FROM perpus_profil WHERE kategori = 'layanan'");
        $stmt->execute();
        $konten_json = $stmt->get_result()->fetch_assoc()['konten'] ?? '';

        $lay = json_decode($konten_json, true);
        if (!$lay || !is_array($lay)) {
            $lay = [
                'tata_tertib' => [''],
                'jam_operasional' => [['hari' => '', 'jam' => '']],
                'ketentuan_pinjam' => ['']
            ];
        }
    ?>
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white fw-bold text-primary">Formulir Jam Layanan & Tata Tertib</div>
            <div class="card-body">
                <form action="index.php?module=perpustakaan&act=proses_profil" method="POST">
                    <input type="hidden" name="simpan_layanan" value="yes">

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label fw-bold text-dark"><i class="fas fa-list-ol me-2 text-teal"></i>Tata Tertib Pemustaka</label>
                            <button type="button" class="btn btn-sm btn-outline-teal rounded-pill" onclick="tambahItem('wadah-tertib', 'tata_tertib[]')"><i class="fas fa-plus"></i> Tambah Aturan</button>
                        </div>
                        <div id="wadah-tertib">
                            <?php foreach ($lay['tata_tertib'] as $tertib) : ?>
                            <div class="input-group mb-2 dinamis-item">
                                <span class="input-group-text bg-white"><i class="fas fa-check text-teal"></i></span>
                                <input type="text" class="form-control" name="tata_tertib[]" value="<?= htmlspecialchars($tertib) ?>" required>
                                <button class="btn btn-outline-danger" type="button" onclick="hapusBaris(this)"><i class="fas fa-trash"></i></button>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div><hr class="mb-4">

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label fw-bold text-dark"><i class="fas fa-clock me-2 text-teal"></i>Jam Operasional</label>
                            <button type="button" class="btn btn-sm btn-outline-teal rounded-pill" onclick="tambahJam()"><i class="fas fa-plus"></i> Tambah Jadwal</button>
                        </div>
                        <div id="wadah-jam">
                            <?php foreach ($lay['jam_operasional'] as $jam) : ?>
                            <div class="row mb-2 dinamis-item">
                                <div class="col-5"><input type="text" class="form-control" name="jam_hari[]" value="<?= htmlspecialchars($jam['hari'] ?? '') ?>" placeholder="Hari (Cth: Senin - Kamis)" required></div>
                                <div class="col-6"><input type="text" class="form-control" name="jam_waktu[]" value="<?= htmlspecialchars($jam['jam'] ?? '') ?>" placeholder="Waktu (Cth: 08.00 - 15.00)" required></div>
                                <div class="col-1"><button class="btn btn-outline-danger w-100" type="button" onclick="hapusBaris(this)"><i class="fas fa-trash"></i></button></div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div><hr class="mb-4">

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label fw-bold text-dark"><i class="fas fa-book me-2 text-teal"></i>Ketentuan Peminjaman</label>
                            <button type="button" class="btn btn-sm btn-outline-teal rounded-pill" onclick="tambahItem('wadah-pinjam', 'ketentuan_pinjam[]')"><i class="fas fa-plus"></i> Tambah Ketentuan</button>
                        </div>
                        <div id="wadah-pinjam">
                            <?php foreach ($lay['ketentuan_pinjam'] as $pinjam) : ?>
                            <div class="input-group mb-2 dinamis-item">
                                <span class="input-group-text bg-white"><i class="fas fa-chevron-right text-teal"></i></span>
                                <input type="text" class="form-control" name="ketentuan_pinjam[]" value="<?= htmlspecialchars($pinjam) ?>" required>
                                <button class="btn btn-outline-danger" type="button" onclick="hapusBaris(this)"><i class="fas fa-trash"></i></button>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary px-5 rounded-pill"><i class="fas fa-save me-2"></i> Simpan Data Layanan</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            function hapusBaris(btn) { btn.closest('.dinamis-item').remove(); }
            function tambahItem(wadahId, inputName) {
                const html = `<div class="input-group mb-2 dinamis-item">
                                <span class="input-group-text bg-white"><i class="fas fa-check text-teal"></i></span>
                                <input type="text" class="form-control" name="${inputName}" required>
                                <button class="btn btn-outline-danger" type="button" onclick="hapusBaris(this)"><i class="fas fa-trash"></i></button>
                              </div>`;
                document.getElementById(wadahId).insertAdjacentHTML('beforeend', html);
            }
            function tambahJam() {
                const html = `<div class="row mb-2 dinamis-item">
                                <div class="col-5"><input type="text" class="form-control" name="jam_hari[]" placeholder="Hari" required></div>
                                <div class="col-6"><input type="text" class="form-control" name="jam_waktu[]" placeholder="Waktu" required></div>
                                <div class="col-1"><button class="btn btn-outline-danger w-100" type="button" onclick="hapusBaris(this)"><i class="fas fa-trash"></i></button></div>
                              </div>`;
                document.getElementById('wadah-jam').insertAdjacentHTML('beforeend', html);
            }
        </script>
        


    <?php elseif ($kat == 'vmt') : 
        $stmt = $koneksi->prepare("SELECT * FROM perpus_profil WHERE kategori = 'vmt'");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $koneksi->query("INSERT INTO perpus_profil (kategori, judul, konten) VALUES ('vmt', 'Visi, Misi & Tujuan', '')");
            $konten_json = '';
        } else {
            $data = $result->fetch_assoc();
            $konten_json = $data['konten'];
        }

        // Decode JSON dari database
        $vmt = json_decode($konten_json, true);
        if (!$vmt || !is_array($vmt)) {
            $vmt = ['visi' => '', 'misi' => [''], 'tujuan' => [['judul' => '', 'deskripsi' => '']]];
        }
    ?>
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white fw-bold text-primary">
                Formulir Visi, Misi & Tujuan Perpustakaan
            </div>
            <div class="card-body">
                <form action="index.php?module=perpustakaan&act=proses_profil" method="POST">
                    <input type="hidden" name="simpan_vmt" value="yes">
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold text-teal"><i class="fas fa-lightbulb me-2"></i>Pernyataan Visi</label>
                        <textarea class="form-control bg-light" name="visi" rows="4" placeholder="Masukkan visi perpustakaan..." required><?= htmlspecialchars($vmt['visi']) ?></textarea>
                    </div>

                    <hr class="mb-4">

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label fw-bold text-dark m-0"><i class="fas fa-tasks me-2 text-teal"></i>Daftar Misi</label>
                            <button type="button" class="btn btn-sm btn-outline-teal rounded-pill" onclick="tambahMisi()"><i class="fas fa-plus"></i> Tambah Misi</button>
                        </div>
                        <div id="wadah-misi">
                            <?php foreach ($vmt['misi'] as $index => $misi) : ?>
                            <div class="input-group mb-2 baris-misi">
                                <span class="input-group-text bg-white"><i class="fas fa-check-circle text-teal"></i></span>
                                <input type="text" class="form-control" name="misi[]" value="<?= htmlspecialchars($misi) ?>" placeholder="Tuliskan misi..." required>
                                <button class="btn btn-outline-danger" type="button" onclick="hapusBaris(this)"><i class="fas fa-trash"></i></button>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <hr class="mb-4">

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <label class="form-label fw-bold text-dark m-0"><i class="fas fa-flag-checkered me-2"></i>Tujuan Pelayanan</label>
                            <button type="button" class="btn btn-sm btn-outline-dark rounded-pill" onclick="tambahTujuan()"><i class="fas fa-plus"></i> Tambah Tujuan</button>
                        </div>
                        <div id="wadah-tujuan" class="row">
                            <?php foreach ($vmt['tujuan'] as $index => $tujuan) : ?>
                            <div class="col-md-6 mb-3 baris-tujuan">
                                <div class="card border border-light shadow-sm h-100 position-relative">
                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2 rounded-circle" onclick="hapusElemen(this)"><i class="fas fa-times"></i></button>
                                    <div class="card-body p-3 pt-4">
                                        <input type="text" class="form-control fw-bold mb-2" name="tujuan_judul[]" value="<?= htmlspecialchars($tujuan['judul'] ?? '') ?>" placeholder="Judul Tujuan (Cth: Peningkatan Literasi)" required>
                                        <textarea class="form-control text-muted small" name="tujuan_desc[]" rows="2" placeholder="Deskripsi tujuan..." required><?= htmlspecialchars($tujuan['deskripsi'] ?? '') ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary px-5 rounded-pill"><i class="fas fa-save me-2"></i> Simpan Data VMT</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function hapusBaris(btn) { btn.closest('.baris-misi').remove(); }
            function hapusElemen(btn) { btn.closest('.baris-tujuan').remove(); }
            
            function tambahMisi() {
                const html = `<div class="input-group mb-2 baris-misi">
                                <span class="input-group-text bg-white"><i class="fas fa-check-circle text-teal"></i></span>
                                <input type="text" class="form-control" name="misi[]" placeholder="Tuliskan misi..." required>
                                <button class="btn btn-outline-danger" type="button" onclick="hapusBaris(this)"><i class="fas fa-trash"></i></button>
                              </div>`;
                document.getElementById('wadah-misi').insertAdjacentHTML('beforeend', html);
            }

            function tambahTujuan() {
                const html = `<div class="col-md-6 mb-3 baris-tujuan">
                                <div class="card border border-light shadow-sm h-100 position-relative">
                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2 rounded-circle" onclick="hapusElemen(this)"><i class="fas fa-times"></i></button>
                                    <div class="card-body p-3 pt-4">
                                        <input type="text" class="form-control fw-bold mb-2" name="tujuan_judul[]" placeholder="Judul Tujuan" required>
                                        <textarea class="form-control text-muted small" name="tujuan_desc[]" rows="2" placeholder="Deskripsi tujuan..." required></textarea>
                                    </div>
                                </div>
                            </div>`;
                document.getElementById('wadah-tujuan').insertAdjacentHTML('beforeend', html);
            }
        </script>


<?php elseif ($kat == 'usulan') : ?>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800 fw-bold"><i class="fas fa-hand-holding-heart me-2"></i>Data Usulan Pengadaan Buku</h1>
            <button class="btn btn-primary shadow-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalTambahUsulan">
                <i class="fas fa-plus me-1"></i> Tambah Usulan Manual
            </button>
        </div>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Rekomendasi Koleksi dari Pemustaka</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Pengusul & Prodi</th>
                                <th>Detail Buku</th>
                                <th>Alasan</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = $koneksi->query("SELECT * FROM perpus_layanan_usulan ORDER BY created_at DESC");
                            while ($row = $query->fetch_assoc()) :
                                // Logika Warna Status
                                $bg_status = 'bg-warning text-dark';
                                if ($row['status_usulan'] == 'Disetujui') $bg_status = 'bg-success';
                                elseif ($row['status_usulan'] == 'Ditolak') $bg_status = 'bg-danger';
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
                                <td>
                                    <strong><?= htmlspecialchars($row['nama_pengusul']) ?></strong><br>
                                    <small class="text-muted"><?= htmlspecialchars($row['program_studi']) ?></small>
                                </td>
                                <td>
                                    <span class="fw-bold text-teal"><?= htmlspecialchars($row['judul_buku']) ?></span><br>
                                    <small>Pengarang: <?= htmlspecialchars($row['pengarang']) ?></small><br>
                                    <small>Penerbit: <?= htmlspecialchars($row['penerbit_tahun']) ?></small>
                                </td>
                                <td class="small"><?= htmlspecialchars($row['alasan']) ?></td>
                                <td><span class="badge <?= $bg_status ?>"><?= htmlspecialchars($row['status_usulan']) ?></span></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#modalEditUsulan<?= $row['id'] ?>"><i class="fas fa-edit"></i></button>
                                    <a href="index.php?module=perpustakaan&act=hapus_layanan&kat=usulan&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Hapus usulan ini?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                            <div class="modal fade" id="modalEditUsulan<?= $row['id'] ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content border-0 shadow">
                                        <div class="modal-header bg-light">
                                            <h5 class="modal-title fw-bold">Tinjau Usulan & Ubah Status</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="index.php?module=perpustakaan&act=proses_layanan" method="POST">
                                            <div class="modal-body text-start">
                                                <input type="hidden" name="aksi" value="edit_usulan">
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Status Usulan</label>
                                                    <select class="form-select border-primary" name="status_usulan" required>
                                                        <option value="Menunggu Review" <?= ($row['status_usulan'] == 'Menunggu Review') ? 'selected' : '' ?>>Menunggu Review</option>
                                                        <option value="Disetujui" <?= ($row['status_usulan'] == 'Disetujui') ? 'selected' : '' ?>>Disetujui (Akan Diadakan)</option>
                                                        <option value="Ditolak" <?= ($row['status_usulan'] == 'Ditolak') ? 'selected' : '' ?>>Ditolak</option>
                                                    </select>
                                                </div>
                                                <hr>
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Pengusul</label>
                                                    <input type="text" class="form-control" name="nama_pengusul" value="<?= htmlspecialchars($row['nama_pengusul']) ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Program Studi</label>
                                                    <select class="form-select" name="program_studi" required>
                                                        <option value="Pembangunan Sosial" <?= ($row['program_studi'] == 'Pembangunan Sosial') ? 'selected' : '' ?>>Pembangunan Sosial</option>
                                                        <option value="Ilmu Pemerintahan" <?= ($row['program_studi'] == 'Ilmu Pemerintahan') ? 'selected' : '' ?>>Ilmu Pemerintahan</option>
                                                        <option value="Dosen / Staff" <?= ($row['program_studi'] == 'Dosen / Staff') ? 'selected' : '' ?>>Dosen / Staff</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Judul Buku</label>
                                                    <input type="text" class="form-control" name="judul_buku" value="<?= htmlspecialchars($row['judul_buku']) ?>" required>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Pengarang</label>
                                                        <input type="text" class="form-control" name="pengarang" value="<?= htmlspecialchars($row['pengarang']) ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Penerbit & Thn</label>
                                                        <input type="text" class="form-control" name="penerbit_tahun" value="<?= htmlspecialchars($row['penerbit_tahun']) ?>" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Alasan Usulan</label>
                                                    <textarea class="form-control" name="alasan" rows="2" required><?= htmlspecialchars($row['alasan']) ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalTambahUsulan" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title fw-bold">Tambah Usulan Manual</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="index.php?module=perpustakaan&act=proses_layanan" method="POST">
                        <div class="modal-body text-start">
                            <input type="hidden" name="aksi" value="tambah_usulan">
                            <input type="hidden" name="status_usulan" value="Menunggu Review"> <div class="mb-3">
                                <label class="form-label fw-bold">Nama Pengusul</label>
                                <input type="text" class="form-control" name="nama_pengusul" placeholder="Cth: Yohanes Pembaptis" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Program Studi / Jabatan</label>
                                <select class="form-select" name="program_studi" required>
                                    <option value="" disabled selected>Pilih...</option>
                                    <option value="Pembangunan Sosial">Pembangunan Sosial</option>
                                    <option value="Ilmu Pemerintahan">Ilmu Pemerintahan</option>
                                    <option value="Dosen / Staff">Dosen / Staff</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Judul Buku</label>
                                <input type="text" class="form-control" name="judul_buku" placeholder="Judul lengkap buku" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Pengarang</label>
                                    <input type="text" class="form-control" name="pengarang" placeholder="Nama Penulis" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Penerbit & Tahun</label>
                                    <input type="text" class="form-control" name="penerbit_tahun" placeholder="Cth: Gramedia, 2024" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Alasan Usulan</label>
                                <textarea class="form-control" name="alasan" rows="2" placeholder="Referensi mata kuliah..." required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    <?php else : 
        $stmt = $koneksi->prepare("SELECT * FROM perpus_profil WHERE kategori = ?");
        $stmt->bind_param("s", $kat);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $koneksi->query("INSERT INTO perpus_profil (kategori, judul, konten) VALUES ('$kat', '$judul_form', '')");
            $data = ['judul' => $judul_form, 'konten' => '', 'gambar' => ''];
        } else {
            $data = $result->fetch_assoc();
        }
    ?>
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white fw-bold text-primary">
                Formulir Pembaruan Konten
            </div>
            <div class="card-body">
                <form action="index.php?module=perpustakaan&act=proses_profil" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="simpan_profil" value="yes">
                    <input type="hidden" name="kategori" value="<?= $kat ?>">
                    <input type="hidden" name="gambar_lama" value="<?= $data['gambar'] ?>">

                    <div class="mb-3">
                        <label class="form-label fw-bold">Judul Halaman</label>
                        <input type="text" class="form-control" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Konten / Deskripsi</label>
                        <textarea class="form-control" name="konten" rows="8" required><?= htmlspecialchars($data['konten']) ?></textarea>
                        <small class="text-muted">Gunakan pemisahan paragraf (enter) agar tulisan rapi.</small>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Gambar Cover (Opsional)</label>
                            <input type="file" class="form-control" name="gambar" accept="image/jpeg, image/png, image/webp">
                        </div>
                        <?php if (!empty($data['gambar']) && file_exists('uploads/perpustakaan/profil/' . $data['gambar'])) : ?>
                        <div class="col-md-6 text-center">
                            <img src="uploads/perpustakaan/profil/<?= $data['gambar'] ?>" class="img-thumbnail mt-2" style="max-height: 100px;" alt="Cover">
                        </div>
                        <?php endif; ?>
                    </div>

                    <hr>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-1"></i> Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>



        
    <?php endif; ?>
</div>