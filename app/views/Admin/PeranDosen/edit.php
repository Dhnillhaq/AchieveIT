<section class="sm:ml-64 bg-blue-50 min-h-screen">

	<?php require_once __DIR__ .'../../../templates/profiles.php'; ?>

	<!-- Edit peran-->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Edit Peran Dosen Pembimbing</p>
	</section>

	<!-- btn back -->
	<section class="flex justify-end pr-6">
		<a href="<?= BASEURL; ?>/Admin/administrasiData">
			<button
				class="flex items-center font-semibold space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
				<img src="../../../../../public/img/back.png" alt="logo" class="w-5 h-5" />
				<p>kembali</p>
			</button>
		</a>
	</section>

	<!-- Edit peran -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Edit Peran Dosen Pembimbing
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">

			<!-- nama -->
			<label for="nama" class="block text-gray-700 font-medium pt-6">Peran<span
					class="text-red-600">*</span></label>
			<input type="text"
				placeholder="Membimbing mahasiswa mengikuti  kompetisi dibidang akademik dan kemahasiswaan bereputasi dan mencapai juara tingkat Internasional"
				class="placeholder-black border rounded-lg px-2 py-1 w-full bg-white shadow-gray-400 shadow-sm" />


		</div>
	</section>

	<!-- btn -->
	<section class="flex space-x-4 justify-start pl-4 pb-6">
		<div class="justify-center p-2">
			<a href="<?= BASEURL; ?>/">
				<button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#34C759] rounded-lg w-auto">
					<img src="../../../../public/img/simpan.png" alt="logo" class="w-5 h-5">
					<p>Simpan</p>
				</button>
			</a>
		</div>

		<div class="justify-center p-2">
			<a href="<?= BASEURL; ?>/">
				<button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#FF3B30] rounded-lg">
					<img src="../../../../public/img/Refresh.png" alt="logo" class="w-5 h-5">
					<p>Reset</p>
				</button>

			</a>
		</div>
	</section>
</section>