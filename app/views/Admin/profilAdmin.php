<section class="sm:ml-64 bg-blue-50 min-h-screen">

	<?php require_once __DIR__ . '/../templates/profiles.php'; ?>

	<!-- Profil -->
	<section class="flex-col justify-start pl-6">
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
				<a href="<?= BASEURL; ?>/Auth/ubahSandi">
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
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Log Admin
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<!-- entri -->
			<div class="flex justify-end right-0">
				<div class="flex items-center mr-3">
					<span class="">Lihat</span>
					<select
						class="mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
						<option value="10">10</option>
						<option value="20">20</option>
						<option value="50">50</option>
					</select>
					<span class="">entri</span>
				</div>
			</div>
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
					<tbody>
						<?php if (empty($data['log'])) { ?>
							<tr>
								<td colspan="5" class="text-center py-10">
									<img src="../../public/img/table-kosong.png" alt="Table Kosong" class="w-1/6 mx-auto" />
									<p class="font-bold text-gray-500 mt-4">
										Belum ada log admin baru-baru ini
									</p>
								</td>
							</tr>
						<?php } else {
							foreach ($data['log'] as $log) { ?>
								<tr>
									<td class="py-2 px-4 border border-blue-950">
										<div><?= $log['timestamp']->format("Y-m-d") ?></div>
										<div><?= $log['timestamp']->format("H:i:s") ?></div>
									</td>
									<td class="py-2 px-4 border border-blue-950"><?=$log['nama']?></td>
									<td class="py-2 px-4 border border-blue-950"><?= $log['aksi'] ?></td>
									<td class="py-2 px-4 border border-blue-950">
										<?= $log['keterangan'] ?>
									</td>
								</tr>
							<?php }
						} ?>

					</tbody>
				</table>
			</section>
			<!-- pagination -->
			<section class="flex items-center justify-center py-2">
				<nav aria-label="Page navigation example">
					<ul class="flex items-center -space-x-px h-8 text-sm">
						<li>
							<a href="#"
								class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-blue-600 border border-e-0 border-gray-300 rounded-s-lg hover:bg-blue-200 hover:text-blue-700">
								<span class="sr-only">Previous</span>
								<svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
									xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
										stroke-width="2" d="M5 1 1 5l4 4" />
								</svg>
							</a>
						</li>
						<li>
							<a href="#" aria-current="page"
								class="z-10 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-gray-300 bg-transparent hover:bg-blue-200 hover:text-blue-700">1</a>
						</li>
						<li>
							<a href="#"
								class="flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-gray-300 bg-transparent hover:bg-blue-200 hover:text-blue-700">2</a>
						</li>
						<li>
							<a href="#"
								class="flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-gray-300 bg-transparent hover:bg-blue-200 hover:text-blue-700">3</a>
						</li>
						<li>
							<a href="#"
								class="flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-gray-300 rounded-e-lg bg-transparent hover:bg-blue-200 hover:text-blue-700">
								<span class="sr-only">Next</span>
								<svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
									xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
										stroke-width="2" d="m1 9 4-4-4-4" />
								</svg>
							</a>
						</li>
					</ul>
				</nav>

			</section>
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