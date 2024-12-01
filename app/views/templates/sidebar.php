<?php
if (isset($_SESSION['user'])) { 
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
                    <li>
                        <a href="<?= BASEURL; ?>/Admin/superAdmin"
                            class="flex items-center  p-2 mt-10 text-[#FEC01A] rounded-lg bg-[#3063C559]">
                            <img src="../../../public/img/Home_fill.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Prestasi/create"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
                            <span class="flex-1 ms-3 whitespace-nowrap">Form Prestasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Prestasi/show"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
                            <img src="../../../public/img/File_dock_search_fill.png" alt="logo" class="w-5 h-5" />
                            <span class="flex-1 ms-3 whitespace-nowrap">Daftar Prestasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Admin/administrasiData"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
                            <img src="../../../public/img/Administrasi-data.png" alt="logo" class="w-5 h-5" />
                            <span class="flex-1 ms-3 whitespace-nowrap">Administrasi Data</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Admin/profil"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
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
                    <li>
                        <a href="<?= BASEURL; ?>/Admin/index"
                            class="flex items-center  p-2 mt-10 text-[#FEC01A] rounded-lg bg-[#3063C559]">
                            <img src="../../../public/img/Home_fill.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Prestasi/create"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
                            <span class="flex-1 ms-3 whitespace-nowrap">Form Prestasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Prestasi/show"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
                            <img src="../../../public/img/File_dock_search_fill.png" alt="logo" class="w-5 h-5" />
                            <span class="flex-1 ms-3 whitespace-nowrap">Daftar Prestasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Admin/administrasiData"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
                            <img src="../../../public/img/Administrasi-data.png" alt="logo" class="w-5 h-5" />
                            <span class="flex-1 ms-3 whitespace-nowrap">Administrasi Data</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Admin/profil"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
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
                        <div class="flex items-center justify-center text-4xl p-4 text-white rounded-lg ">
                            <span class="ms-3 font-bold">AchieveIT</span>
                        </div>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Kajur/index"
                            class="flex items-center  p-2 mt-10 text-[#FEC01A] rounded-lg bg-[#3063C559]">
                            <img src="../../../public/img/Home_fill.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Prestasi/show"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
                            <img src="../../../public/img/File_dock_search_fill.png" alt="logo" class="w-5 h-5" />
                            <span class="flex-1 ms-3 whitespace-nowrap">Daftar Prestasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Kajur/profilKajur"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
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
                            class="flex items-center  p-2 mt-10 text-[#FEC01A] rounded-lg bg-[#3063C559]">
                            <img src="../../../public/img/Home_fill.png" alt="logo" class="w-5 h-5">
                            <span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Prestasi/create"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
                            <span class="flex-1 ms-3 whitespace-nowrap">Form Prestasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Mahasiswa/prestasiSaya"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
                            <span class="flex-1 ms-3 whitespace-nowrap">Prestasi Saya</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Mahasiswa/profil"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
                            <span class="flex-1 ms-3 whitespace-nowrap">Lihat Profil</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <?php
    }
}
?>