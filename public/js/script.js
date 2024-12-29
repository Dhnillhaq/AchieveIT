// Method / fungsi Submit Form Otomatis ketika ada event yang dipilih
function submitForm() {
  document.getElementById("formFilter").submit();
}

function toggleTbody(year) {
  // Dapatkan semua tbody di dalam tabel
  const tbodies = document.querySelectorAll('tbody');

  // Loop untuk menyembunyikan semua tbody
  tbodies.forEach(tbody => {
      tbody.classList.remove('visible'); // Sembunyikan tbody
      setTimeout(() => {
          tbody.style.display = "none"; // Hapus dari flow setelah transisi
      }, 100); // Waktu sinkron dengan durasi transisi
  });

  // Tampilkan tbody yang sesuai setelah delay
  const targetTbody = document.getElementById(`tbody-${year}`);
  setTimeout(() => {
      targetTbody.style.display = "table-row-group"; // Tampilkan dalam tabel
      targetTbody.classList.add('visible'); // Tambahkan animasi
  }, 100); // Delay untuk sinkronisasi
}


// Method / fungsi Tampilkan sandi input password
function showPassword(idInput) {
  const pass = document.getElementById(idInput);
  if (pass.type === "password") {
    pass.type = "text";
  } else {
    pass.type = "password";
  }
}


function validasiSandi() {
  const sandiBaru = document.getElementById("sandiBaru");
  const konfirmasiSandiBaru = document.getElementById("konfirmasiSandiBaru");
  
  let errorMessage = document.getElementById("errorMessage");

  const sandiBaruValue = sandiBaru.value;
  const konfirmasiSandiBaruValue = konfirmasiSandiBaru.value;

  sandiBaru.classList.remove("error");
  konfirmasiSandiBaru.classList.remove("error");
  errorMessage.textContent = "";

  // Periksa apakah nilai input berbeda
  if (sandiBaruValue !== konfirmasiSandiBaruValue) {
    
    sandiBaru.classList.add("error");
    konfirmasiSandiBaru.classList.add("error");
    errorMessage.textContent = "Kata sandi baru dan konfirmasi sandi tidak cocok.";
    return false; // Mencegah pengiriman form
  }

  // Jika validasi berhasil, hapus pesan error
  errorMessage.textContent = "";
  return true;
}
