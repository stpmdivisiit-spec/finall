<main>
    <header class="page-header page-header-dark bg-dark pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-warning">
                            <div class="page-header-icon text-warning"><i data-feather="database"></i></div>
                            Repository Publikasi Dosen
                        </h1>
                        <div class="page-header-subtitle">Basis data terpadu abstrak dan luaran riset dosen STPM Santa Ursula.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                
                <style>
                    .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter { margin-bottom: 15px; }
                    .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate { margin-top: 15px; }
                    .dataTables_wrapper .dataTables_filter input { border: 1px solid #ced4da; border-radius: 0.375rem; padding: 0.25rem 0.5rem; margin-left: 0.5rem; outline: none; }
                    .dataTables_wrapper .dataTables_filter input:focus { border-color: #ffc107; box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25); }
                    .dataTables_wrapper .dataTables_length select { border: 1px solid #ced4da; border-radius: 0.375rem; padding: 0.25rem 1.5rem 0.25rem 0.5rem; outline: none; }
                </style>

                <div class="table-responsive">
                    <table id="tabelRepoPublikasi" class="table table-hover table-bordered mb-0 small" style="width:100%">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th width="40%">Judul Publikasi / Artikel</th>
                                <th width="20%">Penulis (Author)</th>
                                <th width="20%">Nama Jurnal / Penerbit</th>
                                <th width="15%" class="text-center">Tautan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="fw-bold text-dark">Model Kepemimpinan Kepala Desa dalam Peningkatan BUMDes di Kabupaten Ende</td>
                                <td>Dr. Nama Dosen, M.Si.</td>
                                <td>Jurnal Ilmu Administrasi (SINTA 2)</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 rounded-pill small">Link DOI</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="fw-bold text-dark">Pendekatan Sosiologis Terhadap Penanganan Konflik Lahan Adat</td>
                                <td>Nama Dosen 2, S.Sos., M.A.</td>
                                <td class="text-center">Jurnal Masyarakat & Budaya</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 rounded-pill small">Link DOI</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="fw-bold text-dark">E-Government Implementation for Better Public Service Quality</td>
                                <td>Nama Dosen 3, S.IP., M.IP.</td>
                                <td class="text-center">International Journal of Public Admin</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 rounded-pill small">Link Scopus</a></td>
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
    if ($.fn.DataTable.isDataTable('#tabelRepoPublikasi')) { $('#tabelRepoPublikasi').DataTable().destroy(); }
    var table = $('#tabelRepoPublikasi').DataTable({
        "paging": true, "ordering": true, "info": true, "searching": true, "responsive": true,
        "pageLength": 10, "lengthMenu": [5, 10, 25, 50],
        "columnDefs": [ { "orderable": false, "targets": [0, 4] } ],
        "language": {
            "search": "Cari Publikasi:", "lengthMenu": "Tampilkan _MENU_ data", "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ publikasi",
            "infoEmpty": "Menampilkan 0 data", "zeroRecords": "Publikasi tidak ditemukan",
            "paginate": { "first": "Awal", "last": "Akhir", "next": "Selanjutnya", "previous": "Sebelumnya" }
        }
    });
    table.on('order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) { cell.innerHTML = i + 1; });
    }).draw();
});
</script>