<section class="sm:ml-64 bg-blue-50 min-h-screen">

	<?php require_once __DIR__ .'../../../templates/profiles.php'; ?>

	<!-- Tambah Data Mahasiswa-->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Tambah Data Mahasiswa</p>
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

	<!-- Form -->
	<form action="<?=BASEURL;?>/Mahasiswa/store" method="post">
		<!-- Tambah Data Mahasiswa -->
		<section class="relative p-6">
			<!-- Static parent -->
			<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
				Tambah Data Mahasiswa
			</div>
			<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
	
				<!-- NIM -->
				<label for="nim" class="block text-gray-700 font-medium pt-6">NIM <span
						class="text-red-600">*</span></label>
				<input type="text" required placeholder="" id="nim" name="nim"
					class="placeholder-black border rounded-lg px-2 py-1.5 w-1/3 bg-white shadow-gray-400 shadow-sm" />
	
				<!-- Nama -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Nama<span
						class="text-red-600">*</span></label>
				<input type="text" required placeholder="" id="nama" name="nama"
					class="placeholder-black border rounded-lg px-2 py-1.5 w-1/3 bg-white shadow-gray-400 shadow-sm" />
	
				<!-- Program Studi -->
				<label for="prodi" class="block text-gray-700 font-medium pt-6">Program Studi<span
				class="text-red-600">*</span></label>
				<select name="id_prodi" id="prodi" class="placeholder-black border rounded-lg px-2 py-1.5 w-1/3 bg-white shadow-gray-400 shadow-sm">
					<?php 
					foreach ($data['prodi'] as $prodi) {
						echo "<option value=" . $prodi['id_prodi'] . ">" . $prodi['nama_prodi'] . "</option>";
					}
					?>
				</select>
	
				<!-- Tempat Lahir -->
				<label for="tempat_lahir" class="block text-gray-700 font-medium pt-6">Tempat Lahir<span
						class="text-red-600">*</span></label>
				<input type="text" required placeholder="" id="tempat_lahir" name="tempat_lahir"
					class="placeholder-black border rounded-lg px-2 py-1.5 w-1/3 bg-white shadow-gray-400 shadow-sm" />
	
				<!-- Tanggal Lahir -->
				<label for="tanggal_lahir" class="block text-gray-700 font-medium pt-6">Tanggal Lahir<span
						class="text-red-600">*</span></label>
				<input type="date" required placeholder="" id="tanggal_lahir" name="tanggal_lahir"
					class="placeholder-black border rounded-lg px-2 py-1.5 w-1/3 bg-white shadow-gray-400 shadow-sm" />
	
				<!-- Agama -->
				<label for="agama" class="block text-gray-700 font-medium pt-6">Agama<span
						class="text-red-600">*</span></label>
				<select name="agama" id="agama" class="placeholder-black border rounded-lg px-2 py-1.5 w-1/3 bg-white shadow-gray-400 shadow-sm">
					<option value="Islam">Islam</option>
					<option value="Kristen Katolik">Kristen Katolik</option>
					<option value="Kristen Protestan">Kristen Protestan</option>
					<option value="Hindu">Hindu</option>
					<option value="Buddha">Buddha</option>
					<option value="Konghucu">Konghucu</option>
				</select>
				
				<!-- Jenis Kelamin -->		
				<label for="jenis_kelamin" class="block text-gray-700 font-medium pt-6">Jenis Kelamin<span
				class="text-red-600">*</span></label>
				<select name="jenis_kelamin" id="jenis_kelamin" class="placeholder-black border rounded-lg px-2 py-1.5 w-1/3 bg-white shadow-gray-400 shadow-sm">
					<option value="Laki-laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
				
				<!-- NO tlp -->
				<label for="no_telepon" class="block text-gray-700 font-medium pt-6">No Telepon<span
						class="text-red-600">*</span></label>
				<input type="text" required placeholder="" id="no_telepon" name="no_telepon"
					class="placeholder-black border rounded-lg px-2 py-1.5 w-1/3 bg-white shadow-gray-400 shadow-sm" />
	
				<!-- Email -->
				<label for="email" class="block text-gray-700 font-medium pt-6">Email<span
						class="text-red-600">*</span></label>
				<input type="email" required placeholder="" id="email" name="email"
					class="placeholder-black border rounded-lg px-2 py-1.5 w-1/3 bg-white shadow-gray-400 shadow-sm" />
	
				<!-- Password -->
				<label for="password" class="block text-gray-700 font-medium pt-6">Password<span
						class="text-red-600">*</span></label>
				<input type="password" required placeholder="" id="password" name="password"
					class="placeholder-black border rounded-lg px-2 py-1.5 w-1/3 bg-white shadow-gray-400 shadow-sm" />
	
				<div class="flex justify-start space-x-1">
					<input type="checkbox" placeholder="" class=" border rounded-lg" onclick="showPassword()" />
					<p class="text-[#757575]">Tampilkan kata sandi</p>
				</div>

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
				<button type="reset" class="flex items-center space-x-2 py-2 px-6 text-white bg-[#FF3B30] rounded-lg">
					<img src="../../../../public/img/Refresh.png" alt="logo" class="w-5 h-5">
					<p>Reset</p>
				</button>
			</div>
		</section>
	</form>
</section>