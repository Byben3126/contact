const picture = document.querySelector("#picture");
const imgPicture = document.querySelector("#imgPicture");
const inputPicture = document.querySelector("#inputUrlPicture");

picture.addEventListener("click",()=>{
    let url = prompt("Veuillez indiquer une URL:", "");
    inputPicture.value = url
    console.log(inputPicture)
    imgPicture.setAttribute("src", url)
})