<section class="sm:ml-64 bg-blue-50 min-h-screen">

	<?php require_once __DIR__ . '/../templates/profiles.php'; ?>

	<!-- Profil -->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Profil Ketua Jurusan</p>
	</section>

	<!-- informasi admin -->
	<section class="relative p-6">
		<!-- Static parent -->
		<div class="absolute ml-8 py-2 px-4 rounded-lg text-white bg-[#F99D1C]">
			Informasi Ketua Jurusan
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