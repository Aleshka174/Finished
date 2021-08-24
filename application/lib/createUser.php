<?php
    $link=mysqli_connect("localhost", "root", "", "finished");
    if(isset($_POST['login'])){
        $err = [];
        // проверяем логин
        if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
        {
            $err[] = "Логин может состоять только из букв английского алфавита и цифр";
        } 
        if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
        {
            $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
        } 
        // проверяем, не существует ли пользователя с таким именем
        $query = mysqli_query($link, "SELECT id FROM users WHERE login='".mysqli_real_escape_string($link, $_POST['login'])."'");
        if(mysqli_num_rows($query) > 0)
        {
            $err[] = "Пользователь с таким логином уже существует в базе данных";
        } 
        // Если нет ошибок, то добавляем в БД нового пользователя
        if(count($err) == 0)
        {
            $login = $_POST['login'];
            // Убираем лишние пробелы и делаем двойное хэширование (используем старый метод md5)
            $password = md5(md5(trim($_POST['password']))); 
            $status = $_POST['status'];
            mysqli_query($link,"INSERT INTO users SET login='".$login."', password='".$password."', active = '1', Id_status= (SELECT Id FROM status_id WHERE status = '" . mysqli_real_escape_string($link, $status) . "')");
        }
        else
        {
            echo "<b>При регистрации произошли следующие ошибки:</b><br>";
            foreach($err AS $error)
            {
                echo $error."<br>";
            }
        }
    };
?>