<div class="cart">
    <div class="container">
        <div class="cart-content">


                <script>
                    if (localStorage.length == 0){
                        document.write("<h1 class='empty'>Ваша корзина пока пуста</h1>")
                    }else{
                        document.write("<table>");
                        document.write("<thead>");
                        document.write("<td>Товар</td>");
                        document.write("<td>Описание</td>");
                        document.write("<td>Цена за ед.</td>");
                        document.write("<td>Количество</td>");
                        document.write("<td>Сумма</td>");
                        document.write("<td>Удалить</td>");
                        document.write("</thead>");
                        for (let i = 0; i< localStorage.length; i++){
                            if(localStorage.key(i).includes('product-item')){
                                let row = localStorage.key(i);
                                let product =JSON.parse(localStorage.getItem(row));
                                document.write('<tr>');
                                document.write('<td>');
                                document.write("<img src='img/items/"+ product.img +"' alt=''>");
                                document.write('</td>');
                                document.write("<td>"+ product.title +"</td>");
                                document.write("<td><span class='price-td'>"+ product.price +"</span> ₽</td>");
                                document.write("<td class='td-buttons'>");
                                document.write("<span class='count-td'>1</span>");
                                document.write("<button class='minus-btn'>-</button>");
                                document.write("<button class='plus-btn'>+</button>");
                                document.write('</td>');
                                document.write("<td><span class='sum-td'>"+ product.price +"</span> ₽</td>");
                                document.write('<td>');
                                document.write("<a href='' data-id='"+ product.id +"' class='delete'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-x' viewBox='0 0 16 16'> <path d='M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z'/> <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/> </svg></a>");
                                document.write('</td>');
                                document.write('</tr>');
                            }
                        }
                        document.write("</table>");
                    }
                </script>

            <div class="cart__price">
                <h2>Всего:</h2>
                <h1><span class="our-sum"></span> ₽</h1>
            </div>
            <div class="cart__nav">
                <a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                    Вернуться к покупкам
                </a>
                <a href="registration">
                    Оформить заказ
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    let del = document.querySelectorAll(".delete");
    for (let i = 0; i < del.length; i++){
        del[i].onclick = function (){
            localStorage.removeItem(del[i].dataset.id)
        };
    }
    let plus = document.querySelectorAll(".plus-btn");
    for (let i = 0; i < plus.length; i++){
        plus[i].onclick = function (){
            let parrent = this.parentNode.parentNode;
            let count = parrent.querySelector(".count-td");
            let c = Number(count.textContent);

            c += 1;
            count.innerHTML = c;
            // подсчет суммы
            let price = Number(parrent.querySelector(".price-td").textContent);

            let sum_box = parrent.querySelector(".sum-td");
            let sum = Number(sum_box.textContent);
            sum_box.innerHTML = price + sum;
            getAllSum();
        };
    }
    let minus = document.querySelectorAll(".minus-btn");
    for (let i = 0; i < plus.length; i++){
        minus[i].onclick = function (){
            let parrent = this.parentNode.parentNode;
            let count = parrent.querySelector(".count-td");
            let c = Number(count.textContent);
            if(c-1 != 0){
                c -= 1;
                count.innerHTML = c;
                // подсчет суммы
                let price = Number(parrent.querySelector(".price-td").textContent);

                let sum_box = parrent.querySelector(".sum-td");
                let sum = Number(sum_box.textContent);
                sum_box.innerHTML = sum - price;
                getAllSum();
            }


        };
    }
    function getAllSum(){
        let our = document.querySelector(".our-sum");
        let sum_box = document.querySelectorAll(".sum-td");
        let count = 0;
        for (let i = 0; i < sum_box.length; i++){
            count += Number(sum_box[i].textContent);
        }
        our.innerHTML = count;

    }
    getAllSum();

</script>