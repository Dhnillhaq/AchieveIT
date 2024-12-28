<section class="sm:ml-64 bg-blue-50 min-h-screen">

	<?php require_once __DIR__ . '../../../templates/profiles.php'; ?>

	<!-- Data Mahasiswa-->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Data Mahasiswa</p>
	</section>

	<!-- Daftar Program Studi-->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Daftar Program Studi
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<!-- cari -->
			<section class="flex justify-between p-6">
				<div
					class="flex items-center bg-white w-1/3 p-2 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
					<img src="../../../public/img/Search (1).png" alt="logo" class="w-5 h-5" />
					<input type="text" id="prodiSearch" placeholder="" class="bg-white flex focus:outline-none w-full" />
				</div>

				<!-- btn tambah -->
				<a href="<?= BASEURL; ?>/Prodi/create">
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
							<th class="py-2 px-4 w-1/12 bg-blue-950 text-white font-semibold border border-blue-950">
								Kode
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								Program Studi
							</th>
							<th class="py-2 px-4 w-1/4 bg-blue-950 text-white font-semibold border border-blue-950">
								Aksi
							</th>
						</tr>
					</thead>
					<tbody class="myTable1" id="prodiTable">
						<?php
						$no = 1;
						foreach ($data['prodi'] as $prodi) { ?>
							<tr>
								<td class="py-2 px-4 border border-blue-950"><?= $no ?></td>
								<td class="py-2 px-4 border border-blue-950 text-left"><?= $prodi['kode_prodi'] ?></td>
								<td class="py-2 px-4 border border-blue-950 text-left" id="prodi"><?= $prodi['nama_prodi'] ?></td>
								<td class="py-2 px-4 border border-blue-950">
									<a href="<?= BASEURL; ?>/Prodi/edit/<?= $prodi['id_prodi'] ?>">
										<button class="bg-[#132145] py-2 px-2 rounded-md mr-2">
											<img src="../../../public/img/Edit_fill.png" alt="logo" class="">
										</button>
									</a>

									<a href="<?= BASEURL; ?>/Prodi/delete/<?= $prodi['id_prodi'] ?>">
										<button class="bg-[#FF3B30] py-2 px-2 rounded-md">
											<img src="../../../public/img/Trash.png" alt="logo" class="">
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

	<!-- Daftar mhs-->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Daftar Mahasiswa
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<!-- btn tambah -->
			<section class="flex justify-end pr-6">
				<a href="<?= BASEURL; ?>/Mahasiswa/create">
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
					<input type="text" id="mhsSearch" placeholder="" class="bg-white flex focus:outline-none w-full" />
				</div>
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
								Nama
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								NIM
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								Program Studi
							</th>
							<th class="py-2 px-4 w-1/4 bg-blue-950 text-white font-semibold border border-blue-950">
								Aksi
							</th>
						</tr>
					</thead>
					<tbody class="myTable2" id="mhsTable">
						<?php
						$no = 1;
						foreach ($data['mhs'] as $mhs) { ?>
							<tr>
								<td class="py-2 px-4 border border-blue-950"><?= $no ?></td>
								<td class="py-2 px-4 border border-blue-950 text-left" id="mahasiswa"><?= $mhs['nama'] ?></td>
								<td class="py-2 px-4 border border-blue-950 text-left"><?= $mhs['nim'] ?></td>
								<td class="py-2 px-4 border border-blue-950 text-left"><?= $mhs['nama_prodi'] ?></td>
								<td class="py-2 px-4 border border-blue-950">
									<a href="<?= BASEURL; ?>/Mahasiswa/show/<?= $mhs['id_mahasiswa'] ?>">
										<button class="bg-[#132145] py-2 px-2 rounded-md mr-2">
											<img src="../../../public/img/Aksi.png" alt="Edit" class="" />
										</button>
									</a>
									<a href="<?= BASEURL; ?>/Mahasiswa/edit/<?= $mhs['id_mahasiswa'] ?>">
										<button class="bg-[#132145] py-2 px-2 rounded-md mr-2">
											<img src="../../../public/img/Edit_fill.png" alt="logo" class="">
										</button>
									</a>
									<a href="<?= BASEURL; ?>/Mahasiswa/delete/<?= $mhs['id_mahasiswa'] ?>">
										<button class="bg-[#FF3B30] py-2 px-2 rounded-md">
											<img src="../../../public/img/Trash.png" alt="logo" class="">
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

	<!-- Daftar Peran mhs-->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Daftar Peran Mahasiswa
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<!-- cari -->
			<section class="flex justify-between p-6">
				<div
					class="flex items-center bg-white w-1/3 p-2 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
					<img src="../../../public/img/Search (1).png" alt="logo" class="w-5 h-5" />
					<input type="text" id="peranMhsSearch" placeholder="" class="bg-white flex focus:outline-none w-full" />
				</div>

				<!-- btn tambah -->
				<a href="<?= BASEURL; ?>/PeranMahasiswa/Create">
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
								Daftar Peran
							</th>
							<th class="py-2 px-4 w-1/4 bg-blue-950 text-white font-semibold border border-blue-950">
								Aksi
							</th>
						</tr>
					</thead>
					<tbody class="myTable3" id="peranMhsTable">
						<?php
						$no = 1;
						foreach ($data['peranMhs'] as $pm) { ?>
							<tr>
								<td class="py-2 px-4 border border-blue-950"><?= $no ?></td>
								<td class="py-2 px-4 border border-blue-950 text-left" id="peranMhs"><?= $pm['peran'] ?></td>
								<td class="py-2 px-4 border border-blue-950">
									<a href="<?= BASEURL; ?>/PeranMahasiswa/edit/<?= $pm['id_peran'] ?>">
										<button class="bg-[#132145] py-2 px-2 rounded-md mr-2">
											<img src="../../../public/img/Edit_fill.png" alt="logo" class="">
										</button>
									</a>
									<a href="<?= BASEURL; ?>/PeranMahasiswa/delete/<?= $pm['id_peran'] ?>">
										<button class="bg-[#FF3B30] py-2 px-2 rounded-md">
											<img src="../../../public/img/Trash.png" alt="logo" class="">
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


<script>
	$(document).ready(function () {
		function searchProdi() {
			let keyword = $("#prodiSearch").val().toLowerCase();
			let visibleRows = 0;
			$("#prodiTable tr").each(function () {
				let namaProdi = $(this).find("#prodi").text().toLowerCase();
				$(this).toggle(namaProdi.includes(keyword));
				if ($(this).is(":visible")) visibleRows++;
			});

			if (visibleRows === 0) {
				$("#prodiTable").append('<tr class="empty-row"><td colspan="8" class="text-center py-10"><img src="../../public/img/table-kosong.png" alt="Table Kosong" class="w-1/6 mx-auto" /><p class="font-bold text-gray-500 mt-4">Tidak ada data yang tersedia</p></td></tr>');
			} else {
				$("#prodiTable .empty-row").remove();
			}
		}

		$("#prodiSearch").on("input change", searchProdi);
		
		function searchMahasiswa() {
			let keyword = $("#mhsSearch").val().toLowerCase();
			let visibleRows = 0;
			$("#mhsTable tr").each(function () {
				let namaMhs = $(this).find("#mahasiswa").text().toLowerCase();
				$(this).toggle(namaMhs.includes(keyword));
				if ($(this).is(":visible")) visibleRows++;
			});

			if (visibleRows === 0) {
				$("#mhsTable").append('<tr class="empty-row"><td colspan="8" class="text-center py-10"><img src="../../public/img/table-kosong.png" alt="Table Kosong" class="w-1/6 mx-auto" /><p class="font-bold text-gray-500 mt-4">Tidak ada data yang tersedia</p></td></tr>');
			} else {
				$("#mhsTable .empty-row").remove();
			}
		}

		$("#mhsSearch").on("input change", searchMahasiswa);
		
		function searchPeranMahasiswa() {
			let keyword = $("#peranMhsSearch").val().toLowerCase();
			let visibleRows = 0;
			$("#peranMhsTable tr").each(function () {
				let namaPeranMhs = $(this).find("#peranMhs").text().toLowerCase();
				$(this).toggle(namaPeranMhs.includes(keyword));
				if ($(this).is(":visible")) visibleRows++;
			});

			if (visibleRows === 0) {
				$("#peranMhsTable").append('<tr class="empty-row"><td colspan="8" class="text-center py-10"><img src="../../public/img/table-kosong.png" alt="Table Kosong" class="w-1/6 mx-auto" /><p class="font-bold text-gray-500 mt-4">Tidak ada data yang tersedia</p></td></tr>');
			} else {
				$("#peranMhsTable .empty-row").remove();
			}
		}

		$("#peranMhsSearch").on("input change", searchPeranMahasiswa);
	});
</script>