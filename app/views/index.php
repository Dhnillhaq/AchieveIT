<!-- Navigation -->
<section class="relative bg-cover bg-center min-h-screen" style="background-image: url('../../../public/img/gedung-jti.png');">
  <div class="absolute inset-0 bg-[#132145D4] bg-opacity-80"></div>
  <nav class="text-white p-4 container mx-auto flex flex-row justify-between items-center relative z-10 px-1 md:px-8 py-4 md:py-8">
    <div class="navbar-text flex justify-between items-center gap-2 mb-4 md:mb-0">
      <img src="../../../public/img/logo-poltek-outline.png" alt="logo" class="w-6 md:w-8 h-6 md:h-8" />
      <img src="../../../public/img/logo-JTI-outline.png" alt="logo" class="w-6 md:w-8 h-6 md:h-8" />
      <h1 class="font-extrabold text-2xl md:text-4xl pl-2 md:pl-4">AchieveIT</h1>
    </div>
    <div class="navbar-button flex flex-row items-center text-[14px] md:text-[16px] space-y-1 md:space-y-0 space-x-2 md:space-x-4">
      <a href="<?= BASEURL; ?>" class="text-white hover:underline py-1 md:py-2 ">Beranda</a>
      <a href="#fitur-utama" class="text-white hover:underline py-1 md:py-2 ">Fitur Utama</a>
      <a href="#daftar-prestasi" class="text-white hover:underline py-1 md:py-2 ">Daftar Prestasi</a>
      <a href="<?= BASEURL; ?>/<?= (isset($_SESSION['user']) ? ($_SESSION['user']['role'] == 'Mahasiswa') ? 'Mahasiswa/index' : (($_SESSION['user']['role'] == 'Admin' || $_SESSION['user']['role'] == 'Super Admin') ? 'Admin/index' : (($_SESSION['user']['role'] == 'Ketua Jurusan') ? 'Kajur/index' : 'Auth/login')) : 'Auth/loginForm') ?>">
        <button class="border-spacing-2 font-bold bg-white text-blue-950 rounded-lg py-2 px-4 mt-2 md:mt-0">
          <?= (isset($_SESSION['user']) ? 'Dashboard' : 'Masuk') ?>
        </button>
      </a>
    </div>
  </nav>

<!-- Welcome Section -->
  <section id="selamat-datang" class="relative text-left flex justify-items-start items-center z-20">
    <div class="p-4 md:p-10 mt-10 md:mt-20 mx-4 md:ml-16 pb-16 md:pb-32">
      <h1 class="text-white text-4xl md:text-7xl mb-2 font-bold">Selamat Datang di</h1>
      <h1 class="text-[#FEC01A] text-4xl md:text-7xl mb-2 font-bold">AchieveIt!</h1>
      <p class="max-w-3xl m-0 text-white text-[16px] md:text-[18px]">
        AchieveIt adalah aplikasi berbasis website yang membantu pencatatan, pengelolaan, dan analisis prestasi
        mahasiswa Jurusan Teknologi Informasi di Politeknik Negeri Malang. Aplikasi ini bertujuan untuk mendorong
        mahasiswa lebih aktif dalam berkompetisi serta mempermudah akses data prestasi bagi mahasiswa, admin, dan ketua
        jurusan.
      </p>
      <a href="<?= BASEURL; ?>/<?= (isset($_SESSION['user']) ? ($_SESSION['user']['role'] == 'Mahasiswa') ? 'Mahasiswa' : (($_SESSION['user']['role'] == 'Admin' || $_SESSION['user']['role'] == 'Super Admin') ? 'Admin' : (($_SESSION['user']['role'] == 'Ketua Jurusan') ? 'Kajur' : 'Auth/login')) : 'Auth/loginForm') ?>">
        <button class="border-spacing-2 font-bold bg-white text-blue-950 rounded-lg py-2 mt-8 px-4">
          <?= (isset($_SESSION['user']) ? 'Dashboard' : 'Masuk') ?>
        </button>
      </a>
    </div>
  </section>
</section>

<!-- Logo Section -->
<div class="relative -mt-32 md:-mt-52 -mb-10 md:-mb-20 flex justify-end mr-0 md:mr-10 z-10">
  <img src="../../../public/img/Logo_achieveIT.png" alt="Gambar di antara section" class="w-32 md:w-48 h-auto" />
</div>

<!-- Features Section -->
<section id="fitur-utama" class="relative pt-16 md:pt-32 flex flex-col space-y-4 md:space-y-10 px-4 md:px-28">
  <div class="flex flex-col items-center text-center">
    <h2 class="text-xl md:text-2xl font-bold text-[#132145] mb-4 bg-[#FEC01A] rounded-lg px-4 py-1">Fitur Utama Kami</h2>
    <p class="text-[#132145] mt-2 text-sm md:text-base">
      <span class="font-semibold">Achieve IT</span> dirancang khusus untuk membantu<br>
      pengelolaan dan pelaporan prestasi<br> mahasiswa secara terstruktur dan efisien.
    </p>
  </div>

  <div class="flex flex-row  justify-between space-y-2 space-x-2 md:space-y-0 md:space-x-4">
    <div class="bg-white w-1/3 md:w-1/4 p-4 rounded-lg drop-shadow-lg flex flex-col justify-center items-center text-center font-semibold">
      <img src="../../../public/img/Manajemen_Prestasi.png" alt="logo" class="w-8 md:w-10 h-auto py-3">
      Manajemen Prestasi<br> Mahasiswa JTI
    </div>

    <div class="bg-white w-1/3 md:w-1/4 p-4 rounded-lg drop-shadow-lg flex flex-col justify-center items-center text-center font-semibold">
      <img src="../../../public/img/Perankingan_Mhs.png" alt="logo" class="w-8 md:w-10 h-auto py-3">
      Perankingan Mahasiswa<br> JTI Berprestasi
    </div>

    <div class="bg-white w-1/3 md:w-1/4 p-4 rounded-lg drop-shadow-lg flex flex-col justify-center items-center text-center font-semibold">
      <img src="../../../public/img/Riwayat.png" alt="logo" class="w-8 md:w-10 h-auto py-3">
      Riwayat atau Daftar<br> Prestasi Mahasiswa JTI
    </div>
  </div>

  <div class="flex flex-row justify-center space-y-2 space-x-2 md:space-y-0 md:space-x-16">
    <div class="bg-white w-1/3 md:w-1/4 p-4 rounded-lg drop-shadow-lg flex flex-col justify-center items-center text-center font-semibold">
      <img src="../../../public/img/Laporan.png" alt="logo" class="w-8 md:w-10 h-auto py-3">
      Laporan Prestasi<br> Mahasiswa JTI
    </div>

    <div class="bg-white w-1/3 md:w-1/4 p-4 rounded-lg drop-shadow-lg flex flex-col justify-center items-center text-center font-semibold">
      <img src="../../../public/img/Analisis.png" alt="logo" class="w-8 md:w-10 h-auto py-3">
      Analisis Prestasi<br> Mahasiswa JTI
    </div>
  </div>
</section>



<!-- Achievement List Section -->
<section id="daftar-prestasi" class="pt-16 md:pt-20 px-4 md:px-0">
  <div class="max-w-7xl mx-auto">
    <div class="flex flex-col items-center text-center">
      <h2 class="text-xl md:text-2xl font-bold text-[#132145] mb-2 bg-[#FEC01A] rounded-lg px-4 py-1">Daftar Mahasiswa JTI Berprestasi</h2>
      <p class="text-center text-sm md:text-base">
        <span class="font-bold">Achieve IT</span> menghadirkan daftar mahasiswa berprestasi dari Jurusan Teknologi Informasi yang tersusun
        berdasarkan capaian dan poin prestasi mereka. Daftar ini memberikan apresiasi kepada mahasiswa dengan
        pencapaian tertinggi, sekaligus menginspirasi rekan lainnya untuk terus aktif dan unggul di berbagai bidang
        kompetisi.
      </p>
    </div>

    <!-- dari Components -->
    <div class="p-2 md:p-5 mb-10">
      <div class="flex flex-col md:flex-row justify-between space-y-4 md:space-y-0">
        <div class="flex-1 md:mr-4">
          <div class="flex items-center bg-white w-full p-2 space-x-1 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
            <img src="../../../public/img/Search (1).png" alt="logo" class="w-5 h-5">
            <input type="text" id="cari-mhs" placeholder="" class="w-full focus:outline-none" name="keyword" />
          </div>
        </div>

        <div class="flex items-center">
          <span class="text-sm md:text-base">entri</span>
          <select id="yearSelect" name="year" class="ml-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="all">Seluruh Waktu</option>
            <?php foreach ($data['tahun'] as $tahun) { ?>
								<option value="<?= $tahun['tahun']; ?>"><?= $tahun['tahun']; ?></option>
							<?php } ?>
          </select>
        </div>
      </div>

      <div class="mt-6 md:mt-10 overflow-x-auto bg-white shadow-md rounded-2xl">
        <table id="daftar-prestasi-table" class="min-w-full bg-white">
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
            <tbody id="daftar-prestasi-body" class="text-gray-700">
            </tbody>
          </table>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="p-4 md:p-28">
  <div class="bg-[#FEC01A] rounded-lg container mx-auto flex flex-row justify-between items-center relative z-10 p-4 md:px-8 md:py-4">
    <div class="text-left ">
      <h1 class="font-extrabold text-xl md:text-2xl">Ingin Mengakses Fitur Lainnya?</h1>
    </div>

    <div class="flex">
      <a href="<?= BASEURL; ?>/<?= (isset($_SESSION['user']) ? ($_SESSION['user']['role'] == 'Mahasiswa') ? 'Mahasiswa' : (($_SESSION['user']['role'] == 'Admin' || $_SESSION['user']['role'] == 'Super Admin') ? 'Admin' : (($_SESSION['user']['role'] == 'Ketua Jurusan') ? 'Kajur' : 'Auth/login')) : 'Auth/loginForm') ?>">
        <button class="border-spacing-2 font-bold bg-white text-blue-950 rounded-lg py-2 px-4 w-28 h-10">
          <?= (isset($_SESSION['user']) ? 'Dashboard' : 'Masuk') ?>
        </button>
      </a>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="bg-[#132145] text-white py-8 md:py-10 px-4 md:px-16">
  <div class="flex flex-row justify-between items-start space-y-6 md:space-y-0">
    <div class="flex flex-row items-start text-left">
      <img src="../../../public/img/Logo_achieveIT.png" alt="logo" class="w-8 h-10 mb-2 md:mb-0 md:mr-4">
      <div>
        <p class="font-extrabold text-xl md:text-2xl">Achieve IT</p>
        <p class="font-extralight text-xs md:text-sm">Jurusan Teknologi Informatika <br>Politeknik Negeri Malang</p>
      </div>
    </div>

    <div class="hidden md:block w-0.5 h-20 bg-white"></div>

    <div class="flex flex-row items-center space-y-2 md:space-y-0">
      <a href="#selamat-datang" class="text-white hover:underline py-1 md:py-2 mx-2">Beranda</a>
      <a href="#fitur-utama" class="text-white hover:underline py-1 md:py-2 mx-2">Fitur Utama</a>
      <a href="#daftar-prestasi" class="text-white hover:underline py-1 md:py-2 mx-2">Daftar Prestasi</a>
    </div>

    <div class="flex items-start space-x-2 text-left">
      <img src="../../../public/img/location_pin.png" alt="logo" class="w-5 h-5 hidden md:block">
      <p class="font-extralight text-xs md:text-sm">Jl. Soekarno-Hatta No. 9 Malang 65141 <br>Po.Box 04 Malang <br>Telepon : +62
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Ambil elemen input dan dropdown
    const searchInput = document.getElementById("cari-mhs");
    const yearSelect = document.getElementById("yearSelect");

    // Fungsi untuk memuat data dengan AJAX
    function fetchData(keyword = "", year = "all") {
      // Kirim request AJAX
      fetch("<?= BASEURL; ?>/Home/getDataRankingPrestasi", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ keyword, year }), // Kirim data dalam bentuk JSON
      })
        .then((response) => response.json())
        .then((data) => {
          // Update DOM dengan data yang diterima
          const tableBody = document.getElementById("daftar-prestasi-body");
          tableBody.innerHTML = ""; // Kosongkan data lama

          if (data.length > 0) {
            data.forEach((item) => {
              let row = ""; // Inisialisasi variabel row

              // Perkondisian jika rank = 1
              if (item.rank === '1') {
                row = `<tr class='bg-yellow-400 text-black font-bold shadow-lg border-2 border-yellow-600'>
                  <td class='py-2 px-2 text-center border border-blue-950 font-bold'>
                  <div class="flex items-center justify-center relative">
                    <span class="absolute left-0">🥇</span>
                    <span class="mx-auto">${item.rank}</span> 
                  </div>
                </td>
                <td class='py-2 px-4 text-center border border-blue-950 font-bold'>${item.nim}</td>
                <td class='py-2 px-4 text-center border border-blue-950 font-bold'>${item.nama}</td>
                <td class='py-2 px-4 text-center border border-blue-950 font-bold'>${item.nama_prodi}</td>
                <td class='py-2 px-4 text-center border border-blue-950 font-bold'>${item.total_poin}</td>
            </tr>`;
              } else if (item.rank === '2') {
                row = `<tr class='bg-yellow-300 text-black font-bold border border-yellow-500'>
                <td class='py-2 px-2 text-center border border-blue-950 font-bold'>
                  <div class="flex items-center justify-center relative">
                    <span class="absolute left-0">🥈</span>
                    <span class="mx-auto">${item.rank}</span> 
                  </div>
                </td>
                <td class='py-2 px-4 text-center border border-blue-950 font-bold'>${item.nim}</td>
                <td class='py-2 px-4 text-center border border-blue-950 font-bold'>${item.nama}</td>
                <td class='py-2 px-4 text-center border border-blue-950 font-bold'>${item.nama_prodi}</td>
                <td class='py-2 px-4 text-center border border-blue-950 font-bold'>${item.total_poin}</td>
            </tr>`;
              } else if (item.rank === '3') {
                row = `<tr class='bg-yellow-200 text-black font-semibold border border-yellow-400'>
                <td class='py-2 px-2 text-center border border-blue-950 font-bold'>
                  <div class="flex items-center justify-center relative">
                    <span class="absolute left-0">🥉</span>
                    <span class="mx-auto">${item.rank}</span> 
                  </div>
                </td>
                <td class='py-2 px-4 text-center border border-blue-950 font-bold'>${item.nim}</td>
                <td class='py-2 px-4 text-center border border-blue-950 font-bold'>${item.nama}</td>
                <td class='py-2 px-4 text-center border border-blue-950 font-bold'>${item.nama_prodi}</td>
                <td class='py-2 px-4 text-center border border-blue-950 font-bold'>${item.total_poin}</td>
            </tr>`;
              } else {
                // Template untuk selain rank 1,2,3
                row = `<tr>
                <td class='py-2 px-2 text-center border border-blue-950'>${item.rank}</td>
                <td class='py-2 px-4 text-center border border-blue-950'>${item.nim}</td>
                <td class='py-2 px-4 text-center border border-blue-950'>${item.nama}</td>
                <td class='py-2 px-4 text-center border border-blue-950'>${item.nama_prodi}</td>
                <td class='py-2 px-4 text-center border border-blue-950'>${item.total_poin}</td>
            </tr>`;
              }

              // Tambahkan baris ke tabel
              tableBody.innerHTML += row;
            });
          } else {
            tableBody.innerHTML = `<tr>
                <td td colspan = '5' class='text-center py-10' >
              <img src='../../public/img/table-kosong.png' alt='Table Kosong' class='w-1/6 mx-auto'/>
              <p class='font-bold text-gray-500 mt-4'>
                Belum ada data Ranking pada tahun ${year}
              </p>
            </td>
          </tr > `;
          }
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Panggil fungsi saat halaman pertama kali dimuat
    fetchData();

    // Event listener untuk pencarian
    searchInput.addEventListener("input", function () {
      const keyword = searchInput.value;
      const year = yearSelect.value;
      fetchData(keyword, year);
    });

    // Event listener untuk dropdown tahun
    yearSelect.addEventListener("change", function () {
      const year = this.value; // Nilai tahun
      const keyword = document.getElementById("cari-mhs").value; // Nilai keyword
      console.log("Year:", year, "Keyword:", keyword); // Debugging
      fetchData(keyword, year);
    });
  });

</script>
</body>

</html>