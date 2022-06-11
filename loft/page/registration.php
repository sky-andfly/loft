<div class="reg">
    <div class="container">
        <div class="reg__content">
            <h1>Оформить заказ</h1>
            <div class="form">
                <label for="">Ваше имя:</label>
                <input type="text">
                <label for="">Номер телефона:</label>
                <input type="text">
                <label for="">Метод доставки:</label>
                <select onchange="getDelivery(event)">
                    <option value="1">Курьер</option>
                    <option value="2">Самовывоз</option>
                </select>
                <div class="text"></div>
                <label for="">Оставьте комментарий (не обязательно): </label>
                <textarea></textarea>
                <button>Подтвердить</button>
            </div>
        </div>
    </div>
</div>
<div class="success hide">
    <img src="img/fslint_103932.png" alt="">
    <h1>Ваш заказ принят</h1>
    <h2>Благодарим Вас за покупку</h2>
</div>
<script>
    let btn = document.querySelector(".reg button");
    let success = document.querySelector(".success");
    btn.onclick = function (){
        localStorage.clear();
        success.classList.remove('hide');
        success.classList.remove('hide');
        setTimeout( 'location="/";', 3000 );
    };
    function getDelivery(event) {
        let text = document.querySelector(".text");
        let area = document.createElement('textarea');
        let select = document.querySelector("select").value;
        let lab = document.createElement('label');
        lab.innerHTML = "Введите адрес доставки: ";
        if (select == 1) {
            text.appendChild(lab);
            text.appendChild(area);
        } else {
            text.innerHTML = '';
        }
    }
    getDelivery(event);

</script>