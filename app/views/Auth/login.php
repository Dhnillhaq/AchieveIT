<section class="relative bg-cover bg-center h-min-screen"
	style="background-image: url('../../../public/img/gedung-jti.png');">
	<div class="absolute inset-0 bg-[#132145D4] bg-opacity-80"></div>


	<!-- kembali -->
	<a href="<?= BASEURL; ?>"
		class="absolute top-4 left-4 flex items-center space-x-2 text-white px-4 py-2 rounded-lg hover:underline z-20">
		<img src="../../../public/img/Sign_out_squre.png" alt="back" class="w-4 h-4" />
		<span class="font-light">Kembali</span>
	</a>

	<div class="relative z-10 flex justify-between">
		<!-- left side -->
		<section class="w-1/2 flex items-center justify-center px-10 text-white">
			<h1 class="text-6xl font-bold">Selamat datang di <span class="text-[#FEC01A]">AchieveIT!</span></h1>
		</section>

		<!-- right side -->
		<section class="w-2/5 h-screen flex-col space-y-6 items-start justify-center py-6 pr-20">
			<div class="flex justify-center items-center bg-white rounded-3xl shadow-lg h-full">
				<div class="px-14 py-20 space-y-6 w-full max-w-screen-xl">
					<div class="flex justify-center items-start">
						<img src="../../../public/img/logo_polinema.png" alt="logo" class="w-auto h-32" />
						<img src="../../../public/img/logo_jti.png" alt="logo" class="w-auto h-32" />
					</div>
					<h1 class="text-4xl font-bold text-center my-8">Masuk</h1>
					<form method="post" action="<?= BASEURL; ?>/Auth/login" class="space-y-4 w-full">
						<div class="relative">
							<input type="text" id="Nama pengguna" name="username" placeholder="Masukkan NIP/NIM"
								class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
								required title="Mohon ini wajib diisi!">
							<img src="../../../public/img/User.png" alt="logo"
								class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
						</div>
						<div class="relative">
							<input type="password" id="password" name="password" placeholder="Kata sandi"
								class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
								required>
							<img src="../../../public/img/Lock.png" alt="logo"
								class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
						</div>
						<?php
						if (isset($data['message'])) {
							echo '<span class="text-red-600 flex justift-center text-center">' . $data['message'] . '</span>';
						}
						?>
						<div class="flex justify-start space-x-1">
							<input id="tampil-sandi" type="checkbox" placeholder="" class="border rounded-l"
								onclick="showPassword()">
							<label for="tampil-sandi" class="text-[#757575]">Tampilkan kata sandi</label>
						</div>
						<button type="submit" name="submit"
							class="font-bold mt-4 w-full bg-blue-800 text-white py-3 rounded-lg hover:bg-blue-900">Masuk</button>
							<div class="flex justify-start text-blue-700 space-x-1">
								<span>Belum punya akun? <a href="#" class="hover:underline">Daftar</a></span>
							</div>
					</form>
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