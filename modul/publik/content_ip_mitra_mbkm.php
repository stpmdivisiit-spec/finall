<?php $data = $koneksi->query("SELECT * FROM prodi_mitra_informasi WHERE prodi='pemerintahan' AND kategori='mitra_mbkm'")->fetch_assoc(); ?>
<main>
    <div class="bg-success text-white pt-5 pb-10">
        <div class="container-xl px-4 pt-5">
            <h1 class="fw-bold mb-2"><i class="fab fa-envira me-2"></i> Program MBKM (Kampus Merdeka)</h1>
            <p class="lead text-white-50">Bebas belajar, bebas berkolaborasi, dan mengasah kompetensi di luar kampus.</p>
        </div>
    </div>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0 rounded-4 mb-5">
            <div class="card-body p-5">
                <h4 class="fw-bold text-center text-dark mb-5">Bentuk Kegiatan Pembelajaran (BKP) MBKM Prodi</h4>
                <div class="row gx-5">
                    <div class="col-md-6 mb-4 d-flex">
                        <div class="me-3"><div class="avatar-lg bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px;height: 60px;"><i class="fas fa-city fa-lg"></i></div></div>
                        <div><h6 class="fw-bold text-dark mb-1">Magang / Praktik Kerja</h6><p class="small text-muted">Mahasiswa mendapat kesempatan magang bersertifikat di dinas sosial, perusahaan mitra, atau lembaga non-profit nasional.</p></div>
                    </div>
                    <div class="col-md-6 mb-4 d-flex">
                        <div class="me-3"><div class="avatar-lg bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 60px;height: 60px;"><i class="fas fa-tractor fa-lg"></i></div></div>
                        <div><h6 class="fw-bold text-dark mb-1">Membangun Desa / KKN Tematik</h6><p class="small text-muted">Kegiatan sosial di pedesaan yang dirancang untuk mengaplikasikan ilmu guna menyelesaikan permasalahan desa.</p></div>
                    </div>
                    <div class="col-md-6 mb-4 d-flex">
                        <div class="me-3"><div class="avatar-lg bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 60px;height: 60px;"><i class="fas fa-search fa-lg"></i></div></div>
                        <div><h6 class="fw-bold text-dark mb-1">Penelitian / Riset</h6><p class="small text-muted">Menjadi asisten peneliti dalam proyek riset besar yang dilakukan oleh dosen maupun lembaga riset milik negara.</p></div>
                    </div>
                    <div class="col-md-6 mb-4 d-flex">
                        <div class="me-3"><div class="avatar-lg bg-info bg-opacity-10 text-info rounded-circle d-flex align-items-center justify-content-center" style="width: 60px;height: 60px;"><i class="fas fa-hands-helping fa-lg"></i></div></div>
                        <div><h6 class="fw-bold text-dark mb-1">Proyek Kemanusiaan</h6><p class="small text-muted">Mahasiswa terjun sebagai relawan yang membantu mengatasi bencana alam, masalah pengungsi, atau layanan sosial lainnya.</p></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <h6 class="text-dark mb-3">Ingin Menjadi Mitra MBKM Kami?</h6>
            <a href="<?= $data['link_tautan'] ?? '#' ?>" target="_blank" class="btn btn-success rounded-pill px-5 fw-bold shadow-sm"><i class="fas fa-paper-plane me-2"></i> Kirim Proposal Kemitraan</a>
        </div>
    </div>
</main>