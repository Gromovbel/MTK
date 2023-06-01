
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel=”icon” href=”/favicon.ico” type=”image/x-icon”>
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
                    <button class="cart" id="cart">
                        <img class="cart_image" src="/images/icons/basket.png" alt="Cart" />
                        <div class="cart_num" id="cart_num">0</div>
                    </button>
                    <div class="toggle_btn">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    
    <!-- Корзина -->

    <div class="basket">
        <div class="basket_container">
            <div class="basket_title">Корзина</div><hr>
            <div class="basket_column_names">
                <div class="basket_column_names_wrap">
                    <div class="basket_column_img basket_column">Картинка</div>
                    <div class="basket_column_name basket_column">Название</div>
                    <div class="basket_column_quantity basket_column">Количество</div>
                    <div class="basket_column_quantity_2 basket_column">Кол-во</div>
                </div>

                <div class="basket_column_names_wrap">
                    <div class="basket_column_price basket_column">Стоимость</div>
                    <div class="basket_column_delete basket_column"></div>
                </div>

            </div>
            <div class="basket_block" style="max-height: 600px; overflow-y: scroll;">
                <div class="basket_item">
                    <div class="basket_wrap">
                        <div class="basket_item_img basket_item_column">
                            <img src="apples.png" alt="">
                        </div>
    
                        <div class="basket_item_name basket_item_column">
                            Яблоко
                        </div>
                    </div>

                    <div class="basket_wrap">
                        <div class="basket_item_price basket_item_column">
                            100
                        </div>

                        <div class="basket_item_quantity basket_item_column">
                            1
                        </div>
    
                        <button class="basket_item_delete basket_item_column">
                            &#10006;
                        </button>
                    </div>
                </div>
            </div><hr>

            <div class="basket_wrap_checkout">
                <div class="basket_block basket_end_price">Итого :<output class="end_price"></output></div>
                <button class="basket_checkout">Оформить заказ</button>
            </div>

            <div class="basket_close"><button class="basket_close_btn">X</button></div>

                <!-- Форма оформления заказа -->

            <form class="decor decor_request" action = "send.php" method = "post" style="display:none;">
                <div class="form-left-decoration"></div>
                <div class="form-right-decoration"></div>
                <div class="circle"></div>
                <div class="form-inner">
                    <h3>Заполните поля</h3>
                    <input type="text" name="fio" required placeholder="Ваше ФИО">
                    <input type="email" name="email" required placeholder="Ваш Email">
                    <textarea required placeholder="В какое время вам позвонить?" name="time" rows="2"></textarea>
                    <input class="basket_input" type="submit" value="Отправить">
                    <button class="close_form">Вернуться к заказу</button>
                </div>
            </form>

        </div>
    </div>

    <div class="agree_block">
        <div class="agree_container">
            <div class="agree_title">Согласие на обработку персональных данных</div><hr>
            <div id="some_id">
                <?php echo file_get_contents('agree.txt') ?>
            </div>
            <hr>
            <div class="agree_buttons">
                <button class="agree_btn agree_true">Согласен</button>
                <button class="agree_btn agree_false">Не согласен</button>
            </div>
            <div class="agree_close"><button class="agree_close_btn">X</button></div>
        </div>
    </div>

    <!-- Section promo -->

    <section class="promo">
        <div class="container">
            <div class="row">
                <div class="promo_ad">
                    <div class="promo_ad_text">
                        Овощи, фрукты, мясо и субпродукты в Аксае.
                    </div>
                    <div class="promo_ad_btn">
                        <a href="fruits.php">Перейти в каталог</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section advantages -->

    <section class="advantages">
        <div class="container">
            <div class="row">
                <div class="advantages_info">
                    <div class="advantages_info_title">Наши преимущества</div>
                    </div>
                    <hr>

                            <div class="advantages_item col-md-6">
                                <div class="advantages_item_title">Удобство покупки</div>
                                <div class="advantages_item_text"> Пользователи могут сделать заказ, не выходя из дома, 
                                    что экономит время и силы</div>
                            </div>

                            <div class="advantages_item col-md-6">
                                <div class="advantages_item_title">Круглосуточная доступность</div>
                                <div class="advantages_item_text"> Cайт работает 24/7, что позволяет клиентам заказывать товары в любое удобное для них время</div>
                            </div>

                            <div class="advantages_item col-md-6">
                                <div class="advantages_item_title">Широкий ассортимент продуктов</div>
                                <div class="advantages_item_text">  На сайте большое количество товаров, что дает клиентам широкий выбор продукции</div>
                            </div>

                            <div class="advantages_item col-md-6">
                                <div class="advantages_item_title">Быстрое оформление заказа</div>
                                <div class="advantages_item_text">  Сайт может предоставить возможность формирования быстрого заказа без необходимости регистрации пользователя</div>
                            </div>

                            <div class="advantages_item col-md-6">
                                <div class="advantages_item_title">Долгое время работы компании</div>
                                <div class="advantages_item_text"> Компания зарегистрирована 9 лет назад, что говорит о стабильной деятельности и поднадзорности государственным органам</div>
                            </div>

                            <div class="advantages_item col-md-6">
                                <div class="advantages_item_title">Участник системы госзакупок — поставщик</div>
                                <div class="advantages_item_text"> Компания поставила товаров или оказала услуг на сумму более 7,5 млн руб</div>
                            </div>

                    <div class="advantages_info_btn">
                            <a href="about.php">Подробнее</a>
                    </div>
                
            </div>
        </div>
    </section>

    <div class="go-top"><img src="/images/icons/go-top.png" alt=""></div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
</body>
</html>