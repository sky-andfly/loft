

document.querySelector("#search").oninput = function (){
    let val = this.value.trim();
    let cards = document.querySelectorAll(".card .link");
    if (val != ''){
        cards.forEach(function (elem){
            if (elem.innerText.search(val) == -1){
                elem.parentNode.classList.add('hide');
            }else{
                elem.parentNode.classList.remove('hide');
            }
        });
    }else{
        cards.forEach(function (elem){
            elem.parentNode.classList.remove('hide');
        });
    }
}
