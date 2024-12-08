<section class="sm:ml-64 bg-blue-50 min-h-screen">

	<?php require_once __DIR__ . '/../templates/profiles.php'; ?>

	<!-- daftar prestasi -->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Daftar prestasi</p>
	</section>

	<!-- btn ekspor -->
	<section class="flex justify-end pr-6">
		<a href="<?= BASEURL; ?>/">
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
			<input type="text" id="cari" placeholder="" class="bg-white flex focus:outline-none" />
		</div>
		<div class="flex right-0 space-x-2">
			<div class="flex items-center">
				<span class="">entri</span>
			</div>
			<div class="flex items-center">
				<select
					class="right-0 mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
					<option>Tingkat</option>
					<option>Provinsi</option>
				</select>
			</div>
			<div class="flex items-center">
				<select
					class="right-0 mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
					<option>Kategori</option>
					<option>Kategori</option>
				</select>
			</div>

			<?php
			if ($_SESSION['user']['role'] == 'Super Admin') { ?>
				<div class="flex items-center">
					<select
						class="right-0 mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
						<option>VALID</option>
						<option>INVALID</option>
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
					<th class="w-1/12 py-2 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						No
					</th>
					<th class="w-auto py-2 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Nama Kompetisi
					</th>
					<th class="w-auto py-2 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Tingkat Kompetisi
					</th>
					<th class="w-auto py-2 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Kategori Kompetisi
					</th>
					<th class="w-auto py-2 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Juara
					</th>
					<th class="w-auto py-2 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Status
					</th>
					<th class="w-1/12 py-2 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Poin
					</th>
					<th class="w-1/12 py-2 px-4 bg-blue-950 text-white font-semibold border border-blue-950">
						Aksi
					</th>
				</tr>
			</thead>
			<tbody class="text-gray-700">
				<?php
				$no = 1;
				foreach ($data['daftar_prestasi'] as $prestasi) { ?>
					<tr>
						<td class="py-2 px-4 border border-blue-950"><?= $no++ ?></td>
						<td class="py-2 px-4 border border-blue-950"><?= $prestasi['nama_kompetisi'] ?></td>
						<td class="py-2 px-4 border border-blue-950"><?= $prestasi['tingkat_kompetisi'] ?></td>
						<td class="py-2 px-4 border border-blue-950"><?= $prestasi['kategori_kompetisi'] ?></td>
						<td class="py-2 px-4 border border-blue-950"><?= $prestasi['juara'] ?></td>
						<td class="py-2 px-4 border border-blue-950">
							<img src="../../public/img/Valid.png" alt="Icon Status" class="w-5 h-auto" />
							<img src="../../public/img/invalid.png" alt="Icon Status" class="w-5 h-auto" />
							<img src="../../public/img/notValidated.png" alt="Icon Status" class="w-5 h-auto" />
						</td>
						<td class="py-2 px-4 border border-blue-950"><?= $prestasi['poin'] ?></td>
						<td class="py-2 px-4 border border-blue-950">
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

</section>