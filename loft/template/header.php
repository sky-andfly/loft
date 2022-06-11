<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$_SESSION['page'];?></title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
    <div class="container">
        <div class="header-content">
            <div class="link-box">
                <img src="img/user.png" alt="">
                <a href="admin/index.php">Войти</a>
            </div>
        </div>
    </div>
</div>
<div class="logo">
    <div class="container">
        <div class="logo-content">
            <img src="img/logo.jpg" alt="">

            <div class="basket-block">
                <a href="cart">
                    <img src="img/shopping.png" alt="">
                    <span class="cart-counter
">
                        <script>
                            document.write(localStorage.length);
                        </script>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="nav">
    <div class="container">
        <div class="nav-content">
            <a href="/" class="menu">Каталог мебели</a>
            <a href="about">О компании</a>
            <a href="contact">Контакты</a>
            <a href="payment">Оплата</a>
            <a href="delivery">Доставка</a>
            <a href="warranty">Гарантии и возрат</a>
        </div>
    </div>
</div>
