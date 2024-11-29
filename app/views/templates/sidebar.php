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
                <a href="<?= BASEURL; ?>/"
                    class="flex items-center  p-2 mt-10 text-[#FEC01A] rounded-lg bg-[#3063C559]">
                    <img src="../../../public/img/Home_fill.png" alt="logo" class="w-5 h-5">
                    <span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
                </a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/Mahasiswa/formPrestasi"
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
                <a href="<?= BASEURL; ?>/" class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
                    <img src="../../../public/img/File_dock_search_fill.png" alt="logo" class="w-5 h-5" />
                    <span class="flex-1 ms-3 whitespace-nowrap">Daftar Prestasi</span>
                </a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/" class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
                    <img src="../../../public/img/Administrasi-data.png" alt="logo" class="w-5 h-5" />
                    <span class="flex-1 ms-3 whitespace-nowrap">Administrasi Data</span>
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