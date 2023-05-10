<?php

    $name_variable = $_POST['name'];
    $email_variable = $_POST['email'];
    $feedback_variable = $_POST['feedback'];

    $mysqli = new mysqli('localhost' , 'root' , '' , 'mtk');  // ( ‘хост’ , ‘имя пользователя’ , ‘пароль’  , ‘название базы данных’)

    if(mysqli_connect_errno()) {

    prinf("Соединение не установленно " , mysqli_connect_error());

    exit();

    }

    $mysqli ->set_charset('utf8mb4');

    if((isset($_POST['name'])) && (isset($_POST['email'])) && (isset($_POST['feedback']))) {

        $nameFilter = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $nameFilter = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $nameFilter = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');

        $query = "INSERT INTO feedbacks VALUES(null, '$name_variable', '$email_variable' , '$feedback_variable')";

        $mysqli->query($query);
    }

    $url = 'contacts.php';
    header("Location: ". $url ."");

    $mysqli -> close();

?>