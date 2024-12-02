<section class="sm:ml-64 bg-blue-50 min-h-screen">

	<?php require_once __DIR__ . '../../../templates/profiles.php'; ?>

	<!-- data dosen-->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Data Dosen</p>
	</section>



	<!-- data dosen -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Data Dosen
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<!-- btn tambah -->
			<section class="flex justify-end pr-6">
				<a href="<?= BASEURL; ?>/Dosen/Create">
					<button
						class="flex items-center font-semibold space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
						<img src="../../../public/img/add.png" alt="logo" class="w-5 h-5" />
						<p>Tambah</p>
					</button>
				</a>
			</section>

			<!-- cari -->
			<section class="flex justify-between p-6">
				<div
					class="flex items-center bg-white w-1/3 p-2 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
					<img src="../../../public/img/Search (1).png" alt="logo" class="w-5 h-5" />
					<input type="text" id="cari" placeholder="" class="bg-white flex focus:outline-none" />
				</div>
				<div class="flex justify-end right-0 space-x-2">
					<div class="flex items-center">
						<span class="">Lihat</span>
						<select
							class="mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="50">50</option>
						</select>
						<span class="">entri</span>
					</div>
				</div>
			</section>

			<!-- table -->
			<div class="mt-10 overflow-x-auto bg-white shadow-md rounded-2xl">
				<table class="min-w-full bg-white text-center">
					<thead>
						<tr>
							<th class="py-2 px-4 w-1/12 bg-blue-950 text-white font-semibold border border-blue-950">
								No
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								Nama
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								NIP
							</th>
							<th class="py-2 px-4 w-1/4 bg-blue-950 text-white font-semibold border border-blue-950">
								Aksi
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($data['dosen'] as $dosen) { ?>
							<tr>
								<td class="py-2 px-4 border border-blue-950"><?= $no ?></td>
								<td class="py-2 px-4 border border-blue-950"><?= $dosen['nama'] ?></td>
								<td class="py-2 px-4 border border-blue-950"><?= $dosen['nip'] ?></td>
								<td class="py-2 px-4 border border-blue-950">
									<a href="<?= BASEURL; ?>/Dosen/edit/<?=$dosen['id_dosen']?>">
										<button class="bg-[#132145] py-2 px-2 rounded-md mr-2">
											<img src="../../../public/img/Edit_fill.png" alt="logo">
										</button>
									</a>
									<a href="<?= BASEURL; ?>/Dosen/delete/<?=$dosen['id_dosen']?>">
										<button class="bg-[#FF3B30] py-2 px-2 rounded-md">
											<img src="../../../public/img/Trash.png" alt="logo">
										</button>
									</a>
								</td>
							</tr>
							<?php
							$no++;
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>

	<!-- peran admin -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Daftar Peran
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
				<a href="<?= BASEURL; ?>/PeranDosen/create">
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
							<th class="py-2 px-4 w-1/12 bg-blue-950 text-white font-semibold border border-blue-950">
								No
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								Peran
							</th>
							<th class="py-2 px-4 w-1/4 bg-blue-950 text-white font-semibold border border-blue-950">
								Aksi
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($data['peranDosen'] as $pd) { ?>
							<tr>
								<td class="py-2 px-4 border border-blue-950"><?= $no ?></td>
								<td class="py-2 px-4 border border-blue-950"><?= $pd['peran'] ?></td>
								<td class="py-2 px-4 border border-blue-950">
									<a href="<?= BASEURL; ?>/PeranDosen/edit/<?= $pd['id_peran'] ?>">
										<button class="bg-[#132145] py-2 px-2 rounded-md mr-2">
											<img src="../../../public/img/Edit_fill.png" alt="logo">
										</button>
									</a>
									<a href="<?= BASEURL; ?>/PeranDosen/delete/<?= $pd['id_peran'] ?>">
										<button class="bg-[#FF3B30] py-2 px-2 rounded-md">
											<img src="../../../public/img/Trash.png" alt="logo">
										</button>
									</a>
								</td>
							</tr>
							<?php
							$no++;
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>

	<!-- btn -->
	<section class="justify-center p-6">
		<a href="<?= BASEURL; ?>/Admin/administrasiData">
			<button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
				<img src="../../../public/img/Back.png" alt="logo" class="w-5 h-5" />
				<p>Kembali</p>
			</button>
		</a>
	</section>
</section>