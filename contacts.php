<?php

$mysqli = new mysqli('localhost' , 'root' , '' , 'mtk');  // ( ‘хост’ , ‘имя пользователя’ , ‘пароль’  , ‘название базы данных’)

    if(mysqli_connect_errno()) {

    prinf("Соединение не установленно " , mysqli_connect_error());

    exit();

    }

    $mysqli->set_charset('utf8mb4');

    $mysqli -> close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>МТК АКСАЙ</title>

</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <div class="container">
                <div class="menu">
                    <div class="logo"><a href="index.php"><img src="/images/icons/icon.png" alt=""></a></div>

                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Меню
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="index.php">Главная</a></li>
                            <li><a class="dropdown-item" href="fruits.php">Каталог</a></li>
                            <li><a class="dropdown-item" href="about.php">О нас</a></li>
                            <li><a class="dropdown-item" href="contacts.php">Контакты</a></li>
                        </ul>
                    </div>

                    <ul class="links">
                        <li><a href="index.php">Главная</a></li>
                        <li><a href="fruits.php">Каталог</a></li>
                        <li><a href="about.php">О нас</a></li>
                        <li><a href="contacts.php">Контакты</a></li>
                    </ul>

                    <div class="basket">
                        <a href=""><img src="images/icons/basket.png" alt=""></a>
                    </div>

                    <div class="toggle_btn">
                        <i class="fa-solid fa-bars"></i>
                    </div>

                </div>
            </div>
        </nav>
    </header>

    <!-- Section contacts -->

    <section class="contacts">
        <div class="container">
            <div class="row">

                <div class="contacts_title"> <h1> Наши контакты</h1></div>
                <hr><br>

                <div class="contacts_feedback">
                    <div class="contacts_feedback_title">Здесь вы можете оставить свой отзыв о нашем сайте. Необходимо заполнить все
                        пустые поля.
                    </div>

                    <form class="decor" action = "post.php" method = "post">
                        <div class="form-left-decoration"></div>
                        <div class="form-right-decoration"></div>
                        <div class="circle"></div>
                        <div class="form-inner">
                            <h3>Оставить отзыв</h3>
                            <input type="text" name="name" required placeholder="Ваше имя">
                            <input type="email" name="email" required placeholder="Ваш Email">
                            <textarea placeholder="Отзыв" required name="feedback" rows="3"></textarea>
                            <input type="submit" value="Отправить">
                        </div>
                    </form>
                </div>

                    <div class="contacts_links_title"><h1>Обратная связь</h1></div>
                    <hr><br>    

                        <div class="contacts_links_item col-12 col-md-6">
                            <h2>Номер телефона: <a href="tel: +78008008080">+7 (800) 800-80-80</a></h2>
                        </div>

                        <div class="contacts_links_item col-12 col-md-6">
                            <h2>Наша почта: <a href="mailto: supportmtk@mail.ru">supportmtk@mail.ru </a></h2>
                        </div>

                        <div class="contacts_links_item col-12 col-md-6">
                            <h2>Мы в WhatsApp: <a href="https://wa.me/78008008080"><img src="/images/icons/whatsapp.png" alt=""> </a></h2>
                        </div>

                        <div class="contacts_links_item col-12 col-md-6">
                            <h2>Мы в Telegram: <a href="https://t.me/MTK"><img src="/images/icons/tg.png" alt=""> </a></h2>
                        </div>
                         
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>