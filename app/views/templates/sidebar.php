<?php
    if ($_SESSION['user']['role'] == "Super Admin") { ?>
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
                    <?php
                    $currentUrl = $_SERVER['REQUEST_URI'];
                    ?>
                    <li>
                        <a href="<?= BASEURL; ?>/Admin/superAdmin"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Admin/superAdmin') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Admin/superAdmin') !== false ? 'Home_fill' : 'Home_fill (1)' ?>.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Prestasi/create"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Prestasi/create') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Prestasi/create') !== false ? 'File_dock_add_fill (1)' : 'File_dock_add_fill' ?>.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Form Prestasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Prestasi/index"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Prestasi/index') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Prestasi/index') !== false ? 'File_dock_search_fill (1)' : 'File_dock_search_fill' ?>.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Daftar Prestasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Admin/administrasiData"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Admin/administrasiData') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Admin/administrasiData') !== false ? 'Administrasi-data (1)' : 'Administrasi-data' ?>.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Administrasi Data</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Admin/profil"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Admin/profil') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Admin/profil') !== false ? 'User_circle (1)' : 'User_circle' ?>.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Lihat Profil</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <?php
    }
    if ($_SESSION['user']['role'] == "Admin") { ?>
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
                    <?php
                    $currentUrl = $_SERVER['REQUEST_URI'];
                    ?>
                    <li>
                        <a href="<?= BASEURL; ?>/Admin/index"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Admin/index') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Admin/index') !== false ? 'Home_fill' : 'Home_fill (1)' ?>.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Prestasi/create"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Prestasi/create') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Prestasi/create') !== false ? 'File_dock_add_fill (1)' : 'File_dock_add_fill' ?>.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Form Prestasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Prestasi/index"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Prestasi/index') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Prestasi/index') !== false ? 'File_dock_search_fill (1)' : 'File_dock_search_fill' ?>.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Daftar Prestasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Admin/administrasiData"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Admin/administrasiData') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Admin/administrasiData') !== false ? 'Administrasi-data (1)' : 'Administrasi-data' ?>.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Administrasi Data</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Admin/profil"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Admin/profil') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Admin/profil') !== false ? 'User_circle (1)' : 'User_circle' ?>.png" alt="logo" class="w-5 h-5">
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
                    <?php
                    $currentUrl = $_SERVER['REQUEST_URI'];
                    ?>
                    <li>
                        <a href="<?= BASEURL; ?>/Kajur/index"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Kajur/index') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Kajur/index') !== false ? 'Home_fill' : 'Home_fill (1)' ?>.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Prestasi/index"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Prestasi/index') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Prestasi/index') !== false ? 'File_dock_search_fill (1)' : 'File_dock_search_fill' ?>.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Daftar Prestasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Kajur/profilKajur"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Kajur/profilKajur') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Kajur/profilKajur') !== false ? 'User_circle (1)' : 'User_circle' ?>.png" alt="logo" class="w-5 h-5">
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
                    <?php
                    $currentUrl = $_SERVER['REQUEST_URI'];
                    ?>
                    <li>
                        <a href="<?= BASEURL; ?>/Mahasiswa/index"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Mahasiswa/index') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Mahasiswa/index') !== false ? 'Home_fill' : 'Home_fill (1)' ?>.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Prestasi/create"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Prestasi/create') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Prestasi/create') !== false ? 'File_dock_add_fill (1)' : 'File_dock_add_fill' ?>.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Form Prestasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Mahasiswa/prestasiSaya"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Mahasiswa/prestasiSaya') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Mahasiswa/prestasiSaya') !== false ? 'File_dock_search_fill (1)' : 'File_dock_search_fill' ?>.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Prestasi Saya</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Mahasiswa/profil"
                            class="flex items-center p-2 <?= strpos($currentUrl, '/Mahasiswa/profil') !== false ? 'text-[#FEC01A] bg-[#3063C559]' : 'text-white hover:bg-[#3063C559]' ?> rounded-lg">
                            <img src="../../../public/img/<?= strpos($currentUrl, '/Mahasiswa/profil') !== false ? 'User_circle (1)' : 'User_circle' ?>.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Lihat Profil</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <?php
    }
?>