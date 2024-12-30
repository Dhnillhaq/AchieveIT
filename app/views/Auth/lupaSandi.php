<section class="relative bg-cover bg-center min-h-screen"
  style="background-image: url('../../../public/img/gedung-jti.png');">
  <div class="absolute inset-0 bg-[#132145D4] bg-opacity-80"></div>

  <!-- Back button - Always visible -->
  <a href="<?= BASEURL; ?>/Auth/loginForm"
    class="absolute top-4 left-4 flex items-center space-x-2 text-white px-4 py-2 rounded-lg hover:underline z-20">
    <img src="../../../public/img/Back.png" alt="back" class="w-4 h-4" />
    <span class="font-light">Kembali</span>
  </a>

  <!-- Main content container -->
  <div class="relative z-10 flex flex-col md:flex-row justify-between min-h-screen">
    <!-- Welcome section - Top on mobile, Left on desktop -->
    <section class="w-full md:w-1/2 flex flex-col items-center md:items-start justify-start md:justify-center px-6 md:px-10 pt-20 md:pt-0 text-white">
      <h1 class="text-4xl md:text-6xl font-bold text-center md:text-left">
        Selamat datang <br> di <span class="text-[#FEC01A]">AchieveIT!</span>
      </h1>
    </section>

    <!-- Forgot password form section - Middle on mobile, Right on desktop -->
    <section class="w-full md:w-2/5 flex-col space-y-6 items-center justify-center py-8 md:py-12 px-6 md:pr-20">
      <div class="flex justify-center items-center bg-white rounded-3xl shadow-lg">
        <div class="px-6 md:px-14 py-8 md:py-10 space-y-6 w-full max-w-screen-xl">
          <h1 class="text-3xl md:text-4xl font-bold text-center my-6 md:my-10">Lupa Kata Sandi</h1>
          <form action="<?= BASEURL; ?>/Auth/lupaSandiProcess" method="post" class="space-y-4 w-full">
            <div class="relative">
              <input type="text" id="NIM" name="nim" placeholder="Masukkan NIM"
                class="w-full px-4 py-3 md:py-4 bg-[#D9D9D9] border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                required>
              <img src="../../../public/img/Key.png" alt="logo"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
            </div>
            
            <div class="relative">
              <input type="email" id="email" name="email" placeholder="Masukkan Email"
                class="w-full px-4 py-3 md:py-4 bg-[#D9D9D9] border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                required>
              <img src="../../../public/img/Message.png" alt="logo"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
            </div>
            
            <div class="relative">
              <input type="date" id="tglLahir" name="tanggal_lahir"
                placeholder="Masukkan Tanggal Lahir"
                class="w-full px-4 py-3 md:py-4 bg-[#D9D9D9] border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300 placeholder-[#757575]"
                required>
              <img src="../../../public/img/Date_fill.png" alt="logo"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer"
                onclick="document.getElementById('tglLahir').showPicker()" />
            </div>
            
            <?php
            if (isset($_SESSION['message'])) {
              echo '<span class="text-red-600 flex justify-center text-center">' . $_SESSION['message'] . '</span>';
            }
            ?>

            <button type="submit" name="submit"
              class="font-bold w-full bg-blue-800 text-white py-3 md:py-4 rounded-lg hover:bg-blue-900">Proses</button>
          </form>
          
          <div class="flex justify-start text-blue-700 text-sm md:text-base">
            <a href="<?= BASEURL; ?>/Auth/loginForm" class="hover:underline">kembali ke Halaman Login</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Logo section - Bottom on mobile, Part of left section on desktop -->
    <div class="relative w-full md:hidden flex justify-start pl-4 pb-10">
      <img src="../../../public/img/Logo_achieveIT.png" alt="Gambar di antara section" class="w-28 md:w-36 h-auto" />
    </div>

    <!-- Desktop-only logo -->
    <div class="hidden md:block absolute bottom-14 left-10">
      <img src="../../../public/img/Logo_achieveIT.png" alt="Gambar di antara section" class="w-36 h-auto" />
    </div>
  </div>
</section>

<script>
  <?php
  Flasher::flash();
  ?>
</script>