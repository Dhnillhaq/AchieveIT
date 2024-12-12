<section class="relative bg-cover bg-center min-h-screen"
	style="background-image: url('../../../public/img/gedung-jti.png');">
	<div class="absolute inset-0 bg-[#132145D4] bg-opacity-80"></div>

	<!-- kembali -->
	<a href="<?= BASEURL; ?>"
		class="absolute top-4 left-4 flex items-center space-x-2 text-white px-4 py-2 rounded-lg hover:underline z-20">
		<img src="../../../public/img/Back.png" alt="back" class="w-4 h-4" />
		<span class="font-light">Kembali</span>
	</a>

	<div class="relative z-10 flex justify-between">
		<!-- left side -->
		<section class="w-1/2 flex flex-col items-start justify-center h-screen px-10 text-white">
			<h1 class="absolute text-6xl font-bold">Selamat datang <br> di <span
					class="text-[#FEC01A]">AchieveIT!</span></h1>
			<div class="relative mt-[calc(1/2*120vh)]">
				<!-- Gambar di antara dua section -->
				<img src="../../../public/img/Logo_achieveIT.png" alt="Gambar di antara section" class="w-36 h-auto" />
			</div>
		</section>

		<!-- right side -->
		<section class="w-2/5 h-screen flex-col items-start justify-center py-16 pr-20">
			<div class="flex justify-center items-center bg-white rounded-3xl shadow-lg h-auto">
				<div class="px-14 py-10 space-y-6 w-full max-w-screen-xl">
					<h1 class="text-4xl font-bold text-center my-12">Ganti Kata Sandi</h1>
					<form action="<?= BASEURL; ?>/Auth/gantiSandiProcess" method="post" class="space-y-4 w-full"
						onsubmit="return validasiSandi()">
						<div class="relative">
							<input type="password" id="sandiBaru" name="sandiBaru" placeholder="Masukkan Kata sandi Baru"
								class="w-full px-4 py-4 bg-[#D9D9D9]  border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
								required>
							<img src="../../../public/img/Password.png" alt="logo"
								class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
						</div>
						<input id="tampil-sandi1" type="checkbox" placeholder="" class="border rounded-l"
							onclick="showPassword('sandiBaru')">
						<label for="tampil-sandi1" class="text-[#757575]">Tampilkan kata sandi</label>
						<div class="relative">
							<input type="password" id="konfirmasiSandiBaru" placeholder="Konfirmasi Kata sandi Baru"
								class="w-full px-4 py-4 bg-[#D9D9D9]  border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
								required>
							<img src="../../../public/img/Password.png" alt="logo"
								class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
						</div>
						<input id="tampil-sandi2" type="checkbox" placeholder="" class="border rounded-l"
							onclick="showPassword('konfirmasiSandiBaru')">
						<label for="tampil-sandi2" class="text-[#757575]">Tampilkan kata sandi</label>

						<input type="hidden" value="<?= $data; ?>" name="nim">

						<div id="errorMessage" class="relative flex justify-center text-red-600"></div>
						<button type="submit" name="submit"
							class="font-bold h w-full bg-blue-800 text-white py-4 rounded-lg hover:bg-blue-900">Ganti</button>
					</form>
					<div class="flex justify-start text-blue-700 space-x-1">
						<a href="#" class="hover:underline">kembali ke Halaman Login</a>
					</div>
				</div>
			</div>
		</section>
	</div>
</section>
<script>
	<?php
	Flasher::flash();
	?>
</script>