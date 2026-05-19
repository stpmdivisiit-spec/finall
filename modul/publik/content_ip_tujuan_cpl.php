<?php
// Query khusus Pemerintahan
$query = @mysqli_query($koneksi, "SELECT tujuan, cpl FROM prodi_tujuan_cpl WHERE prodi = 'pemerintahan' LIMIT 1");

if ($query && mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_array($query);
    $tujuan = $data['tujuan'];
    $cpl = $data['cpl'];
} else {
    $tujuan = "<p class='text-muted'>Tujuan belum diatur di database.</p>";
    $cpl = "<p class='text-muted'>CPL belum diatur di database.</p>";
}
?>

<main>
    <header class="page-header page-header-dark bg-primary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="crosshair"></i></div>
                            Tujuan & CPL
                        </h1>
                        <div class="page-header-subtitle">Target Lulusan Ilmu Pemerintahan STPM Santa Ursula.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4">
            
            <div class="col-lg-12 mb-4">
                <div class="card shadow-sm border-0 h-100 border-top border-3 border-primary">
                    <div class="card-header bg-transparent border-bottom p-4">
                        <h4 class="fw-bold text-dark mb-0"><i class="fas fa-bullseye text-primary me-2"></i>Tujuan Program Studi</h4>
                    </div>
                    <div class="card-body p-4 p-md-5 editor-content-primary">
                        <?= $tujuan; ?>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-12 mb-4">
                <div class="card shadow-sm border-0 h-100 border-top border-3 border-dark">
                    <div class="card-header bg-transparent border-bottom p-4">
                        <h4 class="fw-bold text-dark mb-0"><i class="fas fa-graduation-cap text-dark me-2"></i>Capaian Pembelajaran Lulusan (CPL)</h4>
                    </div>
                    <div class="card-body p-4 p-md-5 editor-content-primary">
                        <?= $cpl; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>

<style>
    .editor-content-primary ul { list-style-type: none; padding-left: 0; }
    .editor-content-primary ul li { position: relative; padding-left: 2rem; margin-bottom: 0.8rem; }
    .editor-content-primary ul li::before {
        content: "\f058"; font-family: "Font Awesome 5 Free"; font-weight: 900;
        color: #0061f2; position: absolute; left: 0; top: 2px; font-size: 1.1rem;
    }
</style>