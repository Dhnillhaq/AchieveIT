<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body class="relative flex h-screen bg-cover bg-center"
  style="background-image: url(../../../public/img/gedung-jti.png);">
  <div class="absolute inset-0 bg-[#132145] bg-opacity-70 flex flex-row">
    <div class="w-1/2 h-screen">
      <h1>Selamat Datang</h1>
      <h1>di AchieveIT!</h1>
    </div>
    <div class="bg-white absolute h-full w-1/2 insert-y-0 right-0 rounded-l-3xl items-center">
      <div class="text-center mb-4">
        <h1 class="text-2xl font-bold mt-4">Masuk</h1>
      </div>
    </div>
  </div>
</body>

</html>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AchieveIT Login</title>
<link href="../../../public/css/output.css" rel="stylesheet" />
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
</style>
</head>

<body class="font-[poppins] flex relative bg-cover bg-center w-screen h-screen"
  style="background-image: url('../../../public/img/gedung-jti.png');">
  <div class="absolute inset-0 bg-[#132145D4] bg-opacity-82"></div>

  <div class="relative z-10 flex">
    <!-- left side -->
    <section class="w-1/2 flex items-center justify-center px-10 text-white">
      <h1 class="text-6xl font-bold">Selamat datang di <span class="text-[#FEC01A]">AchieveIT!</span></h1>

    </section>

    <!-- right side -->
    <section class="w-1/2 h-screen flex-col space-y-6 items-center justify-center p-10">
      <div class="flex items-center justify-center">
        <div class="bg-white rounded-3xl shadow-lg p-8 py-28 h- w-full max-w-screen-xl m-">
          <!-- Logo -->
          <!-- Title -->
          <h1 class="text-4xl font-bold text-center mb-8">Masuk</h1>
          <!-- Form -->
          <form method="post" action="<?= BASEURL; ?>/Home/isLogin" class="space-y-4">
            <div class="relative">
              <input type="text" id="Nama pengguna" name="username" placeholder="Nama Pengguna"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                required title="Mohon ini wajib diisi!">
            </div>

            <div class="relative">
              <input type="text" id="Kata sandi" name="password" placeholder="Kata sandi"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                required>
            </div>
            <button type="submit" name="submit"
              class="mt-4 w-full bg-blue-800 text-white py-2 rounded-lg hover:bg-blue-900">Masuk</button>
          </form>
        </div>

      </div>

    </section>
  </div>

</body>

</html>