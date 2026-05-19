<?php
$query = @mysqli_query($koneksi, "SELECT * FROM prodi_struktur_organisasi WHERE prodi = 'sosiatri' LIMIT 1");
$data = mysqli_fetch_array($query);

$ketua_prodi = $data['ketua_prodi_nama'] ?? 'Nama Kaprodi, S.Sos., M.Si.';
$sekretaris_prodi = $data['sekretaris_prodi_nama'] ?? 'Nama Sekprodi, S.Sos., M.A.';
$kepala_lab = $data['kepala_lab_nama'] ?? 'Kepala Laboratorium Sosiologi';
$tugas_lab = $data['kepala_lab_tugas'] ?? 'Mengelola praktikum sosial & pemetaan wilayah.';
$staf_admin = $data['staf_admin_nama'] ?? 'Staf Administrasi Prodi';
$tugas_admin = $data['staf_admin_tugas'] ?? 'Layanan persuratan dan administrasi mahasiswa prodi.';
?>

<main>
    <header class="page-header page-header-dark bg-success pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="git-merge"></i></div>
                            Struktur Organisasi Prodi
                        </h1>
                        <div class="page-header-subtitle">Tata kelola dan manajemen akademik Prodi Pembangunan Sosial.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0 pt-5 pb-5 bg-white">
            <div class="card-body text-center" style="overflow-x: auto;">
                
                <div class="d-inline-block border border-primary border-2 rounded-3 bg-light px-5 py-3 shadow-sm mb-0 position-relative z-index-1">
                    <div class="small fw-bold text-primary mb-1">KETUA PROGRAM STUDI</div>
                    <div class="fw-bold text-dark h5 mb-0"><?= htmlspecialchars($ketua_prodi) ?></div>
                </div>
                
                <div style="width: 1px; height: 35px; background-color: #ced4da; margin: 0 auto;"></div>
                
                <div class="d-inline-block border border-success border-2 rounded-3 bg-light px-5 py-3 shadow-sm mb-0 position-relative z-index-1">
                    <div class="small fw-bold text-success mb-1">SEKRETARIS PRODI</div>
                    <div class="fw-bold text-dark h5 mb-0"><?= htmlspecialchars($sekretaris_prodi) ?></div>
                </div>

                <div style="width: 1px; height: 35px; background-color: #ced4da; margin: 0 auto;"></div>
                
                <div style="border-top: 2px solid #ced4da; width: 40%; margin: 0 auto; position: relative;">
                    <div style="position: absolute; top: 0; left: 0; width: 2px; height: 25px; background-color: #ced4da;"></div>
                    <div style="position: absolute; top: 0; right: 0; width: 2px; height: 25px; background-color: #ced4da;"></div>
                </div>

                <div class="row justify-content-center mx-auto" style="width: 45%; margin-top: 25px;">
                    <div class="col-sm-6 mb-3 px-2">
                        <div class="bg-light rounded-3 p-4 h-100 shadow-none border-0">
                            <i class="fas fa-microscope fa-2x text-warning mb-3"></i>
                            <h6 class="fw-bold text-dark"><?= htmlspecialchars($kepala_lab) ?></h6>
                            <p class="small text-muted mb-0"><?= htmlspecialchars($tugas_lab) ?></p>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 px-2">
                        <div class="bg-light rounded-3 p-4 h-100 shadow-none border-0">
                            <i class="fas fa-users-cog fa-2x text-info mb-3"></i>
                            <h6 class="fw-bold text-dark"><?= htmlspecialchars($staf_admin) ?></h6>
                            <p class="small text-muted mb-0"><?= htmlspecialchars($tugas_admin) ?></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>