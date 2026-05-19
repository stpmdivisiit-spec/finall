<?php
if(!defined('AKSES_DIIZINKAN')) exit;
?>

<style>
    .admin-cal-box { background: #fff; border-radius: 8px; border: 1px solid #e3e6ec; box-shadow: 0 4px 10px rgba(0,0,0,0.02); }
    .cal-grid-admin { display: grid; grid-template-columns: repeat(7, 1fr); border-bottom: 1px solid #e3e6ec; border-right: 1px solid #e3e6ec; }
    .cal-cell-admin { min-height: 105px; padding: 6px; border-left: 1px solid #e3e6ec; border-top: 1px solid #e3e6ec; background:#fff; position:relative;}
    .cal-cell-admin.empty { background: #f8f9fa; }
    .cal-cell-admin .num { text-align:right; font-weight:700; font-size:0.85rem; color:#4a5568;}
    
    .adm-pill { font-size:0.72rem; padding:4px 6px; border-radius:4px; color:#ffffff; margin-top:3px; font-weight:600; cursor:pointer; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; display:block; border-left: 3px solid rgba(0,0,0,0.25); transition: 0.1s;}
    .adm-pill:hover { opacity: 0.85; transform: translateY(-1px); }

    /* Palet Warna Identitas Unit Kerja Resmi */
    .pill-akademik { background-color: #0061f2; }
    .pill-pemerintahan { background-color: #f4a100; }
    .pill-sosiatri { background-color: #0cc27e; }
    .pill-kemahasiswaan { background-color: #e74a3b; }
    .pill-perpustakaan { background-color: #6900f2; }
    .pill-sekretariat { background-color: #5a5c69; }
</style>

<div class="container-fluid px-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-calendar-alt text-primary me-2"></i>Pengelolaan Kalender Akademik</h1>
        <button class="btn btn-primary btn-sm rounded-pill shadow-sm px-3" onclick="bukaModalFormNew()">
            <i class="fas fa-plus me-1"></i> Tambah Agenda Unit
        </button>
    </div>

    <div class="admin-cal-box mb-4">
        <div class="p-3 border-bottom bg-light d-flex justify-content-between align-items-center">
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-outline-dark" onclick="geserBulanAdmin(-1)"><i class="fas fa-chevron-left"></i></button>
                <button class="btn btn-sm btn-outline-dark" onclick="geserBulanAdmin(1)"><i class="fas fa-chevron-right"></i></button>
            </div>
            <h5 class="mb-0 fw-bold text-dark" id="txtBulanTahunAdmin">Memuat...</h5>
            <span class="badge bg-primary-soft text-primary text-uppercase px-3 py-2 border border-primary">Pusat Kendali Jadwal</span>
        </div>
        
        <div class="calendar-weekdays" style="display:grid; grid-template-columns: repeat(7,1fr); font-size:0.75rem; font-weight:800; background:#f8f9fa; text-align:center; border-bottom:1px solid #e3e6ec; padding:10px 0;">
            <div class="text-danger">Minggu</div><div>Senin</div><div>Selasa</div><div>Rabu</div><div>Kamis</div><div>Jumat</div><div>Sabtu</div>
        </div>

        <div class="cal-grid-admin" id="gridKalenderAdmin"></div>
    </div>
</div>

<div class="modal fade" id="modalCrudEvent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold text-dark" id="judulModalCrud">Form Agenda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="formEventAdmin" onsubmit="simpanDataEvent(event)">
                <div class="modal-body p-4">
                    <input type="hidden" id="inpIdEvent" name="id">

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">KATEGORI / UNIT KERJA PELAKSANA</label>
                        <select class="form-select text-dark" id="inpUnitOwner" name="unit_owner" required>
                            <option value="admin">Akademik & Rektorat</option>
                            <option value="pemerintahan">Prodi Ilmu Pemerintahan</option>
                            <option value="sosiatri">Prodi Pembangunan Sosial</option>
                            <option value="kemahasiswaan">Biro Kemahasiswaan & BEM</option>
                            <option value="perpustakaan">UPT Perpustakaan</option>
                            <option value="sekretariat">Sekretariat Kampus</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">NAMA AGENDA / KEGIATAN</label>
                        <input type="text" class="form-control text-dark" id="inpTitle" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">DESKRIPSI DETAIL</label>
                        <textarea class="form-control text-dark" id="inpDesc" name="description" rows="2"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label small fw-bold text-muted">TANGGAL MULAI</label>
                            <input type="date" class="form-control text-dark" id="inpStart" name="start_date" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label small fw-bold text-muted">TANGGAL SELESAI</label>
                            <input type="date" class="form-control text-dark" id="inpEnd" name="end_date" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-danger btn-sm me-auto" id="btnHapusEvent" style="display:none;" onclick="eksekusiHapusEvent()">Hapus</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm px-4">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let tglAdmin = new Date();
    let listEventAdmin = [];
    let modalObjAdmin;

    const namaBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

    function muatDataKalenderAdmin() {
        fetch('modul/publik/api_kalender.php')
            .then(r => r.json())
            .then(d => {
                listEventAdmin = d;
                renderGridAdmin();
            });
    }

    function renderGridAdmin() {
        const wadah = document.getElementById('gridKalenderAdmin');
        const label = document.getElementById('txtBulanTahunAdmin');
        if(!wadah) return;
        
        wadah.innerHTML = '';
        const thn = tglAdmin.getFullYear();
        const bln = tglAdmin.getMonth();
        
        label.innerText = `${namaBulan[bln]} ${thn}`;

        const startDay = new Date(thn, bln, 1).getDay();
        const totalDays = new Date(thn, bln + 1, 0).getDate();

        for(let i=0; i<startDay; i++) {
            let cl = document.createElement('div');
            cl.className = 'cal-cell-admin empty';
            wadah.appendChild(cl);
        }

        for(let d=1; d<=totalDays; d++) {
            let cl = document.createElement('div');
            cl.className = 'cal-cell-admin';
            cl.innerHTML = `<div class="num">${d}</div>`;

            const strDate = `${thn}-${String(bln+1).padStart(2,'0')}-${String(d).padStart(2,'0')}`;

            listEventAdmin.forEach(ev => {
                if(strDate >= ev.start && strDate <= ev.end) {
                    let p = document.createElement('div');
                    p.className = `adm-pill ${ev.classCSS}`;
                    p.innerText = ev.title;
                    
                    p.onclick = (e) => {
                        e.stopPropagation();
                        bukaModalEdit(ev);
                    };
                    cl.appendChild(p);
                }
            });

            wadah.appendChild(cl);
        }
    }

    function bukaModalFormNew() {
        document.getElementById('formEventAdmin').reset();
        document.getElementById('inpIdEvent').value = '';
        document.getElementById('judulModalCrud').innerText = 'Tambah Agenda Baru';
        document.getElementById('btnHapusEvent').style.display = 'none';
        
        if(!modalObjAdmin) modalObjAdmin = new bootstrap.Modal(document.getElementById('modalCrudEvent'));
        modalObjAdmin.show();
    }

    function bukaModalEdit(ev) {
        document.getElementById('formEventAdmin').reset();
        document.getElementById('judulModalCrud').innerText = 'Edit / Review Agenda';
        document.getElementById('inpIdEvent').value = ev.id;
        document.getElementById('inpUnitOwner').value = ev.unitCode; // Set dropdown unit kerja
        document.getElementById('inpTitle').value = ev.title;
        document.getElementById('inpDesc').value = ev.text;
        document.getElementById('inpStart').value = ev.start;
        document.getElementById('inpEnd').value = ev.end;
        
        document.getElementById('btnHapusEvent').style.display = 'block';

        if(!modalObjAdmin) modalObjAdmin = new bootstrap.Modal(document.getElementById('modalCrudEvent'));
        modalObjAdmin.show();
    }

    function simpanDataEvent(e) {
        e.preventDefault();
        const fForm = document.getElementById('formEventAdmin');
        const fData = new FormData(fForm);
        
        fetch('modul/publik/api_action_kalender.php?action=save', {
            method: 'POST',
            body: fData
        })
        .then(r => r.json())
        .then(res => {
            if(res.status === 'success') {
                modalObjAdmin.hide();
                muatDataKalenderAdmin();
            } else {
                alert("Gagal memproses data: " + res.message);
            }
        });
    }

    function eksekusiHapusEvent() {
        if(!confirm("Yakin ingin menghapus agenda terpilih ini?")) return;
        const id = document.getElementById('inpIdEvent').value;
        const fData = new FormData();
        fData.append('id', id);

        fetch('modul/publik/api_action_kalender.php?action=delete', {
            method: 'POST',
            body: fData
        })
        .then(r => r.json())
        .then(res => {
            if(res.status === 'success') {
                modalObjAdmin.hide();
                muatDataKalenderAdmin();
            } else {
                alert("Gagal menghapus: " + res.message);
            }
        });
    }

    function geserBulanAdmin(arah) {
        tglAdmin.setMonth(tglAdmin.getMonth() + arah);
        renderGridAdmin();
    }

    document.addEventListener("DOMContentLoaded", () => {
        muatDataKalenderAdmin();
    });
</script>