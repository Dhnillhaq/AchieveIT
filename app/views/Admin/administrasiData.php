<section class="sm:ml-64 bg-blue-50 min-h-screen">
	<!-- profil -->

	<?php require_once __DIR__ . '/../templates/profiles.php'; ?>

	<!-- adm data -->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Administrasi Data</p>
	</section>

	<section class="flex justify-start p-6 space-x-4 w-auto">
		<div class="flex flex-col space-y-4 w-1/3">
			<div class="flex flex-col w-full justify-center bg-white rounded-lg shadow-lg space-y-2 p-6">
				<img src="../../../public/img/Data-Dosen.png" alt="logo" class="w-32 mx-auto">
				<a href="<?= BASEURL; ?>/Dosen/index">
					<button
						class="text-white text-xl w-full py-2 font-semibold items-center justify-center bg-[#132145] rounded-lg">Data
						Dosen</button>
				</a>
			</div>

			<div class="flex flex-col w-full justify-center bg-white rounded-lg shadow-lg space-y-2 p-6">
				<img src="../../../public/img/pengaturan.png" alt="logo" class="w-32 mx-auto">
				<a href="<?= BASEURL; ?>/Admin/pengaturanPrestasi">
					<button
						class="text-white text-xl w-full py-2 font-semibold items-center justify-center bg-[#132145] rounded-lg">Pengaturan
						Prestasi</button>
				</a>
			</div>
		</div>
		<div class="flex flex-col space-y-4 w-1/3">
			<div class="flex flex-col w-full justify-center bg-white rounded-lg shadow-lg space-y-2 p-6">
				<img src="../../../public/img/data-mhs.png" alt="logo" class="w-32 mx-auto">
				<a href="<?= BASEURL; ?>/Mahasiswa/listMhs">
					<button
						class="text-white text-xl w-full py-2 font-semibold items-center justify-center bg-[#132145] rounded-lg">Data
						Mahasiswa</button>
				</a>
			</div>
			<div class="flex flex-col w-full justify-center bg-white rounded-lg shadow-lg space-y-2 p-6">
				<img src="../../../public/img/validasi.png" alt="logo" class="w-32 mx-auto">
				<a href="<?= BASEURL; ?>">
					<button
						class="text-white text-xl w-full py-2 font-semibold items-center justify-center bg-[#132145] rounded-lg">Validasi
						Akun</button>
				</a>
			</div>
		</div>
		<div class="flex flex-col w-1/3">
			<?php
			if ($_SESSION['user']['role'] == "Super Admin") {
				?>

				<div class="flex flex-col w-full justify-center bg-white rounded-lg shadow-lg space-y-2 p-6">
					<img src="../../../public/img/data-Admin.png" alt="logo" class="w-32 mx-auto">
					<a href="<?= BASEURL; ?>/Admin/adminList">
						<button
							class="text-white text-xl w-full py-2 font-semibold items-center justify-center bg-[#132145] rounded-lg">Data
							Admin</button>
					</a>
				</div>
				<?php
			}
			?>
		</div>
		
	</section>

</section>