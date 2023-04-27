<?php

    $mysqli = new mysqli('localhost' , 'root' , '' , 'mtk');  // ( ‘хост’ , ‘имя пользователя’ , ‘пароль’  , ‘название базы данных’)

    if(mysqli_connect_errno()) {

    prinf("Соединение не установленно " , mysqli_connect_error());

    exit();

    }

    $mysqli ->set_charset('utf8mb4');

    $query = $mysqli -> query('SELECT * FROM fruits');

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
                    <div class="logo">MTK</div>
                    <ul class="links">
                        <li><a href="index.php">Главная</a></li>
                        <li><a href="fruits.php">Каталог</a></li>
                        <li><a href="about.php">О нас</a></li>
                        <li><a href="">Контакты</a></li>
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

    <!-- Catalog -->
    <section class="catalog">
        <div class="container">
            <div class="row">
                <div class="catalog_title">
                    <h2>Фрукты</h2>
                </div>
                <hr>
                    <div class="catalog_btn col-md-2 offset-md-2">
                        <a href="fruits.php">Фрукты</a>
                    </div>
                    <div class="catalog_btn col-md-2">
                        <a href="vegetables.php">Овощи</a>
                    </div>
                    <div class="catalog_btn col-md-2">
                        <a href="meat.php">Мясо</a>
                    </div>
                    <div class="catalog_btn col-md-2">
                        <a href="subproducts.php">Субпродукты</a>
                    </div>
                    <hr>

            <?php while ($row = mysqli_fetch_assoc($query)): ?>
                <div class="catalog_item col-md-4">
                    <div class="catalog_item_title"><?php echo $row['name'] ?></div>
                    <div class="catalog_item_price"><?php echo $row['price'] ?> рублей\кг</div>
                    <div class="catalog_item_img">
                        <img src="<?=$row['img']?>">
                    </div>
                    <div class="catalog_block">
                        <div class="counter col-md-2 offset-md-3" data-counter>
                            <div class="counter__button counter__button_minus">-</div>
                            <div class="counter__input"><input type="number" placeholder="0"></div>
                            <div class="counter__button counter__button_plus">+</div>
                        </div>
                            <div class="button col-md-4"><a href="#"><img src="/images/icons/basket.png" alt=""></a></div>
                        </div>  
            </div>
            <?php endwhile; ?>

            </div>
        </div>
    </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
</body>
</html>