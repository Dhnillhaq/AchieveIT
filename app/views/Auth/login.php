<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>AchieveIT Login</title>
	<link href="../../../public/css/output.css" rel="stylesheet" />
	<style>
		@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
	</style>
</head>

<body class="font-[poppins] flex relative bg-cover bg-center w-auto h-auto"
	style="background-image: url('../../../public/img/gedung-jti.png')">
	<div class="absolute inset-0 bg-[#132145D4] bg-opacity-82"></div>

	<!-- kembali -->
	<a href="<?= BASEURL; ?>"

		class="absolute top-4 left-4 flex items-center space-x-2 text-white px-4 py-2 rounded-lg hover:underline">
		<img src="../../../public/img/Sign_out_squre.png" alt="back" class="w-4 h-4" />
		<span class="font-light">Kembali</span>
	</a>

	<div class="relative z-10 flex">
		<!-- left side -->
		<section class="w-1/2 flex items-center justify-center px-10 text-white">
			<h1 class="text-6xl font-bold">

				Selamat datang di <span class="text-[#FEC01A]">AchieveIT!</span>

			</h1>
		</section>

		<!-- right side -->
		<section class="w-1/2 h-screen flex-col space-y-6 items-start justify-center p-10">
			<div class="flex justify-center items-start">
				<div class="bg-white rounded-3xl shadow-lg px-14 py-20 space-y-6 h-full w-full max-w-screen-xl m-">
					<!-- Logo -->
					<div class="flex justify-center items-start">
						<img src="../../../public/img/Logo_Polinema.png" alt="logo" class="w-auto h-32" />
						<img src="../../../public/img/Logo_JTI.png" alt="logo" class="w-auto h-32" />
					</div>
					<!-- Title -->
					<h1 class="text-4xl font-bold text-center mb-8">Masuk</h1>
					<!-- Form -->
					<form class="space-y-4">
						<div class="relative">
							<input type="text" id="Nama pengguna" placeholder="Nama Pengguna"
								class="w-full bg-[#D9D9D9] px-4 py-2 border rounded-lg" />
							<img src="../../../public/img/User.png" alt="logo"
								class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
						</div>

						<div class="relative">
							<input type="text" id="Kata sandi" placeholder="Kata sandi"
								class="w-full bg-[#D9D9D9] px-4 py-2 border rounded-lg" />
							<img src="../../../public/img/Lock.png" alt="logo"
								class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
						</div>
					</form>
					<!-- button -->
					<button type="submit" class="mt-4 w-full bg-blue-800 text-white py-2 rounded-lg hover:bg-blue-900">
						Masuk
					</button>
				</div>
			</div>
		</section>
	</div>
</body>

</html>