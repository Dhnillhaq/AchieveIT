<section class=" sm:ml-64 bg-blue-50 min-h-screen">
	<!-- profil -->
	<?php require_once __DIR__ .'/../templates/profiles.php'; ?>

	<!-- selamat datang -->
	<section class="flex-col justify-start p-6 space-y-4">
		<p class="font-bold text-4xl">Selamat Datang</p>
		<p class="font-semibold text-2xl text-[#F99D1C]">
			<?= $data['mhs']['0']['nama'] ?> / <?= $data['mhs']['0']['nim'] ?>
	</section>

			<!-- prestasi -->
			<section class="flex justify-start p-6 space-x-10 ">
				<!-- total prestasi -->
				<div class="bg-white p-4 rounded-lg shadow-lg border w-1/4">
					<div class="flex justify-start space-x-4">
						<img src="../../../public/img/Total_Prestasi.png" alt="logo" class="w-auto h-12">
						<div class="flex-col">
							<p class="font-semibold text-[#757575] text-[12px]">Total Prestasi Saat Ini</p>
							<p class="font-bold"><?= $data['mhs']['1']['total_prestasi'] ?></p>
						</div>
					</div>
				</div>

				<!-- total poin -->
				<div class="bg-white p-4 rounded-lg shadow-lg border w-1/4">
					<div class="flex justify-start space-x-4">
						<img src="../../../public/img/Total_poin.png" alt="logo" class="w-auto h-12">
						<div class="flex-col">
							<p class="font-semibold text-[#757575] text-[12px]">Total Poin Saat Ini</p>
							<p class="font-bold"><?= $data['mhs']['1']['total_poin'] ?></p>
						</div>
					</div>
				</div>

				<!-- peringkat mapres -->
				<div class="bg-white p-4 rounded-lg shadow-lg border w-1/4">
					<div class="flex justify-start space-x-4">
						<img src="../../../public/img/Perankingan_Mhs.png" alt="logo" class="w-auto h-12">
						<div class="flex-col">
							<p class="font-semibold text-[#757575] text-[12px]">Peringkat MaPres</p>
							<p class="font-bold"><?= $data['mhs']['1']['peringkat_mapres'] ?></p>
						</div>
					</div>
				</div>
			</section>

			<section class="p-6 justify-start">
				<h1 class="text-4xl font-bold ">Daftar Mahasiswa Berprestasi</h1>
			</section>

			<!-- table maPres -->
			<!-- dari Components -->
			<section id="daftar-prestasi" class="">
				<div class="p-5 mb-10 ">
					<div class="flex justify-between">
						<div class="flex">
							<form id="formFilter" action="<?= BASEURL; ?>/Mahasiswa" method="POST">
								<div class="flex items-center bg-white w-full p-2 space-x-1 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
									<img src="../../../public/img/Search (1).png" alt="logo" class="w-5 h-5">
									<input type="text" id="cari-mhs" placeholder="" class="w-full flex focus:outline-none" name="keyword"/>
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
									<option value="2025">2022</option>
									<option value="2026">2023</option>
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
									<th
										class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">
										RANKING
									</th>
									<th
										class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">
										NIM
									</th>
									<th
										class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">
										NAMA MAHASISWA
									</th>
									<th
										class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">
										PRODI
									</th>
									<th
										class="py-2 px-4 bg-blue-950 text-white font-semibold text-left border border-blue-950">
										TOTAL POIN
									</th>
								</tr>
							</thead>
							<tbody class="text-gray-700">
								<?php

								// Looping data mahasiswa ke dalam tabel
								$rank = 1;
								foreach ($data['prestasi'] as $mahasiswa) {
									echo "<tr>";
									echo "<td class='py-2 px-4 border border-blue-950'>$rank</td>";
									echo "<td class='py-2 px-4 border border-blue-950'>{$mahasiswa['nim']}</td>";
									echo "<td class='py-2 px-4 border border-blue-950'>{$mahasiswa['nama_mahasiswa']}</td>";
									echo "<td class='py-2 px-4 border border-blue-950'>{$mahasiswa['prodi']}</td>";
									echo "<td class='py-2 px-4 border border-blue-950'>{$mahasiswa['total_poin']}</td>";
									echo "</tr>";
									$rank++;
								}

								?>
							</tbody>
						</table>
					</div>
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
			<!-- //php include __DIR__ . '/../../components/DaftarMahasiswaBerprestasi.php';  -->
	</section>
</section>

<!-- Function js untuk submit form select ketika opsi yang lain dipilih -->
<script>
	function submitForm() {
		document.getElementById("formFilter").submit();
	}
</script>