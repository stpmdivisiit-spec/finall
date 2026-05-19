<main>
    <header class="page-header page-header-dark bg-dark pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-warning">
                            <div class="page-header-icon text-warning"><i data-feather="folder"></i></div>
                            Laporan & Dokumentasi PkM
                        </h1>
                        <div class="page-header-subtitle">Arsip laporan akhir pengabdian masyarakat dosen dan luaran KKN Mahasiswa.</div>
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
                    .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter { margin-bottom: 15px; }
                    .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate { margin-top: 15px; }
                </style>

                <div class="table-responsive">
                    <table id="tabelAbdimasLaporan" class="table table-hover table-bordered mb-0 small" style="width:100%">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th width="40%">Judul Pengabdian / Kegiatan</th>
                                <th width="20%">Ketua Pelaksana</th>
                                <th width="15%" class="text-center">Tahun</th>
                                <th width="20%" class="text-center">Aksi / Luaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="fw-bold text-dark">Pendampingan Pembuatan Profil Desa Digital Berbasis Web di Desa XYZ</td>
                                <td>Tim KKN Tematik Kelompok 5</td>
                                <td class="text-center">2026</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 rounded-pill small">Lihat Laporan</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="fw-bold text-dark">Pelatihan Penyusunan Rencana Strategis BUMDes bagi Aparatur Desa</td>
                                <td>Dr. Nama Dosen, M.Si.</td>
                                <td class="text-center">2025</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 rounded-pill small">Lihat Laporan</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="fw-bold text-dark">Penyuluhan Pencegahan Stunting Melalui Edukasi Gizi Masyarakat Pedesaan</td>
                                <td>Nama Dosen 2, S.Sos., M.A.</td>
                                <td class="text-center">2025</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 rounded-pill small">Lihat Laporan</a></td>
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
    if ($.fn.DataTable.isDataTable('#tabelAbdimasLaporan')) { $('#tabelAbdimasLaporan').DataTable().destroy(); }
    var table = $('#tabelAbdimasLaporan').DataTable({
        "paging": true, "ordering": true, "info": true, "searching": true, "responsive": true,
        "pageLength": 10, "lengthMenu": [5, 10, 25, 50],
        "columnDefs": [ { "orderable": false, "targets": [0, 4] } ],
        "language": {
            "search": "Cari Judul:", "lengthMenu": "Tampilkan _MENU_ data", "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
            "infoEmpty": "Menampilkan 0 data", "zeroRecords": "Laporan tidak ditemukan",
            "paginate": { "first": "Awal", "last": "Akhir", "next": "Selanjutnya", "previous": "Sebelumnya" }
        }
    });
    table.on('order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) { cell.innerHTML = i + 1; });
    }).draw();
});
</script>