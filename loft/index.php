<?php
    session_start();
    require 'components/function.php';
    require 'admin/components/Query.php';
    $db = new QueryBuilder();
    $url = $_SERVER['REQUEST_URI'];
    $_SESSION['page'] = getTitle($url);// получаем заголовки страниц




    require 'template/header.php';

    require getPage($url);//подключаем нужную страницу


    if ($url != '/cart' && $url != '/registration'){
        require 'template/footer.php';
    }
