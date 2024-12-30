<section class="sm:ml-64 bg-blue-50 min-h-screen p-4">
    <!-- profil -->
	<?php require_once __DIR__ .'/../templates/profiles.php'; ?>


    <!-- selamat datang -->
    <section class="flex-col justify-start pt-20 md:pt-0 p-4 space-y-4">
        <p class="font-bold text-2xl sm:text-3xl md:text-4xl">Selamat Datang</p>
        <p class="font-semibold text-xl sm:text-2xl text-[#F99D1C]">
            <?= $data['mhs']['0']['nama'] ?> / <?= $data['mhs']['0']['nim'] ?>
        </p>
    </section>

    <!-- prestasi -->
    <section class="flex flex-col sm:flex-row justify-start p-4 space-y-4 sm:space-y-0 sm:space-x-4">
        <!-- total prestasi -->
        <div class="bg-white p-4 rounded-lg shadow-lg border w-full sm:w-1/3">
            <div class="flex justify-start space-x-4 items-center">
                <img src="../../../public/img/Total_Prestasi.png" alt="logo" class="w-12 h-12">
                <div class="flex-col">
                    <p class="font-semibold text-[#757575] text-xs">Total Prestasi Saat Ini</p>
                    <p class="font-bold text-base"><?= $data['mhs']['1']['total_prestasi'] ?></p>
                </div>
            </div>
        </div>

        <!-- total poin -->
        <div class="bg-white p-4 rounded-lg shadow-lg border w-full sm:w-1/3">
            <div class="flex justify-start space-x-4 items-center">
                <img src="../../../public/img/Total_poin.png" alt="logo" class="w-12 h-12">
                <div class="flex-col">
                    <p class="font-semibold text-[#757575] text-xs">Total Poin Saat Ini</p>
                    <p class="font-bold text-base"><?= $data['mhs']['1']['total_poin'] ?></p>
                </div>
            </div>
        </div>

        <!-- peringkat mapres -->
        <div class="bg-white p-4 rounded-lg shadow-lg border w-full sm:w-1/3">
            <div class="flex justify-start space-x-4 items-center">
                <img src="../../../public/img/Perankingan_Mhs.png" alt="logo" class="w-12 h-12">
                <div class="flex-col">
                    <p class="font-semibold text-[#757575] text-xs">Peringkat MaPres</p>
                    <p class="font-bold text-base"><?= $data['mhs']['1']['peringkat_mapres'] ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="p-4">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold">Daftar Mahasiswa Berprestasi</h1>
    </section>

    <!-- table maPres -->
    <section id="daftar-prestasi">
        <div class="p-4">
        	<div class="flex flex-col sm:flex-row justify-between space-y-4 sm:space-y-0 w-full">
				<!-- Search -->
				<div class="flex w-full sm:w-auto items-center space-x-4">
					<form id="formFilter" action="<?= BASEURL; ?>/Mahasiswa" method="POST" class="flex-1">
						<div class="flex items-center bg-white p-2 space-x-1 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
							<img src="../../../public/img/Search (1).png" alt="logo" class="w-5 h-5">
							<input type="text" id="cari-mhs" placeholder="Cari Mahasiswa" class="w-full flex focus:outline-none" name="keyword" />
						</div>
				</div>

				<!-- Filters -->
				<div class="flex flex-row items-center justify-end w-full sm:space-x-4 space-x-2">
					<!-- Limit Filter -->
					<div class="flex items-center">
						<span class="hidden sm:inline">Lihat</span>
						<select name="limit" onchange="submitForm()" 
							class="mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
							<option value="10" selected>10</option>
							<option value="20">20</option>
							<option value="50">50</option>
						</select>
						<span class="hidden sm:inline">entri</span>
					</div>

					<!-- Year Filter -->
					<div class="flex items-center">
						<select name="year" onchange="submitForm()" 
							class="border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
							<option value="2025">2022</option>
							<option value="2026">2023</option>
							<option value="2024" selected>2024</option>
						</select>
					</div>
					</form>
				</div>
		</div>


            <!-- Table -->
            <div class="mt-6 overflow-x-auto bg-white shadow-md rounded-2xl">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950 hidden sm:table-cell">RANKING</th>
                            <th class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950 hidden sm:table-cell">NIM</th>
                            <th class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">NAMA MAHASISWA</th>
                            <th class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950 hidden md:table-cell">PRODI</th>
                            <th class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">TOTAL POIN</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <?php
                        $rank = 1;
                        foreach ($data['prestasi'] as $mahasiswa) {
                            echo "<tr>";
                            echo "<td class='py-2 px-4 border border-blue-950 hidden sm:table-cell'>$rank</td>";
                            echo "<td class='py-2 px-4 border border-blue-950 hidden sm:table-cell'>{$mahasiswa['nim']}</td>";
                            echo "<td class='py-2 px-4 border border-blue-950'>{$mahasiswa['nama_mahasiswa']}</td>";
                            echo "<td class='py-2 px-4 border border-blue-950 hidden md:table-cell'>{$mahasiswa['prodi']}</td>";
                            echo "<td class='py-2 px-4 border border-blue-950'>{$mahasiswa['total_poin']}</td>";
                            echo "</tr>";
                            $rank++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>

			<!-- table maPres -->
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
		});


	</script>
