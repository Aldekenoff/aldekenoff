<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" href="lk_style.css">
        <title> GarageBand | My account</title>
    </head>
    <body>
        <main>
            <div  class="title">
                <h1>Ваш личный кабинет</h1>
                <h3>Приветсвуем вас в личном кабинете GarageBand!</h3>
            </div>
            <section class="main-settings">
                <div class="set-box">
                <p class="description">Здесь вы можете настроить свои персональные данные</p>
                <?php

                    try {
                        $db = new PDO('mysql:host=localhost;dbname=users', 'root', '');
                    } catch (PDOException $e) {
                        print "Ошибка подключпения к БД!: " . $e->getMessage();
                        die();
                    }
                    session_start();
                    if(isset($_POST[''])) {
                    
                    $user = $_SESSION['user'];
                    

                    $user_id = $db->query("SELECT * FROM users WHERE `name` = '$user'");
                    
                    

                        while($row = $user_id->fetch(PDO::FETCH_ASSOC)) {
                        $id =  $row['id'];
                        $login = $row['login'];
                        $name = $row['name'];
                        }   
                    }

                    ?>
                    <form action="change.php" method="POST">
                        <p>Приветсвуем <?php echo $_SESSION['login']; ?>!</p>
                        
                        <p>Ваш новый логин: <?php @print_r ($login);?><br>
                        <input placeholder="Новый логин" name="login_ch" id="login_ch"><br>

                        <p>Ваше новое имя: <?php @print_r($name);?><br>
                        <input placeholder="Новое имя" name="name_ch" id="name_ch"><br>
                        

                        <p>Ваш новый пароль: <?php @print_r ($pass);?><br>
                        <input placeholder="Новый пароль" name="pass_ch" id="pass_ch"><br>
                        
                        <br><button>Изменить!</button><br>

                        </form>
                        
                  
                    Чтобы перейти на главную нажмите <a href="index.php">здесь</a><br><br>
                    <p>Чтобы выйти из аккаунта нажмите <a href="delete.php">сюда</a><br>
<br>
                    <a href="calc.php"> Калькулятор</a>

<?php if (isset($_SESSION['username'])) : ?>
<p class="my-2"> <a href="index.html" style="" class="btn btn-logout btn-white nav-link waves-effect waves-light">Выйти</a> </p>


<?php endif ?>
                </div>
            </section>
        </main>
    </body>
</html>
