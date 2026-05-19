<main>
    <header class="page-header page-header-dark bg-dark pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="file-text"></i></div>
                            Formulir & SOP Mutu
                        </h1>
                        <div class="page-header-subtitle">Repositori borang kelengkapan Audit Mutu Internal (AMI) dan evaluasi akademik.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white p-4">
                <h5 class="mb-0 fw-bold text-dark"><i class="fas fa-archive text-info me-2"></i>Database Formulir LPM</h5>
            </div>
            <div class="card-body p-4">
                
                <style>
                    .dataTables_wrapper .dataTables_length, 
                    .dataTables_wrapper .dataTables_filter { margin-bottom: 15px; }
                    .dataTables_wrapper .dataTables_info, 
                    .dataTables_wrapper .dataTables_paginate { margin-top: 15px; }
                    .dataTables_wrapper .dataTables_filter input {
                        border: 1px solid #ced4da; border-radius: 0.375rem;
                        padding: 0.25rem 0.5rem; margin-left: 0.5rem; outline: none;
                    }
                    .dataTables_wrapper .dataTables_filter input:focus {
                        border-color: #0dcaf0; box-shadow: 0 0 0 0.25rem rgba(13, 202, 240, 0.25);
                    }
                    .dataTables_wrapper .dataTables_length select {
                        border: 1px solid #ced4da; border-radius: 0.375rem;
                        padding: 0.25rem 1.5rem 0.25rem 0.5rem; outline: none;
                    }
                </style>

                <div class="table-responsive">
                    <table id="tabelFormulirLPM" class="table table-hover table-bordered mb-0 small" style="width:100%">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th>Nama Formulir / SOP</th>
                                <th width="20%">Kategori Kebutuhan</th>
                                <th width="15%" class="text-center">Format</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="fw-bold text-dark">Borang Audit Mutu Internal (AMI) Prodi</td>
                                <td>Evaluasi & Audit</td>
                                <td class="text-center"><span class="badge bg-primary-soft text-primary">Ms. Word</span></td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 py-1 rounded-pill small">Unduh</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="fw-bold text-dark">Kuesioner Evaluasi Dosen oleh Mahasiswa (EDOM)</td>
                                <td>Pendidikan</td>
                                <td class="text-center"><span class="badge bg-danger-soft text-danger">PDF</span></td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 py-1 rounded-pill small">Unduh</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="fw-bold text-dark">SOP Penyusunan Soal Ujian Tengah/Akhir Semester</td>
                                <td>Pendidikan</td>
                                <td class="text-center"><span class="badge bg-danger-soft text-danger">PDF</span></td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 py-1 rounded-pill small">Unduh</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td class="fw-bold text-dark">Formulir Pengecekan Kesesuaian RPS dan Silabus</td>
                                <td>Pendidikan</td>
                                <td class="text-center"><span class="badge bg-success-soft text-success">Ms. Excel</span></td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 py-1 rounded-pill small">Unduh</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td class="fw-bold text-dark">Lembar Tinjauan Manajemen (RTM)</td>
                                <td>Pengendalian</td>
                                <td class="text-center"><span class="badge bg-primary-soft text-primary">Ms. Word</span></td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 py-1 rounded-pill small">Unduh</a></td>
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
    if ($.fn.DataTable.isDataTable('#tabelFormulirLPM')) {
        $('#tabelFormulirLPM').DataTable().destroy();
    }
    
    var table = $('#tabelFormulirLPM').DataTable({
        "paging": true,
        "ordering": true,
        "info": true,
        "searching": true,
        "responsive": true,
        "pageLength": 10,
        "lengthMenu": [5, 10, 25, 50],
        "columnDefs": [ { "orderable": false, "targets": [0, 4] } ],
        "language": {
            "search": "Cari Dokumen:",
            "lengthMenu": "Tampilkan _MENU_ formulir",
            "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ formulir",
            "infoEmpty": "Menampilkan 0 hingga 0 dari 0 formulir",
            "infoFiltered": "(disaring dari _MAX_ total data)",
            "zeroRecords": "Formulir tidak ditemukan",
            "paginate": { "first": "Awal", "last": "Akhir", "next": "Selanjutnya", "previous": "Sebelumnya" }
        }
    });

    table.on('order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
});
</script>