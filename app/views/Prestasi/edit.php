<section class="sm:ml-64 bg-blue-50">

	<?php require_once __DIR__ . '/../templates/profiles.php'; ?>

	<!-- tambah prestasi -->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Edit Data prestasi</p>
	</section>

	<form action="<?= BASEURL; ?>/Prestasi/update" method="POST" enctype="multipart/form-data">
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
				<select name="kategori" class="border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm">
					<option>Pilih Kategori</option>
					<?php
					foreach ($data['kategori'] as $kategori) {
						$selected = ($kategori['id_kategori'] == $data['prestasi']['id_kategori']) ? 'selected' : '';
						echo "<option value='" . $kategori['id_kategori'] . "'" . $selected . ">" . $kategori['kategori'] . "</option>";
					}
					?>
				</select>

				<!-- tingkatan -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Tingkatan Kompetisi <span
						class="text-red-600">*</span></label>
				<select class="border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm"
					name="tingkat_kompetisi">
					<option>Pilih Tingkat Kompetisi</option>
					<?php
					foreach ($data['tingkatKompetisi'] as $tingkatKompetisi) {
						$selected = ($tingkatKompetisi['id_tingkat_kompetisi'] == $data['prestasi']['id_tingkat_kompetisi']) ? 'selected' : '';
						echo "<option value='" . $tingkatKompetisi['id_tingkat_kompetisi'] . "'" . $selected . ">{$tingkatKompetisi['tingkat_kompetisi']}</option>";
					}
					?>
				</select>

				<!-- tingkatan -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Tingkatan Penyelenggara<span
						class="text-red-600">*</span></label>
				<select class="border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm"
					name="tingkat_penyelenggara">
					<option>Pilih Tingkat Penyelenggara</option>
					<?php
					foreach ($data['tingkatPenyelenggara'] as $tingkatPenyelenggara) {
						$selected = ($tingkatPenyelenggara['id_tingkat_penyelenggara'] == $data['prestasi']['id_tingkat_penyelenggara']) ? 'selected' : '';
						echo "<option value='" . $tingkatPenyelenggara['id_tingkat_penyelenggara'] . "'" . $selected . ">{$tingkatPenyelenggara['tingkat_penyelenggara']}</option>";
					}
					?>
				</select>

				<!-- nama kompetisi -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Nama Kompetisi <span
						class="text-red-600">*</span></label>
				<input type="text" name="nama_kompetisi" required value="<?= $data['prestasi']['nama_kompetisi'] ?>"
					class="placeholder-black border rounded-lg px-2 py-1 w-full bg-white shadow-gray-400 shadow-sm" />

				<!-- tanggal mulai -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Tanggal Mulai Kompetisi <span
						class="text-red-600">*</span></label>
				<input type="date" name="tanggal_mulai" required
					value="<?= $data['prestasi']['tanggal_mulai_kompetisi']->format("Y-m-d") ?>"
					class="placeholder-black border rounded-lg px-2 py-1 w-1/6 bg-white shadow-gray-400 shadow-sm" />

				<!-- tanggal selesai -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Tanggal Selesai Kompetisi
					<span class="text-red-600">*</span></label>
				<input type="date" name="tanggal_selesai" required
					value="<?= $data['prestasi']['tanggal_selesai_kompetisi']->format("Y-m-d") ?>"
					class="placeholder-black border rounded-lg px-2 py-1 w-1/6 bg-white shadow-gray-400 shadow-sm" />

				<!-- penyelenggara -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Penyelenggara Kompetisi <span
						class="text-red-600">*</span></label>
				<input type="text" name="penyelenggara" required
					value="<?= $data['prestasi']['penyelenggara_kompetisi'] ?>"
					class="placeholder-black border rounded-lg px-2 py-1 w-full bg-white shadow-gray-400 shadow-sm" />


				<!-- tempat kompetisi -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Tempat Kompetisi <span
						class="text-red-600">*</span></label>
				<input type="text" name="tempat_kompetisi" required value="<?= $data['prestasi']['tempat_kompetisi'] ?>"
					class="placeholder-black border rounded-lg px-2 py-1 w-full bg-white shadow-gray-400 shadow-sm" />

				<!-- juara -->
				<label for="nama" class="block text-gray-700 font-medium pt-6">Juara <span
						class="text-red-600">*</span></label>
				<select name="juara" required
					class="border rounded-lg px-2 py-1 w-1/3 bg-white shadow-gray-400 shadow-sm">
					<option>Pilih Juara</option>
					<?php
					foreach ($data['juara'] as $juara) {
						$selected = ($juara['id_juara'] == $data['prestasi']['id_juara']) ? 'selected' : '';
						echo "<option value='" . $juara['id_juara'] . "'" . $selected . ">{$juara['juara']}</option>";
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
								<p class="text-xs" id="file-name-1"><?= $data['prestasi']['nama_asli_surat_tugas'] ?></p>
							</div>
							<p class="text-xs text-gray-500">maksimal ukuran : 5mb</p>
						</div>
						<input type="file" class="hidden" id="file-input-1" name="surat_tugas" accept=".jpg,.jpeg,.png,.pdf,.docx"
							onchange="showFileName(this, 1)">
					</label>
				</div>

				<!-- poster -->
				<label for=" nama" class="block text-gray-700 font-medium pt-6">File Poster <span
						class="text-red-600">*</span>
				</label>
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
								<p class="text-xs" id="file-name-2"><?= $data['prestasi']['nama_asli_poster'] ?></p>
							</div>
							<p class="text-xs text-gray-500">maksimal ukuran : 5mb</p>
						</div>
						<input type="file" class="hidden" id="file-input-2" name="poster" accept=".jpg,.jpeg,.png,.pdf,.docx"
							onchange="showFileName(this, 2)">
					</label>
				</div>

				<!-- foto -->
				<label for=" nama" class="block text-gray-700 font-medium pt-6">
					File Foto Juara <span class="text-red-600">*</span>
				</label>
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
								<p class="bg-[#FEC01A8F] py-1 px-14 rounded-xl hover:bg-yellow-400">Pilih File
								</p>
								<p class="text-xs" id="file-name-3"><?= $data['prestasi']['nama_asli_foto_juara'] ?></p>
							</div>
							<p class="text-xs text-gray-500">maksimal ukuran : 5mb</p>
						</div>
						<input type="file" class="hidden" id="file-input-3" name="foto_juara" accept=".jpg,.jpeg,.png,.pdf,.docx"
							onchange="showFileName(this, 3)">
					</label>
				</div>

				<!-- sertif -->
				<label for=" nama" class="block text-gray-700 font-medium pt-6">File Sertifikat <span
						class="text-red-600">*</span>
				</label>
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
								<p class="bg-[#FEC01A8F] py-1 px-14 rounded-xl hover:bg-yellow-400">Pilih
									File
								</p>
								<p class="text-xs" id="file-name-4"><?= $data['prestasi']['nama_asli_sertifikat'] ?></p>
							</div>
							<p class="text-xs text-gray-500">maksimal ukuran : 5mb</p>
						</div>
						<input type="file" class="hidden" id="file-input-4" name="sertifikat" accept=".jpg,.jpeg,.png,.pdf,.docx"
							onchange="showFileName(this, 4)">
					</label>
				</div>

				<!-- proposal -->
				<label for=" nama" class="block text-gray-700 font-medium pt-6">File Proposal
				</label>
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
								<p class="bg-[#FEC01A8F] py-1 px-14 rounded-xl hover:bg-yellow-400">
									Pilih
									File
								</p>
								<p class="text-xs" id="file-name-5"><?= $data['prestasi']['nama_asli_proposal'] ?></p>
							</div>
							<p class="text-xs text-gray-500">maksimal ukuran : 5mb</p>
						</div>
						<input type="file" class="hidden" id="file-input-5" name="proposal" accept=".jpg,.jpeg,.png,.pdf,.docx"
							onchange="showFileName(this, 5)">
					</label>
				</div>
			</div>
		</section>

		<!-- Data Mahasiswa -->
		<section class=" relative p-6">
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
								<th class="w-1/2 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
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
						<tbody id="table-body-mhs">
							<!-- Row 1 -->
							<?php
							$no = 1;
							foreach ($data['mhs'] as $mhs) { ?>
								<tr>
									<td class="py-2 px-4 border border-blue-950"><?= $no++ ?></td>
									<td class="py-2 px-4 border border-blue-950">
										<select name="mahasiswa[]" required class="select2 w-full border rounded px-2 py-1">
											<option>Pilih Mahasiswa</option>
											<?php
											foreach ($data['mahasiswa'] as $mahasiswa) {
												$selected = ($mahasiswa['nim'] == $mhs['nim']) ? 'selected' : '';
												echo "<option $selected value='{$mahasiswa['id_mahasiswa']}'>{$mahasiswa['nim']} - {$mahasiswa['nama']}</option>";
											}
											?>
										</select>
									</td>
									<td class="py-2 px-4 border border-blue-950">
										<select name="peran_mhs[]" required class="w-full border rounded px-2 py-1">
											<option>Pilih Peran</option>
											<?php
											foreach ($data['peranMahasiswa'] as $peranMahasiswa) {
												$selected = ($peranMahasiswa['id_peran'] == $mhs['id_peran']) ? 'selected' : '';
												echo "<option $selected value='{$peranMahasiswa['id_peran']}'>{$peranMahasiswa['peran']}</option>";
											}
											?>
										</select>
									</td>
									<td class="py-2 px-4 border border-blue-950 text-center">
										<button type="button" class="delete-row bg-[#FF3B30] py-2 px-2 rounded-md">
											<img src="../../../public/img/Trash.png" alt="logo" class="">
										</button>
									</td>
								</tr>
							<?php }
							?>
						</tbody>
					</table>
				</div>

				<!-- btn tambah -->
				<section class="justify-center p-4">
					<button type="button" id="add-mhs" class="py-2 px-6 text-white bg-[#132145] rounded-lg">+
						Tambah Mahasiswa
					</button>
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
								<th class="w-auto py-2 px-4 bg-white font-semibold text-left border border-blue-950">
									Pembimbing
								</th>
								<th class="w-1/3 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
									Peran Pembimbing
								</th>
								<th class="w-1/12 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
									HAPUS
								</th>
							</tr>
						</thead>
						<tbody id="table-body-dsn">
							<!-- Row 1 -->
							<?php
							$no = 1;
							foreach ($data['dsn'] as $dsn) { ?>
								<tr>
									<td class="py-2 px-4 border border-blue-950">1</td>
									<td class="py-2 px-4 border border-blue-950">
										<select name="dosen[]" required class="select2 w-full border rounded px-2 py-1">
											<option>Pilih Dosen Pembimbing</option>
											<?php
											foreach ($data['dosen'] as $dosen) {
												$selected = ($dosen['id_dosen'] == $dsn['id_dosen']) ? 'selected' : '';
												echo "<option $selected value='{$dosen['id_dosen']}'>{$dosen['nip']} - {$dosen['nama']}</option>";
											}
											?>
										</select>
									</td>
									<td class="py-2 px-4 border border-blue-950">
										<select name="peran_dsn[]" required class="w-full border rounded px-2 py-1">
											<option value="">Pilih Peran</option>
											<?php
											foreach ($data['peranDosen'] as $peranDsn) {
												$selected = ($peranDsn['id_peran'] == $dsn['id_peran']) ? 'selected' : '';
												echo "<option $selected value='{$peranDsn['id_peran']}'>{$peranDsn['peran']}</option>";
											}
											?>
										</select>
									</td>
									<td class="py-2 px-4 border border-blue-950 text-center">
										<button type="button" class="delete-row bg-[#FF3B30] py-2 px-2 rounded-md">
											<img src="../../../public/img/Trash.png" alt="logo" class="">
										</button>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

				<!-- btn tambah -->
				<section class="justify-center p-4">
					<button type="button" id="add-dsn" class="py-2 px-6 text-white bg-[#132145] rounded-lg">
						+ Tambah Pembimbing
					</button>
				</section>
			</div>
		</section>

		<?php if ($_SESSION['user']['role'] != 'Mahasiswa') { ?>
		<!-- informasi lain -->
		<section class="relative p-6">
			<!-- Static parent -->
			<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
				Informasi Lain
			</div>
			<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
				<div class="flex flex-col space-y-0 justify-start items-start py-3">
					<p class="font-semibold">Status</p>
					<select name="status" class="w-1/4 border rounded px-2 py-1">
						<option <?= ($data['prestasi']['status'] == 'Valid') ? 'selected' : '' ?> value="Valid">Valid
						</option>
						<option <?= ($data['prestasi']['status'] == 'Invalid') ? 'selected' : '' ?> value="Invalid">Invalid
						</option>
						<option <?= ($data['prestasi']['status'] == 'Not Validated') ? 'selected' : '' ?>
							value="Not Validated">Not Validated</option>
					</select>
				</div>

				<h2 class="font-semibold">Perhitungan Poin</h2>

				<!-- tabel -->
				<div class="mt-6 overflow-x-auto bg-white shadow-md rounded-2xl">
					<table class="min-w-full table-auto">
						<thead>
							<tr>
								<th class="w-1/12 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
									No
								</th>
								<th class="w-auto py-2 px-4 bg-white font-semibold text-left border border-blue-950">
									Kategori Penilaian
								</th>
								<th class="w-auto py-2 px-4 bg-white font-semibold text-left border border-blue-950">
									Value
								</th>
								<th class="w-1/12 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
									Poin
								</th>
							</tr>
						</thead>
						<tbody>

							<tr>
								<td class="py-2 px-4 border border-blue-950">1</td>
								<td class="py-2 px-4 border border-blue-950">
									Tingkatan Kompetisi
								</td>
								<td class="py-2 px-4 border border-blue-950">Nasional</td>
								<td class="py-2 px-4 border border-blue-950">4</td>
							</tr>
							<!-- Row 2 -->
							<tr>
								<td class="py-2 px-4 border border-blue-950">2</td>
								<td class="py-2 px-4 border border-blue-950">
									Penyelenggara
								</td>
								<td class="py-2 px-4 border border-blue-950">Pemerintah</td>
								<td class="py-2 px-4 border border-blue-950">4</td>
							</tr>
							<!-- Row 3 -->
							<tr>
								<td class="py-2 px-4 border border-blue-950">3</td>
								<td class="py-2 px-4 border border-blue-950">Juara</td>
								<td class="py-2 px-4 border border-blue-950">
									Juara 1
								</td>
								<td class="py-2 px-4 border border-blue-950">4</td>
							</tr>

						</tbody>
					</table>
				</div>

				<h2 class="font-semibold ">Total Poin : 12</h2>
			</div>
		</section>
		<?php } ?>

		<!-- btn -->
		<section class="flex space-x-4 justify-start pl-4 pb-6">
			<div class="justify-center p-2">
				<button type="submit" name="submit"
					class="flex items-center space-x-2 py-2 px-6 text-white bg-[#34C759] rounded-lg w-auto">
					<img src="../../../public/img/simpan.png" alt="logo" class="w-5 h-5">
					<p>Simpan</p>
				</button>
			</div>

			<div class="justify-center p-2">
				<button type="reset" class="flex items-center space-x-2 py-2 px-6 text-white bg-[#FF3B30] rounded-lg">
					<img src="../../../public/img/Refresh.png" alt="logo" class="w-5 h-5">
					<p>Reset</p>
				</button>
			</div>
		</section>

		<input type="hidden" name="id_prestasi" value="<?= $data['prestasi']['id_prestasi'] ?>">
	</form>
</section>

<script>

document.addEventListener("DOMContentLoaded", () => {

	$(document).ready(function() {
		$('.select2').select2({
			placeholder: 'Pilih salah satu',
			allowClear: false
		});
	});

    const tableBodyMhs = document.getElementById("table-body-mhs");
    const tableBodyDsn = document.getElementById("table-body-dsn");

    document.getElementById("add-mhs").addEventListener("click", () => {
        const newRowMhs = `
        <tr>
            <td class="py-2 px-4 border border-blue-950">${tableBodyMhs.children.length + 1}</td>
            <td class="py-2 px-4 border border-blue-950">
                <select name="mahasiswa[]" required class="w-full border rounded px-2 py-1">
                    <option>Pilih Mahasiswa</option>
                    <?php
                    foreach ($data['mahasiswa'] as $mahasiswa) {
                        echo "<option value='{$mahasiswa['id_mahasiswa']}'>{$mahasiswa['nim']} - {$mahasiswa['nama']}</option>";
                    }
                    ?>
                </select>
            </td>
            <td class="py-2 px-4 border border-blue-950">
                <select name="peran_mhs[]" required class="w-full border rounded px-2 py-1">
                    <option>Pilih Peran</option>
                    <?php
                    foreach ($data['peranMahasiswa'] as $peranMahasiswa) {
                        echo "<option value='{$peranMahasiswa['id_peran']}'>{$peranMahasiswa['peran']}</option>";
                    }
                    ?>
                </select>
            </td>
            <td class="py-2 px-4 border border-blue-950 text-center">
                <button type="button" class="delete-row bg-[#FF3B30] py-2 px-2 rounded-md">
                    <img src="../../../public/img/Trash.png" alt="logo" class="">
                </button>
            </td>
        </tr>`;
        tableBodyMhs.insertAdjacentHTML("beforeend", newRowMhs);

		$(document).ready(function() {
			$('.select2').select2({
				placeholder: 'Pilih salah satu',
				allowClear: false
			});
		});
    });

    document.getElementById("add-dsn").addEventListener("click", () => {
        const newRowDsn = `
        <tr>
            <td class="py-2 px-4 border border-blue-950">${tableBodyDsn.children.length + 1}</td>
            <td class="py-2 px-4 border border-blue-950">
                <select name="dosen[]" required class="w-full border rounded px-2 py-1">
                    <option>Pilih Dosen Pembimbing</option>
                    <?php
                    foreach ($data['dosen'] as $dosen) {
                        echo "<option value='{$dosen['id_dosen']}'>{$dosen['nip']} - {$dosen['nama']}</option>";
                    }
                    ?>
                </select>
            </td>
            <td class="py-2 px-4 border border-blue-950">
                <select name="peran_dsn[]" required class="w-full border rounded px-2 py-1">
                    <option>Pilih Peran</option>
                    <?php
                    foreach ($data['peranDosen'] as $peranDsn) {
                        echo "<option value='{$peranDsn['id_peran']}'>{$peranDsn['peran']}</option>";
                    }
                    ?>
                </select>
            </td>
            <td class="py-2 px-4 border border-blue-950 text-center">
                <button type="button" class="delete-row bg-[#FF3B30] py-2 px-2 rounded-md">
                    <img src="../../../public/img/Trash.png" alt="logo" class="">
                </button>
            </td>
        </tr>`;
        tableBodyDsn.insertAdjacentHTML("beforeend", newRowDsn);

		$(document).ready(function() {
			$('.select2').select2({
				placeholder: 'Pilih salah satu',
				allowClear: false
			});
		});
    });

    const addDeleteRowListener = (tableBody) => {
        tableBody.addEventListener("click", (event) => {
            const target = event.target.closest(".delete-row");
            if (target) {
                if (tableBody.children.length > 1) {
                    const row = target.closest("tr");
                    row.parentElement.removeChild(row);
                } else {
                    // Add shake effect
                    target.classList.add("shake");
                    setTimeout(() => target.classList.remove("shake"), 500);
                }
            }
        });
    };

    // Apply listener to both tables
    addDeleteRowListener(tableBodyMhs);
    addDeleteRowListener(tableBodyDsn);
});

	// CSS for shake effect
	const style = document.createElement('style');
	style.textContent = `
	@keyframes shake {
	    0% { transform: translateX(0); }
	    25% { transform: translateX(-5px); }
	    50% { transform: translateX(5px); }
	    75% { transform: translateX(-5px); }
	    100% { transform: translateX(0); }
	}

	.shake {
	    animation: shake 0.5s;
	}`;
	document.head.appendChild(style);


	function showFileName(input, id) {
		const fileNameElement = document.getElementById(`file-name-${id}`);
		console.log(input.files); // Debug apakah file terdeteksi
		if (input.files && input.files[0]) {
			fileNameElement.textContent = input.files[0].name;
		} else {
			fileNameElement.textContent = "tidak ada file yang dipilih";
		}
	}

</script>