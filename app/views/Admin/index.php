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
					<p class="font-bold"><?= $data['statistik']['total_prestasi'] ?></p>
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
					<p class="font-bold"><?= $data['statistik']['total_mahasiswa'] ?></p>
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
					<p class="font-bold"><?= round($data['statistik']['rata_rata']) ?></p>
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
					<p class="font-bold"><?= $data['statistik']['total_mapres'] ?></p>
				</div>
			</div>
		</div>
	</section>

	<!-- judul -->
	<section class="flex-col justify-start pl-6">
		<div>
			<p class="font-semibold text-2xl">
				Analisis Data Prestasi Mahasiswa JTI
			</p>
		</div>
		<!-- kategori -->
		<div class="flex justify-end">
			<span class="py-1 px-2">Berdasarkan :</span>
			<select class="rounded-lg px-2 py-1 mx-6 w-1/5 bg-white shadow-gray-400 shadow-sm" id="analisisSelect">
				<option value="kategori">Kategori</option>
				<option value="tingkat_kompetisi">Tingkat Kompetisi</option>
				<option value="tingkat_penyelenggara">Tingkat Penyelenggara</option>
				<option value="juara">Juara</option>
			</select>
		</div>
	</section>

	<!-- Diagram Lingkaran Analisis -->
	<section
		class="flex flex-col justify-normal m-6 p-6 space-y-4 bg-white border-2 border-blue-500 rounded-lg shadow-lg">
		<!-- judul -->
		<div class="flex justify-center">
			<p class="font-semibold text-2xl">Diagram Lingkaran Analisis</p>
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


		<div class="">
			<canvas id="DiagramBatangPerTahun"></canvas>
		</div>
	</section>

	<!-- chart bar per 1tahun -->
	<section class="flex flex-col m-6 p-6 space-y-4 bg-white border-2 border-blue-500 rounded-lg shadow-lg">
		<!-- judul -->
		<div class="flex justify-center ju">
			<p class="font-semibold text-2xl">
				Diagram Batang Prestasi tahun ini, <?= date('Y') ?>
			</p>
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
					<div
						class="flex items-center bg-white w-full p-2 space-x-1 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
						<img src="../../../public/img/Search (1).png" alt="logo" class="w-5 h-5">
						<input type="text" id="cari-mhs" placeholder="" class="w-full flex focus:outline-none"
							name="keyword" />
					</div>

				</div>
				<div class="flex right-0">
					<div class="flex items-center mr-3">

						<span>entri</span>
						<select name="year" id="yearSelect"
							class="right-0 mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
							<option value="all">Seluruh Waktu</option>
							<?php foreach ($data['tahun'] as $tahun) { ?>
								<option value="<?= $tahun['tahun']; ?>"><?= $tahun['tahun']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>

			<div class="mt-10 overflow-x-auto bg-white shadow-md rounded-2xl">
				<table id="daftar-prestasi-table" class="min-w-full bg-white">
					<thead>
						<tr>
							<th
								class="py-2 px-2 bg-blue-950 text-white font-semibold text-center border border-blue-950">
								RANKING
							</th>
							<th
								class="py-2 px-4 bg-blue-950 text-white font-semibold text-center border border-blue-950">
								NIM
							</th>
							<th
								class="py-2 px-4 bg-blue-950 text-white font-semibold text-center border border-blue-950">
								NAMA MAHASISWA
							</th>
							<th
								class="py-2 px-4 bg-blue-950 text-white font-semibold text-center border border-blue-950">
								PRODI
							</th>
							<th
								class="py-2 px-4 bg-blue-950 text-white font-semibold text-center border border-blue-950">
								TOTAL POIN
							</th>
						</tr>
					</thead>
					<tbody id="daftar-prestasi-body" class="text-gray-700">
					</tbody>
				</table>
			</div>
			<!-- pagination -->
			<section class="flex items-center justify-center py-2">
				<nav aria-label="Page navigation example">
					<ul class="flex items-center -space-x-px h-8 text-sm pagination">

					</ul>
				</nav>

			</section>

		</div>
	</section>

	<script>
		document.addEventListener("DOMContentLoaded", function () {
			// Ambil elemen input dan dropdown
			const searchInput = document.getElementById("cari-mhs");
			const yearSelect = document.getElementById("yearSelect");
			const tableBody = document.getElementById("daftar-prestasi-body");
			const paginationContainer = document.querySelector(".pagination");
			const ctx = document.getElementById("DiagramLingkar");
			const ctx1 = document.getElementById("DiagramBatangPerTahun");
			const ctx2 = document.getElementById("DiagramBatang1Tahun");
			let currentPage = 1;
			const limit = 10; // Menampilkan 10 data per halaman

			// Fungsi untuk memuat data dengan AJAX
			function fetchData(keyword = "", year = "all", page = 1) {
				fetch("<?= BASEURL; ?>/Admin/getDataRankingPrestasi", {
					method: "POST",
					headers: { "Content-Type": "application/json" },
					body: JSON.stringify({ keyword, year, page, limit }) // Kirim data dalam bentuk JSON
				})
					.then((response) => response.json())
					.then((data) => {
						renderTable(data.data); // Render tabel dengan data yang diterima
						renderPagination(data.total, page); // Render pagination
					})
					.catch((error) => console.error("Error fetching data:", error));
			}

			// Fungsi untuk merender tabel
			function renderTable(data) {
				tableBody.innerHTML = ""; // Kosongkan tabel sebelumnya

				if (data.length > 0) {
					data.forEach((item) => {
						const row = `<tr>
					<td class='py-2 px-2 text-center border border-blue-950'>${item.rank}</td>
					<td class='py-2 px-4 text-center border border-blue-950'>${item.nim}</td>
					<td class='py-2 px-4 text-center border border-blue-950'>${item.nama}</td>
					<td class='py-2 px-4 text-center border border-blue-950'>${item.nama_prodi}</td>
					<td class='py-2 px-4 text-center border border-blue-950'>${item.total_poin}</td>
				</tr>`;
						tableBody.innerHTML += row;
					});
				} else {
					tableBody.innerHTML = `<tr><td colspan='5' class='text-center py-10'>
				<img src='../../public/img/table-kosong.png' alt='Table Kosong' class='w-1/6 mx-auto'/>
				<p class='font-bold text-gray-500 mt-4'>Tidak ada data yang tersedia..</p>
			</td></tr>`;
				}
			}

			// Fungsi untuk merender pagination
			function renderPagination(total, currentPage) {
				const totalPages = Math.ceil(total / limit);
				paginationContainer.innerHTML = ""; // Kosongkan pagination sebelumnya

				// Previous button
				paginationContainer.innerHTML += `
			<li><a href="#" data-page="${currentPage - 1}" class="hover:bg-blue-100 hover:text-blue-600 flex items-center justify-center px-3 h-8 ms-0 leading-tight text-blue-600 border border-e-0 border-gray-300 rounded-s-lg ${currentPage === 1 ? 'cursor-not-allowed' : ''}">
				<span class="sr-only">Previous</span>
				<svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
					<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
				</svg>
				</a></li>
			`;

				// Page numbers
				for (let i = 1; i <= totalPages; i++) {
					paginationContainer.innerHTML += `
				<li><a href="#" data-page="${i}" class="hover:bg-blue-100 hover:text-blue-600 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-gray-300 ${i === currentPage ? 'bg-blue-200 font-bold' : ''}">
					${i}
				</a></li>
			`;
				}

				// Next button
				paginationContainer.innerHTML += `
			<li><a href="#" data-page="${currentPage + 1}" class="hover:bg-blue-100 hover:text-blue-600 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-gray-300 rounded-e-lg ${currentPage === totalPages ? 'cursor-not-allowed' : ''}">
				<span class="sr-only">Next</span>
				<svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
					<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
				</svg>
			</a></li>
		`;

				// Event listener untuk page navigation
				document.querySelectorAll("a[data-page]").forEach((btn) => {
					btn.addEventListener("click", function (e) {
						e.preventDefault();
						const page = parseInt(this.dataset.page);
						if (page >= 1 && page <= totalPages) {
							currentPage = page;
							const keyword = searchInput.value;
							const year = yearSelect.value;
							fetchData(keyword, year, currentPage);
						}
					});
				});
			}

			// Event listener untuk pencarian
			searchInput.addEventListener("input", function () {
				const keyword = searchInput.value;
				const year = yearSelect.value;
				fetchData(keyword, year, 1); // Reset ke halaman pertama saat pencarian
			});

			// Event listener untuk dropdown tahun
			yearSelect.addEventListener("change", function () {
				const year = this.value;
				const keyword = searchInput.value;
				fetchData(keyword, year, 1); // Reset ke halaman pertama saat tahun berubah
			});

			// Panggil fungsi pertama kali dengan default data
			fetchData();



			const analisisSelect = document.getElementById("analisisSelect");

			function fetchDataAnalysis(selected = "kategori", years = "2024") {
				fetch("<?= BASEURL; ?>/Admin/getAnalisisDataPrestasi", {
					method: "POST",
					headers: { "Content-Type": "application/json" },
					body: JSON.stringify({ selected, years }) // Kirim data dalam bentuk JSON
				})
					.then((response) => response.json())
					.then((data) => {
						renderChart(data.dataTahun, data.dataSelected, data.dataLingkaran, data.dataPerTahun, data.dataPerBulan, selected); // Render pagination
					})
					.catch((error) => console.error("Error fetching data:", error));
			}

			// Event listener untuk dropdown tahun
			analisisSelect.addEventListener("change", function () {
				const selected = this.value;
				fetchDataAnalysis(selected);
			});

			let chartDoughnut = null; // Simpan instance chart
			let chartBarTahun = null;
			let chartBarBulan = null;


			function renderChart(dataTahun, dataSelected, dataLingkaran, dataPerTahun, dataPerBulan, selected) {

				if (chartDoughnut) chartDoughnut.destroy();
				if (chartBarTahun) chartBarTahun.destroy();
				if (chartBarBulan) chartBarBulan.destroy();

				// Doughnut Chart
				chartDoughnut = new Chart(ctx, {
					type: "doughnut",
					data: {
						labels: dataLingkaran.map(item => item[selected]),
						datasets: [
							{
								data: dataLingkaran.map(item => item.jumlah_prestasi),
								borderWidth: 1,
								backgroundColor: [
									"#E3F2FD", // Lebih Muda
									// "#B3D8F4", // Lebih Muda
									"#C6E0F7",
									"#70B1EA",
									"#3F84D9",
									"#3063C5",
									"#274A9D",
									"#13294B",
									"#1D2C40",
								],
							},
						],
					},
				});

				// Bar Chart - Per Tahun
				chartBarTahun = new Chart(ctx1, {
					type: "bar",
					data: {
						labels: dataTahun.map(item => item.tahun),
						datasets: dataLingkaran.map((selectedData, index) => ({
							label: selectedData[selected],
							data: dataPerTahun.map(item => item[selectedData[selected]]),
							borderWidth: 1,
							backgroundColor: [
								"#E3F2FD", // Lebih Muda
								// "#B3D8F4", // Lebih Muda
								"#C6E0F7",
								"#70B1EA",
								"#3F84D9",
								"#3063C5",
								"#274A9D",
								"#13294B",
								"#1D2C40",
							][index % 7],
						})),
					},
					options: {
						scales: {
							y: {
								beginAtZero: true,
							},
						},
					},
				});

				// Bar Chart - Per Bulan
				chartBarBulan = new Chart(ctx2, {
					type: "bar",
					data: {
						labels: [
							"Januari", "Februari", "Maret", "April", "Mei", "Juni",
							"Juli", "Agustus", "September", "Oktober", "November", "Desember"
						],
						datasets: dataLingkaran.map((selectedData, index) => ({
							label: selectedData[selected],
							data: dataPerBulan.map(item => item[selectedData[selected]]),
							borderWidth: 1,
							backgroundColor: [
								"#E3F2FD", // Lebih Muda
								// "#B3D8F4", // Lebih Muda
								"#C6E0F7",
								"#70B1EA",
								"#3F84D9",
								"#3063C5",
								"#274A9D",
								"#13294B",
								"#1D2C40",
							][index % 7],
						})),
					},
					options: {
						scales: {
							y: {
								beginAtZero: true,
							},
						},
					},
				});
			}
			fetchDataAnalysis();

		});

	</script>
	// Script Chart Diagram
	<!-- <script src="../../app/components/Diagram.js"></script> -->
</section>