<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Prestasi</title>
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
          <div class="flex items-center justify-center text-4xl p-4 text-white rounded-lg">
            <span class="ms-3 font-bold">AchieveIT</span>
          </div>
        </li>
        <li>
          <a href="#" class="flex items-center p-2 mt-10 text-white rounded-lg hover:bg-[#3063C559]">
            <img src="../../../public/img/Home_fill (1).png" alt="logo" class="w-5 h-5" />
            <span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
          </a>
        </li>
        <li>
          <a href="formPrestasi.html" class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
            <img src="../../../public/img/File_dock_add_fill.png" alt="logo" class="w-5 h-5" />
            <span class="flex-1 ms-3 whitespace-nowrap">Form Prestasi</span>
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center p-2 text-[#FEC01A] rounded-lg bg-[#3063C559]">
            <img src="../../../public/img/File_dock_search_fill (1).png" alt="logo" class="w-5 h-5" />
            <span class="flex-1 ms-3 whitespace-nowrap">Daftar Prestasi</span>
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
            <img src="../../../public/img/Administrasi-data.png" alt="logo" class="w-5 h-5" />
            <span class="flex-1 ms-3 whitespace-nowrap">Administrasi Data</span>
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
            <img src="../../../public/img/User_circle.png" alt="logo" class="w-5 h-5" />
            <span class="flex-1 ms-3 whitespace-nowrap">Lihat Profil</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <section class="sm:ml-64 bg-blue-50 min-h-screen">
    <!-- profil -->
    <section class="flex justify-end items-center p-8 space-x-3">
      <p class="font-bold">Admin12345</p>
      <img src="../../../public/img/Logo_archhieveIT.png" alt="logo" class="w-8 h-auto" />
    </section>

    <!-- detail prestasi -->
    <section class="flex-col justify-start pl-6">
      <p class="font-bold text-3xl">Detail prestasi</p>
    </section>

    <!-- btn edit -->
    <section class="flex justify-end pr-6">
      <a href="#">
        <button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
          <img src="../../../public/img/Edit_fill.png" alt="logo" class="w-5 h-5">
          <p>edit</p>
        </button>
      </a>
    </section>

    <!-- data kompetisi -->
    <section class="relative p-6">
      <!-- Static parent -->
      <div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
        Data Kompetisi
      </div>
      <div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
        <div class="flex flex-col space-y-4">
          <div class="flex flex-col justify-start items-start pt-5">
            <p class="text-[#757575]">Nama Kompetisi</p>
            <p class="font-semibold">
              Olimpiade Nasional Matematika dan Ilmu Pengetahuan Alam
              Perguruan Tinggi
            </p>
          </div>

          <div class="flex flex-row justify-start items-start space-x-24">
            <div class="flex flex-col space-y-4">
              <div class="flex flex-col justify-start items-start pt-5">
                <p class="text-[#757575]">Kategori Prestasi</p>
                <p class="font-semibold">SAINS</p>
              </div>

              <div class="flex flex-col justify-start items-start pt-5">
                <p class="text-[#757575]">Tingkat Kompetisi</p>
                <p class="font-semibold">Nasional</p>
              </div>

              <div class="flex flex-col justify-start items-start pt-5">
                <p class="text-[#757575]">Tingkat Penyelenggara</p>
                <p class="font-semibold">Pemerintah</p>
              </div>

              <div class="flex flex-col justify-start items-start pt-5">
                <p class="text-[#757575]">Juara</p>
                <p class="font-semibold">Juara 1 / Medali Emas</p>
              </div>
            </div>

            <div class="flex flex-col space-y-4">
              <div class="flex flex-col justify-start items-start pt-5">
                <p class="text-[#757575]">Tanggal Mulai Kompetisi</p>
                <p class="font-semibold">02-11-2024</p>
              </div>

              <div class="flex flex-col justify-start items-start pt-5">
                <p class="text-[#757575]">Tanggal Selesai Kompetisi</p>
                <p class="font-semibold">11-12-2024</p>
              </div>

              <div class="flex flex-col justify-start items-start pt-5">
                <p class="text-[#757575]">Tempat Kompetisi</p>
                <p class="font-semibold">Jakarta</p>
              </div>

              <div class="flex flex-col justify-start items-start pt-5">
                <p class="text-[#757575]">Penyelenggara Kompetisi</p>
                <p class="font-semibold">Kementrian Pendidikan dan Kebudayaan </p>
              </div>
            </div>

            <div class="flex flex-col space-y-4">
              <div class="flex flex-col justify-start items-start pt-5">
                <p class="text-[#757575]">File Surat Tugas</p>
                <p class="font-semibold text-[#3063C5]">suratTugas.pdf</p>
              </div>

              <div class="flex flex-col justify-start items-start pt-5">
                <p class="text-[#757575]">File Poster</p>
                <p class="font-semibold text-[#3063C5]">poster.pdf</p>
              </div>

              <div class="flex flex-col justify-start items-start pt-5">
                <p class="text-[#757575]">File Foto Juara</p>
                <p class="font-semibold text-[#3063C5]">juara.pdf</p>
              </div>

              <div class="flex flex-col justify-start items-start pt-5">
                <p class="text-[#757575]">File Sertifikat</p>
                <p class="font-semibold text-[#3063C5]">sertifikat.pdf</p>
              </div>

              <div class="flex flex-col justify-start items-start pt-5">
                <p class="text-[#757575]">File Proposal</p>
                <p class="font-semibold text-[#3063C5]">proposal.pdf</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Data Mahasiswa -->
    <section class="relative p-6">
      <!-- Static parent -->
      <div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
        Data Mahasiswa
      </div>
      <div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
        <!-- tabel -->
        <div class="mt-6 overflow-x-auto bg-white shadow-md rounded-2xl">
          <table class="min-w-full">
            <thead>
              <tr>
                <th class="w-1/12 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
                  No
                </th>
                <th class="w-1/5 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
                  NIM
                </th>
                <th class="w-auto py-2 px-4 bg-white font-semibold text-left border border-blue-950">
                  Mahasiswa
                </th>
                <th class="w-auto py-2 px-4 bg-white font-semibold text-left border border-blue-950">
                  Peran
                </th>
              </tr>
            </thead>
            <!-- data dummy -->
            <tbody>
              <!-- Row 1 -->
              <tr>
                <td class="py-2 px-4 border border-blue-950">1</td>
                <td class="py-2 px-4 border border-blue-950">
                  <a href="profilMahasiswa.html">2341720001</a>
                </td>
                <td class="py-2 px-4 border border-blue-950">Haikal</td>
                <td class="py-2 px-4 border border-blue-950">Ketua</td>
              </tr>
              <!-- Row 2 -->
              <tr>
                <td class="py-2 px-4 border border-blue-950">1</td>
                <td class="py-2 px-4 border border-blue-950">
                  <a href="profilMahasiswa.html">2341720002</a>
                </td>
                <td class="py-2 px-4 border border-blue-950">Restu</td>
                <td class="py-2 px-4 border border-blue-950">Anggota</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- data pembimbing -->
    <section class="relative p-6">
      <!-- Static parent -->
      <div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
        Data Pembimbing
      </div>
      <div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
        <!-- tabel -->
        <div class="mt-6 overflow-x-auto bg-white shadow-md rounded-2xl">
          <table class="min-w-full table-auto">
            <thead>
              <tr>
                <th class="w-1/12 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
                  No
                </th>
                <th class="w-1/3 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
                  Pembimbing
                </th>
                <th class="w-1/5 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
                  NIP
                </th>
                <th class="w-auto py-2 px-4 bg-white font-semibold text-left border border-blue-950">
                  Peran Pembimbing
                </th>
              </tr>
            </thead>
            <tbody>
              <!-- Row 1 -->
              <tr>
                <td class="py-2 px-4 border border-blue-950">1</td>
                <td class="py-2 px-4 border border-blue-950">
                  Dimas Wahyu Wibowo, S.T., M.T.
                </td>
                <td class="py-2 px-4 border border-blue-950">
                  198406102008121004
                </td>
                <td class="py-2 px-4 border border-blue-950">
                  Melakukan pembinaan kegiatan mahasiswa di bidang akademik
                  (PA) dan kemahasiswaan (BEM, Maperwa, dan lain-lain)
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- informasi lain -->
    <section class="relative p-6">
      <!-- Static parent -->
      <div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
        Informasi Lain
      </div>
      <div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
        <div class="flex flex-col space-y-0 justify-start items-start py-3">
          <p class="text-[#757575] font-light">Status</p>
          <p class="font-bold">VALID</p>
        </div>

        <h2 class="text-[#757575]">Perhitungan Poin</h2>

        <!-- tabel -->
        <div class="mt-6 overflow-x-auto bg-white shadow-md rounded-2xl">
          <table class="min-w-full table-auto">
            <thead>
              <tr>
                <th class="w-1/12 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
                  No
                </th>
                <th class="w-auto py-2 px-4 bg-white font-semibold text-left border border-blue-950">
                  Kategori Penilaian
                </th>
                <th class="w-auto py-2 px-4 bg-white font-semibold text-left border border-blue-950">
                  Value
                </th>
                <th class="w-1/12 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
                  Poin
                </th>
              </tr>
            </thead>
            <tbody>
              <!-- Row 1 -->
              <tr>
                <td class="py-2 px-4 border border-blue-950">1</td>
                <td class="py-2 px-4 border border-blue-950">
                  Tingkatan Kompetisi
                </td>
                <td class="py-2 px-4 border border-blue-950">Nasional</td>
                <td class="py-2 px-4 border border-blue-950">4</td>
              </tr>
              <!-- Row 2 -->
              <tr>
                <td class="py-2 px-4 border border-blue-950">2</td>
                <td class="py-2 px-4 border border-blue-950">
                  Penyelenggara
                </td>
                <td class="py-2 px-4 border border-blue-950">Pemerintah</td>
                <td class="py-2 px-4 border border-blue-950">4</td>
              </tr>
              <!-- Row 3 -->
              <tr>
                <td class="py-2 px-4 border border-blue-950">3</td>
                <td class="py-2 px-4 border border-blue-950">Juara</td>
                <td class="py-2 px-4 border border-blue-950">
                  Juara 1 / Medali Emas
                </td>
                <td class="py-2 px-4 border border-blue-950">4</td>
              </tr>
            </tbody>
          </table>
        </div>

        <h2 class="font-bold ">Total Poin : 12</h2>
      </div>
    </section>

    <!-- btn -->
    <section class="flex space-x-4 justify-start pl-4 pb-6">
      <div class="justify-center p-2">
        <a href="">
          <button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
            <img src="../../../public/img/Back.png" alt="logo" class="w-5 h-5" />
            <p>Kembali</p>
          </button>
        </a>
      </div>

      <div class="justify-center p-2">
        <a href="">
          <button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#FF3B30] rounded-lg">
            <img src="../../../public/img/Trash.png" alt="logo" class="w-5 h-5">
            <p>Hapus</p>
          </button>

        </a>
      </div>

    </section>
  </section>

  <!-- footer -->
  <?php include __DIR__ . '/../../components/Footer.php'; ?>
  <section class="sm:ml-64 bg-blue-50">
</body>

</html>