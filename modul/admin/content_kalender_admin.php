<style>
    /* Card Styling a la SB Admin Pro */
    .card-kalender { border: none; border-radius: 0.5rem; box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15); background: #fff;}
    .card-kalender-header { background-color: #fff; border-bottom: 1px solid #e3e6ec; padding: 1.5rem; display: flex; align-items: center; justify-content: space-between; border-radius: 0.5rem 0.5rem 0 0;}
    .text-primary-custom { color: #0061f2; font-weight: 700; }

    /* Calendar Styling */
    .calendar-table { width: 100%; table-layout: fixed; margin-bottom: 0; }
    .calendar-table th { text-align: center; text-transform: uppercase; font-size: 0.75rem; font-weight: 800; color: #69707a; padding: 15px 0; border-bottom: 2px solid #e3e6ec; background-color: #f8f9fa; }
    .calendar-day { width: 14.28%; height: 120px; vertical-align: top !important; border: 1px solid #e3e6ec; padding: 5px !important; transition: background-color 0.2s; }
    .calendar-day:hover { background-color: #fafbfc; }
    .calendar-day .date { text-align: right; font-weight: 700; color: #363d47; margin-bottom: 5px; }
    .calendar-day.outside .date { color: #d4dae3; }
    .calendar-day.selected { background-color: #eef2f7; }
    .today { background-color: #fff8e1 !important; }

    /* Event Styling Modern */
    .event { font-size: 0.75rem; padding: 4px 8px; margin-bottom: 4px; border-radius: 4px; cursor: pointer; color: white; font-weight: 600; box-shadow: 0 2px 4px rgba(0,0,0,0.05); transition: transform 0.1s; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;}
    .event:hover { transform: translateY(-1px); opacity: 0.9; }

    /* Warna Kategori Event Modern */
    .event-success { background-color: #0cc27e; } /* Hijau Teal */
    .event-info { background-color: #36b9cc; } /* Cyan */
    .event-warning { background-color: #f4a100; } /* Orange */
    .event-important { background-color: #e74a3b; } /* Merah */
    .event-inverse { background-color: #5a5c69; } /* Abu Gelap */
    
    /* Navigasi Kalender */
    .cal-nav-btn { border: 1px solid #e3e6ec; color: #69707a; background: white; padding: 5px 10px; border-radius: 4px; font-weight: 600; }
    .cal-nav-btn:hover { background-color: #f8f9fa; color: #0061f2; }
    .cal-nav-btn.active { background-color: #0061f2; color: white; border-color: #0061f2; }
</style>

<div class="container-fluid px-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-calendar-alt me-2 text-primary"></i>Manajemen Kalender Akademik</h1>
        <button class="btn btn-primary shadow-sm" onclick="openModal()">
            <i class="fas fa-plus fa-sm text-white-50 me-1"></i> Tambah Kegiatan
        </button>
    </div>

    <div class="card-kalender mb-4">
        <div class="card-kalender-header">
            <span class="text-primary-custom">Jadwal STPM Santa Ursula</span>
        </div>
        <div class="card-body p-0">
            <div id="holder" class="table-responsive">
                <div class="text-center py-5 text-muted"><i class="fas fa-spinner fa-spin me-2"></i> Memuat Kalender...</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="eventModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-light">
        <h5 class="modal-title fw-bold text-primary" id="modalTitle">Tambah Kegiatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <form id="eventForm">
            <input type="hidden" id="eventId" name="id">
            <div class="mb-3">
                <label class="form-label small text-muted fw-bold">JUDUL KEGIATAN</label>
                <input type="text" class="form-control" id="eventTitle" name="title" required>
            </div>
            <div class="mb-3">
                <label class="form-label small text-muted fw-bold">DESKRIPSI</label>
                <textarea class="form-control" id="eventDesc" name="description" rows="3"></textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label small text-muted fw-bold">MULAI</label>
                    <input type="datetime-local" class="form-control" id="eventStart" name="start_date" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label small text-muted fw-bold">SELESAI</label>
                    <input type="datetime-local" class="form-control" id="eventEnd" name="end_date" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label small text-muted fw-bold">WARNA / UNIT (KATEGORI)</label>
                <select class="form-select" id="eventCat" name="category">
                    <option value="event-info">Biru - Akademik & Umum</option>
                    <option value="event-success">Hijau - Pembangunan Sosial</option>
                    <option value="event-warning">Kuning - Ilmu Pemerintahan</option>
                    <option value="event-important">Merah - Kemahasiswaan</option>
                    <option value="event-inverse">Abu-abu - Libur / Lainnya</option>
                </select>
            </div>
        </form>
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-outline-danger me-auto" id="btnDelete" style="display:none;" onclick="deleteEvent()">
            <i class="fas fa-trash"></i> Hapus
        </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary px-4" onclick="saveEvent()">Simpan Jadwal</button>
      </div>
    </div>
  </div>
</div>

<script type="text/tmpl" id="tmpl">
  {{ 
  var date = date || new Date(), month = date.getMonth(), year = date.getFullYear(), first = new Date(year, month, 1), last = new Date(year, month + 1, 0), startingDay = first.getDay(), thedate = new Date(year, month, 1 - startingDay), dayclass = lastmonthcss, today = new Date(), i, j; 
  if (mode === 'week') { thedate = new Date(date); thedate.setDate(date.getDate() - date.getDay()); first = new Date(thedate); last = new Date(thedate); last.setDate(last.getDate()+6); } else if (mode === 'day') { thedate = new Date(date); first = new Date(thedate); last = new Date(thedate); last.setDate(thedate.getDate() + 1); }
  }}
  <div class="d-flex justify-content-between align-items-center p-3 border-bottom bg-light">
      <div class="d-flex align-items-center">
        <div class="btn-group me-3">
            <button class="cal-nav-btn js-cal-prev"><i class="fas fa-chevron-left"></i></button>
            <button class="cal-nav-btn js-cal-next"><i class="fas fa-chevron-right"></i></button>
        </div>
        <h4 class="mb-0 fw-bold text-dark">
            {{ if (mode !== 'day') { }} {{: months[month] }} {{: year}} {{ } else { }} {{: date.toDateString() }} {{ } }}
        </h4>
      </div>
      <div>
        <div class="btn-group" role="group">
            <button class="cal-nav-btn js-cal-option {{: first.toDateInt() <= today.toDateInt() && today.toDateInt() <= last.toDateInt() ? 'active':'' }}" data-date="{{: today.toISOString()}}" data-mode="month">Bulan Ini</button>
            <button class="cal-nav-btn js-cal-option {{: mode==='month'? 'active':'' }}" data-mode="month">Bln</button>
            <button class="cal-nav-btn js-cal-option {{: mode==='week'? 'active':'' }}" data-mode="week">Mgg</button>
        </div>
      </div>
  </div>
  <table class="calendar-table">
    {{ if (mode ==='month' || mode ==='week') { }}
    <thead>
      <tr class="c-weeks">{{ for (i = 0; i < 7; i++) { }}<th class="c-name">{{: days[i] }}</th>{{ } }}</tr>
    </thead>
    <tbody>
      {{ for (j = 0; j < 6 && (j < 1 || mode === 'month'); j++) { }}
      <tr>
        {{ for (i = 0; i < 7; i++) { }}
        {{ if (thedate > last) { dayclass = nextmonthcss; } else if (thedate >= first) { dayclass = thismonthcss; } }}
        <td class="calendar-day {{: dayclass }} {{: thedate.toDateCssClass() }} {{: daycss[i] }} js-cal-option" data-date="{{: thedate.toISOString() }}">
          <div class="date">{{: thedate.getDate() }}</div>
          {{ thedate.setDate(thedate.getDate() + 1);}}
        </td>
        {{ } }}
      </tr>
      {{ } }}
    </tbody>
    {{ } }}
  </table>
</script>

<script>
    // PERHATIAN: Pemanggilan file jQuery dan Bootstrap dihapus dari sini 
    // karena sudah di-load secara otomatis oleh footer/header Admin Anda.

    // Helper Fungsi
    $.extend({ quicktmpl: function (template) {return new Function("obj","var p=[],print=function(){p.push.apply(p,arguments);};with(obj){p.push('"+template.replace(/[\r\t\n]/g," ").split("{{").join("\t").replace(/((^|\}\})[^\t]*)'/g,"$1\r").replace(/\t:(.*?)\}\}/g,"',$1,'").split("\t").join("');").split("}}").join("p.push('").split("\r").join("\\'")+"');}return p.join('');")} });
    $.extend(Date.prototype, {
        toDateCssClass: function() { return '_' + this.getFullYear() + '_' + (this.getMonth() + 1) + '_' + this.getDate(); },
        toDateInt: function() { return ((this.getFullYear()*12) + this.getMonth())*32 + this.getDate(); },
        toTimeString: function() { var hours=this.getHours(), minutes=this.getMinutes(), hour=(hours>12)?(hours-12):hours, ampm=(hours>=12)?' pm':' am'; if(hours===0 && minutes===0){return '';} if(minutes>0){return hour+':'+minutes+ampm;} return hour+ampm; }
    });

    // Plugin Kalender Core
    (function ($) {
        var t = $.quicktmpl($('#tmpl').get(0).innerHTML);
        function calendar($el, options) {
            $el.on('click', '.js-cal-prev', function () {
                switch(options.mode) { case 'month': options.date.setMonth(options.date.getMonth() - 1); break; case 'week': options.date.setDate(options.date.getDate() - 7); break; } draw();
            }).on('click', '.js-cal-next', function () {
                switch(options.mode) { case 'month': options.date.setMonth(options.date.getMonth() + 1); break; case 'week': options.date.setDate(options.date.getDate() + 7); break; } draw();
            }).on('click', '.js-cal-option', function () {
                var $t = $(this), o = $t.data(); if (o.date) { o.date = new Date(o.date); } $.extend(options, o); draw();
            }).on('click', '.event', function (e) {
                e.stopPropagation(); 
                var index = $(this).data('index');
                var data = options.data[index];
                openModal(data);
                return false;
            });
            
            function monthAddEvent(index, event) {
                var $event = $('<div/>', {'class': 'event ' + (event.class || 'event-info'), text: event.title, title: event.title, 'data-index': index}),
                    e = new Date(event.start), day = $('.' + e.toDateCssClass());
                if (day.length) { day.append($event); }
            }

            function draw() {
                $el.html(t(options));
                $('.' + (new Date()).toDateCssClass()).addClass('today');
                if (options.data && options.data.length) { $.each(options.data, monthAddEvent); }
            }
            draw();     
        }
        
        $.fn.calendar = function (options) {
            return this.each(function () { calendar($(this), $.extend({}, {
                days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
                months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                date: (new Date()), daycss: ["c-sunday", "", "", "", "", "", "c-saturday"], todayname: "Hari Ini",
                thismonthcss: "current", lastmonthcss: "outside", nextmonthcss: "outside", mode: "month", data: []
            }, options)); });
        };
    })(jQuery);

    // Variabel Modal Bootstrap
    var myModal;

    // 1. Fetch Data dari Database
    function loadEvents() {
        $.ajax({
            url: 'api.php?action=fetch', // Sesuaikan path ini jika api.php beda folder
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var events = response.map(function(item) {
                    return { id: item.id, title: item.title, text: item.text, start: new Date(item.start), end: new Date(item.end), class: item.class };
                });
                $('#holder').empty();
                $('#holder').calendar({ data: events });
            }
        });
    }

    // 2. Open Modal (Tambah/Edit)
    function openModal(data = null) {
        if(!myModal) myModal = new bootstrap.Modal(document.getElementById('eventModal'));
        
        if (data) {
            $('#modalTitle').text('Edit Kegiatan');
            $('#eventId').val(data.id);
            $('#eventTitle').val(data.title);
            $('#eventDesc').val(data.text);
            $('#eventStart').val(toISOLocal(data.start));
            $('#eventEnd').val(toISOLocal(data.end));
            $('#eventCat').val(data.class);
            $('#btnDelete').show();
        } else {
            $('#modalTitle').text('Tambah Kegiatan Baru');
            $('#eventForm')[0].reset();
            $('#eventId').val('');
            $('#btnDelete').hide();
        }
        myModal.show();
    }

    // 3. Save Data (Create / Update)
    function saveEvent() {
        var formData = $('#eventForm').serialize();
        $.post('api.php?action=save', formData, function(response) { // Sesuaikan path api.php
            if(response.status === 'success' || response.status === 'success_local') {
                myModal.hide();
                loadEvents();
            } else {
                alert('Gagal menyimpan: ' + (response.message || response.error));
            }
        }, 'json');
    }

    // 4. Delete Data
    function deleteEvent() {
        if(confirm('Yakin ingin menghapus kegiatan ini?')) {
            var id = $('#eventId').val();
            $.post('api.php?action=delete', {id: id}, function(response) { // Sesuaikan path api.php
                if(response.status === 'success') {
                    myModal.hide();
                    loadEvents();
                } else {
                    alert('Gagal menghapus');
                }
            }, 'json');
        }
    }

    // Convert Date to Datetime-Local format for input
    function toISOLocal(d) {
        if (isNaN(d)) return '';
        var z = n => ('0' + n).slice(-2);
        return d.getFullYear()+'-'+z(d.getMonth()+1)+'-'+z(d.getDate())+'T'+z(d.getHours())+':'+z(d.getMinutes());
    }

    // Jalankan saat dokumen siap
    $(document).ready(function() {
        // Deklarasi ulang modal setelah DOM Load
        myModal = new bootstrap.Modal(document.getElementById('eventModal'));
        loadEvents();
    });
</script>