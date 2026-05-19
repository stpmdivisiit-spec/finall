<main>
    <header class="page-header page-header-dark bg-danger pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="bar-chart-2"></i></div>
                            Laporan Kinerja Tahunan
                        </h1>
                        <div class="page-header-subtitle">Kompilasi data prestasi, serapan anggaran kegiatan, dan pelacakan alumni.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white p-4">
                <h5 class="mb-0 fw-bold"><i class="fas fa-archive me-2"></i>Arsip Laporan Kemahasiswaan & Akuntabilitas</h5>
            </div>
            <div class="card-body p-4">
                
                <style>
                    .dataTables_wrapper .dataTables_length, 
                    .dataTables_wrapper .dataTables_filter {
                        margin-bottom: 15px; /* Memberi jarak antara pencarian dengan tabel */
                    }
                    .dataTables_wrapper .dataTables_info, 
                    .dataTables_wrapper .dataTables_paginate {
                        margin-top: 15px; /* Memberi jarak antara info/paginasi dengan tabel */
                    }
                    .dataTables_wrapper .dataTables_filter input {
                        border: 1px solid #ced4da;
                        border-radius: 0.375rem;
                        padding: 0.25rem 0.5rem;
                        margin-left: 0.5rem;
                        outline: none;
                    }
                    .dataTables_wrapper .dataTables_filter input:focus {
                        border-color: #e81500;
                        box-shadow: 0 0 0 0.25rem rgba(232, 21, 0, 0.25);
                    }
                    .dataTables_wrapper .dataTables_length select {
                        border: 1px solid #ced4da;
                        border-radius: 0.375rem;
                        padding: 0.25rem 1.5rem 0.25rem 0.5rem;
                        outline: none;
                    }
                </style>

                <div class="table-responsive">
                    <table id="tabelLaporanKema" class="table table-hover table-bordered mb-0 small" style="width:100%">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th>Nama Dokumen Laporan Kinerja</th>
                                <th width="15%" class="text-center">Tahun</th>
                                <th width="15%" class="text-center">Ukuran File</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="fw-bold text-dark"><i class="fas fa-file-pdf text-danger me-2"></i> Laporan Tahunan Kinerja Layanan & Prestasi Mahasiswa</td>
                                <td class="text-center text-muted">2025</td>
                                <td class="text-center text-muted">4.2 MB</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-danger px-3 py-1 rounded-pill small"><i class="fas fa-download me-1"></i> Unduh</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="fw-bold text-dark"><i class="fas fa-file-pdf text-danger me-2"></i> Laporan Statistik Hasil Survei Tracer Study Alumni Terpadu</td>
                                <td class="text-center text-muted">2025</td>
                                <td class="text-center text-muted">2.8 MB</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-danger px-3 py-1 rounded-pill small"><i class="fas fa-download me-1"></i> Unduh</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="fw-bold text-dark"><i class="fas fa-file-pdf text-danger me-2"></i> Laporan Tahunan Kinerja Layanan & Prestasi Mahasiswa</td>
                                <td class="text-center text-muted">2024</td>
                                <td class="text-center text-muted">3.9 MB</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-danger px-3 py-1 rounded-pill small"><i class="fas fa-download me-1"></i> Unduh</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td class="fw-bold text-dark"><i class="fas fa-file-pdf text-danger me-2"></i> Ringkasan Eksekutif Beasiswa & Kesejahteraan Mahasiswa</td>
                                <td class="text-center text-muted">2024</td>
                                <td class="text-center text-muted">1.5 MB</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-danger px-3 py-1 rounded-pill small"><i class="fas fa-download me-1"></i> Unduh</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td class="fw-bold text-dark"><i class="fas fa-file-pdf text-danger me-2"></i> Laporan Evaluasi Diri (LED) Layanan Kemahasiswaan</td>
                                <td class="text-center text-muted">2023</td>
                                <td class="text-center text-muted">5.1 MB</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-danger px-3 py-1 rounded-pill small"><i class="fas fa-download me-1"></i> Unduh</a></td>
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
    if ($.fn.DataTable.isDataTable('#tabelLaporanKema')) {
        $('#tabelLaporanKema').DataTable().destroy();
    }
    
    // Inisialisasi DataTables
    var table = $('#tabelLaporanKema').DataTable({
        "paging": true,
        "ordering": true,
        "info": true,
        "searching": true,
        "responsive": true,
        "pageLength": 10,
        "lengthMenu": [5, 10, 25, 50],
        // Menonaktifkan ikon urutan (sorting) di kolom No (kolom ke-0) dan Aksi (kolom ke-4)
        "columnDefs": [
            { "orderable": false, "targets": [0, 4] }
        ],
        "language": {
            "search": "Cari Dokumen:",
            "lengthMenu": "Tampilkan _MENU_ data",
            "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ dokumen",
            "infoEmpty": "Menampilkan 0 hingga 0 dari 0 dokumen",
            "infoFiltered": "(disaring dari _MAX_ total dokumen)",
            "zeroRecords": "Dokumen tidak ditemukan",
            "paginate": {
                "first": "Awal",
                "last": "Akhir",
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            }
        }
    });

    // Opsional: Membuat nomor urut otomatis (dinamis) jika data diurutkan atau di-search
    table.on('order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
});
</script>