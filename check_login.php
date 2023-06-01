<?php


$mysqli = new mysqli('localhost' , 'root' , '' , 'mtk');  // ( ‘хост’ , ‘имя пользователя’ , ‘пароль’  , ‘название базы данных’)

if(mysqli_connect_errno()) {

prinf("Соединение не установленно " , mysqli_connect_error());

exit();

}

$mysqli ->set_charset('utf8mb4');

session_start();

if (isset($_POST['submit'])) {
    //получаем логин и пароль из формы
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT id FROM users WHERE login = '$login' AND password = '$password'";
    $result = $mysqli->query($query);

    if ($result-> num_rows > 0) {
        //создаем сессию для пользователя
        $_SESSION['user_id'] = $result->fetch_assoc()['id'];

        //перенаправляем пользователя на страницу с таблицей
        header("Location: admin.php");
        exit();
  } else {
    //если пользователь не найден, выводим ошибку
    echo "Неправильный логин или пароль";
  }
}

?>