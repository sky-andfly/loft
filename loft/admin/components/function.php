<?php
function getTitle($url){
    if ($url == '/admin/add-product'){
        return 'Новый товар';
    }else if($url == '/admin/all-product'){
        return 'Список товаров';
    }else if(strstr($url,"?", true) == '/admin/edit'){
        return 'Редактировать';
    }else if($url == '/delivery'){
        return 'Доставка';
    }else if($url == '/warranty'){
        return 'Гарантии и возврат';
    }
    else if($url == '/cart'){
        return 'Корзина';
    }
    else{
        return 'Главная страница';
    }
}
function getPage($url){
    if ($url == '/admin/add-product'){
        return 'page/add.php';
    }else if($url == '/admin/all-product'){
        return 'page/all.php';
    }else if(strstr($url,"?", true) == '/admin/edit'){
        return 'page/edit.php';
    }else if(strstr($url,"?", true) == '/admin/delete'){
        return 'page/delete.php';
    }else if($url == '/warranty'){
        return 'page/warranty.php';
    }else if($url == '/cart'){
        return 'page/cart.php';
    }
    else{
        return 'page/main.php';
    }
}