function getImagePreview(event){
    let image = URL.createObjectURL(event.target.files[0]);
    let imagediv = document.querySelector('.pre-img');
    let newimage = document.createElement('img');
    imagediv.innerHTML = '';
    imagediv.classList.remove("hidden");
    newimage.src = image;
    imagediv.appendChild(newimage);
}