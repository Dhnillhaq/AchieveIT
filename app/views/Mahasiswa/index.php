<section class="sm:ml-64 bg-blue-50 min-h-screen p-4">
    <!-- profil -->
    <?php require_once __DIR__ .'/../templates/profiles.php'; ?>

    <!-- selamat datang -->
    <section class="flex-col justify-start p-4 space-y-4">
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

            <!-- Pagination -->
            <section class="flex items-center justify-center py-4">
                <nav aria-label="Page navigation">
                    <ul class="flex items-center -space-x-px h-8 text-sm">
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-blue-600 border border-e-0 border-gray-300 rounded-s-lg hover:bg-blue-200 hover:text-blue-700">
                                <span class="sr-only">Previous</span>
                                <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" aria-current="page" class="z-10 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-gray-300 bg-transparent hover:bg-blue-200 hover:text-blue-700">1</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-gray-300 bg-transparent hover:bg-blue-200 hover:text-blue-700">2</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-gray-300 bg-transparent hover:bg-blue-200 hover:text-blue-700">3</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-gray-300 rounded-e-lg bg-transparent hover:bg-blue-200 hover:text-blue-700">
                                <span class="sr-only">Next</span>
                                <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </section>
        </div>
    </section>
</section>

<!-- Function js untuk submit form select ketika opsi yang lain dipilih -->
<script>
function submitForm() {
    document.getElementById("formFilter").submit();
}
</script>