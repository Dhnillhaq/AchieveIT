<section class="sm:ml-64 bg-blue-50">

	<?php require_once __DIR__ . '/../templates/profiles.php'; ?>

	<!-- selamat datang -->
	<section class="flex-col justify-start p-6 space-y-4">
		<p class="font-bold text-4xl">Selamat Datang</p>
		<p class="font-semibold text-2xl text-[#F99D1C]">
			<?= $_SESSION['user']['nama'] ?> / <?= $_SESSION['user']['nip'] ?>
		</p>
	</section>

	<!-- prestasi -->
	<section class="flex justify-start p-6 space-x-10">
		<!-- total prestasi -->
		<div class="bg-white p-4 rounded-lg shadow-lg border w-1/4">
			<div class="flex justify-start space-x-4">
				<img src="../../../public/img/Total_Prestasi.png" alt="logo" class="w-auto h-12" />
				<div class="flex-col">
					<p class="font-semibold text-[#757575] text-[12px]">
						Total Prestasi
					</p>
					<p class="font-bold"><?= $data['statistik']['0']['total_prestasi'] ?></p>
				</div>
			</div>
		</div>

		<!-- total mhs JTI -->
		<div class="bg-white p-4 rounded-lg shadow-lg border w-1/4">
			<div class="flex justify-start space-x-4">
				<img src="../../../public/img/Mhs_JTI.png" alt="logo" class="w-auto h-12" />
				<div class="flex-col">
					<p class="font-semibold text-[#757575] text-[12px]">
						Total Mahasiswa JTI
					</p>
					<p class="font-bold"><?= $data['statistik']['0']['total_mahasiswa'] ?></p>
				</div>
			</div>
		</div>

		<!-- rata rata -->
		<div class="bg-white p-4 rounded-lg shadow-lg border w-1/4">
			<div class="flex justify-start space-x-4">
				<img src="../../../public/img/rata_rata.png" alt="logo" class="w-auto h-12" />
				<div class="flex-col">
					<p class="font-semibold text-[#757575] text-[12px]">
						Rata-rata Per Tahun
					</p>
					<p class="font-bold"><?= round($data['statistik']['0']['rata_rata']) ?></p>
				</div>
			</div>
		</div>

		<!-- total mapres -->
		<div class="bg-white p-4 rounded-lg shadow-lg border w-1/4">
			<div class="flex justify-start space-x-4">
				<img src="../../../public/img/maPres.png" alt="logo" class="w-auto h-12" />
				<div class="flex-col">
					<p class="font-semibold text-[#757575] text-[12px]">
						Total MaPres
					</p>
					<p class="font-bold"><?= $data['statistik']['0']['total_mapres'] ?></p>
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
		<div class="w-1/2 h-auto mx-auto flex justify-center items-center">
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
		<div class="">
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
		<div class="">
			<canvas id="DiagramBatang1Tahun"></canvas>
		</div>
	</section>

	<!-- judul -->
	<section class="flex-col justify-start pl-6 pt-6">
		<p class="font-semibold text-2xl">Daftar Mahasiswa Berprestasi</p>
	</section>

	<!-- Tabel Prestasi Mahum -->
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
								<td class='py-2 px-4 border border-blue-950'><?= $mahasiswa['nama_mahasiswa'] ?></td>
								<td class='py-2 px-4 border border-blue-950'><?= $mahasiswa['prodi'] ?></td>
								<td class='py-2 px-4 border border-blue-950'><?= $mahasiswa['total_poin'] ?></td>
							</tr>
							<?php
							$rank++;
						}
						?>
					</tbody>
				</table>
			</div>
			<!-- pagination -->
        <section class="flex items-center justify-center py-2">
  <nav aria-label="Page navigation example">
    <ul class="pagination bg-blue-50 p-3 rounded-lg border-blue-500">
      <li class="page-item">
        <a class="page-link bg-blue-50 hover:bg-blue-100" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <li class="page-item">
        <a class="page-link bg-blue-50 hover:bg-blue-100" href="#">1</a>
      </li>
      <li class="page-item">
        <a class="page-link bg-blue-50 hover:bg-blue-100" href="#">2</a>
      </li>
      <li class="page-item">
        <a class="page-link bg-blue-50 hover:bg-blue-100" href="#">3</a>
      </li>
      <li class="page-item">
        <a class="page-link bg-blue-50 hover:bg-blue-100" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </nav>
</section>

		</div>
	</section>

	<script>
		const ctx = document.getElementById("DiagramLingkar");
		new Chart(ctx, {
			type: "doughnut",
			data: {
				labels: [
					<?php foreach ($data['lingkaran'] as $lingkar) { ?>
								"<?= $lingkar['Kategori'] ?>",
					<?php } ?>
				],
				datasets: [
					{
						data: [
							<?php foreach ($data['lingkaran'] as $lingkar) { ?>
								<?= $lingkar['jumlah_prestasi'] ?>,
							<?php } ?>
						], // Data untuk setiap kategori
						borderWidth: 1,
						backgroundColor: [
							"#C6E0F7", // Warna untuk Kategori Debat
							"#70B1EA", // Warna untuk Kategori Essai
							"#3F84D9", // Warna untuk Lain-lain
							"#3063C5", // Warna untuk Kategori Karya Ilmiah
							"#274A9D", // Warna untuk Lain-lain
							"#1D2C40", // Warna untuk Lain-lain
							"#CFE6FA", // Warna untuk Lain-lain
						],
					},
				],
			},
		});


		const ctx1 = document.getElementById("DiagramBatangPerTahun");

		new Chart(ctx1, {
			type: "bar",
			data: {
				labels: [
					<?php foreach ($data['tahun'] as $tahun) { ?>
												"<?= $tahun['tahun']; ?>",
					<?php } ?>
				],
				datasets: [
					<?php 
					$colors = ["#C6E0F7", "#70B1EA", "#3F84D9", "#3063C5", "#274A9D", "#1D2C40", "#CFE6FA"];
						foreach ($data['kategori'] as $kategori) { ?>
											{
							label: "<?= $kategori['kategori'] ?>",
							data: [
								<?php foreach ($data['perTahun'] as $perTahun) { ?>
														<?= $perTahun[$kategori['kategori']] ?>,
								<?php } ?>
							],
							borderWidth: 1,
							backgroundColor: "<?= $colors[rand(0, count($colors) - 1)] ?>",					
						},
					<?php } ?>
				],
			},
			options: {
				scales: {
					y: {
						beginAtZero: true,
					},
				},
			},
		});



		const ctx2 = document.getElementById("DiagramBatang1Tahun");

		new Chart(ctx2, {
			type: "bar",
			data: {
				labels: [
					"Januari",
					"Februari",
					"Maret",
					"April",
					"Mei",
					"Juni",
					"Juli",
					"Agustus",
					"September",
					"Oktober",
					"November",
					"Desember",
				],
				datasets: [
					<?php foreach ($data['kategori'] as $kategori) { ?>
							{
							label: "<?= $kategori['kategori'] ?>",
							data: [
								<?php foreach ($data['perBulan'] as $perBulan) { ?>
													<?= $perBulan[$kategori['kategori']] ?>,
								<?php } ?>
							],
							borderWidth: 1,
							backgroundColor: "<?= $colors[rand(0, count($colors) - 1)] ?>"
						},
					<?php } ?>
				],
			},
			options: {
				scales: {
					y: {
						beginAtZero: true,
					},
				},
			},
		});
	</script>
	<!-- <script src="../../app/components/Diagram.js"></script> -->
</section>