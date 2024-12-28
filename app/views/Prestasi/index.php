<section class="sm:ml-64 bg-blue-50 min-h-screen">

	<?php require_once __DIR__ . '/../templates/profiles.php'; ?>

	<!-- daftar prestasi -->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Daftar prestasi</p>
	</section>

	<!-- btn ekspor -->
	<section class="flex justify-end pr-6">
		<a href="<?= BASEURL; ?>/Prestasi/export">
			<div class="flex items-center space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
				<img src="../../../public/img/Export_fill.png" alt="logo" class="w-5 h-5">
				<p>ekspor</p>
			</div>
		</a>
	</section>

	<!-- cari -->
	<section class="flex justify-between p-6">
		<div
			class="flex items-center bg-white w-1/3 p-2 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
			<img src="../../../public/img/Search (1).png" alt="logo" class="w-5 h-5">
			<input type="text" id="myInput" placeholder="Cari prestasi"
				class="bg-white flex focus:outline-none px-3 w-full" />
		</div>
		<div class="flex right-0 space-x-2">
			<div class="flex items-center">
				<span class="">entri</span>
			</div>
			<div class="flex items-center">
				<select id="filterTingkat"
					class="right-0 mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
					<option value="">Semua Tingkat</option>
					<?php foreach ($data['tingkat'] as $tingkat) { ?>
						<option value="<?= $tingkat['tingkat_kompetisi']; ?>"><?= $tingkat['tingkat_kompetisi']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="flex items-center">
				<select id="filterKategori"
					class="right-0 mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
					<option value="">Semua Kategori</option>
					<?php foreach ($data['kategori'] as $kategori) { ?>
						<option value="<?= $kategori['kategori']; ?>"><?= $kategori['kategori']; ?></option>
					<?php } ?>
				</select>
			</div>

			<?php
			if ($_SESSION['user']['role'] == 'Super Admin') { ?>
				<div class="flex items-center">
					<select id="filterStatus"
						class="right-0 mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
						<option value="">Status</option>
						<option value="Valid">Valid</option>
						<option value="Invalid">Invalid</option>
						<option value="Not Validated">Not Validated</option>
					</select>
				</div>
			<?php } ?>
		</div>
	</section>

	<!-- table -->
	<section class="mx-6 overflow-x-auto mb-5 bg-white shadow-md rounded-2xl">
		<table class="min-w-full bg-white text-center">
			<thead>
				<tr>
					<th class="w-1/12 py-3 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						No
					</th>
					<th class="w-auto py-3 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Nama Kompetisi
					</th>
					<th class="w-auto py-3 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Tingkat Kompetisi
					</th>
					<th class="w-auto py-3 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Kategori Kompetisi
					</th>
					<th class="w-auto py-3 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Juara
					</th>
					<th class="w-auto py-3 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Status
					</th>
					<th class="w-1/12 py-3 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Poin
					</th>
					<th class="w-1/12 py-3 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Aksi
					</th>
				</tr>
			</thead>
			<tbody class="text-gray-700" id="myTable">
				<?php
				$no = 1;
				foreach ($data['daftar_prestasi'] as $prestasi) { ?>
					<tr class="visible">
						<td class="py-3 px-4 border border-blue-950"><?= $no++ ?></td>
						<td class="nama-kompetisi py-3 px-4 border border-blue-950"><?= $prestasi['nama_kompetisi'] ?></td>
						<td class="tingkat py-3 px-4 border border-blue-950"><?= $prestasi['tingkat_kompetisi'] ?></td>
						<td class="kategori py-3 px-4 border border-blue-950"><?= $prestasi['kategori_kompetisi'] ?></td>
						<td class="py-3 px-4 border border-blue-950"><?= $prestasi['juara'] ?></td>
						<td class="status py-3 px-4 border border-blue-950">
							<div class="flex justify-center gap-1">
								<img src="../../public/img/<?= ($prestasi['status'] == 'Valid') ? 'Valid.png' : (($prestasi['status'] == 'Invalid') ? 'invalid.png' : 'notValidated.png') ?>"
									alt="Icon Status" class="w-6 h-full object-cover" />
								<p><?= $prestasi['status'] ?></p>
							</div>
						</td>
						<td class="py-3 px-4 border border-blue-950"><?= $prestasi['poin'] ?></td>
						<td class="py-3 px-4 border border-blue-950">
							<a href="<?= BASEURL; ?>/Prestasi/show/<?= $prestasi['id_prestasi'] ?>">
								<button>
									<img src="../../../public/img/Aksi.png" alt="logo" class="p-2 bg-[#132145] rounded-md">
								</button>
							</a>
						</td>
					</tr>
					<?php
				}
				?>
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

</section>
<script>
	$(document).ready(function () {
		let currentPage = 1;
		let rowsPerPage = 10;
		let totalPages;

		function filterTable() {
			let keyword = $("#myInput").val().toLowerCase();
			let tingkat = $("#filterTingkat").val().toLowerCase();
			let kategori = $("#filterKategori").val().toLowerCase();
			let statusElement = $("#filterStatus");
			let status = statusElement.length ? statusElement.val().toLowerCase() : "valid";

			let visibleRows = 0;
			$("#myTable tr").each(function (index) {
				let namaKompetisi = $(this).find(".nama-kompetisi").text().toLowerCase();
				let tingkatKompetisi = $(this).find(".tingkat").text().toLowerCase();
				let kategoriKompetisi = $(this).find(".kategori").text().toLowerCase();
				let statusKompetisi = $(this).find(".status p").text().toLowerCase();

				let isVisible =
					(namaKompetisi.indexOf(keyword) > -1) &&
					(tingkat === "" || tingkatKompetisi === tingkat) &&
					(kategori === "" || kategoriKompetisi === kategori) &&
					(status === "" || statusKompetisi === status);

				$(this).toggle(isVisible);
				if (isVisible) visibleRows++;
				if (isVisible) {
					$(this).removeClass('hidden');
				} else {
					$(this).addClass('hidden');
				}

			});

			if (visibleRows === 0) {
				$("#myTable").append('<tr class="empty-row"><td colspan="8" class="text-center py-10"><img src="../../public/img/table-kosong.png" alt="Table Kosong" class="w-1/6 mx-auto" /><p class="font-bold text-gray-500 mt-4">Tidak ada data yang tersedia</p></td></tr>');
			} else {
				$("#myTable .empty-row").remove();
			}

			paginateTable();
		}

		function paginateTable() {
			let rows = $("#myTable tr:not(.hidden)");
			totalPages = Math.ceil(rows.length / rowsPerPage);
			const paginationContainer = document.querySelector("ul.pagination");

			rows.hide();
			rows.slice((currentPage - 1) * rowsPerPage, currentPage * rowsPerPage).show();

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


			$("ul.pagination").on("click", "a", function (e) {
				e.preventDefault();
				let page = parseInt($(this).data("page"));
				if (page >= 1 && page <= totalPages) {
					currentPage = page;
					console.log(page);
					paginateTable();
				}
			});
		}

		$("#myInput, #filterTingkat, #filterKategori, #filterStatus").on("input change", function () {
			filterTable();
			paginateTable();
		});

		paginateTable();
	});
</script>