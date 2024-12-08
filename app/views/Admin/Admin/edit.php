<section class="sm:ml-64 bg-blue-50 min-h-screen">

	<?php require_once __DIR__ .'../../../templates/profiles.php'; ?>

	<!-- data Admin-->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Edit Data Admin</p>
	</section>

	<!-- btn back -->
	<section class="flex justify-end pr-6">
		<a href="<?= BASEURL; ?>/Admin/adminList">
			<button
				class="flex items-center font-semibold space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
				<img src="../../../public/img/back.png" alt="logo" class="w-5 h-5" />
				<p>kembali</p>
			</button>
		</a>
	</section>

	<form action="<?=BASEURL;?>/Admin/update" method="post">
	<!-- Edit Data Admin -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Edit Data Admin
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">

			<!-- Nama -->
			<label for="nama" class="block text-gray-700 font-medium pt-6">Nama <span
					class="text-red-600">*</span></label>
			<input type="text" value="<?=$data['nama']?>" name="nama" id="nama" required
				class="placeholder-black border rounded-lg px-2 py-1.5 w-1/3 bg-white shadow-gray-400 shadow-sm" />

			<!-- NIP -->
			<label for="nip" class="block text-gray-700 font-medium pt-6">NIP<span
					class="text-red-600">*</span></label>
			<input type="text" value="<?=$data['nip']?>" name="nip" id="nip" required
				class="placeholder-black border rounded-lg px-2 py-1.5 w-1/3 bg-white shadow-gray-400 shadow-sm" />

			<!-- Role -->
			<label for="role" class="block text-gray-700 font-medium pt-6">Role<span
					class="text-red-600">*</span></label>
			<select name="role" id="role" class="placeholder-black border rounded-lg px-2 py-1.5.5 w-1/3 bg-white shadow-gray-400 shadow-sm">
				<option value="Ketua Jurusan" <?php if($data['role'] == 'Ketua Jurusan') echo 'selected'; ?>>Ketua Jurusan</option>
				<option value="Super Admin" <?php if($data['role'] == 'Super Admin') echo 'selected'; ?>>Super Admin</option>
				<option value="Admin" <?php if($data['role'] == 'Admin') echo 'selected'; ?>>Admin</option>
			</select>	

			<!-- Pass -->
			<label for="password" class="block text-gray-700 font-medium pt-6">Password<span
					class="text-red-600">*</span></label>
			<input type="password" value="<?=$data['password']?>" name="password" id="password" required
				class="placeholder-black border rounded-lg px-2 py-1.5 w-1/3 bg-white shadow-gray-400 shadow-sm" />
			
			<div class="flex justify-start space-x-1">
				<input type="checkbox" placeholder="" class=" border rounded-lg" onclick="showPassword()" />
				<label class="text-[#757575]" for="tampil-sandi">Tampilkan kata Sandi</label>
			</div>
			<input type="hidden" name="id_admin" value="<?=$data['id_admin']?>">

		</div>
	</section>

	<!-- btn -->
	<section class="flex space-x-4 justify-start pl-4 pb-6">
		<div class="justify-center p-2">
			
				<button type="submit" class="flex items-center space-x-2 py-2 px-6 text-white bg-[#34C759] rounded-lg w-auto">
					<img src="../../../public/img/simpan.png" alt="logo" class="w-5 h-5">
					<p>Simpan</p>
				</button>

		</div>

		<div class="justify-center p-2">
			<a href="<?= BASEURL; ?>/Admin/edit/<?=$data['id_admin']?>">
				<div class="flex items-center space-x-2 py-2 px-6 text-white bg-[#FF3B30] rounded-lg">
					<img src="../../../public/img/Trash.png" alt="logo" class="w-5 h-5">
					<p>Hapus</p>
				</div>
			</a>
		</div>
	</section>
	
	</form>
</section>