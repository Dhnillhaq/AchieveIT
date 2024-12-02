<section class="relative bg-cover bg-center h-min-screen" style="background-image: url('../../../public/img/gedung-jti.png');">
  <div class="absolute inset-0 bg-[#132145D4] bg-opacity-80"></div>
  <nav class="text-white p-4 container mx-auto flex justify-between items-center relative z-10 px-8 py-8">
    <div class="navbar-text flex justify-between items-center gap-2">
        <img src="../../../public/img/logo-poltek-outline.png" alt="logo" class="w-8 h-8" />
        <img src="../../../public/img/logo-JTI-outline.png" alt="logo" class="w-8 h-8" />
      <h1 class="font-extrabold text-4xl pl-4">AchieveIt</h1>
    </div>
    <div class="navbar-button flex right-0 text-[16px]">
      <a href="<?= BASEURL; ?>" class="text-white hover:underline py-2 mx-2">Beranda</a>
      <a href="#fitur-utama" class="text-white hover:underline py-2 mx-2">Fitur Utama</a>
      <a href="#daftar-prestasi" class="text-white hover:underline py-2 mx-2 flex-shrink-0">Daftar Prestasi</a>
      <a href="<?= BASEURL; ?>/Auth/login">
        <button class="border-spacing-2 font-bold bg-white text-blue-950 rounded-lg py-2 mx-2 w-24 h-10">
          Masuk
        </button>
      </a>
    </div>
  </nav>

  <section id="selamat-datang" class="relative text-justify flex justify-items-start items-center z-20">
    <div class="p-10 mt-20 ml-16 pb-32">
      <h1 class="text-white text-7xl mb-2 font-bold">Selamat Datang di</h1>
      <h1 class="text-[#FEC01A] text-7xl mb-2 font-bold">AchieveIt!</h1>
      <p class="max-w-3xl m-0 text-white text-[18px]">
        AchieveIt adalah Lorem ipsum dolor sit amet, consectetur adipisicing
        elit, sed do eiusmod tempor inicilabore et dolore magna aliqua. ut
        enim ad minim veniam, quis nostrud exercitation ullamco laborisnisi
        ut aliquip ex ea commodo consequat. Duis aute irure dolor in
        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Exceptur sint occaecat cupidatat non proident, sunt in
        culpa qui officia desereutn.
      </p>
      <a href="<?= BASEURL; ?>/Auth/login">
        <button class="border-spacing-2 font-bold bg-white text-blue-950 rounded-lg py-2 mt-8 w-24 h-10">
          Masuk
        </button>
      </a>
    </div>
  </section>
</section>

<div class="relative -mt-52 -mb-20  flex justify-end mr-10 z-10">
  <!-- Gambar di antara dua section -->
  <img src="../../../public/img/Logo_achieveIT.png" alt="Gambar di antara section" class="w-48 h-auto" />
</div>

<section id="fitur-utama" class="relative pt-32 flex flex-col space-y-10 px-28">
  <div class=" flex flex-col items-center text-center">
    <h2 class="text-2xl font-bold text-[#132145] mb-4 bg-[#FEC01A] rounded-lg px-4 py-1 ">Fitur Utama Kami</h2>
    <p class="text-[#132145] mt-2 ">
      <span class="font-semibold">Achieve IT</span> dirancang khusus untuk membantu<br>
      pengelolaan dan pelaporan prestasi<br> mahasiswa secara terstruktur dan efisien.
    </p>
  </div>
  </div>

  <div class="flex flex-row justify-between">
    <div
      class="bg-white w-1/4 p-4 rounded-lg drop-shadow-lg flex flex-col justify-center items-center text-center font-semibold">
      <img src="../../../public/img/Manajemen_Prestasi.png" alt="logo" class="w-10 h-auto py-3">
      Manajemen Prestasi<br> Mahasiswa JTI
    </div>

    <div
      class="bg-white w-1/4 p-4 rounded-lg drop-shadow-lg flex flex-col justify-center items-center text-center font-semibold">
      <img src="../../../public/img/Perankingan_Mhs.png" alt="logo" class="w-10 h-auto py-3">
      Perankingan Mahasiswa<br> JTI Berprestasi
    </div>

    <div
      class="bg-white w-1/4 p-4 rounded-lg drop-shadow-lg flex flex-col justify-center items-center text-center font-semibold">
      <img src="../../../public/img/Riwayat.png" alt="logo" class="w-10 h-auto py-3">
      Riwayat atau Daftar<br> Prestasi Mahasiswa JTI
    </div>
  </div>

  <div class="flex flex-ro justify-center space-x-24">
    <div
      class="bg-white w-1/4 p-4 rounded-lg drop-shadow-lg flex flex-col justify-center items-center text-center font-semibold">
      <img src="../../../public/img/Laporan.png" alt="logo" class="w-10 h-auto py-3">
      Laporan Prestasi<br> Mahasiswa JTI
    </div>

    <div
      class="bg-white w-1/4 p-4 rounded-lg drop-shadow-lg flex flex-col justify-center items-center text-center font-semibold">
      <img src="../../../public/img/Analisis.png" alt="logo" class="w-10 h-auto py-3">
      Analisis Prestasi<br> Mahasiswa JTI
    </div>
  </div>
  </div>
</section>

<section id="daftar-prestasi" class="pt-20 flex items-center justify-center min-h-screen">
  <div class="">
    <div class="row-start-2 flex flex-col items-center text-center">
      <h2 class="text-center text-2xl font-bold text-[#132145] mb-2 bg-[#FEC01A] rounded-lg px-4 py-1 ">Daftar
        Mahasiswa JTI Berprestasi</h2>
      <p class="text-center text-[16px]"><span class="font-bold">Achieve IT</span> menghadirkan daftar
        mahasiswa berprestasi dari Jurusan Teknologi Informasi yang tersusun <br>
        berdasarkan capaian dan poin prestasi mereka. Daftar ini memberikan apresiasi kepada mahasiswa dengan <br>
        pencapaian tertinggi, sekaligus menginspirasi rekan lainnya untuk terus aktif dan unggul di berbagai bidang
        <br>
        kompetisi.
      </p>
    </div>

    <!-- dari Components -->
    <section id="daftar-prestasi" class="">
      <div class="p-5 mb-10 ">
        <div class="flex justify-between">
          <div class="flex">
            <form id="formFilter" action="<?= BASEURL; ?>/#daftar-prestasi" method="POST">
              <div class="flex items-center bg-white w-full p-2 space-x-1 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
									<img src="../../../public/img/Search (1).png" alt="logo" class="w-5 h-5">
									<input type="text" id="cari-mhs" placeholder="" class="w-full flex focus:outline-none" name="keyword"/>
								</div>

          </div>
          <div class="flex right-0">
            <div class="flex items-center mr-3">

              <span class="">Lihat</span>
              <select name="limit" onchange="submitForm()"
                class="mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="10" selected>10</option>
                <option value="20">20</option>
                <option value="50">50</option>
              </select>

              <span class="">entri</span>
              <select name="year" onchange="submitForm()"
                class="right-0 mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024" selected>2024</option>
              </select>

              </form>
            </div>
          </div>
        </div>

        <section class="mt-10 overflow-x-auto bg-white shadow-md rounded-2xl">
          <table class="min-w-full bg-white">
            <thead>
              <tr>
                <th class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">
                  RANKING
                </th>
                <th class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">
                  NIM
                </th>
                <th class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">
                  NAMA MAHASISWA
                </th>
                <th class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">
                  PRODI
                </th>
                <th class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">
                  TOTAL POIN
                </th>
              </tr>
            </thead>
            <tbody class="text-gray-700">
              <?php
              // Looping data mahasiswa ke dalam tabel
              $rank = 1;
              foreach ($data['prestasi'] as $mahasiswa) { ?>

                <tr>
                  <td class='py-2 px-4 border border-blue-950'><?= $rank ?></td>
                  <td class='py-2 px-4 border border-blue-950'><?= $mahasiswa['nim'] ?></td>
                  <td class='py-2 px-4 border border-blue-950'><?= $mahasiswa['nama_mahasiswa'] ?></td>
                  <td class='py-2 px-4 border border-blue-950'><?= $mahasiswa['prodi'] ?></td>
                  <td class='py-2 px-4 border border-blue-950'><?= $mahasiswa['total_poin'] ?></td>
                </tr>
                <?php
                $rank++;
              }
              ?>
            </tbody>
          </table>
            </section>
      </div>
    </section>
    <!-- //php include __DIR__ . '/../../components/DaftarMahasiswaBerprestasi.php';  -->
  </div>
</section>

<section class="p-28">
  <div class="bg-[#FEC01A] rounded-lg container mx-auto flex justify-between items-center relative z-10 px-8 py-4">
    <div class="flex justify-between gap-6">
      <h1 class="font-extrabold text-2xl">Ingin Mengakses Fitur Lainnya?</h1>
    </div>

    <div class="flex right-0 text-[16px]">
      <a href="<?= BASEURL; ?>/Auth/login">
        <button class="border-spacing-2 font-bold bg-white text-blue-950 rounded-lg py-2 mx-2 w-24 h-10">
          Masuk
        </button>
      </a>
    </div>
  </div>
</section>

<footer class="bg-[#132145] text-white flex flex-col items-center  py-10 px-16 ">
  <div class="flex flex-row justify-between w-full">
    <div class="flex justify-start">
      <img src="../../../public/img/Logo_achieveIT.png" alt="logo" class="w-8 h-10">
      <div class="flex-col">
        <p class="font-extrabold text-2xl">Achieve IT</p>
        <p class="font-extralight text-sm">Jurusan Teknologi Informatika <br>
          Politeknik Negeri Malang</p>
      </div>
    </div>

    <div class="w-0.5 h-20 bg-white"></div>

    <div class="flex justify-center items-start">
      <a href="#selamat-datang" class="text-white hover:underline py-2 mx-2">Beranda</a>
      <a href="#selamat-datang" class="text-white hover:underline py-2 mx-2">Fitur Utama</a>
      <a href="#daftar-prestasi" class="text-white hover:underline py-2 mx-2 flex-shrink-0">Daftar Prestasi</a>
    </div>

    <div class="flex justify-start space-x-2">
      <img src="../../../public/img/location_pin.png" alt="logo" class="w-5 h-5">
      <p class="font-extralight text-sm">Jl. Soekarno-Hatta No. 9 Malang 65141 <br>Po.Box 04 Malang <br>Telepon : +62
        (0341) 404424 – 404425 <br>Faks : +62 (0341) 404420</p>
    </div>
  </div>

  <div class="flex justify-center space-x-5 pt-10">
    <img src="../../../public/img/Instagram.png" alt="logo" class="w-5 h-5">
    <img src="../../../public/img/Globe.png" alt="logo" class="w-5 h-5">
    <img src="../../../public/img/Youtube.png" alt="logo" class="w-5 h-5">
  </div>

  <div class=" flex justify-center pt-5">
    <p class="font-semibold">
      2024 &copy; AchieveIT
    </p>
  </div>
</footer>
</body>

</html>