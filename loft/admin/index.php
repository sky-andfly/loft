<?php
session_start();
require 'components/Query.php';
require 'components/function.php';

$db = new QueryBuilder();
$url = $_SERVER['REQUEST_URI'];
$_SESSION['page'] = getTitle($url);// получаем заголовки страниц

require 'template/header.php';




require getPage($url);//подключаем нужную страницу


require 'template/foote.php';