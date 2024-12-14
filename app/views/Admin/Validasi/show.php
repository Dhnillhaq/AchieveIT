<section class="sm:ml-64 bg-blue-50 min-h-screen">

	<?php require_once __DIR__ . '../../../templates/profiles.php'; ?>

	<!-- Detail Mahasiswa-->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Detail Mahasiswa</p>
	</section>

	<!-- informasi mahasiswa -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Data Mahasiswa
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<div class="flex flex-row justify-start items-start space-x-40">
				<div class="flex flex-col space-y-4">
					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">NIM</p>
						<p class="font-semibold"><?= $data['nim'] ?></p>
					</div>

					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Nama Mahasiswa</p>
						<p class="font-semibold"><?= $data['nama'] ?></p>
					</div>

					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Program Studi</p>
						<p class="font-semibold"><?= $data['nama_prodi'] ?></p>
					</div>

					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Total Poin</p>
						<p class="font-semibold"><?= $data['total_poin'] ?></p>
					</div>
				</div>

				<div class="flex flex-col space-y-4">
					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Tanggal Lahir</p>
						<p class="font-semibold"><?= $data['tanggal_lahir']->format('d-m-Y') ?></p>
					</div>

					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Tempat Lahir</p>
						<p class="font-semibold"><?= $data['tempat_lahir'] ?></p>
					</div>

					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Agama</p>
						<p class="font-semibold"><?= $data['agama'] ?></p>
					</div>

					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Jenis Kelamin</p>
						<p class="font-semibold"><?= $data['jenis_kelamin'] ?></p>
					</div>
				</div>

				<div class="flex flex-col space-y-4">
					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">No Telepon</p>
						<p class="font-semibold"><?= $data['no_telepon'] ?></p>
					</div>

					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Email</p>
						<p class="font-semibold"><?= $data['email'] ?></p>
					</div>

					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Password</p>
						<p class="font-semibold"><?= $data['password'] ?></p>
					</div>

					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Status Akun</p>
						<p class="font-semibold"><?= $data['status'] ?></p>
					</div>
				</div>
			</div>

			<!-- Garis Horizontal -->
			<div class="border-b border-1 border-gray-600 mt-10"></div>

			<!-- Tombol -->
			<p class="font-bold mt-4">Validasi Akun</p>
			<div class="flex justify-start space-x-4 mt-2">
				<a href="<?= BASEURL; ?>/Validasi/validate/<?= $data['id_mahasiswa'] ?>/true">
					<button class="bg-green-500 text-white p-2 rounded-lg hover:bg-blue-600">
						<img src="../../../../public/img/centang.png" alt="logo" class="w-7 h-7" />
					</button>
				</a>
				<a href="<?= BASEURL; ?>/Validasi/validate/<?= $data['id_mahasiswa'] ?>/false">
					<button class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600">
						<img src="../../../../public/img/silang.png" alt="logo" class="w-7 h-7" />
					</button>
				</a>
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