	<!-- sidebar -->
	<aside id="default-sidebar"
		class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
		aria-label="Sidebar">
		<div class="h-full px-3 py-4 overflow-y-auto bg-[#132145]">
			<ul class="space-y-2 font-medium">
				<li>
					<div class="flex items-center justify-center text-4xl p-4 text-white rounded-lg">
						<span class="ms-3 font-bold">AchieveIT</span>
					</div>
				</li>
				<li>
					<a href="#" class="flex items-center p-2 mt-10 text-white rounded-lg hover:bg-[#3063C559]">
						<img src="../../../../public/img/Home_fill (1).png" alt="logo" class="w-5 h-5" />
						<span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
					</a>
				</li>
				<li>
					<a href="formPrestasi.html"
						class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
						<img src="../../../../public/img/File_dock_add_fill.png" alt="logo" class="w-5 h-5" />
						<span class="flex-1 ms-3 whitespace-nowrap">Form Prestasi</span>
					</a>
				</li>
				<li>
					<a href="#" class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
						<img src="../../../../public/img/File_dock_search_fill.png" alt="logo" class="w-5 h-5" />
						<span class="flex-1 ms-3 whitespace-nowrap">Daftar Prestasi</span>
					</a>
				</li>
				<li>
					<a href="#" class="flex items-center p-2 text-[#FEC01A] rounded-lg bg-[#3063C559]">
						<img src="../../../../public/img/Layers_fill.png" alt="logo" class="w-5 h-5" />
						<span class="flex-1 ms-3 whitespace-nowrap">Administrasi Data</span>
					</a>
				</li>
				<li>
					<a href="#" class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
						<img src="../../../../public/img/User_circle.png" alt="logo" class="w-5 h-5" />
						<span class="flex-1 ms-3 whitespace-nowrap">Lihat Profil</span>
					</a>
				</li>
			</ul>
		</div>
	</aside>

	<section class="sm:ml-64 bg-blue-50 min-h-screen">
		<!-- profil -->
		<section class="flex justify-end items-center p-8 space-x-3">
			<p class="font-bold">Admin12345</p>
			<img src="../../../../public/img/Logo_archhieveIT.png" alt="logo" class="w-8 h-auto" />
		</section>

		<!-- Edit Data Mahasiswa-->
		<section class="flex-col justify-start pl-6">
			<p class="font-bold text-3xl">Edit Data Mahasiswa</p>
		</section>

		<!-- btn back -->
		<section class="flex justify-end pr-6">
			<a href="<?=BASEURL;?>./">
				<button
					class="flex items-center font-semibold space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
					<img src="../../../../public/img/back.png" alt="logo" class="w-5 h-5" />
					<p>kembali</p>
				</button>
			</a>
		</section>

		<!-- Edit Data Mahasiswa -->
		<section class="relative p-6">
			<!-- Static parent -->
			<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
				Edit Data Mahasiswa
			</div>
			<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">

				<!-- NIM -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">NIM <span
						class="text-red-600">*</span></label>
				<input type="text" placeholder=""
					class="placeholder-black border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm" />

				<!-- Nama -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Nama<span
						class="text-red-600">*</span></label>
				<input type="text" placeholder=""
					class="placeholder-black border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm" />

				<!-- Program Studi -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Program Studi<span
						class="text-red-600">*</span></label>
				<input type="text" placeholder=""
					class="placeholder-black border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm" />

				<!-- Tempat Lahir -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Tempat Lahir<span
						class="text-red-600">*</span></label>
				<input type="text" placeholder=""
					class="placeholder-black border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm" />

				<!-- Tanggal Lahir -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Tanggal Lahir<span
						class="text-red-600">*</span></label>
				<input type="date" placeholder=""
					class="placeholder-black border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm" />

				<!-- Agama -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Agama<span
						class="text-red-600">*</span></label>
				<input type="text" placeholder=""
					class="placeholder-black border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm" />

				<!-- Jenis Kelamin -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Jenis Kelamin<span
						class="text-red-600">*</span></label>
				<input type="text" placeholder=""
					class="placeholder-black border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm" />

				<!-- NO tlp -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">No Telepon<span
						class="text-red-600">*</span></label>
				<input type="text" placeholder=""
					class="placeholder-black border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm" />

				<!-- Email -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Email<span
						class="text-red-600">*</span></label>
				<input type="email" placeholder=""
					class="placeholder-black border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm" />

				<!-- Pass -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Password<span
						class="text-red-600">*</span></label>
				<input type="password" placeholder=""
					class="placeholder-black border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm" />

				<div class="flex justify-start space-x-1">
					<input type="checkbox" placeholder="" class=" border rounded-lg " />
					<p class="text-[#757575]">Tampilkan kata sandi</p>
				</div>



			</div>
		</section>

		<!-- btn -->
		<section class="flex space-x-4 justify-start pl-4 pb-6">
			<div class="justify-center p-2">
				<a href="<?=BASEURL;?>./">
					<button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#34C759] rounded-lg w-auto">
						<img src="../../../../public/img/simpan.png" alt="logo" class="w-5 h-5">
						<p>Simpan</p>
					</button>
				</a>
			</div>

			<div class="justify-center p-2">
				<a href="<?=BASEURL;?>./">
					<button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#FF3B30] rounded-lg">
						<img src="../../../../public/img/Refresh.png" alt="logo" class="w-5 h-5">
						<p>Reset</p>
					</button>

				</a>
			</div>
		</section>
	</section>