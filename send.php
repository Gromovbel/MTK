<?php

    $fio = $_POST['fio'];
    $email = $_POST['email'];
    $time = $_POST['time'];

    $mysqli = new mysqli('localhost' , 'root' , '' , 'mtk');  // ( ‘хост’ , ‘имя пользователя’ , ‘пароль’  , ‘название базы данных’)

    if(mysqli_connect_errno()) {

    prinf("Соединение не установленно " , mysqli_connect_error());

    exit();

    }

    $mysqli ->set_charset('utf8mb4');

    if((isset($_POST['fio'])) && (isset($_POST['email'])) && (isset($_POST['time']))) {

        $nameFilter = htmlspecialchars($_POST['fio'], ENT_QUOTES, 'UTF-8');
        $nameFilter = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $nameFilter = htmlspecialchars($_POST['time'], ENT_QUOTES, 'UTF-8');

        $query = "INSERT INTO requests VALUES(null, '$fio', '$email' , '$time')";

        $mysqli->query($query);
        // mail('obellexa3@mail.ru', 'Заявка с сайта', "ФИО:".$fio.". E-mail: ".$email ,"From: supportmtk@mail.ru \r\n");
        mail('obellexa3@mail.ru', 'Заявка с сайта', 'Здравствуйте' ,'From: supportmtk@mail.ru \r\n');
    }

    $url = 'fruits.php';
    header("Location: ". $url ."");

    $mysqli -> close();

?>