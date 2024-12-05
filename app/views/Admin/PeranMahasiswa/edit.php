<section class="sm:ml-64 bg-blue-50 min-h-screen">

	<?php require_once __DIR__ .'../../../templates/profiles.php'; ?>

	<!-- Edit Peran Mahasiswa-->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Edit Peran Mahasiswa</p>
	</section>

	<!-- btn back -->
	<section class="flex justify-end pr-6">
		<a href="<?= BASEURL; ?>/Mahasiswa/listMhs">
			<button
				class="flex items-center font-semibold space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
				<img src="../../../../public/img/back.png" alt="logo" class="w-5 h-5" />
				<p>kembali</p>
			</button>
		</a>
	</section>

	<form action="<?= BASEURL; ?>/PeranMahasiswa/update" method="post">
		<!-- Edit Peran Mahasiswa -->
		<section class="relative p-6">
			<!-- Static parent -->
			<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
				Edit Peran Mahasiswa
			</div>
			<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
				<!-- Peran Mahasiswa -->
				<label for="peran" class="block text-gray-700 font-medium pt-6">Peran Mahasiswa <span
						class="text-red-600">*</span></label>
				<input type="text" placeholder="" id="peran" name="peran" required value="<?=$data['peran']?>"
					class="placeholder-black border rounded-lg px-2 py-1.5 w-1/3 bg-white shadow-gray-400 shadow-sm" />

				<input type="hidden" name="id_peran" value="<?=$data['id_peran']?>">
				
			</div>
		</section>
	
		<!-- btn -->
		<section class="flex space-x-4 justify-start pl-4 pb-6">
			<!-- Button submit -->
			<div class="justify-center p-2">
				<button type="submit" name="submit" class="flex items-center space-x-2 py-2 px-6 text-white bg-[#34C759] rounded-lg w-auto">
						<img src="../../../../public/img/simpan.png" alt="logo" class="w-5 h-5">
						<p>Simpan</p>
				</button>
			</div>
	
			<!-- Button reset -->
			<div class="justify-center p-2">
				<a href="<?=BASEURL;?>/PeranMahasiswa/delete/<?=$data['id_peran']?>">
					<div class="flex items-center space-x-2 py-2 px-6 text-white bg-[#FF3B30] rounded-lg">
						<img src="../../../../public/img/Trash.png" alt="logo" class="w-5 h-5">
						<p>Hapus</p>
					</div>
				</a>
			</div>
		</section>
	</form>
</section>