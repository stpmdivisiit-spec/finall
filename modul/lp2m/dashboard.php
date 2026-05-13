<?php if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!"); ?>

<div class="container-xl px-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard LP2M</h1>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Dokumen / SOP</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $jml = $koneksi->query("SELECT COUNT(*) as tot FROM lp2m_dokumen")->fetch_assoc();
                                echo $jml['tot']; 
                                ?>
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-file-pdf fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Selamat Datang di Panel LP2M</h6>
        </div>
        <div class="card-body">
            <p>Gunakan menu di sebelah kiri untuk mengelola Roadmap, SOP, Hasil Penelitian, Pengabdian Masyarakat, dan Publikasi Ilmiah STPM Santa Ursula.</p>
        </div>
    </div>
</div>