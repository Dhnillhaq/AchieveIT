<section class="sm:ml-64 bg-blue-50 min-h-screen">

	<!-- profil -->
	<?php require_once __DIR__ .'/../templates/profiles.php'; ?>

	<!-- detail prestasi -->
	<section class="flex-col justify-start pt-20 md:pt-0 pl-6">
		<p class="font-bold text-3xl">Detail prestasi</p>
	</section>

	<!-- btn edit -->
	<!-- KALO VALID WARNANYA ABU-ABU "bg-[#757575]" -->
	<!-- halaman edit bisa diakses ketika status = invalid / not validated -->
	<section class="flex justify-end pr-6">
    <?php if ($_SESSION['user']['role'] != 'Ketua Jurusan') { ?>
        <a href="<?= BASEURL; ?>/prestasi/edit/<?= $data['prestasi']['id_prestasi'] ?>">
            <button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
                <img src="../../../public/img/Edit_fill.png" alt="logo" class="w-5 h-5">
                <p>Edit</p>
            </button>
        </a>
    <?php } ?>
</section>

<!-- Data Kompetisi -->
<section class="relative p-6">
    <!-- Header Section -->
    <div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
        Data Kompetisi
    </div>
    
    <div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-4">
        <!-- Grid Layout for Responsiveness -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Column 1 -->
            <div class="flex flex-col space-y-4">
                <div class="flex flex-col justify-start items-start pt-5">
                    <p class="text-[#757575]">Nama Kompetisi</p>
                    <p class="font-semibold"><?= $data['prestasi']['nama_kompetisi'] ?></p>
                </div>
                <div class="flex flex-col justify-start items-start pt-5">
                    <p class="text-[#757575]">Kategori Prestasi</p>
                    <p class="font-semibold"><?= $data['prestasi']['kategori_prestasi'] ?></p>
                </div>
                <div class="flex flex-col justify-start items-start pt-5">
                    <p class="text-[#757575]">Tingkat Kompetisi</p>
                    <p class="font-semibold"><?= $data['prestasi']['tingkat_kompetisi'] ?></p>
                </div>
                <div class="flex flex-col justify-start items-start pt-5">
                    <p class="text-[#757575]">Tingkat Penyelenggara</p>
                    <p class="font-semibold"><?= $data['prestasi']['tingkat_penyelenggara'] ?></p>
                </div>
                <div class="flex flex-col justify-start items-start pt-5">
                    <p class="text-[#757575]">Juara</p>
                    <p class="font-semibold"><?= $data['prestasi']['juara'] ?></p>
                </div>
            </div>

            <!-- Column 2 -->
            <div class="flex flex-col space-y-4">
                <div class="flex flex-col justify-start items-start pt-5">
                    <p class="text-[#757575]">Tanggal Mulai Kompetisi</p>
                    <p class="font-semibold"><?= $data['prestasi']['tanggal_mulai_kompetisi']?></p>
                </div>
                <div class="flex flex-col justify-start items-start pt-5">
                    <p class="text-[#757575]">Tanggal Selesai Kompetisi</p>
                    <p class="font-semibold"><?= $data['prestasi']['tanggal_selesai_kompetisi']?></p>
                </div>
                <div class="flex flex-col justify-start items-start pt-5">
                    <p class="text-[#757575]">Tempat Kompetisi</p>
                    <p class="font-semibold"><?= $data['prestasi']['tempat_kompetisi'] ?></p>
                </div>
                <div class="flex flex-col justify-start items-start pt-5">
                    <p class="text-[#757575]">Penyelenggara Kompetisi</p>
                    <p class="font-semibold"><?= $data['prestasi']['penyelenggara_kompetisi'] ?></p>
                </div>
            </div>

            <!-- Column 3 -->
            <div class="flex flex-col space-y-4">
                <div class="flex flex-col justify-start items-start pt-5">
                    <p class="text-[#757575]">File Surat Tugas</p>
                    <p class="font-semibold text-[#3063C5]"><?= $data['prestasi']['nama_asli_surat_tugas'] ?></p>
                </div>
                <div class="flex flex-col justify-start items-start pt-5">
                    <p class="text-[#757575]">File Poster</p>
                    <p class="font-semibold text-[#3063C5]"><?= $data['prestasi']['nama_asli_poster'] ?></p>
                </div>
                <div class="flex flex-col justify-start items-start pt-5">
                    <p class="text-[#757575]">File Foto Juara</p>
                    <p class="font-semibold text-[#3063C5]"><?= $data['prestasi']['nama_asli_foto_juara'] ?></p>
                </div>
                <div class="flex flex-col justify-start items-start pt-5">
                    <p class="text-[#757575]">File Sertifikat</p>
                    <p class="font-semibold text-[#3063C5]"><?= $data['prestasi']['nama_asli_sertifikat'] ?></p>
                </div>
                <div class="flex flex-col justify-start items-start pt-5">
                    <p class="text-[#757575]">File Proposal</p>
                    <p class="font-semibold text-[#3063C5]"><?= $data['prestasi']['nama_asli_proposal'] ?></p>
                </div>
            </div>
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
							<th class="w-auto py-2 px-4 bg-white font-semibold text-left border border-blue-950">
								Mahasiswa
							</th>
							<th class="w-auto py-2 px-4 bg-white font-semibold text-left border border-blue-950">
								Peran
							</th>
							<?php if ($_SESSION['user']['role'] != 'Mahasiswa') { ?>
								<th class="w-1/12 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
									Aksi
								</th>
							<?php } ?>
						</tr>
					</thead>
					<!-- data dummy -->
					<tbody>
						<!-- Row 1 -->
						<?php
						$no = 1;
						foreach ($data['mahasiswa'] as $mhs) {
							?>
							<tr>
								<td class="py-2 px-4 border border-blue-950"><?= $no ?></td>
								<td class="py-2 px-4 border border-blue-950">
									<?= $mhs['nim'] . ' - ' . $mhs['nama_mahasiswa'] ?>
								</td>
								<td class="py-2 px-4 border border-blue-950"><?= $mhs['peran'] ?></td>
								<?php if ($_SESSION['user']['role'] != 'Mahasiswa') { ?>
									<td class="py-2 px-4 border border-blue-950">
										<a href="<?= BASEURL; ?>/Mahasiswa/show/<?= $mhs['id_mahasiswa'] ?>">
											<button>
												<img src="../../../public/img/Aksi.png" alt="logo"
													class="p-2 bg-[#132145] rounded-md">
											</button>
										</a>
									</td>
								<?php } ?>
							</tr>
							<?php
							$no++;
						} ?>
					</tbody>
				</table>
			</div>
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
				<table class="min-w-full table-auto">
					<thead>
						<tr>
							<th class="w-1/12 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
								No
							</th>
							<th class="w-1/3 py-2 px-4 bg-white font-semibold text-left border border-blue-950">
								Pembimbing
							</th>
							<th class="w-auto py-2 px-4 bg-white font-semibold text-left border border-blue-950">
								Peran Pembimbing
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($data['dosen'] as $dosen) {
							?>
							<tr>
								<td class="py-2 px-4 border border-blue-950"><?= $no ?></td>
								<td class="py-2 px-4 border border-blue-950">
									<?= $dosen['nip'] . ' - ' . $dosen['nama_dosen'] ?>
								</td>
								<td class="py-2 px-4 border border-blue-950">
									<?= $dosen['peran'] ?>
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

	<!-- informasi lain -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Informasi Lain
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<div class="flex flex-col space-y-0 justify-start items-start py-3">
				<p class="text-[#757575] font-light">Status</p>
				<p class="font-bold"><?= $data['prestasi']['status'] ?></p>

			</div>

			<h2 class="text-[#757575]">Perhitungan Poin</h2>

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
						<?php
						$totalPoin = 0;
						?>
						<tr>
							<td class="py-2 px-4 border border-blue-950">1</td>
							<td class="py-2 px-4 border border-blue-950">
								Tingkatan Kompetisi
							</td>
							<td class="py-2 px-4 border border-blue-950"><?= $data['poin']['tingkat_kompetisi'] ?></td>
							<td class="py-2 px-4 border border-blue-950"><?= $data['poin']['poin_tk'] ?></td>
						</tr>
						<!-- Row 2 -->
						<tr>
							<td class="py-2 px-4 border border-blue-950">2</td>
							<td class="py-2 px-4 border border-blue-950">
								Penyelenggara
							</td>
							<td class="py-2 px-4 border border-blue-950"><?= $data['poin']['penyelenggara'] ?></td>
							<td class="py-2 px-4 border border-blue-950"><?= $data['poin']['poin_tp'] ?></td>
						</tr>
						<!-- Row 3 -->
						<tr>
							<td class="py-2 px-4 border border-blue-950">3</td>
							<td class="py-2 px-4 border border-blue-950">Juara</td>
							<td class="py-2 px-4 border border-blue-950">
								<?= $data['poin']['juara'] ?>
							</td>
							<td class="py-2 px-4 border border-blue-950"><?= $data['poin']['poin_j'] ?></td>
						</tr>
						<?php
						$totalPoin = $data['poin']["poin_tk"] + $data['poin']["poin_tp"] + $data['poin']["poin_j"];
						?>
					</tbody>
				</table>
			</div>

			<h2 class="font-bold ">Total Poin :<?= $totalPoin ?></h2>
		</div>
	</section>

	<!-- btn -->
	<section class="flex space-x-4 justify-start pl-4 pb-6">
		<div class="justify-center p-2">

			<button onclick="history.back()"
				class="flex items-center space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
				<img src="../../../public/img/Back.png" alt="logo" class="w-5 h-5" />
				<p>Kembali</p>
			</button>

		</div>
		<?php 
		if ($_SESSION['user']['role'] != 'Ketua Jurusan') { ?>
			
			<div class="justify-center p-2">
				<a href="<?= BASEURL; ?>/Prestasi/delete/<?= $data['prestasi']['id_prestasi'] ?>">
					<button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#FF3B30] rounded-lg">
						<img src="../../../public/img/Trash.png" alt="logo" class="w-5 h-5">
						<p>Hapus</p>
					</button>
				</a>
			</div>
			<?php }?>

	</section>
</section>