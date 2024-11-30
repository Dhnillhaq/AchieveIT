<section class="sm:ml-64 bg-blue-50 min-h-screen ">

	<?php require_once __DIR__ .'/../templates/profiles.php'; ?>

	<!-- tambah prestasi -->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Tambah prestasi</p>
	</section>

	<!-- cari -->
	<section class="flex justify-between p-6">
		<div
			class="flex items-center bg-white w-1/3 p-2 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
			<img src="../../../public/img/Search (1).png" alt="logo" class="w-5 h-5">
			<input type="text" id="cari" placeholder="" class="bg-white flex focus:outline-none" />
		</div>
		<div class="flex right-0 space-x-2">
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
			<div class="flex items-center">
				<select
					class="right-0 mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
					<?php
				foreach ($data['tk'] as $tk) {
					echo "<option>{$tk['tingkat_kompetisi']}</option>";
				}
				?>
				</select>
			</div>
			<div class="flex items-center">
				<select
					class="right-0 mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
					<?php
				foreach ($data['kp'] as $kp) {
					echo "<option>{$kp['kategori']}</option>";
				}
				?>
				</select>
			</div>
		</div>
	</section>

	<!-- table -->
	<section class="mx-6 overflow-x-auto bg-white shadow-md rounded-2xl">
		<table class="min-w-full bg-white text-center">
			<thead>
				<tr>
					<th class="w-1/12 py-2 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						No
					</th>
					<th class="w-auto py-2 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Nama Kompetisi
					</th>
					<th class="w-auto py-2 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Tingkat Kompetisi
					</th>
					<th class="w-auto py-2 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Kategori Kompetisi
					</th>
					<th class="w-auto py-2 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Juara
					</th>
					<th class="w-1/12 py-2 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Poin
					</th>
					<th class="w-1/12 py-2 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Aksi
					</th>
				</tr>
			</thead>
			<tbody class="text-gray-700">
					<?php 
					foreach ($data['mahasiswa'] as $mhs) { ?>
				<tr>
					<td class="py-2 px-4 border border-blue-950"><?=$mhs['id_prestasi']?></td>
					<td class="py-2 px-4 border border-blue-950"><?=$mhs['nama_kompetisi']?></td>
					<td class="py-2 px-4 border border-blue-950"><?=$mhs['tingkat_kompetisi']?></td>
					<td class="py-2 px-4 border border-blue-950"><?=$mhs['kategori_kompetisi']?></td>
					<td class="py-2 px-4 border border-blue-950"><?=$mhs['juara']?></td>
					<td class="py-2 px-4 border border-blue-950"><?=$mhs['poin']?></td>
					<td class="py-2 px-4 border border-blue-950">
						<button class="">
							<img src="../../../public/img/Aksi.png" alt="logo" class="p-2 bg-[#132145] rounded-md">
						</button>
					</td>
				</tr>
					<?php }
					?>
				
			</tbody>
		</table>
	</section>
</section>