<section class="sm:ml-64 bg-blue-50 min-h-screen">

	<?php require_once __DIR__ . '/../templates/profiles.php'; ?>

	<!-- pengaturan kompetisi-->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Pengaturan Kompetisi</p>
	</section>

	<!-- Kategori Kompetisi -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Daftar Kategori Kompetisi
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<!-- cari -->
			<section class="flex justify-between p-6">
				<div
					class="flex items-center bg-white w-1/3 p-2 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
					<img src="../../../public/img/Search (1).png" alt="logo" class="w-5 h-5" />
					<input type="text" id="kategoriSearch" placeholder="" class="bg-white flex focus:outline-none w-full" />
				</div>

				<!-- btn tambah -->
				<a href="<?= BASEURL; ?>/Kategori/Create">
					<button
						class="flex items-center font-semibold space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
						<img src="../../../public/img/add.png" alt="logo" class="w-5 h-5" />
						<p>Tambah</p>
					</button>
				</a>
			</section>

			<!-- table  -->
			<div class="mt-10 overflow-x-auto bg-white shadow-md rounded-2xl">
				<table class="min-w-full bg-white text-center">
					<thead>
						<tr>
							<th class="py-2 px-4 w-1/12 bg-blue-950 text-white font-semibold border border-blue-950">
								No
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								Kategori
							</th>
							<th class="py-2 px-4 w-1/4 bg-blue-950 text-white font-semibold border border-blue-950">
								Aksi
							</th>
						</tr>
					</thead>
					<tbody id="kategoriTable">

						<?php
						$no = 1;
						foreach ($data['kategoriKompetisi'] as $kategori) {
							?>

							<tr>
								<td class="py-2 px-4 border border-blue-950"><?= $no++ ?></td>
								<td class="py-2 px-4 border border-blue-950 text-left" id="kategori">
									<?= $kategori['kategori'] ?>
								</td>
								<td class="py-2 px-4 border border-blue-950">
									<a href="<?= BASEURL; ?>/Kategori/edit/<?= $kategori['id_kategori'] ?>">
										<button class="bg-[#132145] py-2 px-2 rounded-md mr-2">
											<img src="../../../public/img/Edit_fill.png" alt="Edit" class="" />
										</button>
									</a>
									<a href="<?= BASEURL; ?>/Kategori/delete/<?= $kategori['id_kategori'] ?>">
										<button class="bg-[#FF3B30] py-2 px-2 rounded-md">
											<img src="../../../public/img/Trash.png" alt="Delete" class="" />
										</button>
									</a>
								</td>
							</tr>

						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</section>

	<!-- tingkat Kompetisi -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Daftar Tingkat Kompetisi
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<!-- cari -->
			<section class="flex justify-between p-6">
				<div
					class="flex items-center bg-white w-1/3 p-2 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
					<img src="../../../public/img/Search (1).png" alt="logo" class="w-5 h-5" />
					<input type="text" id="tkKompetisiSearch" placeholder="" class="bg-white flex focus:outline-none w-full" />
				</div>

				<!-- btn tambah -->
				<a href="<?= BASEURL; ?>/TingkatKompetisi/Create">
					<button
						class="flex items-center font-semibold space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
						<img src="../../../public/img/add.png" alt="logo" class="w-5 h-5" />
						<p>Tambah</p>
					</button>
				</a>
			</section>

			<!-- table  -->
			<div class="mt-10 overflow-x-auto bg-white shadow-md rounded-2xl">
				<table class="min-w-full bg-white text-center">
					<thead>
						<tr>
							<th class="py-2 px-4 w-1/12 bg-blue-950 text-white font-semibold border border-blue-950">
								No
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								Tingkat Kompetisi Prestasi
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								Poin
							</th>
							<th class="py-2 px-4 w-1/4 bg-blue-950 text-white font-semibold border border-blue-950">
								Aksi
							</th>
						</tr>
					</thead>
					<tbody id="tkKompetisiTable">

						<?php
						$no = 1;
						foreach ($data['tingkatKompetisi'] as $tingkatKompetisi) {
							?>

							<tr>
								<td class="py-2 px-4 border border-blue-950"><?= $no++ ?></td>
								<td class="py-2 px-4 border border-blue-950 text-left" id="tkKompetisi">
									<?= $tingkatKompetisi['tingkat_kompetisi'] ?>
								</td>
								<td class="py-2 px-4 border border-blue-950 text-left">
									<?= $tingkatKompetisi['poin'] ?>
								</td>
								<td class="py-2 px-4 border border-blue-950">
									<a
										href="<?= BASEURL; ?>/TingkatKompetisi/edit/<?= $tingkatKompetisi['id_tingkat_kompetisi'] ?>">
										<button class="bg-[#132145] py-2 px-2 rounded-md mr-2">
											<img src="../../../public/img/Edit_fill.png" alt="Edit" class="" />
										</button>
									</a>
									<a
										href="<?= BASEURL; ?>/TingkatKompetisi/delete/<?= $tingkatKompetisi['id_tingkat_kompetisi'] ?>">
										<button class="bg-[#FF3B30] py-2 px-2 rounded-md">
											<img src="../../../public/img/Trash.png" alt="Delete" class="" />
										</button>
									</a>
								</td>
							</tr>

						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</section>

	<!-- tingkat penyelenggara -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Daftar Tingkat Penyelenggara
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<!-- cari -->
			<section class="flex justify-between p-6">
				<div
					class="flex items-center bg-white w-1/3 p-2 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
					<img src="../../../public/img/Search (1).png" alt="logo" class="w-5 h-5" />
					<input type="text" id="tkPenyelenggaraSearch" placeholder="" class="bg-white flex focus:outline-none w-full" />
				</div>

				<!-- btn tambah -->
				<a href="<?= BASEURL; ?>/TingkatPenyelenggara/Create">
					<button
						class="flex items-center font-semibold space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
						<img src="../../../public/img/add.png" alt="logo" class="w-5 h-5" />
						<p>Tambah</p>
					</button>
				</a>
			</section>

			<!-- table  -->
			<div class="mt-10 overflow-x-auto bg-white shadow-md rounded-2xl">
				<table class="min-w-full bg-white text-center">
					<thead>
						<tr>
							<th class="py-2 px-4 w-1/12 bg-blue-950 text-white font-semibold border border-blue-950">
								No
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								Tingkat Penyelenggara
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								Poin
							</th>
							<th class="py-2 px-4 w-1/4 bg-blue-950 text-white font-semibold border border-blue-950">
								Aksi
							</th>
						</tr>
					</thead>
					<tbody id="tkPenyelenggaraTable">

						<?php
						$no = 1;
						foreach ($data['tingkatPenyelenggara'] as $tingkatPenyelenggara) {
							?>

							<tr>
								<td class="py-2 px-4 border border-blue-950"><?= $no++ ?></td>
								<td class="py-2 px-4 border border-blue-950 text-left" id="tkPenyelenggara">
									<?= $tingkatPenyelenggara['tingkat_penyelenggara'] ?>
								</td>
								<td class="py-2 px-4 border border-blue-950 text-left">
									<?= $tingkatPenyelenggara['poin'] ?>
								</td>
								<td class="py-2 px-4 border border-blue-950">
									<a
										href="<?= BASEURL; ?>/TingkatPenyelenggara/edit/<?= $tingkatPenyelenggara['id_tingkat_penyelenggara'] ?>">
										<button class="bg-[#132145] py-2 px-2 rounded-md mr-2">
											<img src="../../../public/img/Edit_fill.png" alt="Edit" class="" />
										</button>
									</a>
									<a
										href="<?= BASEURL; ?>/TingkatPenyelenggara/delete/<?= $tingkatPenyelenggara['id_tingkat_penyelenggara'] ?>">
										<button class="bg-[#FF3B30] py-2 px-2 rounded-md">
											<img src="../../../public/img/Trash.png" alt="Delete" class="" />
										</button>
									</a>
								</td>
							</tr>

						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</section>

	<!-- juara -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Daftar Juara
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<!-- cari -->
			<section class="flex justify-between p-6">
				<div
					class="flex items-center bg-white w-1/3 p-2 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
					<img src="../../../public/img/Search (1).png" alt="logo" class="w-5 h-5" />
					<input type="text" id="juaraSearch" placeholder="" class="bg-white flex focus:outline-none w-full" />
				</div>

				<!-- btn tambah -->
				<a href="<?= BASEURL; ?>/Juara/Create">
					<button
						class="flex items-center font-semibold space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
						<img src="../../../public/img/add.png" alt="logo" class="w-5 h-5" />
						<p>Tambah</p>
					</button>
				</a>
			</section>

			<!-- table  -->
			<div class="mt-10 overflow-x-auto bg-white shadow-md rounded-2xl">
				<table class="min-w-full bg-white text-center">
					<thead>
						<tr>
							<th class="py-2 px-4 w-1/12 bg-blue-950 text-white font-semibold border border-blue-950">
								No
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								Juara
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								Poin
							</th>
							<th class="py-2 px-4 w-1/4 bg-blue-950 text-white font-semibold border border-blue-950">
								Aksi
							</th>
						</tr>
					</thead>
					<tbody id="juaraTable">

						<?php
						$no = 1;
						foreach ($data['juara'] as $juara) {
							?>

							<tr>
								<td class="py-2 px-4 border border-blue-950"><?= $no++ ?></td>
								<td class="py-2 px-4 border border-blue-950 text-left" id="juara">
									<?= $juara['juara'] ?>
								</td>
								<td class="py-2 px-4 border border-blue-950 text-left">
									<?= $juara['poin'] ?>
								</td>
								<td class="py-2 px-4 border border-blue-950">
									<a href="<?= BASEURL; ?>/Juara/edit/<?= $juara['id_juara'] ?>">
										<button class="bg-[#132145] py-2 px-2 rounded-md mr-2">
											<img src="../../../public/img/Edit_fill.png" alt="Edit" class="" />
										</button>
									</a>
									<a href="<?= BASEURL; ?>/Juara/delete/<?= $juara['id_juara'] ?>">
										<button class="bg-[#FF3B30] py-2 px-2 rounded-md">
											<img src="../../../public/img/Trash.png" alt="Delete" class="" />
										</button>
									</a>
								</td>
							</tr>

						<?php } ?>

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

<script>
	$(document).ready(function () {
		function searchKategori() {
			let keyword = $("#kategoriSearch").val().toLowerCase();
			let visibleRows = 0;
			$("#kategoriTable tr").each(function () {
				let namaKategori = $(this).find("#kategori").text().toLowerCase();
				$(this).toggle(namaKategori.includes(keyword));
				if ($(this).is(":visible")) visibleRows++;
			});

			if (visibleRows === 0) {
				$("#kategoriTable").append('<tr class="empty-row"><td colspan="8" class="text-center py-10"><img src="../../public/img/table-kosong.png" alt="Table Kosong" class="w-1/6 mx-auto" /><p class="font-bold text-gray-500 mt-4">Tidak ada data yang tersedia</p></td></tr>');
			} else {
				$("#kategoriTable .empty-row").remove();
			}
		}

		$("#kategoriSearch").on("input change", searchKategori);
		
		function searchTkKompetisi() {
			let keyword = $("#tkKompetisiSearch").val().toLowerCase();
			let visibleRows = 0;
			$("#tkKompetisiTable tr").each(function () {
				let namaTkKompetisi = $(this).find("#tkKompetisi").text().toLowerCase();
				$(this).toggle(namaTkKompetisi.includes(keyword));
				if ($(this).is(":visible")) visibleRows++;
			});

			if (visibleRows === 0) {
				$("#tkKompetisiTable").append('<tr class="empty-row"><td colspan="8" class="text-center py-10"><img src="../../public/img/table-kosong.png" alt="Table Kosong" class="w-1/6 mx-auto" /><p class="font-bold text-gray-500 mt-4">Tidak ada data yang tersedia</p></td></tr>');
			} else {
				$("#tkKompetisiTable .empty-row").remove();
			}
		}

		$("#tkKompetisiSearch").on("input change", searchTkKompetisi);
		
		function searchTkPenyelenggara() {
			let keyword = $("#tkPenyelenggaraSearch").val().toLowerCase();
			let visibleRows = 0;
			$("#tkPenyelenggaraTable tr").each(function () {
				let namaTkPenyelenggara = $(this).find("#tkPenyelenggara").text().toLowerCase();
				$(this).toggle(namaTkPenyelenggara.includes(keyword));
				if ($(this).is(":visible")) visibleRows++;
			});

			if (visibleRows === 0) {
				$("#tkPenyelenggaraTable").append('<tr class="empty-row"><td colspan="8" class="text-center py-10"><img src="../../public/img/table-kosong.png" alt="Table Kosong" class="w-1/6 mx-auto" /><p class="font-bold text-gray-500 mt-4">Tidak ada data yang tersedia</p></td></tr>');
			} else {
				$("#tkPenyelenggaraTable .empty-row").remove();
			}
		}

		$("#tkPenyelenggaraSearch").on("input change", searchTkPenyelenggara);
		
		function searchjuara() {
			let keyword = $("#juaraSearch").val().toLowerCase();
			let visibleRows = 0;
			$("#juaraTable tr").each(function () {
				let namaJuara = $(this).find("#juara").text().toLowerCase();
				$(this).toggle(namaJuara.includes(keyword));
				if ($(this).is(":visible")) visibleRows++;
			});

			if (visibleRows === 0) {
				$("#juaraTable").append('<tr class="empty-row"><td colspan="8" class="text-center py-10"><img src="../../public/img/table-kosong.png" alt="Table Kosong" class="w-1/6 mx-auto" /><p class="font-bold text-gray-500 mt-4">Tidak ada data yang tersedia</p></td></tr>');
			} else {
				$("#juaraTable .empty-row").remove();
			}
		}

		$("#juaraSearch").on("input change", searchjuara);
	});
</script>