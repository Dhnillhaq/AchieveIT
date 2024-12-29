<section class="flex flex-col items-center justify-center min-h-screen">
    <h1 class="font-extrabold text-7xl text-[#75757580]">500</h1>
    <img src="../../public/img/notFound.png" alt="Page Not Found" class="w-1/5 mx-auto" />
    <h2 class="font-extrabold text-2xl text-[#75757580]">Internal Server Error</h2>
    <a
        href="<?= BASEURL; ?>/<?= (isset($_SESSION['user']) ? ($_SESSION['user']['role'] == 'Mahasiswa') ? 'Mahasiswa/index' : (($_SESSION['user']['role'] == 'Admin' || $_SESSION['user']['role'] == 'Super Admin') ? 'Admin/index' : (($_SESSION['user']['role'] == 'Ketua Jurusan') ? 'Kajur/index' : 'Auth/login')) : 'Auth/loginForm') ?>">
        <button class="bg-[#132145] text-white py-2 px-4 rounded-lg font-bold mt-8">
            Kembali Ke Homepage
        </button>
    </a>
</section>