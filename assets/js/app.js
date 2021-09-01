function photoPreview() {
  let photoPre = document.getElementById("photoPre").files[0];
  let preImg = document.getElementById("preImg");
  const reader = new FileReader();
  reader.addEventListener("load", function () {
    preImg.src = reader.result;
  });
  if (photoPre) {
    reader.readAsDataURL(photoPre);
  }
}
