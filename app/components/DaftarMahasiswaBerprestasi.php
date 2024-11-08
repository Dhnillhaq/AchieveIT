<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Mahasiswa Berprestasi</title>
    <link href="../../public/css/output.css" rel="stylesheet" />
  </head>
  <body class="bg-white rounded-lg">
    <section id="daftar-prestasi" class="">
      <div class="p-5 mt-20 mx-10">
        <h1 class="text-4xl mb-2 font-bold">Daftar Mahasiswa Berprestasi</h1>
        <div class="flex justify-between">
          <div class="flex">
            <input
              type="text"
              id="cari-mhs"
              placeholder="Cari mahasiswa berdasarkan nama/NIM"
              class="bg-blue-100 w-96 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>
          <div class="flex right-0">
            <div class="flex items-center mr-3">
              <span class="text-gray-600">Lihat</span>
              <select
                class="mx-2 border rounded px-2 py-1 text-sm bg-white shadow-gray-400 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              >
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
              </select>
              <span class="text-gray-600">entri</span>
            </div>
            <div class="flex items-center mx-10">
              <select
                class="right-0 mx-2 border rounded px-2 py-1 text-sm bg-white shadow-gray-400 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              >
                <option value="2023-2024">2023</option>
                <option value="2024-2025">2024</option>
                <option value="2022-2023">2022</option>
              </select>
            </div>
          </div>
        </div>

        <div class="mt-10 overflow-x-auto bg-white shadow-md rounded-2xl">
          <table class="min-w-full bg-white">
            <thead>
              <tr>
                <th
                  class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950"
                >
                  RANGKING
                </th>
                <th
                  class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950"
                >
                  NIM
                </th>
                <th
                  class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950"
                >
                  NAMA MAHASISWA
                </th>
                <th
                  class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950"
                >
                  PRODI
                </th>
                <th
                  class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950"
                >
                  TOTAL POIN
                </th>
              </tr>
            </thead>
            <tbody class="text-gray-700">
              <?php
              // Data dummy untuk mahasiswa
              $dataMahasiswa = [
                  ['rangking' => 1, 'nim' => '123456789', 'nama' => 'Fais Restu', 'prodi' => 'Informatika', 'poin' => 95],
                  ['rangking' => 2, 'nim' => '987654321', 'nama' => 'Nur Aini', 'prodi' => 'Sistem Informasi', 'poin' => 90],
                  ['rangking' => 3, 'nim' => '112233445', 'nama' => 'Andi Syahputra', 'prodi' => 'Teknik Komputer', 'poin' => 88],
                  ['rangking' => 4, 'nim' => '556677889', 'nama' => 'Dewi Lestari', 'prodi' => 'Teknik Elektro', 'poin' => 85]
              ];

              // Looping data mahasiswa ke dalam tabel
              foreach ($dataMahasiswa as $mahasiswa) {
                  echo "<tr>";
                  echo "<td class='py-2 px-4 border border-blue-950'>{$mahasiswa['rangking']}</td>";
                  echo "<td class='py-2 px-4 border border-blue-950'>{$mahasiswa['nim']}</td>";
                  echo "<td class='py-2 px-4 border border-blue-950'>{$mahasiswa['nama']}</td>";
                  echo "<td class='py-2 px-4 border border-blue-950'>{$mahasiswa['prodi']}</td>";
                  echo "<td class='py-2 px-4 border border-blue-950'>{$mahasiswa['poin']}</td>";
                  echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </body>
</html>
