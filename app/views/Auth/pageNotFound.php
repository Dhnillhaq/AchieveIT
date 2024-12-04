<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
		<style>
			@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
		</style>
	</head>
<body class="font-[poppins] bg-blue-50">
    <section class="flex flex-col items-center justify-center min-h-screen">
        <h1 class="font-extrabold text-7xl text-[#75757580]">404</h1>
        <img src="../../public/img/notFound.png" alt="Page Not Found" class="w-1/5 mx-auto" />
        <h2 class="font-extrabold text-2xl text-[#75757580]">Halaman tidak ditemukan...</h2>
        <a href="<?=BASEURL;?>/">
            <button class="bg-[#132145] text-white py-2 px-4 rounded-lg font-bold mt-8">
                Kembali Ke Homepage
            </button>
        </a>
    </section>
</body>
</html>