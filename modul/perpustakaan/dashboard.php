<?php if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!"); ?>

<div class="container-xl px-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Perpustakaan STPM</h1>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Buku Fisik</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $jml = $koneksi->query("SELECT SUM(stok_fisik) as tot FROM perpus_koleksi WHERE kategori_koleksi='buku'")->fetch_assoc();
                                echo $jml['tot'] ?? 0; 
                                ?> Eksemplar
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-book fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">E-Book & Skripsi Digital</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $jml = $koneksi->query("SELECT COUNT(*) as tot FROM perpus_koleksi WHERE kategori_koleksi != 'buku'")->fetch_assoc();
                                echo $jml['tot'] ?? 0; 
                                ?> File PDF
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-laptop-code fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>