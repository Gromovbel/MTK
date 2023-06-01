<?php

    $mysqli = new mysqli('localhost' , 'root' , '' , 'mtk');  // ( ‘хост’ , ‘имя пользователя’ , ‘пароль’  , ‘название базы данных’)

    if(mysqli_connect_errno()) {

    prinf("Соединение не установленно " , mysqli_connect_error());

    exit();

    }

    session_start();

        //проверяем, авторизован ли пользователь
    if (!isset($_SESSION['user_id'])) {
        //если нет, перенаправляем на страницу авторизации
        header("Location: login.php");
        exit();
    }
  

    $mysqli ->set_charset('utf8mb4');

    $query1 = $mysqli -> query('SELECT * FROM fruits');
    $query2 = $mysqli -> query('SELECT * FROM vegetables');
    $query3 = $mysqli -> query('SELECT * FROM meat');
    $query4 = $mysqli -> query('SELECT * FROM subproducts');

    //Фрукты

    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $img = $_POST['img'];
        
        $query = "INSERT INTO fruits VALUES(null, '$name', '$price' , '$img')";
        $mysqli->query($query);
        header("Location: admin.php");
      }

      if(isset($_POST['edit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $img = $_POST['img'];

        $query ="UPDATE fruits SET name = '$name' , price = '$price', img = '$img' WHERE id = '$id'";
        $mysqli->query($query);
        header("Location: admin.php");
      }

      if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        
        $query = "DELETE FROM fruits WHERE id = '$id'";
        $mysqli->query($query);
        header("Location: admin.php");
      }

    //Овощи

    if (isset($_POST['add2'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $img = $_POST['img'];
        
        $query = "INSERT INTO vegetables VALUES(null, '$name', '$price' , '$img')";
        $mysqli->query($query);
        header("Location: admin.php");
      }

      if(isset($_POST['edit2'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $img = $_POST['img'];

        $query ="UPDATE vegetables SET name = '$name' , price = '$price', img = '$img' WHERE id = '$id'";
        $mysqli->query($query);
        header("Location: admin.php");
      }

      if (isset($_POST['delete2'])) {
        $id = $_POST['id'];
        
        $query = "DELETE FROM vegetables WHERE id = '$id'";
        $mysqli->query($query);
        header("Location: admin.php");
      }

      //Мясо

      if (isset($_POST['add3'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $img = $_POST['img'];
        $type_meat = $_POST['type_meat'];
        
        $query = "INSERT INTO meat VALUES(null, '$name', '$price' , '$img', '$type_meat')";
        $mysqli->query($query);
        header("Location: admin.php");
      }

      if(isset($_POST['edit3'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $img = $_POST['img'];
        $type_meat = $_POST['type_meat'];

        $query ="UPDATE meat SET name = '$name' , price = '$price', img = '$img' , type_meat = '$type_meat' WHERE id = '$id'";
        $mysqli->query($query);
        header("Location: admin.php");
      }

      if (isset($_POST['delete3'])) {
        $id = $_POST['id'];
        
        $query = "DELETE FROM meat WHERE id = '$id'";
        $mysqli->query($query);
        header("Location: admin.php");
      }

      //Субпродукты

      if (isset($_POST['add4'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $img = $_POST['img'];
        $type_meat = $_POST['type_meat'];
        
        $query = "INSERT INTO subproducts VALUES(null, '$name', '$price' , '$img', '$type_meat')";
        $mysqli->query($query);
        header("Location: admin.php");
      }

      if(isset($_POST['edit4'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $img = $_POST['img'];
        $type_meat = $_POST['type_meat'];

        $query ="UPDATE subproducts SET name = '$name' , price = '$price', img = '$img' , type_meat = '$type_meat' WHERE id = '$id'";
        $mysqli->query($query);
        header("Location: admin.php");
      }

      if (isset($_POST['delete4'])) {
        $id = $_POST['id'];
        
        $query = "DELETE FROM subproducts WHERE id = '$id'";
        $mysqli->query($query);
        header("Location: admin.php");
      }
      

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
    <link rel=”icon” href=”/favicon.ico” type=”image/x-icon”>
    <title>МТК АКСАЙ</title>

</head>
<body>
    <!-- Header -->
    <header>
        <nav style = "display:flex; justify-content:center; align-items:center;" class="admin_nav">
            <h1>Меню администратора</h1>

            <form action="close_admin.php" method="POST">
                <input type="submit" name="closeAdmin" value="Выход">
            </form>
        </nav>

    </header>

    <!-- Section advantages -->

    <section class="admin_menu">
        <div class="container">
            <div class="row">

            <!-- Фрукты -->

            <div class="admin_table_title">
                <h2>Фрукты</h2><hr>
            </div>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Картинка</th>
                    <th>Действия</th>
                </tr>
    
            <?php while ($row = mysqli_fetch_assoc($query1)): ?>
                <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['img']; ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="text" name="name" value="<?php echo $row['name']; ?>">
                        <input type="text" name="price" value="<?php echo $row['price']; ?>">
                        <input type="text" name="img" value="<?php echo $row['img']; ?>">
                        <input type="submit" name="edit" value="Редактировать">
                        <input type="submit" name="delete" value="Удалить">
                    </form>
                </td>
                </tr>
            <?php endwhile; ?>
            </table>

            <form method="POST" class="form_add">
                <input type="text" name="name" placeholder="Название">
                <input type="text" name="price" placeholder="Цена">
                <input type="text" name="img" placeholder="Ссылка на картинку">
                <input type="submit" name="add" value="Добавить">
            </form>

            <!-- Овощи -->

            <div class="admin_table_title">
                <h2>Овощи</h2><hr>
            </div>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Картинка</th>
                    <th>Действия</th>
                </tr>
    
            <?php while ($row = mysqli_fetch_assoc($query2)): ?>
                <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['img']; ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="text" name="name" value="<?php echo $row['name']; ?>">
                        <input type="text" name="price" value="<?php echo $row['price']; ?>">
                        <input type="text" name="img" value="<?php echo $row['img']; ?>">
                        <input type="submit" name="edit2" value="Редактировать">
                        <input type="submit" name="delete2" value="Удалить">
                    </form>
                </td>
                </tr>
            <?php endwhile; ?>
            </table>

            <form method="POST" class="form_add">
                <input type="text" name="name" placeholder="Название">
                <input type="text" name="price" placeholder="Цена">
                <input type="text" name="img" placeholder="Ссылка на картинку">
                <input type="submit" name="add2" value="Добавить">
            </form>

            <!-- Мясо -->

            <div class="admin_table_title">
                <h2>Мясо</h2><hr>
            </div>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Картинка</th>
                    <th>Действия</th>
                </tr>
    
            <?php while ($row = mysqli_fetch_assoc($query3)): ?>
                <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['img']; ?></td>
                <td><?php echo $row['type_meat']; ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="text" name="name" value="<?php echo $row['name']; ?>">
                        <input type="text" name="price" value="<?php echo $row['price']; ?>">
                        <input type="text" name="img" value="<?php echo $row['img']; ?>">
                        <input type="text" name="type_meat" value="<?php echo $row['type_meat']; ?>">
                        <input type="submit" name="edit3" value="Редактировать">
                        <input type="submit" name="delete3" value="Удалить">
                    </form>
                </td>
                </tr>
            <?php endwhile; ?>
            </table>

            <form method="POST" class="form_add">
                <input type="text" name="name" placeholder="Название">
                <input type="text" name="price" placeholder="Цена">
                <input type="text" name="img" placeholder="Ссылка на картинку">
                <input type="text" name="type_meat" placeholder="Вид мяса">
                <input type="submit" name="add3" value="Добавить">
            </form>

            <!-- Субпродукты -->

            <div class="admin_table_title">
                <h2>Субпродукты</h2><hr>
            </div>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Картинка</th>
                    <th>Действия</th>
                </tr>
    
            <?php while ($row = mysqli_fetch_assoc($query4)): ?>
                <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['img']; ?></td>
                <td><?php echo $row['type_meat']; ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="text" name="name" value="<?php echo $row['name']; ?>">
                        <input type="text" name="price" value="<?php echo $row['price']; ?>">
                        <input type="text" name="img" value="<?php echo $row['img']; ?>">
                        <input type="text" name="type_meat  " value="<?php echo $row['type_meat']; ?>">
                        <input type="submit" name="edit4" value="Редактировать">
                        <input type="submit" name="delete4" value="Удалить">
                    </form>
                </td>
                </tr>
            <?php endwhile; ?>
            </table>

            <form method="POST" class="form_add">
                <input type="text" name="name" placeholder="Название">
                <input type="text" name="price" placeholder="Цена">
                <input type="text" name="img" placeholder="Ссылка на картинку">
                <input type="text" name="type_meat" placeholder="Вид мяса">
                <input type="submit" name="add4" value="Добавить">
            </form>
                
            </div>
        </div>
    </section>

    <div class="go-top"><img src="/images/icons/go-top.png" alt=""></div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
</body>
</html>