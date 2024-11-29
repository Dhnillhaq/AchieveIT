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
						<img src="../../../public/img/Home_fill (1).png" alt="logo" class="w-5 h-5" />
						<span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
					</a>
				</li>
				<li>
					<a href="<?=BASEURL;?>./"
						class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
						<img src="../../../public/img/File_dock_add_fill.png" alt="logo" class="w-5 h-5" />
						<span class="flex-1 ms-3 whitespace-nowrap">Form Prestasi</span>
					</a>
				</li>
				<li>
					<a href="<?=BASEURL;?>./" class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
						<img src="../../../public/img/File_dock_search_fill.png" alt="logo" class="w-5 h-5" />
						<span class="flex-1 ms-3 whitespace-nowrap">Daftar Prestasi</span>
					</a>
				</li>
				<li>
					<a href="<?=BASEURL;?>./" class="flex items-center p-2 text-[#FEC01A] rounded-lg bg-[#3063C559]">
						<img src="../../../public/img/Layers_fill.png" alt="logo" class="w-5 h-5" />
						<span class="flex-1 ms-3 whitespace-nowrap">Administrasi Data</span>
					</a>
				</li>
				<li>
					<a href="<?=BASEURL;?>./" class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
						<img src="../../../public/img/User_circle.png" alt="logo" class="w-5 h-5" />
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
			<img src="../../../public/img/Logo_archhieveIT.png" alt="logo" class="w-8 h-auto" />
		</section>

		<!-- data Admin-->
		<section class="flex-col justify-start pl-6">
			<p class="font-bold text-3xl">Data Admin</p>
		</section>



		<!-- informasi admin -->
		<section class="relative p-6">
			<!-- Static parent -->
			<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
				Informasi Admin
			</div>
			<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
				<!-- cari -->
				<section class="flex justify-between p-6">
					<div
						class="flex items-center bg-white w-1/3 p-2 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
						<img src="../../../public/img/Search (1).png" alt="logo" class="w-5 h-5" />
						<input type="text" id="cari" placeholder="" class="bg-white flex focus:outline-none" />
					</div>

					<!-- btn tambah -->
					<a href="<?=BASEURL;?>./">
						<button
							class="flex items-center font-semibold space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
							<img src="../../../public/img/add.png" alt="logo" class="w-5 h-5" />
							<p>Tambah</p>
						</button>
					</a>
				</section>

				<!-- table -->
				<div class="mt-10 overflow-x-auto bg-white shadow-md rounded-2xl">
					<table class="min-w-full bg-white text-center">
						<thead>
							<tr>
								<th
									class="py-2 px-4 w-1/12 bg-blue-950 text-white font-semibold border border-blue-950">
									No
								</th>
								<th
									class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
									Nama
								</th>
								<th
									class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
									NIP
								</th>
								<th
									class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
									Role
								</th>
								<th class="py-2 px-4 w-1/4 bg-blue-950 text-white font-semibold border border-blue-950">
									Aksi
								</th>
							</tr>
						</thead>
						<tbody class="text-left">
							<tr>
								<td class="py-2 px-4 border border-blue-950">1</td>
								<td class="py-2 px-4 border border-blue-950">Admin12345</td>
								<td class="py-2 px-4 border border-blue-950">1987123456</td>
								<td class="py-2 px-4 border border-blue-950">Admin</td>
								<td class="py-2 px-4 border border-blue-950">
									<button class="bg-[#132145] py-2 px-2 rounded-md mr-2">
										<img src="../../../public/img/Edit_fill.png" alt="logo" class="">
									</button>
									<button class="bg-[#FF3B30] py-2 px-2 rounded-md">
										<img src="../../../public/img/Trash.png" alt="logo" class="">
									</button>
								</td>
							</tr>
							<tr>
								<td class="py-2 px-4 border border-blue-950">2</td>
								<td class="py-2 px-4 border border-blue-950">Kajur12345</td>
								<td class="py-2 px-4 border border-blue-950">2001345678</td>
								<td class="py-2 px-4 border border-blue-950">Ketua Jurusan</td>
								<td class="py-2 px-4 border border-blue-950">
									<button class="bg-[#132145] py-2 px-2 rounded-md mr-2">
										<img src="../../../public/img/Edit_fill.png" alt="logo" class="">
									</button>
									<button class="bg-[#FF3B30] py-2 px-2 rounded-md">
										<img src="../../../public/img/Trash.png" alt="logo" class="">
									</button>
								</td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</section>

		<!-- btn -->
		<section class="justify-center p-6">
			<a href="<?=BASEURL;?>./">
				<button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
					<img src="../../../public/img/Back.png" alt="logo" class="w-5 h-5" />
					<p>Kembali</p>
				</button>
			</a>
		</section>
	</section>


	</section>