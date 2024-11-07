<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Pencatatan Prestasi Mahasiswa</title>
    <link href="../../../public/css/output.css" rel="stylesheet" />
  </head>
  <body>
    <div class="relative h-screen bg-cover bg-center" style="background-image: url('../img/gedung-jti.png');">
      <div class="absolute inset-0 bg-[#132145] bg-opacity-70"></div>
      <nav
        class="text-white p-4 container mx-auto flex justify-between items-center relative z-10"
      >
        <div class="navbar-text flex justify-between gap-6">
          <img src="../img/logo-polinema-jti.png" alt="logo" />
          <h1 class="font-extrabold text-4xl">AchieveIt</h1>
        </div>
        <div class="navbar-button flex right-0">
          <a href="#selamat-datang" class="text-white hover:underline py-2 mx-2">Beranda</a>
          <a href="#daftar-prestasi" class="text-white hover:underline py-2 mx-2 flex-shrink-0"
            >Daftar Prestasi</a
          >
          <a href="login.html">
            <button class="border-spacing-2 bg-white text-blue-500 rounded-lg py-2 mx-2 w-24 h-10" >
            Masuk
            </button>
          </a> 
        </div>
      </nav>

      <section
        id="selamat-datang"
        class="relative text-justify flex justify-items-start items-center">
        <div class="p-10 mt-20 ml-10">
          <h1 class="text-white text-7xl mb-2 font-bold">Selamat Datang di</h1>
          <h1 class="text-[#FEC01A] text-7xl mb-2 font-bold">AchieveIt!</h1>
          <p class="max-w-3xl m-0 text-white">
            AchieveIt adalah Lorem ipsum dolor sit amet, consectetur adipisicing
            elit, sed do eiusmod tempor inicilabore et dolore magna aliqua. ut
            enim ad minim veniam, quis nostrud exercitation ullamco laborisnisi
            ut aliquip ex ea commodo consequat. Duis aute irure dolor in
            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Exceptur sint occaecat cupidatat non proident, sunt in
            culpa qui officia desereutn.
          </p>
          <button
            class="border-spacing-2 bg-white text-blue-500 rounded-lg py-2 mt-8 w-24 h-10"
          >
            Masuk
          </button>
        </div>
      </section>
    </div>

    <section id="daftar-prestasi" class="">
      <div class="p-5 mt-20 ml-10">
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
                class="mx-2 border rounded px-2 py-1 text-sm bg-white shadow-gray-400 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              >
                <option value="2023-2024">2023-2024</option>
                <option value="2024-2025">2024-2025</option>
                <option value="2022-2023">2022-2023</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div></div>
    </section>

    <section>
      <table>
        
      </table>
    </section>
  </body>
</html>
