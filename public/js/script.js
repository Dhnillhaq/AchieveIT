// Method / fungsi Submit Form Otomatis ketika ada event yang dipilih
function submitForm() {
  document.getElementById("formFilter").submit();
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


// Method / fungsi validasi input sandi baru

function validasiSandi() {
  // Ambil elemen input
  const sandiBaru = document.getElementById("sandiBaru");
  const konfirmasiSandiBaru = document.getElementById("konfirmasiSandiBaru");

  // Ambil nilai input
  const sandiBaruValue = sandiBaru.value;
  const konfirmasiSandiBaruValue = konfirmasiSandiBaru.value;

  // Reset class error sebelumnya
  sandiBaru.classList.remove("error");
  konfirmasiSandiBaru.classList.remove("error");

  // Periksa apakah nilai input berbeda
  if (sandiBaruValue !== konfirmasiSandiBaruValue) {
    // Tambahkan class "error" ke input box
    sandiBaru.classList.add("error");
    konfirmasiSandiBaru.classList.add("error");
    return false; // Mencegah pengiriman form
  }

  // Jika sama, lanjutkan pengiriman
  return true;
}