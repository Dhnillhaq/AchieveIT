<section class="sm:ml-64 bg-blue-50 min-h-screen">
	<!-- profil -->
	<?php require_once __DIR__ . '/../templates/profiles.php'; ?>

	<!-- Profil Mahasiswa -->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Profil Mahasiswa</p>
	</section>

	<!-- informasi mahasiswa -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Informasi Mahasiswa
		</div>
		<div class="static mt-5 p-6 bg-white border-2 rounded-lg border-[#FEC01A] space-y-2">
			<div class="flex flex-row justify-start items-start space-x-40">
				<div class="flex flex-col space-y-4">
					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">NIM</p>
						<p class="font-semibold"><?= $_SESSION['user']['nim'] ?></p>
					</div>

					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Nama Mahasiswa</p>
						<p class="font-semibold"><?= $_SESSION['user']['nama'] ?></p>
					</div>

					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Program Studi</p>
						<p class="font-semibold"><?= $_SESSION['user']['prodi'] ?></p>
					</div>

					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Total Poin</p>
						<p class="font-semibold"><?= $_SESSION['user']['total_poin'] ?></p>
					</div>
				</div>

				<div class="flex flex-col space-y-4">
					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Tanggal Lahir</p>
						<p class="font-semibold"><?= $_SESSION['user']['tanggal_lahir']->format('d-m-Y') ?></p>
					</div>

					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Tempat Lahir</p>
						<p class="font-semibold"><?= $_SESSION['user']['tempat_lahir'] ?></p>
					</div>

					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Agama</p>
						<p class="font-semibold"><?= $_SESSION['user']['agama'] ?></p>
					</div>

					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Jenis Kelamin</p>
						<p class="font-semibold"><?= $_SESSION['user']['jenis_kelamin'] ?></p>
					</div>
				</div>

				<div class="flex flex-col space-y-4">
					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">No Telepon</p>
						<p class="font-semibold"><?= $_SESSION['user']['no_telepon'] ?></p>
					</div>

					<div class="flex flex-col justify-start items-start pt-5">
						<p class="text-[#757575]">Email</p>
						<p class="font-semibold"><?= $_SESSION['user']['email'] ?></p>
					</div>
				</div>
			</div>
			<!-- btn ubah kt sandi -->
			<section class="justify-center pt-6">
				<a href="<?= BASEURL; ?>/Auth/ubahSandiForm">
					<button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#132145] rounded-lg w-auto">
						<img src="../../../public/img/Horizontal_switch.png" alt="logo" class="w-5 h-5">
						<p>Ubah Kata Sandi</p>
					</button>
				</a>
			</section>
		</div>
	</section>

	<!-- btn -->
	<section class="justify-center p-6">
		<a href="<?= BASEURL; ?>/Auth/logout">
			<button class="flex items-center space-x-2 py-2 px-6 text-white bg-[#FF3B30] rounded-lg w-auto">
				<img src="../../../public/img/Sign_out.png" alt="logo" class="w-5 h-5">
				<p>Keluar</p>
			</button>
		</a>
	</section>
</section>