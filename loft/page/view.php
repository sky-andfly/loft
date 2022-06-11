<?php
$product = $db->getOneById('product', $_GET['id']);
$limit = $db->getAllLimit('product', $_GET['id'], 3);
if (isset($_SESSION['old'])){
    $old = $db->getOneById('product', $_SESSION['old']);
}
$feeds = $db->getAllById('feed', $_GET['id']);

if (isset($_POST['submit'])){

    $data=[
        'text' => $_POST['text'],
        'message' => $_POST['message'],
        'product_id' => $_GET['id'],
        'date' => date("m.d.y"),
    ];
    $db->create('feed', $data);
    header("Location: view?id=".$_GET['id']);
}

?>
<section>
    <div class="container">
        <div class="section__content">
            <div class="section__top">
                <div class="section__left">
                    <div class="left__top">
                        <div class="left">
                            <img src="img/items/<?=$product['img'];?>" alt="">
                        </div>
                        <div class="right">
                            <h1><?=$product['title'];?></h1>
                            <h2>Код товара: <span><?=$product['id'];?></span></h2>
                            <p class="price"><?=$product['price'];?> р.</p>
                            <button class="cart-btn" data-id="<?=$product['id'];?>">Купить</button>
                        </div>
                    </div>
                    <h1 class="charaster">Характеристики <?=$product['title'];?></h1>
                    <table>
                        <tr>
                            <td>Страна производитель</td>
                            <td><?=$product['country'];?></td>
                        </tr>
                        <tr>
                            <td>Длина, мм</td>
                            <td><?=$product['longer'];?></td>
                        </tr>
                        <tr>
                            <td>Глубина, мм</td>
                            <td><?=$product['deep'];?></td>
                        </tr>
                        <tr>
                            <td>Высота, мм</td>
                            <td><?=$product['height'];?></td>
                        </tr>
                        <tr>
                            <td>Вес, кг</td>
                            <td><?=$product['weight'];?></td>
                        </tr>
                    </table>
                </div>
                <div class="section__right">
                    <h3>Сопутствующие товары:</h3>
                    <?php foreach($limit as $l):?>
                        <div class="item">
                            <img src="img/items/<?=$l['img']?>" alt="">
                            <a href="view?id=<?=$l['id']?>"><?=$l['title']?></a>
                            <h2><?=$l['price']?> р.</h2>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>

            <h1 class="charaster">Описание <?=$product['title'];?></h1>
            <p class="desc">
                <?=$product['description'];?>
            </p>

        </div>
    </div>

</section>
<?php if (isset($_SESSION['old']) && $_SESSION['old'] != $_GET['id']): ?>
    <div class="old">
        <div class="container">
            <div class="old__content">
                <h1>ВЫ НЕДАВНО СМОТРЕЛИ</h1>
                <div class="box">
                    <img src="img/items/<?=$old['img']?>" alt="">
                    <div class="old__right">
                        <a href="view?id=<?=$old['id']?>"><?=$old['title']?></a>
                        <h2><?=$old['price']?> р.</h2>
                        <p><?=$old['description']?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="feed">
    <div class="container">
        <div class="feed__content">
            <form action="" method="post">
                <h1>Оставьте Ваш отзыв о <?=$product['title']?></h1>
                <label for="">Ваше имя: <span>*</span></label>
                <input type="text"  name="text">
                <label for="">Ваше сообщение: <span>*</span></label>
                <textarea name="message" ></textarea>
                <input id="sub" type="submit" value="Отправить" name="submit">
            </form>
            <hr>
            <div class="feeds">
                <?php foreach ($feeds as $post):?>
                    <div class="post">
                        <div class="post__top">
                            <h2><?=$post['text']?></h2>
                            <p><?=$post['date'];?></p>
                        </div>

                        <h3><?=$post['message']?></h3>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
<script>
    let btn = document.querySelector(".cart-btn");
    btn.onclick = function (){
        let img = "<?=$product['img'];?>";
        let id = btn.dataset.id + 'product-item';



        let data = {
            id : id,
            img : img,
            title : "<?=$product['title']?>",
            price : "<?=$product['price']?>",
        };
        localStorage.setItem(id, JSON.stringify(data));
        document.querySelector('.cart-counter').innerHTML = localStorage.length;
    };
</script>
<?php $_SESSION['old']= $_GET['id'] ?>
<!--<script>-->
<!--    $(document).ready(function(){-->
<!---->
<!--        $('#sub').click(function(){-->
<!--            $.ajax({-->
<!--                type: "POST",-->
<!--                url: "",-->
<!--                data: "idcat="+$("#idcat").val(),-->
<!--                success: function(html){-->
<!--                    $("#content").html(html);-->
<!--                }-->
<!--            });-->
<!--            return false;-->
<!--        });-->
<!---->
<!--    });-->
<!--</script>-->
