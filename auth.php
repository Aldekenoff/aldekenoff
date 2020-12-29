<?php 
    session_start();
    $login="";
    $pass="";
    $errors = array(); 
    $_SESSION['success'] = "";
 
    // connect to database
    $db = mysqli_connect('localhost', 'root', '', 'users');
 
    // LOGIN USER
    if (isset($_POST['login'])) {
        $login = mysqli_real_escape_string($db, $_POST['login']);
        $pass = mysqli_real_escape_string($db, $_POST['pass']);
 
        if (empty($login)) {
            array_push($errors, "Введите логин");
        }
        if (empty($pass)) {
            array_push($errors, "Введите пароль");
        }
 
        if (count($errors) == 0) {
            $pass = md5($pass);
            $query = "SELECT * FROM users WHERE `login`='$login' AND pass='$pass'";
            $results = mysqli_query($db, $query);
 
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['login'] = $login;
                $_SESSION['success'] = "";
                header('Location: index.php');
            }else {
                array_push($errors, "Неверный логин или пароль");
            }
        }
    }
 
?>