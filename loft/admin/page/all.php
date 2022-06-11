<?php
$products = $db->getAll('product');

?>
<div class="all">

        <div class="all-content">
            <h1>Список товаров</h1>
            <div class="product-box">
                <table>
                    <tr class="table head">
                        <td>Код</td>
                        <td>Название</td>
                        <td>Картинка</td>
                        <td>Цена</td>
                        <td>Длина</td>
                        <td>Скида</td>
                        <td>Лидер продаж</td>
                        <td>Производитель</td>
                        <td>Глубина</td>
                        <td>Высота</td>
                        <td>Вес</td>
                        <td>Описание</td>
                        <td>Функции</td>
                    </tr>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?=$product['id'];?></td>
                            <td><?=$product['title'];?></td>
                            <td>
                                <img src="../img/items/<?=$product['img'];?>" alt="">
                            </td>
                            <td><?=$product['price'];?></td>
                            <td><?=$product['longer'];?></td>
                            <td><?=$product['sale'];?></td>
                            <td><?=$product['leader'];?></td>
                            <td><?=$product['country'];?></td>
                            <td><?=$product['deep'];?></td>
                            <td><?=$product['height'];?></td>
                            <td><?=$product['weight'];?></td>
                            <td>
                                <?=mb_substr($product['description'], 0, 150, 'utf-8');?>
                                <button class="read-next">Читать далее...</button>
                            </td>
                            <td>
                                <a href="edit?id=<?=$product['id'];?>">[редактировать]</a>
                                <a href="delete?id=<?=$product['id'];?>">[удалить]</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

</div>
