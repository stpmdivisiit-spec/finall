<?php
$data = $koneksi->query("SELECT * FROM kema_tracer WHERE prodi='sosiatri'")->fetch_assoc();
?>
<main>
    <div class="bg-success text-white pt-5 pb-10">
        <div class="container-xl px-4 pt-5">
            <h1 class="fw-bold text-white mb-2"><i class="fas fa-briefcase me-2"></i> Tracer Study (Pelacakan Alumni)</h1>
            <p class="lead text-white-50">Menjaga sinergi, memetakan prospek karir, dan meningkatkan mutu kurikulum Pembangunan Sosial.</p>
        </div>
    </div>
    <div class="container-xl px-4 mt-n10 mb-5">
        
        <div class="card shadow-lg border-0 rounded-4 mb-4">
            <div class="card-body p-5 d-flex flex-column flex-md-row align-items-center justify-content-between">
                <div class="mb-4 mb-md-0 pe-md-4">
                    <h3 class="fw-bold text-dark mb-2">Bagi Para Alumni Tercinta</h3>
                    <p class="text-muted mb-0">Tracer Study STPM Santa Ursula bertujuan untuk mengevaluasi relevansi kurikulum pendidikan tinggi dengan kebutuhan dunia kerja (link and match). Data yang Anda berikan sangat rahasia dan krusial bagi penilaian Akreditasi BAN-PT Institusi kita.</p>
                </div>
                <div class="text-center flex-shrink-0">
                    <a href="<?= $data['link_kuesioner_alumni'] ?? '#' ?>" target="_blank" class="btn btn-success rounded-pill px-5 py-3 fw-bold shadow-sm d-block mb-2"><i class="fas fa-edit me-2"></i> Isi Form Tracer Study</a>
                    <small class="text-muted">Hanya membutuhkan waktu 5-10 menit.</small>
                </div>
            </div>
        </div>

        <div class="row gx-4 text-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4 py-4">
                    <div class="card-body">
                        <i class="fas fa-chart-pie fa-3x text-success mb-3"></i>
                        <h5 class="fw-bold text-dark">Laporan Lulusan</h5>
                        <p class="small text-muted mb-4">Statistik masa tunggu kerja, persentase bidang profesi alumni, dan rata-rata pendapatan.</p>
                        <a href="<?= $data['link_laporan_statistik'] ?? '#' ?>" target="_blank" class="fw-bold text-success text-decoration-none">Lihat Statistik <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4 py-4">
                    <div class="card-body">
                        <i class="fas fa-handshake fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold text-dark">Forum Alumni</h5>
                        <p class="small text-muted mb-4">Wadah silaturahmi IKA-STPM, berbagi lowongan kerja (Kampus Hiring), dan temu alumni tahunan.</p>
                        <a href="<?= $data['link_forum_komunitas'] ?? '#' ?>" target="_blank" class="fw-bold text-primary text-decoration-none">Gabung Komunitas <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4 py-4">
                    <div class="card-body">
                        <i class="fas fa-building fa-3x text-warning mb-3"></i>
                        <h5 class="fw-bold text-dark">Survei Pengguna (User)</h5>
                        <p class="small text-muted mb-4">Bagi perusahaan/instansi yang mempekerjakan alumni kami, mohon kesediaannya mengisi kuesioner mutu lulusan.</p>
                        <a href="<?= $data['link_kuesioner_user'] ?? '#' ?>" target="_blank" class="fw-bold text-warning text-decoration-none">Isi Kuesioner Instansi <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>