<?php if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!"); ?>

<div class="container-xl px-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Sekretariat</h1>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Arsip Administrasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $jml = $koneksi->query("SELECT COUNT(*) as tot FROM sekretariat_arsip")->fetch_assoc();
                                echo $jml['tot'] ?? 0; 
                                ?> Arsip
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-folder-open fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>