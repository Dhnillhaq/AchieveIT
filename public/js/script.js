function submitForm() {
  document.getElementById("formFilter").submit();
}

function showPassword(){
  const pass = document.getElementById("password");
  if (pass.type === "password") {
    pass.type = "text";
  } else {
    pass.type = "password";
  }
}