<?php
//Kondisi di administrasi data
// Array berisi semua path yang perlu diperiksa
//kurang validasi akun
$currentUrl = $_SERVER['REQUEST_URI'];
$activePaths = [
    '/Admin/administrasiData',
    'Dosen/index',
    'Dosen/Create',
    'Dosen/edit/',
    'PeranDosen/create',
    'PeranDosen/edit/',
    'Mahasiswa/listMhs',
    'Prodi/create',
    'Prodi/edit/',
    'Mahasiswa/create',
    'Mahasiswa/edit/',
    'Mahasiswa/show/',
    'PeranMahasiswa/Create',
    'PeranMahasiswa/edit/',
    'Admin/pengaturanPrestasi',
    'Kategori/Create',
    'Kategori/edit/',
    'TingkatKompetisi/Create',
    'TingkatKompetisi/edit/',
    'TingkatPenyelenggara/Create',
    'TingkatPenyelenggara/edit/',
    'Juara/Create',
    'Juara/edit/',
    'Admin/adminList',
    'Admin/create',
    'Admin/edit/',



];

// Periksa apakah salah satu path cocok dengan URL saat ini
$isActive = false;
foreach ($activePaths as $path) {
    if (strpos($currentUrl, $path) !== false) {
        $isActive = true;
        break;
    }
}

// Tentukan kelas aktif
$activeClass = $isActive ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]';
$imageName = $isActive ? 'Administrasi-data(1)' : 'Administrasi-data';


if ($_SESSION['user']['role'] == "Super Admin" || $_SESSION['user']['role'] == "Admin") { ?>
    <!-- sidebar -->
    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-[#132145]">
            <ul class="space-y-2 font-medium">
                <li>
                    <div class="flex items-center justify-center text-4xl p-4 text-white rounded-lg ">
                        <span class="ms-3 font-bold">AchieveIT</span>
                    </div>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>/Admin/index"
                        class="flex items-center p-2 <?= strpos($currentUrl, '/Admin/index') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                        <img src="../../../public/img/<?= strpos($currentUrl, '/Admin/index') !== false ? 'Home_fill' : 'Home_fill (1)' ?>.png"
                            alt="logo" class="w-5 h-5">
                        <span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>/Prestasi/create"
                        class="flex items-center p-2 <?= strpos($currentUrl, '/Prestasi/create') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                        <img src="../../../public/img/<?= strpos($currentUrl, '/Prestasi/create') !== false ? 'File_dock_add_fill (1)' : 'File_dock_add_fill' ?>.png"
                            alt="logo" class="w-5 h-5">
                        <span class="flex-1 ms-3 whitespace-nowrap">Form Prestasi</span>
                    </a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>/Prestasi/index"
                        class="flex items-center p-2 <?= strpos($currentUrl, '/Prestasi/index') !== false || strpos($currentUrl, 'Prestasi/show/') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                        <img src="../../../public/img/<?= strpos($currentUrl, '/Prestasi/index') !== false || strpos($currentUrl, 'Prestasi/show/') !== false ? 'File_dock_search_fill (1)' : 'File_dock_search_fill' ?>.png"
                            alt="logo" class="w-5 h-5">
                        <span class="flex-1 ms-3 whitespace-nowrap">Daftar Prestasi</span>
                    </a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>/Admin/administrasiData"
                        class="flex items-center p-2 <?= $activeClass ?> rounded-lg">
                        <img src="../../../public/img/<?= $imageName ?>.png" alt="logo" class="w-5 h-5">
                        <span class="flex-1 ms-3 whitespace-nowrap">Administrasi Data</span>
                    </a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>/Admin/profil"
                        class="flex items-center p-2 <?= strpos($currentUrl, '/Admin/profil') !== false || strpos($currentUrl, 'Auth/changePass') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                        <img src="../../../public/img/<?= strpos($currentUrl, '/Admin/profil') !== false || strpos($currentUrl, 'Auth/changePass') !== false ? 'User_circle (1)' : 'User_circle' ?>.png"
                            alt="logo" class="w-5 h-5">
                        <span class="flex-1 ms-3 whitespace-nowrap">Lihat Profil</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <?php
}
if ($_SESSION['user']['role'] == "Ketua Jurusan") { ?>
    <!-- sidebar -->
    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-[#132145]">
            <ul class="space-y-2 font-medium">
                <li>
                    <div class="flex items-center justify-center text-4xl p-4 text-white rounded-lg">
                        <span class="ms-3 font-bold">AchieveIT</span>
                    </div>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>/Kajur/index"
                        class="flex items-center p-2 <?= strpos($currentUrl, '/Kajur/index') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                        <img src="../../../public/img/<?= strpos($currentUrl, '/Kajur/index') !== false ? 'Home_fill' : 'Home_fill (1)' ?>.png"
                            alt="logo" class="w-5 h-5">
                        <span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>/Prestasi/index"
                        class="flex items-center p-2 <?= strpos($currentUrl, '/Prestasi/index') !== false || strpos($currentUrl, 'Prestasi/show/') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                        <img src="../../../public/img/<?= strpos($currentUrl, '/Prestasi/index') !== false || strpos($currentUrl, 'Prestasi/show/') !== false ? 'File_dock_search_fill (1)' : 'File_dock_search_fill' ?>.png"
                            alt="logo" class="w-5 h-5">
                        <span class="flex-1 ms-3 whitespace-nowrap">Daftar Prestasi</span>
                    </a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>/Kajur/profil"
                        class="flex items-center p-2 <?= strpos($currentUrl, '/Kajur/profil') !== false || strpos($currentUrl, 'Auth/changePass') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                        <img src="../../../public/img/<?= strpos($currentUrl, '/Kajur/profil') !== false || strpos($currentUrl, 'Auth/changePass') !== false ? 'User_circle (1)' : 'User_circle' ?>.png"
                            alt="logo" class="w-5 h-5">
                        <span class="flex-1 ms-3 whitespace-nowrap">Lihat Profil</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <?php
}

if ($_SESSION['user']['role'] == "Mahasiswa") { ?>
    <!-- sidebar -->
    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-[#132145]">
            <ul class="space-y-2 font-medium">
                <li>
                    <div class="flex items-center justify-center text-4xl p-4 text-white rounded-lg ">
                        <span class="ms-3 font-bold">AchieveIT</span>
                    </div>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>/Mahasiswa/index"
                        class="flex items-center p-2 <?= strpos($currentUrl, '/Mahasiswa/index') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                        <img src="../../../public/img/<?= strpos($currentUrl, '/Mahasiswa/index') !== false ? 'Home_fill' : 'Home_fill (1)' ?>.png"
                            alt="logo" class="w-5 h-5">
                        <span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>/Prestasi/create"
                        class="flex items-center p-2 <?= strpos($currentUrl, '/Prestasi/create') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                        <img src="../../../public/img/<?= strpos($currentUrl, '/Prestasi/create') !== false ? 'File_dock_add_fill (1)' : 'File_dock_add_fill' ?>.png"
                            alt="logo" class="w-5 h-5">
                        <span class="flex-1 ms-3 whitespace-nowrap">Form Prestasi</span>
                    </a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>/Mahasiswa/prestasiSaya"
                        class="flex items-center p-2 <?= strpos($currentUrl, '/Mahasiswa/prestasiSaya') !== false || strpos($currentUrl, 'Prestasi/show/') !== false || strpos($currentUrl, 'prestasi/edit') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                        <img src="../../../public/img/<?= strpos($currentUrl, '/Mahasiswa/prestasiSaya') !== false || strpos($currentUrl, 'Prestasi/show/') !== false || strpos($currentUrl, 'prestasi/edit') !== false ? 'File_dock_search_fill (1)' : 'File_dock_search_fill' ?>.png"
                            alt="logo" class="w-5 h-5">
                        <span class="flex-1 ms-3 whitespace-nowrap">Prestasi Saya</span>
                    </a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>/Mahasiswa/profil"
                        class="flex items-center p-2 <?= strpos($currentUrl, '/Mahasiswa/profil') !== false || strpos($currentUrl, 'Auth/changePass') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                        <img src="../../../public/img/<?= strpos($currentUrl, '/Mahasiswa/profil') !== false || strpos($currentUrl, 'Auth/changePass') !== false ? 'User_circle (1)' : 'User_circle' ?>.png"
                            alt="logo" class="w-5 h-5">
                        <span class="flex-1 ms-3 whitespace-nowrap">Lihat Profil</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <?php
}
?>