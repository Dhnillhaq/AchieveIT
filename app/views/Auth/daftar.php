<style>
	#tglLahir::-webkit-calendar-picker-indicator {
		display: none;
	}

	select {
		appearance: none;
	}
</style>


<section class="relative bg-cover bg-center min-h-screen"
  style="background-image: url('../../../public/img/gedung-jti.png');">
  <div class="absolute inset-0 bg-[#132145D4] bg-opacity-80"></div>

	<!-- Back button - Always visible -->
  <a href="<?= BASEURL; ?>"
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

		<!-- right side -->
		<section class="w-full md:w-1/2 h-screen flex-col space-y-6 items-center justify-center p-6">
			<div class="flex justify-center items-center bg-white rounded-3xl shadow-lg min-h-full">
				<div class="px-10 py-6 space-y-5 w-full max-w-screen-xl">
					<h1 class="text-3xl md:text-4xl font-bold text-center my-2">Daftar</h1>
					<form method="post" action="<?=BASEURL;?>/Auth/registrasiProcess" class="space-y-4 w-full" onsubmit="return validasiSandi()">
						<!-- //  nama -->
						<div class="relative">
							<input type="text" id="nama" name="nama" placeholder="Nama Lengkap"
								class="w-full px-6 py-2 bg-[#D9D9D9]  border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
								required>
							<img src="../../../public/img/User_fill.png" alt="logo"
								class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
						</div>

						<!-- nim dan email -->
						<div class="flex space-x-4 w-full">
							<div class="relative w-full">
								<input type="text" id="nama" name="nim" placeholder="NIM"
									class="w-full px-6 py-2 bg-[#D9D9D9] border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
									required>
								<img src="../../../public/img/Key.png" alt="logo"
									class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
							</div>

							<div class="relative w-full">
								<input type="email" id="email" name="email" placeholder="Email"
									class="w-full px-6 py-2 bg-[#D9D9D9] border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
									required>
								<img src="../../../public/img/Message.png" alt="logo"
									class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
							</div>
						</div>


						<!-- prodi dan no hp -->
						<div class="flex space-x-4 w-full">
							<div class="relative w-full">
								<select name="id_prodi" id="prodi" class="w-full px-6 py-2 bg-[#D9D9D9]  border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
									<?php foreach ($data['prodi'] as $prodi) { ?>
										<option value="<?= $prodi['id_prodi']; ?>"><?= $prodi['nama_prodi']; ?></option>
									<?php } ?>
								</select>
								<img src="../../../public/img/Mortarboard_fill.png" alt="logo"
									class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
							</div>

							<div class="relative w-full">
								<input type="text" id="telp" name="no_telepon" placeholder="Nomor Telepon"
									class="w-full px-6 py-2 bg-[#D9D9D9]  border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
									required>
								<img src="../../../public/img/Telepon.png" alt="logo"
									class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
							</div>
						</div>

						<!-- tempat lahir -->
						<div class="relative">
							<input type="text" id="tempatLhr" name="tempat_lahir" placeholder="Tempat Lahir"
								class="w-full px-6 py-2 bg-[#D9D9D9]  border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
								required>
							<img src="../../../public/img/Location.png" alt="logo"
								class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
						</div>

						<!-- tanggal lahir, kelamin, agama -->
						<div class="flex w-full space-x-4">
							<div class="relative w-full">
								<input type="date" id="tglLahir" name="tanggal_lahir" placeholder="tanggal Lahir"
									class="w-full px-6 py-2 pr-12 bg-[#D9D9D9]  border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
									required>
								<img src="../../../public/img/Date_fill.png" alt="logo"
									class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer"
									onclick="document.getElementById('tglLahir').showPicker()"/>
							</div>

							<div class="relative w-full">
								<select name="jenis_kelamin" id="jenis_kelamin"
									class="w-full px-6 py-2 pr-12 bg-[#D9D9D9]  border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
									required>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
								<img src="../../../public/img/Gender.png" alt="logo"
									class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
							</div>

							<div class="relative w-full">
								<select id="agama" name="agama"
									class="w-full px-6 py-2 bg-[#D9D9D9]  border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
									required>
									<option value="Islam">Islam</option>
									<option value="Kristen Katolik">Kristen Katolik</option>
									<option value="Kristen Protestan">Kristen Protestan</option>
									<option value="Hindu">Hindu</option>
									<option value="Buddha">Buddha</option>
									<option value="Konghucu">Konghucu</option>
								</select>
								<img src="../../../public/img/pray.png" alt="logo"
									class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
							</div>
						</div>

						<!-- password -->
						<div class="flex space-x-4 w-full">
							<div class="flex flex-col justify-start space-y-2 w-full">
								<div class="relative w-full">
									<input type="password" id="sandiBaru" name="password" placeholder="Masukkan Password"
										class="w-full px-6 py-2 bg-[#D9D9D9]  border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
										required>
									<img src="../../../public/img/Password.png" alt="logo"
										class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
								</div>
								<div class="justify-center">
									<input id="tampil-sandi1" type="checkbox" placeholder="" class="border rounded-l"
										onclick="showPassword('sandiBaru')">
									<label for="tampil-sandi1" class="text-[#757575]">Tampilkan kata sandi</label>
								</div>
							</div>

							<div class="flex flex-col justify-start space-y-2 w-full">
								<div class="relative w-full">
									<input type="password" id="konfirmasiSandiBaru" name="password"
										placeholder="Konfirmasi Password"
										class="w-full px-6 py-2 bg-[#D9D9D9]  border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
										required>
									<img src="../../../public/img/Password.png" alt="logo"
										class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
								</div>
								<div class="justify-center">
									<input id="tampil-sandi2" type="checkbox" placeholder="" class="border rounded-l"
										onclick="showPassword('konfirmasiSandiBaru')">
									<label for="tampil-sandi2" class="text-[#757575]">Tampilkan kata sandi</label>
								</div>
							</div>
						</div>
						<button type="submit" name="submit"
							class="font-bold h w-full bg-blue-800 text-white py-3 rounded-lg hover:bg-blue-900">Daftar</button>
					</form>
					<div class="flex justify-start text-blue-700 space-x-1">
						<a href="<?=BASEURL;?>/Auth/loginForm" class="hover:underline">kembali ke Halaman Login</a>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- Logo section - Bottom on mobile, Part of left section on desktop -->
    <div class="relative w-full md:hidden flex justify-start pl-4 pb-10 pt-24 ">
      <img src="../../../public/img/Logo_achieveIT.png" alt="Gambar di antara section" class="w-28 md:w-36 h-auto" />
    </div>

    <!-- Desktop-only logo -->
    <div class="hidden md:block pt-2 absolute bottom-14 left-10">
      <img src="../../../public/img/Logo_achieveIT.png" alt="Gambar di antara section" class="w-36 h-auto" />
    </div>
  </div>
</section>


<script>
	<?php 
        Flasher::flash();
    ?>
</script>