<section class="sm:ml-64 bg-blue-50">

	<?php require_once __DIR__ . '/../templates/profiles.php'; ?>

	<!-- tambah prestasi -->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Tambah prestasi</p>
	</section>

	<!-- form -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Data Kompetisi
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<!-- kategori -->
			<label for="nama" class="block text-gray-700 font-medium mt-6">Kategori Prestasi <span
					class="text-red-600">*</span></label>
			<select class="border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm">
				<?php
				foreach ($data['kategori'] as $kategori) {
					echo "<option>{$kategori['kategori']}</option>";
				}
				?>
			</select>

			<!-- tingkatan -->
			<label for="nama" class="block text-gray-700 font-medium pt-6">Tingkatan Kompetisi <span
					class="text-red-600">*</span></label>
			<select class="border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm">
				<?php
				foreach ($data['tingkatKompetisi'] as $tingkatKompetisi) {
					echo "<option>{$tingkatKompetisi['tingkat_kompetisi']}</option>";
				}
				?>
			</select>

			<!-- tingkatan -->
			<label for="nama" class="block text-gray-700 font-medium pt-6">Tingkatan Penyelenggara<span
					class="text-red-600">*</span></label>
			<select class="border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm">
				<?php
				foreach ($data['tingkatPenyelenggara'] as $tingkatPenyelenggara) {
					echo "<option>{$tingkatPenyelenggara['tingkat_penyelenggara']}</option>";
				}
				?>
			</select>

			<!-- nama kompetisi -->
			<label for="nama" class="block text-gray-700 font-medium pt-6">Nama Kompetisi <span
					class="text-red-600">*</span></label>
			<input type="text"
				class="placeholder-black border rounded-lg px-2 py-1 w-full bg-white shadow-gray-400 shadow-sm" />

			<!-- tanggal mulai -->
			<label for="nama" class="block text-gray-700 font-medium pt-6">tanggal Mulai Kompetisi <span
					class="text-red-600">*</span></label>
			<input type="date"
				class="placeholder-black border rounded-lg px-2 py-1 w-1/6 bg-white shadow-gray-400 shadow-sm" />

			<!-- tanggal selesai -->
			<label for="nama" class="block text-gray-700 font-medium pt-6">tanggal Selesai Kompetisi
				<span class="text-red-600">*</span></label>
			<input type="date"
				class="placeholder-black border rounded-lg px-2 py-1 w-1/6 bg-white shadow-gray-400 shadow-sm" />

			<!-- penyelenggara -->
			<label for="nama" class="block text-gray-700 font-medium pt-6">Penyelenggara Kompetisi <span
					class="text-red-600">*</span></label>
			<input type="text"
				class="placeholder-black border rounded-lg px-2 py-1 w-full bg-white shadow-gray-400 shadow-sm" />


			<!-- tempat kompetisi -->
			<label for="nama" class="block text-gray-700 font-medium pt-6">Tempat Kompetisi <span
					class="text-red-600">*</span></label>
			<input type="text"
				class="placeholder-black border rounded-lg px-2 py-1 w-full bg-white shadow-gray-400 shadow-sm" />

			<!-- juara -->
			<label for="nama" class="block text-gray-700 font-medium pt-6">Juara <span
					class="text-red-600">*</span></label>
			<select class="border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm">
				<?php
				foreach ($data['juara'] as $juara) {
					echo "<option>{$juara['juara']}</option>";
				}
				?>
			</select>

			<!-- surat tugas -->
			<label for="nama" class="block text-gray-700 font-medium pt-6">File Surat Tugas <span
					class="text-red-600">*</span></label>
			<div class="flex items-center">
				<label
					class="flex flex-row items-center justify-center w-full bg-white border rounded-lg shadow-gray-400 shadow-sm space-x-10">
					<div class="flex flex-col items-center justify-center py-10">
						<img src="../../../public/img/Upload cloud.png" alt="logo" class="w-8 h-auto">
						<p class="mb-2 text-sm font-semibold">
							Seret & lepas atau telusuri
						</p>
						<p class="text-xs text-gray-500">
							Ekstensi (.jpg,.jpeg,.png,.pdf,.docx)
						</p>
					</div>
					<div class="flex flex-col items-start py-6 space-y-1">
						<div class="flex flex-row justify-center items-center space-x-2">
							<p class="bg-[#FEC01A8F] py-1 px-14 rounded-xl hover:bg-yellow-400">Pilih File</p>
							<p class="text-xs">suratTugas.pdf</p>
						</div>
						<p class="text-xs text-gray-500">maksimal ukuran : 5mb</p>
					</div>
					<input type="file" class="hidden" />
				</label>
			</div>

			<!-- poster -->
			<label for="nama" class="block text-gray-700 font-medium pt-6">File Poster <span
					class="text-red-600">*</span></label>
			<div class="flex items-center">
				<label
					class="flex flex-row items-center justify-center w-full bg-white border rounded-lg shadow-gray-400 shadow-sm space-x-10">
					<div class="flex flex-col items-center justify-center py-10">
						<img src="../../../public/img/Upload cloud.png" alt="logo" class="w-8 h-auto">
						<p class="mb-2 text-sm font-semibold">
							Seret & lepas atau telusuri
						</p>
						<p class="text-xs text-gray-500">
							Ekstensi (.jpg,.jpeg,.png,.pdf,.docx)
						</p>
					</div>
					<div class="flex flex-col items-start py-6 space-y-1">
						<div class="flex flex-row justify-center items-center space-x-2">
							<p class="bg-[#FEC01A8F] py-1 px-14 rounded-xl hover:bg-yellow-400">Pilih File</p>
							<p class="text-xs">poster.pdf</p>
						</div>
						<p class="text-xs text-gray-500">maksimal ukuran : 5mb</p>
					</div>
					<input type="file" class="hidden" />
				</label>
			</div>

			<!-- foto -->
			<label for="nama" class="block text-gray-700 font-medium pt-6">File Foto Juara <span
					class="text-red-600">*</span></label>
			<div class="flex items-center">
				<label
					class="flex flex-row items-center justify-center w-full bg-white border rounded-lg shadow-gray-400 shadow-sm space-x-10">
					<div class="flex flex-col items-center justify-center py-10">
						<img src="../../../public/img/Upload cloud.png" alt="logo" class="w-8 h-auto">
						<p class="mb-2 text-sm font-semibold">
							Seret & lepas atau telusuri
						</p>
						<p class="text-xs text-gray-500">
							Ekstensi (.jpg,.jpeg,.png,.pdf,.docx)
						</p>
					</div>
					<div class="flex flex-col items-start py-6 space-y-1">
						<div class="flex flex-row justify-center items-center space-x-2">
							<p class="bg-[#FEC01A8F] py-1 px-14 rounded-xl hover:bg-yellow-400">Pilih File</p>
							<p class="text-xs">juara.pdf</p>
						</div>
						<p class="text-xs text-gray-500">maksimal ukuran : 5mb</p>
					</div>
					<input type="file" class="hidden" />
				</label>
			</div>

			<!-- sertif -->
			<label for="nama" class="block text-gray-700 font-medium pt-6">File Sertifikat <span
					class="text-red-600">*</span></label>
			<div class="flex items-center">
				<label
					class="flex flex-row items-center justify-center w-full bg-white border rounded-lg shadow-gray-400 shadow-sm space-x-10">
					<div class="flex flex-col items-center justify-center py-10">
						<img src="../../../public/img/Upload cloud.png" alt="logo" class="w-8 h-auto">
						<p class="mb-2 text-sm font-semibold">
							Seret & lepas atau telusuri
						</p>
						<p class="text-xs text-gray-500">
							Ekstensi (.jpg,.jpeg,.png,.pdf,.docx)
						</p>
					</div>
					<div class="flex flex-col items-start py-6 space-y-1">
						<div class="flex flex-row justify-center items-center space-x-2">
							<p class="bg-[#FEC01A8F] py-1 px-14 rounded-xl hover:bg-yellow-400">Pilih File</p>
							<p class="text-xs">sertifikat.pdf</p>
						</div>
						<p class="text-xs text-gray-500">maksimal ukuran : 5mb</p>
					</div>
					<input type="file" class="hidden" />
				</label>
			</div>

			<!-- proposal -->
			<label for="nama" class="block text-gray-700 font-medium pt-6">File Proposal <span
					class="text-red-600">*</span></label>
			<div class="flex items-center ">
				<label
					class="flex flex-row items-center justify-center w-full bg-white border rounded-lg shadow-gray-400 shadow-sm space-x-10">
					<div class="flex flex-col items-center justify-center py-10">
						<img src="../../../public/img/Upload cloud.png" alt="logo" class="w-8 h-auto">
						<p class="mb-2 text-sm font-semibold">
							Seret & lepas atau telusuri
						</p>
						<p class="text-xs text-gray-500">
							Ekstensi (.jpg,.jpeg,.png,.pdf,.docx)
						</p>
					</div>
					<div class="flex flex-col items-start py-6 space-y-1">
						<div class="flex flex-row justify-center items-center space-x-2">
							<p class="bg-[#FEC01A8F] py-1 px-14 rounded-xl hover:bg-yellow-400">Pilih File</p>
							<p class="text-xs">tidak ada file yang dipilih</p>
						</div>
						<p class="text-xs text-gray-500">maksimal ukuran : 5mb</p>
					</div>
					<input type="file" class="hidden" />
				</label>
			</div>
		</div>
	</section>

	<!-- Data Mahasiswa -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Data Mahasiswa
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<!-- tabel -->
			<div class="mt-6 overflow-x-auto bg-white shadow-md rounded-2xl">
				<table class="min-w-full">
					<thead>
						<tr>
							<th class="w-1/12 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
								No
							</th>
							<th class="w-1/5 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
								NIM
							</th>
							<th class="w-auto py-2 px-4 bg-white font-semibold text-left border border-blue-950">
								Mahasiswa
							</th>
							<th class="w-auto py-2 px-4 bg-white font-semibold text-left border border-blue-950">
								Peran
							</th>
							<th class="w-1/12 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
								Hapus
							</th>
						</tr>
					</thead>
					<!-- data dummy -->
					<tbody>
						<!-- Row 1 -->
						<tr>
							<td class="py-2 px-4 border border-blue-950">1</td>
							<td class="py-2 px-4 border border-blue-950">
								<select class="w-full border rounded px-2 py-1" onchange=>
									<?php
									foreach ($data['mahasiswa']['all'] as $mahasiswa) {
										echo "<option>{$mahasiswa['nim']}</option>";
									}
									?>
								</select>
							</td>
							<td class="py-2 px-4 border border-blue-950">Haikal</td>
							<td class="py-2 px-4 border border-blue-950">
								<select class="w-full border rounded px-2 py-1">
									<?php
									foreach ($data['peranMahasiswa'] as $peranMahasiswa) {
										echo "<option>{$peranMahasiswa['peran']}</option>";
									}
									?>
								</select>
							</td>
							<td class="py-2 px-4 border border-blue-950 text-center">
								<button class="">
									<img src="../../../public/img/delete.png" alt="logo" class="w-5 h-5">
								</button>
							</td>
						</tr>
						<!-- Row 2 -->
						<tr>
							<td class="py-2 px-4 border border-blue-950">2</td>
							<td class="py-2 px-4 border border-blue-950">
								<select class="w-full border rounded px-2 py-1">
									<?php
									foreach ($data['mahasiswa']['all'] as $mahasiswa) {
										echo "<option>{$mahasiswa['nim']}</option>";
									}
									?>
								</select>
							</td>
							<td class="py-2 px-4 border border-blue-950">Restu</td>
							<td class="py-2 px-4 border border-blue-950">
								<select class="w-full border rounded px-2 py-1">
									<?php
									foreach ($data['peranMahasiswa'] as $peranMahasiswa) {
										echo "<option>{$peranMahasiswa['peran']}</option>";
									}
									?>
								</select>
							</td>
							<td class="py-2 px-4 border border-blue-950 text-center">
								<button class="">
									<img src="../../../public/img/delete.png" alt="logo" class="w-5 h-5">
								</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<!-- btn tambah -->
			<section class="justify-center p-4">
				<a href="<?= BASEURL; ?>/">
					<button class="py-2 px-6 text-white bg-[#132145] rounded-lg">+ Tambah Mahasiswa</button>
				</a>
			</section>
		</div>
	</section>

	<!-- data pembimbing -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Data Pembimbing
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<!-- tabel -->
			<div class="mt-6 overflow-x-auto bg-white shadow-md rounded-2xl">
				<table class="min-w-full table-auto ">
					<thead>
						<tr>
							<th class="w-1/12 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
								No
							</th>
							<th class="w-1/3 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
								Pembimbing
							</th>
							<th class="w-auto py-2 px-4 bg-white font-semibold text-left border border-blue-950">
								NIP
							</th>
							<th class="w-1/3 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
								Peran Pembimbing
							</th>
							<th class="w-1/12 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
								HAPUS
							</th>
						</tr>
					</thead>
					<tbody>
						<!-- Row 1 -->
						<tr>
							<td class="py-2 px-4 border border-blue-950">1</td>
							<td class="py-2 px-4 border border-blue-950">
								<select class="w-full border rounded px-2 py-1">
									<?php
									foreach ($data['dosen'] as $dosen) {
										echo "<option>{$dosen['nama']}</option>";
									}
									?>
								</select>
							</td>
							<td class="py-2 px-4 border border-blue-950">198406102008121004</td>
							<td class="py-2 px-4 border border-blue-950">
								<select class="w-full border rounded px-2 py-1">
									<?php
									foreach ($data['peranDosen'] as $peranDsn) {
										echo "<option>{$peranDsn['peran']}</option>";
									}
									?>
								</select>
							</td>
							<td class="py-2 px-4 border border-blue-950 text-center">
								<button class="">
									<img src="../../../public/img/delete.png" alt="logo" class="w-5 h-5">
								</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<!-- btn tambah -->
			<section class="justify-center p-4">
				<a href="<?= BASEURL; ?>/">
					<button class="py-2 px-6 text-white bg-[#132145] rounded-lg">+ Tambah Pembimbing</button>
				</a>
			</section>
		</div>
	</section>

	<!-- btn -->
	<section class="flex space-x-4 justify-start pl-4 pb-6">
		<div class="justify-center p-2">
			<a href="<?= BASEURL; ?>/">
				<button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#34C759] rounded-lg w-auto">
					<img src="../../../public/img/simpan.png" alt="logo" class="w-5 h-5">
					<p>Simpan</p>
				</button>
			</a>
		</div>

		<div class="justify-center p-2" id="reset">
			<a href="<?= BASEURL; ?>/Prestasi/Create/#reset">
				<button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#FF3B30] rounded-lg">
					<img src="../../../public/img/Refresh.png" alt="logo" class="w-5 h-5">
					<p>Reset</p>
				</button>
			</a>
		</div>
	</section>
</section>