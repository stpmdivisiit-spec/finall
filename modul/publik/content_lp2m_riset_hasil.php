<main>
    <header class="page-header page-header-dark bg-dark pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-warning">
                            <div class="page-header-icon text-warning"><i data-feather="folder"></i></div>
                            Hasil & Laporan Penelitian
                        </h1>
                        <div class="page-header-subtitle">Repositori abstrak laporan akhir penelitian dosen STPM Santa Ursula.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <style>
                    .dataTables_wrapper .dataTables_filter input:focus { border-color: #ffc107; box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25); }
                </style>
                <div class="table-responsive">
                    <table id="tabelRisetLaporan" class="table table-hover table-bordered mb-0 small" style="width:100%">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th width="45%">Judul Penelitian</th>
                                <th width="20%">Ketua Peneliti</th>
                                <th width="15%" class="text-center">Tahun Pendanaan</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="fw-bold text-dark">Efektivitas Kebijakan Dana Desa dalam Pemulihan Ekonomi Pasca Pandemi</td>
                                <td>Dr. Nama Dosen, M.Si.</td>
                                <td class="text-center">2025</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 rounded-pill small">Abstrak</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="fw-bold text-dark">Model Pemberdayaan Perempuan Pesisir Melalui UMKM Tenun Ikat</td>
                                <td>Nama Dosen 2, S.Sos., M.A.</td>
                                <td class="text-center">2025</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 rounded-pill small">Abstrak</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    if ($.fn.DataTable.isDataTable('#tabelRisetLaporan')) { $('#tabelRisetLaporan').DataTable().destroy(); }
    $('#tabelRisetLaporan').DataTable({"pageLength": 10, "language": {"search": "Cari Judul:"}});
});
</script>