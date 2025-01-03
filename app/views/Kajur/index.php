<section class="sm:ml-64 bg-blue-50">

	<?php require_once __DIR__ . '/../templates/profiles.php'; ?>

	<!-- selamat datang -->
	<section class="flex-col justify-start p-6 pt-20 md:pt-0 space-y-4">
		<p class="font-bold text-4xl">Selamat Datang</p>
		<p class="font-semibold text-2xl text-[#F99D1C]">
			<?= $_SESSION['user']['nama'] ?> / <?= $_SESSION['user']['nip'] ?>
		</p>
	</section>

	<!-- Prestasi -->
<section class="p-6">
    <!-- Grid container -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Total Prestasi -->
        <div class="bg-white p-4 rounded-lg shadow-lg border">
            <div class="flex justify-start space-x-4">
                <img src="../../../public/img/Total_Prestasi.png" alt="logo" class="w-auto h-12" />
                <div class="flex flex-col">
                    <p class="font-semibold text-[#757575] text-[12px]">
                        Total Prestasi
                    </p>
                    <p class="font-bold"><?= $data['statistik']['total_prestasi'] ?></p>
                </div>
            </div>
        </div>

        <!-- Total Mahasiswa JTI -->
        <div class="bg-white p-4 rounded-lg shadow-lg border">
            <div class="flex justify-start space-x-4">
                <img src="../../../public/img/Mhs_JTI.png" alt="logo" class="w-auto h-12" />
                <div class="flex flex-col">
                    <p class="font-semibold text-[#757575] text-[12px]">
                        Total Mahasiswa JTI
                    </p>
                    <p class="font-bold"><?= $data['statistik']['total_mahasiswa'] ?></p>
                </div>
            </div>
        </div>

        <!-- Rata-rata Per Tahun -->
        <div class="bg-white p-4 rounded-lg shadow-lg border">
            <div class="flex justify-start space-x-4">
                <img src="../../../public/img/rata_rata.png" alt="logo" class="w-auto h-12" />
                <div class="flex flex-col">
                    <p class="font-semibold text-[#757575] text-[12px]">
                        Rata-rata Per Tahun
                    </p>
                    <p class="font-bold"><?= round($data['statistik']['rata_rata']) ?></p>
                </div>
            </div>
        </div>

        <!-- Total MaPres -->
        <div class="bg-white p-4 rounded-lg shadow-lg border">
            <div class="flex justify-start space-x-4">
                <img src="../../../public/img/maPres.png" alt="logo" class="w-auto h-12" />
                <div class="flex flex-col">
                    <p class="font-semibold text-[#757575] text-[12px]">
                        Total MaPres
                    </p>
                    <p class="font-bold"><?= $data['statistik']['total_mapres'] ?></p>
                </div>
            </div>
        </div>
    </div>
</section>


	<!-- judul -->
	<section class="flex-col justify-start pl-6">
		<p class="font-semibold text-2xl">
			Analisis Data Prestasi Mahasiswa JTI
		</p>
	</section>

	<!-- Diagram Lingkaran Analisis -->
	<section
		class="flex flex-col justify-normal m-6 p-6 space-y-4 bg-white border-2 border-blue-500 rounded-lg shadow-lg">
		<!-- judul -->
		<div class="flex justify-center">
			<p class="font-semibold text-2xl">Diagram Lingkaran Analisis</p>
		</div>

		<!-- kategori -->
		<div class="flex justify-end">
			<select class="rounded-lg px-2 py-1 w-1/6 bg-white shadow-gray-400 shadow-sm">
				<option>Kategori</option>
				<option>Tingkat Kompetisi</option>
				<option>Tingkat Penyelenggara</option>
			</select>
		</div>
		<div class="w-full md:w-1/2 h-auto mx-auto flex justify-center items-center">
			<canvas id="DiagramLingkar"></canvas>
		</div>
	</section>

	<!-- chart bar pertahun -->
	<section class="flex flex-col m-6 p-6 space-y-4 bg-white border-2 border-blue-500 rounded-lg shadow-lg">
		<!-- judul -->
		<div class="flex justify-center ju">
			<p class="font-semibold text-2xl">
				Diagram Batang Prestasi Per Tahun
			</p>
		</div>

		<!-- kategori -->
		<div class="flex justify-end">
			<select class="rounded-lg px-2 py-1 w-1/6 bg-white shadow-gray-400 shadow-sm">
				<option>Kategori</option>
				<option>Tingkat Kompetisi</option>
				<option>Tingkat Penyelenggara</option>
			</select>
		</div>
		<div class="w-full mx-auto flex justify-center items-center">
			<canvas id="DiagramBatangPerTahun"></canvas>
		</div>
	</section>

	<!-- chart bar per 1tahun -->
	<section class="flex flex-col m-6 p-6 space-y-4 bg-white border-2 border-blue-500 rounded-lg shadow-lg">
		<!-- judul -->
		<div class="flex justify-center ju">
			<p class="font-semibold text-2xl">
				Diagram Batang Prestasi Dalam 1 Tahun
			</p>
		</div>

		<!-- kategori -->
		<div class="flex justify-end">
			<select class="rounded-lg px-2 py-1 w-1/6 bg-white shadow-gray-400 shadow-sm">
				<option>Kategori</option>
				<option>Tingkat Kompetisi</option>
				<option>Tingkat Penyelenggara</option>
			</select>
		</div>
		<div class="w-full mx-auto flex justify-center items-center">
			<canvas id="DiagramBatang1Tahun"></canvas>
		</div>
	</section>

	<!-- judul -->
	<section class="flex-col justify-start pl-6 pt-6">
		<p class="font-semibold text-2xl">Daftar Mahasiswa Berprestasi</p>
	</section>

	<!-- table prestasi mahum-->
	<section id="daftar-prestasi" class="">
		<div class="p-5 mb-10 ">
			<div class="flex justify-between">
				<div class="flex">
					<form id="formFilter" action="<?= BASEURL; ?>/Kajur/index/#daftar-prestasi" method="POST">
						<div
							class="flex items-center bg-white w-full p-2 space-x-1 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
							<img src="../../../public/img/Search (1).png" alt="logo" class="w-5 h-5">
							<input type="text" id="cari-mhs" placeholder="" class="w-full flex focus:outline-none"
								name="keyword" />
						</div>

				</div>
				<div class="flex right-0">
					<div class="flex items-center mr-3">

						<span class="">Lihat</span>
						<select name="limit" onchange="submitForm()"
							class="mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
							<option value="10" selected>10</option>
							<option value="20">20</option>
							<option value="50">50</option>
						</select>

						<span class="">entri</span>
						<select name="year" onchange="submitForm()"
							class="right-0 mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024" selected>2024</option>
						</select>
						</form>
					</div>
				</div>
			</div>

			<div class="mt-10 overflow-x-auto bg-white shadow-md rounded-2xl">
				<table class="min-w-full bg-white">
					<thead>
						<tr>
							<th class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">
								RANKING
							</th>
							<th class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">
								NIM
							</th>
							<th class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">
								NAMA MAHASISWA
							</th>
							<th class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">
								PRODI
							</th>
							<th class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">
								TOTAL POIN
							</th>
						</tr>
					</thead>
					<tbody class="text-gray-700">
						<?php
						// Looping data mahasiswa ke dalam tabel
						$rank = 1;
						foreach ($data['prestasi'] as $mahasiswa) { ?>
							
							<tr>
								<td class='py-2 px-4 border border-blue-950'><?= $rank ?></td>
								<td class='py-2 px-4 border border-blue-950'><?= $mahasiswa['nim'] ?></td>
								<td class='py-2 px-4 border border-blue-950'><?= $mahasiswa['nama'] ?></td>
								<td class='py-2 px-4 border border-blue-950'><?= $mahasiswa['nama_prodi'] ?></td>
								<td class='py-2 px-4 border border-blue-950'><?= $mahasiswa['total_poin'] ?></td>
							</tr>
							<?php
							$rank++;
						}
						?>
					</tbody>
					
					<!-- <tr>
						<td colspan="5" class="text-center py-10">
							<img src="../../public/img/table-kosong.png" alt="Table Kosong" class="w-1/6 mx-auto" />
							<p class="font-bold text-gray-500 mt-4">
								Tidak ada data yang tersedia..
							</p>
						</td>
					</tr>
				 -->
				</table>
			</div>
		</div>
	</section>
	<!-- <php include __DIR__ . '/../../components/DaftarMahasiswaBerprestasi.php'; ?> -->

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="../../app/components/Diagram.js"></script>
</section>