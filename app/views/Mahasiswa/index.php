<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Halaman Mahasiswa</title>
  <link href="../../../public/css/output.css" rel="stylesheet" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
  </style>
</head>

<body class="font-[poppins]">
  <!-- sidebar -->
  <aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-[#132145]">
      <ul class="space-y-2 font-medium">
        <li>
          <div class="flex items-center justify-center text-4xl p-4 text-white rounded-lg ">
            <span class="ms-3 font-bold">ArchieveIT</span>
          </div>
        </li>
        <li>
          <a href="#" class="flex items-center p-2 mt-10 text-[#FEC01A] rounded-lg bg-[#3063C559]">
            <span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
          </a>
        </li>
        <li>
          <a href="<?=BASEURL;?>/Mahasiswa/formPrestasi" class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
            <span class="flex-1 ms-3 whitespace-nowrap">Form Prestasi</span>
          </a>
        </li>
        <li>
          <a href="<?=BASEURL;?>/Mahasiswa/prestasiSaya" class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
            <span class="flex-1 ms-3 whitespace-nowrap">Prestasi Saya</span>
          </a>
        </li>
        <li>
          <a href="<?=BASEURL;?>/Mahasiswa/profil" class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
            <span class="flex-1 ms-3 whitespace-nowrap">Lihat Profil</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <div class=" sm:ml-64 bg-blue-50">
    <!-- profil -->
    <section class="flex justify-end p-8">
      <p class="font-bold">Haikal Muhammad Rafli</p>
    </section>

    <!-- selamat datang -->
    <section class="flex-col justify-start p-6 space-y-4">
      <p class="font-bold text-4xl">Selamat Datang</p>
      <p class="font-semibold text-2xl text-[#F99D1C]">
        Haikal Muhammad Rafli / 2341720001
      </p>
    </section>

    <!-- prestasi -->
    <section class="flex justify-start p-6 space-x-10 ">
      <!-- total prestasi -->
      <div class="bg-white p-4 rounded-lg shadow-lg border w-1/4">
        <div class="flex justify-start">
          <!-- gambar disini -->
          <div class="flex-col">
            <p class="font-semibold text-[#757575] text-[12px]">Total Prestasi Saat Ini</p>
            <p class="font-bold"><?= $data['mhs']['0']['nama']?></p>
          </div>
        </div>
      </div>

      <!-- total poin -->
      <div class="bg-white p-4 rounded-lg shadow-lg border w-1/4">
        <div class="flex justify-start">
          <!-- gambar disini -->
          <div class="flex-col">
            <p class="font-semibold text-[#757575] text-[12px]">Total Poin Saat Ini</p>
            <p class="font-bold"><?= $data['mhs']['0']['total_poin']?></p>
          </div>
        </div>
      </div>

      <!-- peringkat mapres -->
      <div class="bg-white p-4 rounded-lg shadow-lg border w-1/4">
        <div class="flex justify-start">
          <!-- gambar disini -->
          <div class="flex-col">
            <p class="font-semibold text-[#757575] text-[12px]">Peringkat MaPres</p>
            <p class="font-bold">24</p>
          </div>
        </div>
      </div>
    </section>

    <!-- btn tambah prestasi -->
    <section class="p-6">
      <a href="#">
        <button class="bg-[#132145] rounded-lg text-white p-2 font-semibold">Tambahkan Prestasi</button>
      </a>
    </section>

    <section class="p-6 justify-start">
      <h1 class="text-4xl font-bold ">Daftar Mahasiswa Berprestasi</h1>
    </section>

    <!-- table maPres -->
    <!-- dari Components -->
    <section id="daftar-prestasi" class="">
        <div class="p-5 mb-10 ">
          <div class="flex justify-between">
            <div class="flex">
            <form id="formFilter" action="<?= BASEURL; ?>/Mahasiswa" method="POST">
                <input type="text" id="cari-mhs" placeholder="Cari mahasiswa berdasarkan nama/NIM"
                  class="bg-white w-96 p-2 rounded-md border shadow-md" name="keyword" />
              
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
                    <option value="2025">2022</option>
                    <option value="2026">2023</option>
                    <option value="2024" selected>2024</option>
                  </select>

                </form>
              </div>


              <!-- Function js untuk submit form select ketika opsi yang lain dipilih -->
              <script>
                function submitForm() {
                  document.getElementById("formFilter").submit();
                }
              </script>

            </div>
          </div>

          <div class="mt-10 overflow-x-auto bg-white shadow-md rounded-2xl">
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
                foreach ($data['prestasi'] as $mahasiswa) {
                  echo "<tr>";
                  echo "<td class='py-2 px-4 border border-blue-950'>$rank</td>";
                  echo "<td class='py-2 px-4 border border-blue-950'>{$mahasiswa['nim']}</td>";
                  echo "<td class='py-2 px-4 border border-blue-950'>{$mahasiswa['nama']}</td>";
                  echo "<td class='py-2 px-4 border border-blue-950'>{$mahasiswa['nama_prodi']}</td>";
                  echo "<td class='py-2 px-4 border border-blue-950'>{$mahasiswa['total_poin']}</td>";
                  echo "</tr>";
                  $rank++;
                }

                ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>
      <!-- //php include __DIR__ . '/../../components/DaftarMahasiswaBerprestasi.php';  -->
    </div>
  </section>
  </div>
