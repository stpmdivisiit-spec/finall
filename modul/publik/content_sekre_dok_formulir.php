<main>
    <header class="page-header page-header-dark bg-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i data-feather="file-text"></i></div>
                            Formulir Tata Usaha
                        </h1>
                        <div class="page-header-subtitle text-white-50">Kumpulan berkas dan borang permohonan administrasi cetak.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white p-4">
                <h5 class="fw-bold text-dark mb-0"><i class="fas fa-copy text-secondary me-2"></i>Database Formulir Kosong</h5>
            </div>
            <div class="card-body p-4">
                <style>
                    .dataTables_wrapper .dataTables_filter input:focus { border-color: #6c757d; box-shadow: 0 0 0 0.25rem rgba(108, 117, 125, 0.25); }
                    .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter { margin-bottom: 15px; }
                    .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate { margin-top: 15px; }
                </style>
                <div class="table-responsive">
                    <table id="tabelFormSekre" class="table table-hover table-bordered mb-0 small" style="width:100%">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th width="45%">Nama Formulir / Dokumen</th>
                                <th width="20%" class="text-center">Peruntukan</th>
                                <th width="15%" class="text-center">Format</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="fw-bold text-dark">Formulir Permohonan Legalisir Ijazah & Transkrip</td>
                                <td class="text-center">Alumni</td>
                                <td class="text-center"><span class="badge bg-danger-soft text-danger">PDF</span></td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-secondary px-3 rounded-pill small">Unduh</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="fw-bold text-dark">Formulir Pengajuan Cuti Akademik (BSS)</td>
                                <td class="text-center">Mahasiswa</td>
                                <td class="text-center"><span class="badge bg-primary-soft text-primary">Ms. Word</span></td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-secondary px-3 rounded-pill small">Unduh</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="fw-bold text-dark">Formulir Peminjaman Ruangan & Fasilitas Kampus</td>
                                <td class="text-center">Dosen / ORMAWA</td>
                                <td class="text-center"><span class="badge bg-danger-soft text-danger">PDF</span></td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-secondary px-3 rounded-pill small">Unduh</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td class="fw-bold text-dark">Surat Kuasa Pengambilan Dokumen Akademik</td>
                                <td class="text-center">Umum / Alumni</td>
                                <td class="text-center"><span class="badge bg-primary-soft text-primary">Ms. Word</span></td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-secondary px-3 rounded-pill small">Unduh</a></td>
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
    if ($.fn.DataTable.isDataTable('#tabelFormSekre')) { $('#tabelFormSekre').DataTable().destroy(); }
    var table = $('#tabelFormSekre').DataTable({
        "paging": true, "ordering": true, "info": true, "searching": true, "responsive": true,
        "pageLength": 10, "columnDefs": [ { "orderable": false, "targets": [0, 4] } ],
        "language": { "search": "Cari Formulir:", "lengthMenu": "Tampilkan _MENU_ data" }
    });
    table.on('order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) { cell.innerHTML = i + 1; });
    }).draw();
});
</script>