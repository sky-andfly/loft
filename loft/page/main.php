<?php
$products = $db->getAll('product');
?>
<div class="banner">
    <div class="container">
        <div class="banner-content">
            <img src="img/banner.jpg" alt="">
        </div>
    </div>
</div>
<div class="product">
    <div class="container">
        <div class="product-content">
            <h1>Лидеры продаж</h1>
            <div class="search-form">
                <input id="search" type="text" placeholder="Поиск...">

            </div>
            <div class="card-box">
                <?php foreach ($products as $product): ?>
                    <div class="card">
                        <img src="img/items/<?=$product['img']?>" alt="">
                        <a href="view?id=<?=$product['id']?>" class="link">
                            <?=$product['title']?>
                        </a>
                        <?php
                            $feeds = $db->getAllById('feed', $product['id']);
                            $count = 0;
                            foreach ($feeds as $feed){
                                $count++;
                            }
                        ?>
                        <a href="view?id=<?=$product['id']?>" class="feedback"><?=getWordEndings($count);?> </a>
                        <h2><?=$product['price']?> р.</h2>
                        <?php if($product['sale'] != 0): ?>
                            <span class="sale">Скидка</span>
                        <?php endif; ?>
                        <?php if($product['leader'] != 0): ?>
                            <span class="leader">Лидер продаж</span>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>