<section class="sm:ml-64 bg-blue-50 min-h-screen">

	<?php require_once __DIR__ . '/../templates/profiles.php'; ?>

	<!-- Profil -->
	<section class="flex-col justify-start pt-20 md-pt-0 pl-6">
		<p class="font-bold text-3xl">Profil</p>
	</section>

	<!-- informasi admin -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Informasi Admin
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<div class="flex flex-col justify-start items-start">
				<div class="flex flex-col justify-start items-start pt-5">
					<p class="text-[#757575]">NIP</p>
					<p class="font-semibold"><?= $_SESSION['user']['nip'] ?></p>
				</div>

				<div class="flex flex-col justify-start items-start pt-5">
					<p class="text-[#757575]">Nama</p>
					<p class="font-semibold"><?= $_SESSION['user']['nama'] ?></p>
				</div>
			</div>
			<!-- btn ubah kt sandi -->
			<section class="justify-center pt-6">
				<a href="<?= BASEURL; ?>/Auth/ubahSandiForm">
					<button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
						<img src="../../../public/img/Horizontal_switch.png" alt="logo" class="w-5 h-5" />
						<p>Ubah Kata Sandi</p>
					</button>
				</a>
			</section>
		</div>
	</section>

	<!-- log admin -->
	<section class="relative p-6">
	<!-- Log Admin --> 
	<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
		Log Admin
	</div>
	<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
		<!-- table -->
		<section class="mt-10 overflow-x-auto bg-white shadow-md rounded-2xl">
			<table class="min-w-full bg-white text-center">
				<thead>
					<tr>
						<th
							class="py-2 px-4 w-1/5 bg-blue-950 italic text-white font-semibold border border-blue-950">
							Timestamp
						</th>
						<th
							class="py-2 px-4 w-1/5 bg-blue-950 italic text-white font-semibold border border-blue-950">
							Oleh
						</th>
						<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
							Aksi
						</th>
						<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
							Keterangan
						</th>
					</tr>
				</thead>
				<tbody id="table-log">					
					
				</tbody>
			</table>
		</section>
		<!-- pagination -->
		<section class="flex items-center justify-center py-2">
			<nav aria-label="Page navigation example">
				<ul class="pagination flex flex-wrap items-center -space-x-px h-8 text-sm">
					
				</ul>
			</nav>
		</section>
	</div>
			<!-- btn -->
			<section class="justify-center p-6">
				<a href="<?= BASEURL; ?>/Auth/logout">
					<button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#FF3B30] rounded-lg w-auto">
						<img src="../../../public/img/Sign_out.png" alt="logo" class="w-5 h-5" />
						<p>Keluar</p>
					</button>
				</a>
			</section>
	</section>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const logTableBody = document.getElementById("table-log");
    const pagination = document.querySelector(".pagination");

    let currentPage = 1;

    // Fungsi untuk mengambil data log dari server
	async function fetchLogs(page = 1) {
		const response = await fetch(`<?= BASEURL; ?>/Admin/getLogs/${page}`);
		const result = await response.json();

		renderTable(result.data); 
		renderPagination(result.total, result.page, result.limit); 
	}


    // Fungsi untuk merender tabel
	function renderTable(data) {
		logTableBody.innerHTML = "";

		// Jika data kosong
		if (data.length === 0) {
			logTableBody.innerHTML = `
				<tr>
					<td colspan="4" class="text-center py-10">
						<img src="../../public/img/table-kosong.png" alt="Table Kosong" class="w-1/6 mx-auto" />
						<p class="font-bold text-gray-500 mt-4">Belum ada log admin baru-baru ini</p>
					</td>
				</tr>`;
			return;
		}

		// Jika data ada, lakukan perulangan dan render
		data.forEach((log) => {
			let timestamp = log.timestamp.date;

			if (typeof timestamp === "string") {
				const [date, timeWithMilliseconds] = timestamp.split(" "); // Pisahkan tanggal dan waktu
				const [time, Milisecond] = timeWithMilliseconds.split("."); // Pisahkan jam, menit, dan detik

				logTableBody.innerHTML += `
					<tr>
						<td class="py-2 px-4 border border-blue-950">
							<div>${date}</div>
							<div>${time}</div> <!-- Menampilkan waktu dalam format hh:mm:ss -->
						</td>
						<td class="py-2 px-4 border border-blue-950">${log.nama}</td>
						<td class="py-2 px-4 border border-blue-950">${log.aksi}</td>
						<td class="py-2 px-4 border border-blue-950">${log.keterangan}</td>
					</tr>`;
			}
		});
	}

    // Fungsi untuk merender pagination
	function renderPagination(total, currentPage, limit) {
		const totalPages = Math.ceil(total / limit);
		const paginationContainer = document.querySelector("ul.pagination");
		paginationContainer.innerHTML = "";

		// Previous button
		paginationContainer.innerHTML += `
			<li>
				<a href="#" data-page="${currentPage - 1}" class="hover:bg-blue-100 hover:text-blue-600 flex items-center justify-center px-3 h-8 ms-0 leading-tight text-blue-600 border border-e-0 border-gray-300 rounded-s-lg ${currentPage === 1 ? 'cursor-not-allowed' : ''}">
					<span class="sr-only">Previous</span>
					<svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
					</svg>
				</a>
			</li>
		`;

		// Page numbers
		for (let i = 1; i <= totalPages; i++) {
			paginationContainer.innerHTML += `
				<li>
					<a href="#" data-page="${i}" class="hover:bg-blue-100 hover:text-blue-600 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-gray-300 ${i === currentPage ? 'bg-blue-200 font-bold' : ''}">
						${i}
					</a>
				</li>
			`;
		}

		// Next button
		paginationContainer.innerHTML += `
			<li>
				<a href="#" data-page="${currentPage + 1}" class="hover:bg-blue-100 hover:text-blue-600 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-gray-300 rounded-e-lg ${currentPage === totalPages ? 'cursor-not-allowed' : ''}">
					<span class="sr-only">Next</span>
					<svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
					</svg>
				</a>
			</li>
		`;

		// Event listener untuk page navigation
		document.querySelectorAll("a[data-page]").forEach((btn) => {
			btn.addEventListener("click", function (e) {
				e.preventDefault();
				const page = parseInt(this.dataset.page);
				if (page >= 1 && page <= totalPages) {
					currentPage = page;
					fetchLogs(currentPage);
				}
			});
		});
	}
    fetchLogs(currentPage);
});
</script>