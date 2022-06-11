<?php
$one = $db->getOneById('product', $_GET['id']);
if (isset($_POST['submit'])){
    if ($_POST['title'] != "" && $_POST['longer'] != '' && $_POST['price'] != "" && $_POST['country'] != '' && $_POST['deep'] != "" && $_POST['height'] != "" && $_POST['weight'] != "" && $_POST['description'] != "" && $_FILES['img'] != "") {
        $path = '../img/items/';
        if (!isset($_POST['leader'])) {
            $_POST['leader'] = 0;
        }
        if (!isset($_POST['sale'])) {
            $_POST['sale'] = 0;
        }

        //Загрузка картинки
        $tmp_name = $_FILES['img']['tmp_name'];
        $name = $_FILES['img']['name'];
        if (!move_uploaded_file($tmp_name, $path . $name)) {
            $_SESSION['errors'] = "Заполните все поля";
            header("Location: add-product");
        } else {
            $_POST['img'] = $name;
        }

        //Загрузка картинки
        $data = [
            'title' => $_POST['title'],
            'longer' => $_POST['longer'],
            'price' => $_POST['price'],
            'sale' => $_POST['sale'],
            'leader' => $_POST['leader'],
            'country' => $_POST['country'],
            'deep' => $_POST['deep'],
            'height' => $_POST['height'],
            'weight' => $_POST['weight'],
            'description' => $_POST['description'],
            'img' => $_POST['img'],
            'id'=> $_GET['id']
        ];



        $db->update('product',$data, $_GET['id']);
        $_SESSION['add'] = "Товар &laquo;" . $_POST['title'] . "&raquo; обновлен";
        $one = $db->getOneById('product', $_GET['id']);
//       header("Location: add-product");

    } else {
        $_SESSION['errors'] = "Заполните все поля";



    }

}
?>

<header>
    <div class="container">
        <div class="header__content">
            <?php if (isset($_SESSION['add'] )): ?>
                <div class="success"><?=$_SESSION['add'] ?></div>
                <?php unset($_SESSION['add'] ) ?>
            <?php endif;?>
            <?php if (isset($_SESSION['errors'] )): ?>
                <div class="errors"><?=$_SESSION['errors'] ?></div>
                <?php unset($_SESSION['errors'] ) ?>
            <?php endif;?>
            <form action="" method="post" enctype="multipart/form-data">
                <h1>Редактировать <?=$one['title']?></h1>
                <label for="">Название</label>
                <input type="text" name="title" value="<?=$one['title']?>">
                <label for="">Изображение</label>
                <input type="file" name="img" onchange="getImagePreview(event)">
                <label for="">Длина</label>
                <input type="number"  name="longer" value="<?=$one['longer']?>">
                <label for="">Цена</label>
                <input type="number" name="price" value="<?=$one['price']?>">
                <div class="sale-leader">
                    <input type="checkbox" name="sale" id="sale" >
                    <label for="sale">Скидка</label>
                    <input type="checkbox" name="leader" id="leader">
                    <label for="leader">Лидер продаж</label>
                </div>
                <div class="detail-box">
                    <div class="items">
                        <label for="">Страна производитель</label>
                        <input type="text" name="country" value="<?=$one['country']?>">
                    </div>
                    <div class="items">
                        <label for="">Глубина, мм</label>
                        <input type="number" name="deep" value="<?=$one['deep']?>">
                    </div>
                    <div class="items">
                        <label for="">Высота, мм</label>
                        <input type="number" name="height" value="<?=$one['height']?>">
                    </div>
                    <div class="items">
                        <label for="">Вес, кг:</label>
                        <input type="number" name="weight" value="<?=$one['weight']?>">
                    </div>
                </div>
                <label for="">Описание</label>
                <textarea name="description" id="" cols="" rows=""> <?=$one['description']?></textarea>
                <input type="submit" value="Изменить" name="submit">
                <div class="pre-img ">
                    <img src="../img/items/<?=$one['img']?>" alt="">
                </div>
            </form>
        </div>
    </div>
</header>