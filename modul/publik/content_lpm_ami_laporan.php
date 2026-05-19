<main>
    <header class="page-header page-header-dark bg-dark pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="bar-chart-2"></i></div>
                            Laporan Hasil AMI
                        </h1>
                        <div class="page-header-subtitle">Publikasi transparansi hasil temuan audit tiap unit kerja per tahun akademik.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white p-4">
                <h5 class="mb-0 fw-bold text-dark"><i class="fas fa-archive text-info me-2"></i>Database Dokumen Laporan AMI</h5>
            </div>
            <div class="card-body p-4">
                
                <style>
                    .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter { margin-bottom: 15px; }
                    .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate { margin-top: 15px; }
                    .dataTables_wrapper .dataTables_filter input { border: 1px solid #ced4da; border-radius: 0.375rem; padding: 0.25rem 0.5rem; margin-left: 0.5rem; outline: none; }
                    .dataTables_wrapper .dataTables_filter input:focus { border-color: #0dcaf0; box-shadow: 0 0 0 0.25rem rgba(13, 202, 240, 0.25); }
                    .dataTables_wrapper .dataTables_length select { border: 1px solid #ced4da; border-radius: 0.375rem; padding: 0.25rem 1.5rem 0.25rem 0.5rem; outline: none; }
                </style>

                <div class="table-responsive">
                    <table id="tabelLaporanAMI" class="table table-hover table-bordered mb-0 small" style="width:100%">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th>Nama Dokumen Laporan</th>
                                <th width="20%">Unit Auditee</th>
                                <th width="10%" class="text-center">Tahun</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="fw-bold text-dark">Laporan Hasil AMI Siklus Ganjil 2025/2026</td>
                                <td>Prodi Ilmu Pemerintahan</td>
                                <td class="text-center">2026</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 py-1 rounded-pill small">Unduh</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="fw-bold text-dark">Laporan Hasil AMI Siklus Ganjil 2025/2026</td>
                                <td>Prodi Pembangunan Sosial</td>
                                <td class="text-center">2026</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 py-1 rounded-pill small">Unduh</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="fw-bold text-dark">Laporan Hasil AMI Unit Penunjang (Perpustakaan)</td>
                                <td>UPT Perpustakaan</td>
                                <td class="text-center">2025</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 py-1 rounded-pill small">Unduh</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td class="fw-bold text-dark">Laporan Ringkasan Eksekutif AMI Institusi</td>
                                <td>Ketua STPM</td>
                                <td class="text-center">2025</td>
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
    if ($.fn.DataTable.isDataTable('#tabelLaporanAMI')) { $('#tabelLaporanAMI').DataTable().destroy(); }
    var table = $('#tabelLaporanAMI').DataTable({
        "paging": true, "ordering": true, "info": true, "searching": true, "responsive": true,
        "pageLength": 10, "lengthMenu": [5, 10, 25, 50],
        "columnDefs": [ { "orderable": false, "targets": [0, 4] } ],
        "language": {
            "search": "Cari Laporan:", "lengthMenu": "Tampilkan _MENU_ data", "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
            "infoEmpty": "Menampilkan 0 data", "zeroRecords": "Laporan tidak ditemukan",
            "paginate": { "first": "Awal", "last": "Akhir", "next": "Selanjutnya", "previous": "Sebelumnya" }
        }
    });
    table.on('order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) { cell.innerHTML = i + 1; });
    }).draw();
});
</script>