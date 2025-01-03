<section class="sm:ml-64 bg-blue-50 min-h-screen">

	<?php require_once __DIR__ . '../../../templates/profiles.php'; ?>

	<!-- Edit Juara-->
	<section class="flex-col justify-start pt-20 md:pt-0 pl-6">
		<p class="font-bold text-3xl">Edit Juara</p>
	</section>

	<!-- btn back -->
	<section class="flex justify-end pr-6">
		<a href="<?= BASEURL; ?>/Admin/pengaturanPrestasi">
			<button
				class="flex items-center font-semibold space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
				<img src="../../../../public/img/back.png" alt="logo" class="w-5 h-5" />
				<p>kembali</p>
			</button>
		</a>
	</section>

	<form action="<?= BASEURL; ?>/Juara/update" method="POST">
		<!-- Edit Juara -->
		<section class="relative p-6">
			<!-- Static parent -->
			<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
				Edit Juara
			</div>
			<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">

				<!-- Juara -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Juara<span
						class="text-red-600">*</span></label>
				<input type="text" name="juara" value="<?= $data['juara'] ?>"
					class="placeholder-black border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm" />
				<!-- Juara -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Poin<span
						class="text-red-600">*</span></label>
				<input type="text" name="poin" value="<?= $data['poin'] ?>"
					class="placeholder-black border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm" />

			</div>
		</section>

		<!-- btn -->
		<section class="flex space-x-4 justify-start pl-4 pb-6">
			<div class="justify-center p-2">
				<button type="submit" name="submit"
					class="flex items-center space-x-2 py-2 px-6 text-white bg-[#34C759] rounded-lg w-auto">
					<img src="../../../../public/img/simpan.png" alt="logo" class="w-5 h-5">
					<p>Simpan</p>
				</button>
			</div>

			<div class="justify-center p-2">
				<a href="<?= BASEURL; ?>/Juara/delete/<?= $data['id_juara'] ?>">
					<div class="flex items-center space-x-2 py-2 px-6 text-white bg-[#FF3B30] rounded-lg">
						<img src="../../../public/img/Trash.png" alt="logo" class="w-5 h-5">
						<p>Hapus</p>
					</div>
				</a>
			</div>
		</section>

		<input type="hidden" name="id_juara" value="<?= $data['id_juara'] ?>">
	</form>
</section>