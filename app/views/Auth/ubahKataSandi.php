<section class="sm:ml-64 bg-blue-50 min-h-screen">

	<!-- profil -->
	<div class="hidden md:block">
		<?php require_once __DIR__ .'/../templates/profiles.php'; ?>
	</div>

	<!-- Ubah Kata Sandi -->
	<section class="flex-col justify-start pt-20 md:pt-0 pl-6">
		<p class="font-bold text-3xl">Ubah Kata Sandi</p>
	</section>
	<form action="<?= BASEURL; ?>/Auth/passProcess" method="POST" id="formLupaSandi" onsubmit="return validasiSandi()">

		<!-- ubah kata sandi -->
		<section class="relative p-6">
			<!-- Static parent -->
			<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
				Ubah Kata Sandi
			</div>
			<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
				<!-- lama -->
				<label for="sandiLama" class="block text-gray-700 font-medium pt-6">Kata Sandi Lama <span
						class="text-red-600">*</span></label>
				<input type="password" id="sandiLama" name="sandiLama"
					class="placeholder-black border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm"
					required />
				<div class="flex justify-start space-x-1">
					<input id="tampil-sandi1" type="checkbox" class="border rounded-l"
						onclick="showPassword('sandiLama')">
					<label for="tampil-sandi1" class="text-[#757575]">Tampilkan kata sandi</label>
				</div>

				<!-- baru -->
				<label for="sandiBaru" class="block text-gray-700 font-medium pt-6">Kata Sandi Baru <span
						class="text-red-600">*</span></label>
				<input type="password" id="sandiBaru" name="sandiBaru"
					class="placeholder-black border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm"
					required />
				<div class="flex justify-start space-x-1">
					<input id="tampil-sandi2" type="checkbox" class="border rounded-l"
						onclick="showPassword('sandiBaru')">
					<label for="tampil-sandi2" class="text-[#757575]">Tampilkan kata sandi</label>
				</div>

				<!-- konfirm -->
				<label for="konfirmasiSandiBaru" class="block text-gray-700 font-medium pt-6">Konfirmasi Kata Sandi Baru
					<span class="text-red-600">*</span></label>
				<input type="password" id="konfirmasiSandiBaru"
					class="placeholder-black border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm"
					required />
				<div class="flex justify-start space-x-1">
					<input id="tampil-sandi3" type="checkbox" class="border rounded-l"
						onclick="showPassword('konfirmasiSandiBaru')">
					<label for="tampil-sandi3" class="text-[#757575]">Tampilkan kata sandi</label>
				</div>

			</div>
		</section>

		<!-- btn -->
		<section class="flex space-x-4 justify-start pl-4 pb-6">
			<div class="justify-center p-2">

				<?php if ($_SESSION['user']['role'] == "Mahasiswa") { ?>
					<a href="<?= BASEURL; ?>/Mahasiswa/profil">
					<?php } else if ($_SESSION['user']['role'] == "Ketua Jurusan") { ?>
							<a href="<?= BASEURL; ?>/Kajur/profil">
						<?php } else { ?>
								<a href="<?= BASEURL; ?>/Admin/profil">
							<?php } ?>
							<div
								class="flex items-center space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
								<img src="../../../public/img/Back.png" alt="logo" class="w-5 h-5">
								<p>Kembali</p>
							</div>
						</a>
			</div>

			<div class="justify-center p-2">
				<button type="submit" name="submit"
					class="flex items-center space-x-2 py-2 px-6 text-white bg-[#34C759] rounded-lg w-auto">
					<img src="../../../public/img/simpan.png" alt="logo" class="w-5 h-5">
					<p>Simpan</p>
				</button>
			</div>
		</section>
	</form>
</section>

<script>
	function validasiSandi() {
		// Ambil elemen input
		const sandiBaru = document.getElementById("sandiBaru");
		const konfirmasiSandiBaru = document.getElementById("konfirmasiSandiBaru");

		// Ambil nilai input
		const sandiBaruValue = sandiBaru.value;
		const konfirmasiSandiBaruValue = konfirmasiSandiBaru.value;

		// Reset class error sebelumnya
		sandiBaru.classList.remove("error");
		konfirmasiSandiBaru.classList.remove("error");

		// Periksa apakah nilai input berbeda
		if (sandiBaruValue !== konfirmasiSandiBaruValue) {
			// Tambahkan class "error" ke input box
			sandiBaru.classList.add("error");
			konfirmasiSandiBaru.classList.add("error");
			return false; // Mencegah pengiriman form
		}

		// Jika sama, lanjutkan pengiriman
		return true;
	}
</script>