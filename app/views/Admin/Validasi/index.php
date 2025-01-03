<section class="sm:ml-64 bg-blue-50 min-h-screen">
	<?php require_once __DIR__ . '../../../templates/profiles.php'; ?>

	<!-- Validasi Akun Mahasiswa-->
	<section class="flex-col justify-start pt-20 md:pt-0 pl-6">
		<p class="font-bold text-3xl">Validasi Akun Mahasiswa</p>
	</section>

	<!-- Akun mahasiswa -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Akun Mahasiswa
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<!-- cari -->
			<section class="flex justify-between p-6">
				<div
					class="flex items-center bg-white w-1/ p-2 rounded-md border shadow-md focus-within:ring-2 focus-within:ring-blue-500">
					<img src="../../../../public/img/Search (1).png" alt="logo" class="w-5 h-5" />
					<input type="text" id="validasiAkunSearch" placeholder="Cari berdasarkan NIM" class="bg-white flex focus:outline-none w-full" />
				</div>
				<!-- <div class="flex justify-end right-0 space-x-2">
					<div class="flex items-center">
						<span class="">Lihat</span>
						<select
							class="mx-2 border rounded-lg px-2 py-1 text-sm bg-white shadow-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="50">50</option>
						</select>
						<span class="">entri</span>
					</div>
				</div> -->
			</section>

			<!-- table  -->
			<div class="mt-10 overflow-x-auto bg-white shadow-md rounded-2xl">
				<table class="min-w-full bg-white text-center">
					<thead>
						<tr>
							<th class="py-2 px-4 w-1/12 bg-blue-950 text-white font-semibold border border-blue-950">
								No
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								Email
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								NIM
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								Nama
							</th>
							<th class="py-2 px-4 w-auto bg-blue-950 text-white font-semibold border border-blue-950">
								Status
							</th>
							<th class="py-2 px-4 w-1/12 bg-blue-950 text-white font-semibold border border-blue-950">
								Aksi
							</th>
						</tr>
					</thead>
					<tbody class="myTable2 text-start" id="validasiAkunTable">
						<?php if (empty($data['mahasiswa'])) { ?>
							<tr>
								<td colspan="5" class="text-center py-10">
									<img src="../../public/img/table-kosong.png" alt="Table Kosong" class="w-1/6 mx-auto" />
									<p class="font-bold text-gray-500 mt-4">
										Tidak ada akun yang harus divalidasi..
									</p>
								</td>
							</tr>
						<?php } else {
							$no = 1;
							foreach ($data['mahasiswa'] as $mahasiswa) { ?>
								<tr>
									<td class="border border-blue-950 px-4 py-2"><?= $no++ ?></td>
									<td class="border border-blue-950 px-4 py-2"><?= $mahasiswa['email'] ?></td>
									<td class="border border-blue-950 px-4 py-2" id="nimAkun"><?= $mahasiswa['nim'] ?></td>
									<td class="border border-blue-950 px-4 py-2"><?= $mahasiswa['nama'] ?></td>
									<td class="border border-blue-950 px-4 py-2">
										<div class="flex items-center justify-start">
											<img src="../../../public/img/<?= ($mahasiswa['status'] == 'Valid') ? 'Valid.png' : (($mahasiswa['status'] == 'Invalid') ? 'invalid.png' : 'notValidated.png') ?>"
												alt="Icon Status" class="w-5 h-auto mr-2" />
											<p class=""><?= $mahasiswa['status'] ?></p>
										</div>
									</td>
									<td class="border border-blue-950 px-4 py-2">
										<a href="<?= BASEURL; ?>/Validasi/show/<?= $mahasiswa['id_mahasiswa'] ?>">
											<button class="bg-[#132145] py-2 px-2 rounded-md mr-2">
												<img src="../../../../public/img/Aksi.png" alt="Edit" class="" />
											</button>
										</a>
									</td>
								</tr>
							<?php }
						} ?>
					</tbody>
				</table>
			</div>

		</div>
	</section>

	<!-- btn -->
	<section class="justify-center p-6">
		<button onclick="history.back()"
			class="flex items-center space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
			<img src="../../../../public/img/Back.png" alt="logo" class="w-5 h-5" />
			<p>Kembali</p>
		</button>
	</section>
</section>


<script>
	$(document).ready(function () {
		function searchValidasiAkun() {
			let keyword = $("#validasiAkunSearch").val().toLowerCase();
			let visibleRows = 0;
			$("#validasiAkunTable tr").each(function () {
				let nimAkun = $(this).find("#nimAkun").text().toLowerCase();
				$(this).toggle(nimAkun.includes(keyword));
				if ($(this).is(":visible")) visibleRows++;
			});

			if (visibleRows === 0) {
				$("#validasiAkunTable").append('<tr class="empty-row"><td colspan="8" class="text-center py-10"><img src="../../public/img/table-kosong.png" alt="Table Kosong" class="w-1/6 mx-auto" /><p class="font-bold text-gray-500 mt-4">Tidak ada data yang tersedia</p></td></tr>');
			} else {
				$("#validasiAkunTable .empty-row").remove();
			}
		}

		$("#validasiAkunSearch").on("input change", searchValidasiAkun);
	});
</script>