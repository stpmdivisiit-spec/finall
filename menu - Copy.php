<?php
// menu.php

// Ambil modul aktif untuk class 'active'
$mod = $_GET['module'] ?? '';

// Array Role harus sama persis dengan database 'role_name'
$all_modules = [
    'admin'              => ['icon' => 'fa-shield',       'label' => 'Dashboard Admin'],
    'dosen_pemerintahan' => ['icon' => 'fa-university',   'label' => 'Prodi Ilmu Pemerintahan'],
    'dosen_sosiatri'     => ['icon' => 'fa-users',        'label' => 'Prodi Sosiatri'],
    'lp2m'               => ['icon' => 'fa-flask',        'label' => 'Lembaga LP2M'],
    'lpm'                => ['icon' => 'fa-check-square', 'label' => 'Lembaga LPM'],
    'staf_perpustakaan'  => ['icon' => 'fa-book',         'label' => 'Perpustakaan'],
    // Tambahkan role lain disini...
];

$user_roles = $_SESSION['roles'] ?? [];
?>

<li class="header">MAIN NAVIGATION</li>

<?php if (!empty($user_roles)): ?>
    
    <?php 
    // Loop semua kemungkinan menu
    foreach ($all_modules as $role_key => $data): 
        // Tampilkan menu JIKA user punya role tersebut ATAU user adalah admin
        if (in_array($role_key, $user_roles) || in_array('admin', $user_roles)):
            $active = ($mod == $role_key) ? 'active' : '';
            // Untuk admin, linknya ke modul tersebut. Untuk user biasa, juga sama.
            // Karena mapping folder sudah diatur di content.php
    ?>
        <li class="<?php echo $active; ?>">
            <a href="index.php?module=<?php echo $role_key; ?>">
                <i class="fa <?php echo $data['icon']; ?>"></i> 
                <span><?php echo $data['label']; ?></span>
            </a>
        </li>
    <?php 
        endif;
    endforeach; 
    ?>

<?php endif; ?>