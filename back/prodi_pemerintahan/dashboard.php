<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Pemerintahan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Selamat datang, <?php echo $_SESSION['username']; ?>!</li>
    </ol>
    
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Dosen</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="small text-white">...</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Total Tendik</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="small text-white">...</span>
                </div>
            </div>
        </div>
        </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-chart-area me-1"></i>
            Aktivitas Terkini
        </div>
        <div class="card-body">
            <p>Admin dapat mengakses semua modul dari menu sidebar.</p>
            <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
        </div>
    </div>
</div>