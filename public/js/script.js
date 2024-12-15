// Method / fungsi Submit Form Otomatis ketika ada event yang dipilih
function submitForm() {
  document.getElementById("formFilter").submit();
}

function toggleTbody() {
  const tbody = document.getElementById('myTbody');
   if (tbody.classList.contains('hidden')) {
      tbody.classList.remove('hidden');
      tbody.classList.add('visible');
  } else {
      tbody.classList.remove('visible');
      tbody.classList.add('hidden');
  }
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
