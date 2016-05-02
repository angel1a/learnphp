<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = empty($_POST['username']) ? '' : $_POST['username'];
        $password = empty($_POST['password']) ? '' : $_POST['password'];
        if ($username == 'accn' && $password == 'accn') {
            session_start();
            $_SESSION['username'] = $username;
            header('Location: todo.php');
        } else {
            $errorMessage = "用户名或密码错误！";
            header('Location: index.php');
        }
    }
?>
