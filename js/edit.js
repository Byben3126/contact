const picture = document.querySelector("#picture");
const imgPicture = document.querySelector("#imgPicture");
const inputPicture = document.querySelector("#inputUrlPicture");

picture.addEventListener("click",()=>{
    let url = prompt("Veuillez indiquer une URL:", "Url de l'image");
    inputPicture.value = url
    imgPicture.setAttribute("src", url)
})