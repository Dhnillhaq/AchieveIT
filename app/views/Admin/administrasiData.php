<section class="sm:ml-64 bg-blue-50 min-h-screen">
    <!-- Profil -->
    <?php require_once __DIR__ . '/../templates/profiles.php'; ?>

    <!-- Administrasi Data -->
    <section class="flex-col justify-start pt-20 md:pt-0 pl-6">
        <p class="font-bold text-3xl">Administrasi Data</p>
    </section>

    <!-- Cards Section -->
    <section class="p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Data Dosen -->
            <div class="flex flex-col justify-center bg-white rounded-lg shadow-lg p-6 space-y-2">
                <img src="../../../public/img/Data-Dosen.png" alt="logo" class="w-32 mx-auto">
                <a href="<?= BASEURL; ?>/Dosen/index">
                    <button
                        class="text-white text-xl w-full py-2 font-semibold bg-[#132145] rounded-lg">Data
                        Dosen</button>
                </a>
            </div>

            <!-- Pengaturan Prestasi -->
            <div class="flex flex-col justify-center bg-white rounded-lg shadow-lg p-6 space-y-2">
                <img src="../../../public/img/pengaturan.png" alt="logo" class="w-32 mx-auto">
                <a href="<?= BASEURL; ?>/Admin/pengaturanPrestasi">
                    <button
                        class="text-white text-xl w-full py-2 font-semibold bg-[#132145] rounded-lg">Pengaturan
                        Prestasi</button>
                </a>
            </div>

            <!-- Data Mahasiswa -->
            <div class="flex flex-col justify-center bg-white rounded-lg shadow-lg p-6 space-y-2">
                <img src="../../../public/img/data-mhs.png" alt="logo" class="w-32 mx-auto">
                <a href="<?= BASEURL; ?>/Mahasiswa/listMhs">
                    <button
                        class="text-white text-xl w-full py-2 font-semibold bg-[#132145] rounded-lg">Data
                        Mahasiswa</button>
                </a>
            </div>

            <!-- Validasi Akun -->
            <div class="flex flex-col justify-center bg-white rounded-lg shadow-lg p-6 space-y-2">
                <img src="../../../public/img/validasi.png" alt="logo" class="w-32 mx-auto">
                <a href="<?= BASEURL; ?>/Validasi">
                    <button
                        class="text-white text-xl w-full py-2 font-semibold bg-[#132145] rounded-lg">Validasi
                        Akun</button>
                </a>
            </div>

            <!-- Data Admin (Super Admin Only) -->
            <?php if ($_SESSION['user']['role'] == "Super Admin") { ?>
            <div class="flex flex-col justify-center bg-white rounded-lg shadow-lg p-6 space-y-2">
                <img src="../../../public/img/data-Admin.png" alt="logo" class="w-32 mx-auto">
                <a href="<?= BASEURL; ?>/Admin/adminList">
                    <button
                        class="text-white text-xl w-full py-2 font-semibold bg-[#132145] rounded-lg">Data
                        Admin</button>
                </a>
            </div>
            <?php } ?>
        </div>
    </section>
</section>
