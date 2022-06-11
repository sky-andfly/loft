<?php
function getTitle($url){
    if ($url == '/about'){
        return 'О компании';
    }else if($url == '/contact'){
        return 'Контакты';
    }else if($url == '/payment'){
        return 'Оплата';
    }else if($url == '/delivery'){
        return 'Доставка';
    }else if($url == '/warranty'){
        return 'Гарантии и возврат';
    }
    else if($url == '/cart'){
        return 'Корзина';
    }else if($url == '/registration'){
        return 'Оформить заказ';
    }else if(strstr($url,"?", true) == '/view'){
        return 'Подробная информация';
    }
    else{
        return 'Главная страница';
    }
}
function getPage($url){
    if ($url == '/about'){
        return 'page/about.php';
    }else if($url == '/contact'){
        return 'page/contact.php';
    }else if($url == '/payment'){
        return 'page/payment.php';
    }else if($url == '/delivery'){
        return 'page/delivery.php';
    }else if($url == '/warranty'){
        return 'page/warranty.php';
    }else if($url == '/cart'){
        return 'page/cart.php';
    }else if($url == '/registration'){
        return 'page/registration.php';
    }    else if(strstr($url,"?", true) == '/view'){
        return 'page/view.php';
    }
    else{
        return 'page/main.php';
    }
}
function getWordEndings($count){
    $num = $count%10;
    if ($num == 0){
        return $count . ' отзывов';
    } else if ($num == 1){
        return $count . ' отзыв';
    }else if ($num > 4 && $num < 10){
        return $count . ' отзывов';
    }else if ($num > 1 && $num < 5){
        return $count . ' отзыва';
    }
}