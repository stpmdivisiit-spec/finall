<main>
    <header class="page-header page-header-dark bg-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i data-feather="award"></i></div>
                            Surat Keputusan (SK) Ketua
                        </h1>
                        <div class="page-header-subtitle text-white-50">Arsip publik Surat Keputusan Pimpinan STPM Santa Ursula yang bersifat terbuka.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <style>
                    .dataTables_wrapper .dataTables_filter input:focus { border-color: #6c757d; box-shadow: 0 0 0 0.25rem rgba(108, 117, 125, 0.25); }
                    .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter { margin-bottom: 15px; }
                    .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate { margin-top: 15px; }
                </style>
                <div class="table-responsive">
                    <table id="tabelSK" class="table table-hover table-bordered mb-0 small" style="width:100%">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th width="20%">Nomor SK</th>
                                <th width="45%">Perihal / Judul SK</th>
                                <th width="15%" class="text-center">Tahun Ditetapkan</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="fw-bold text-dark">015/SK/STPM/I/2026</td>
                                <td>Penetapan Kalender Akademik Semester Genap Tahun Akademik 2025/2026</td>
                                <td class="text-center">2026</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-secondary px-3 rounded-pill small">Unduh PDF</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="fw-bold text-dark">112/SK/STPM/XII/2025</td>
                                <td>Pemberhentian dan Pengangkatan Ketua Program Studi Ilmu Pemerintahan</td>
                                <td class="text-center">2025</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-secondary px-3 rounded-pill small">Unduh PDF</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="fw-bold text-dark">085/SK/STPM/IX/2025</td>
                                <td>Penetapan Besaran Biaya SPP/BPP Mahasiswa Baru Angkatan 2025</td>
                                <td class="text-center">2025</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-secondary px-3 rounded-pill small">Unduh PDF</a></td>
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
    if ($.fn.DataTable.isDataTable('#tabelSK')) { $('#tabelSK').DataTable().destroy(); }
    var table = $('#tabelSK').DataTable({
        "paging": true, "ordering": true, "info": true, "searching": true, "responsive": true,
        "pageLength": 10, "columnDefs": [ { "orderable": false, "targets": [0, 4] } ],
        "language": { "search": "Cari SK:", "lengthMenu": "Tampilkan _MENU_ data" }
    });
    table.on('order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) { cell.innerHTML = i + 1; });
    }).draw();
});
</script>