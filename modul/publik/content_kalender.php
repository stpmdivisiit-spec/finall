<?php if(!defined('AKSES_DIIZINKAN')) exit; ?>

<style>
    .calendar-container { background: #ffffff; border-radius: 1rem; border: 1px solid #e3e6ec; overflow: hidden; box-shadow: 0 0.5rem 2rem rgba(33, 40, 50, 0.05); }
    .calendar-header-panel { background: #f8f9fa; padding: 1.5rem 2rem; border-bottom: 1px solid #e3e6ec; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem; }
    .calendar-grid { display: grid; grid-template-columns: repeat(7, 1fr); border-bottom: 1px solid #e3e6ec; border-right: 1px solid #e3e6ec; }
    .calendar-weekdays { display: grid; grid-template-columns: repeat(7, 1fr); background: #f1f3f7; text-align: center; font-weight: 800; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; color: #4a5568; border-bottom: 1px solid #e3e6ec; }
    .weekday-label { padding: 1rem 0; }
    .calendar-cell { background: #ffffff; min-height: 110px; padding: 0.5rem; border-top: 1px solid #e3e6ec; border-left: 1px solid #e3e6ec; position: relative; transition: all 0.2s ease; display: flex; flex-direction: column; gap: 4px; }
    .calendar-cell:hover { background: #fcfdfe; }
    .calendar-cell .day-number { font-weight: 700; color: #2d3748; font-size: 0.95rem; text-align: right; margin-bottom: 4px; padding-right: 4px; }
    .calendar-cell.empty-cell { background: #f8f9fa; }
    .calendar-cell.current-day { background: #fffbeb; }
    .calendar-cell.current-day .day-number { color: #d97706; background: #fef3c7; display: inline-block; width: 24px; height: 24px; text-align: center; line-height: 24px; border-radius: 50%; }

    /* Event Badges Pill Modern */
    .calendar-event-pill { font-size: 0.72rem; font-weight: 600; padding: 4px 8px; border-radius: 4px; color: #ffffff; cursor: pointer; text-overflow: ellipsis; overflow: hidden; white-space: nowrap; transition: transform 0.15s ease; border-left: 3px solid rgba(0,0,0,0.15); display: block; line-height: 1.3; }
    .calendar-event-pill:hover { transform: translateY(-1px); opacity: 0.95; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }

    /* Palet Warna Identitas Unit */
    .pill-akademik { background-color: #0061f2; }    /* Biru */
    .pill-pemerintahan { background-color: #f4a100; } /* Kuning */
    .pill-sosiatri { background-color: #0cc27e; }    /* Hijau */
    .pill-kemahasiswaan { background-color: #e74a3b; }/* Merah */
    .pill-perpustakaan { background-color: #6900f2; } /* Ungu */
    .pill-sekretariat { background-color: #5a5c69; }  /* Abu Gelap */

    .legend-dot { width: 12px; height: 12px; border-radius: 3px; display: inline-block; }
</style>

<main>
    <header class="page-header page-header-dark bg-primary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="calendar"></i></div>
                            Kalender Akademik Terpadu
                        </h1>
                        <div class="page-header-subtitle">Jadwal agenda kerja, perkuliahan, dan kegiatan kemahasiswaan seluruh unit ruang lingkup STPM.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="calendar-container">
            
            <div class="calendar-header-panel">
                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-outline-primary btn-sm px-3 rounded-2" onclick="navigasiBulan(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="btn btn-outline-primary btn-sm px-3 rounded-2" onclick="navigasiBulan(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    <button class="btn btn-primary btn-sm px-3 rounded-2 ms-2" onclick="setBulanIni()">Hari Ini</button>
                </div>
                <h3 class="mb-0 fw-black text-dark" id="labelBulanTahun">-</h3>
                <div class="text-muted small fw-bold" id="clock-indicator">STPM Santa Ursula</div>
            </div>

            <div class="calendar-weekdays">
                <div class="weekday-label text-danger">Minggu</div>
                <div class="weekday-label">Senin</div>
                <div class="weekday-label">Selasa</div>
                <div class="weekday-label">Rabu</div>
                <div class="weekday-label">Kamis</div>
                <div class="weekday-label">Jumat</div>
                <div class="weekday-label">Sabtu</div>
            </div>

            <div class="calendar-grid" id="wadahHariKalender"></div>
        </div>

        <div class="card border-0 shadow-sm rounded-3 mt-4">
            <div class="card-body p-4">
                <h6 class="fw-bold text-dark mb-3"><i class="fas fa-layer-group me-2 text-primary"></i>Kategori Penjadwalan Unit Kerja:</h6>
                <div class="row g-3">
                    <div class="col-md-4 col-6 d-flex align-items-center gap-2 small">
                        <span class="legend-dot pill-akademik"></span> <strong>Akademik & Rektorat</strong>
                    </div>
                    <div class="col-md-4 col-6 d-flex align-items-center gap-2 small">
                        <span class="legend-dot pill-pemerintahan"></span> <strong>Prodi Ilmu Pemerintahan</strong>
                    </div>
                    <div class="col-md-4 col-6 d-flex align-items-center gap-2 small">
                        <span class="legend-dot pill-sosiatri"></span> <strong>Prodi Pembangunan Sosial</strong>
                    </div>
                    <div class="col-md-4 col-6 d-flex align-items-center gap-2 small">
                        <span class="legend-dot pill-kemahasiswaan"></span> <strong>Biro Kemahasiswaan & BEM</strong>
                    </div>
                    <div class="col-md-4 col-6 d-flex align-items-center gap-2 small">
                        <span class="legend-dot pill-perpustakaan"></span> <strong>UPT Perpustakaan</strong>
                    </div>
                    <div class="col-md-4 col-6 d-flex align-items-center gap-2 small">
                        <span class="legend-dot pill-sekretariat"></span> <strong>Sekretariat Kampus</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    let tanggalSekarang = new Date();
    let dataEventKampus = [];

    const namaBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

    function initKalender() {
        // Ambil data lewat Fetch API (Sangat ringan & modern)
        fetch('modul/publik/api_kalender.php')
            .then(res => res.json())
            .then(data => {
                dataEventKampus = data;
                renderKalenderGrid();
            })
            .catch(err => {
                console.error("Gagal memuat data agenda:", err);
                renderKalenderGrid();
            });
    }

    function renderKalenderGrid() {
        const wadahGrid = document.getElementById('wadahHariKalender');
        const labelBulanTahun = document.getElementById('labelBulanTahun');
        
        if(!wadahGrid) return;
        wadahGrid.innerHTML = '';

        const tahun = tanggalSekarang.getFullYear();
        const bulan = tanggalSekarang.getMonth();

        labelBulanTahun.innerText = `${namaBulan[bulan]} ${tahun}`;

        const hariPertamaBulan = new Date(tahun, bulan, 1).getDay();
        const jumlahHariBulanIni = new Date(tahun, bulan + 1, 0).getDate();

        // 1. Render Sel Kosong untuk bulan sebelumnya
        for (let i = 0; i < hariPertamaBulan; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.className = 'calendar-cell empty-cell';
            wadahGrid.appendChild(emptyCell);
        }

        // 2. Render Angka Hari Isi Kalender
        const hariIni = new Date();
        for (let tgl = 1; tgl <= jumlahHariBulanIni; tgl++) {
            const cellHari = document.createElement('div');
            cellHari.className = 'calendar-cell';
            
            // Highlight jika hari ini
            if (tgl === hariIni.getDate() && bulan === hariIni.getMonth() && tahun === hariIni.getFullYear()) {
                cellHari.classList.add('current-day');
            }

            cellHari.innerHTML = `<div class="day-number">${tgl}</div>`;

            // Format tanggal pembanding (YYYY-MM-DD)
            const stringTanggalFormat = `${tahun}-${String(bulan + 1).padStart(2, '0')}-${String(tgl).padStart(2, '0')}`;

            // Cari agenda yang match dengan tanggal ini
            dataEventKampus.forEach(ev => {
                if(stringTanggalFormat >= ev.start && stringTanggalFormat <= ev.end) {
                    const pillEvent = document.createElement('div');
                    pillEvent.className = `calendar-event-pill ${ev.classCSS}`;
                    pillEvent.innerText = ev.title;
                    pillEvent.title = `${ev.title}\nUnit: ${ev.namaUnit}\nKet: ${ev.text}`;
                    
                    pillEvent.onclick = (e) => {
                        e.stopPropagation();
                        alert(`🗓️ AGENDA KAMPUS\n\nKegiatan: ${ev.title}\nPelaksana: ${ev.namaUnit}\nKeterangan: ${ev.text}\nWaktu: ${ev.start} s/d ${ev.end}`);
                    };
                    cellHari.appendChild(pillEvent);
                }
            });

            wadahGrid.appendChild(cellHari);
        }
    }

    function navigasiBulan(arah) {
        tanggalSekarang.setMonth(tanggalSekarang.getMonth() + arah);
        renderKalenderGrid();
    }

    function setBulanIni() {
        tanggalSekarang = new Date();
        renderKalenderGrid();
    }

    // Jalankan sistem saat halaman terbuka
    document.addEventListener("DOMContentLoaded", initKalender);
</script>