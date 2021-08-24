<?php
if(isset($_POST['submit']))
{
    foreach($data as $row){
        // Сравниваем пароли
        if($row['password'] ==  md5(md5(($_POST['password']))) && $row['active'] == 1)
        {
            // Переадресовываем браузер на страницу проверки нашего скрипта
            $_SESSION['status'] = $row['status'];
            $_SESSION['login'] = $_POST['login'];
            header("Location: office"); exit();
        }
        else
        {
            print "Вы ввели неправильный логин/пароль или вас отключили";
        }
    }
}
?>
<div class="container"> 
    <h1>Авторизация пользователя</h1>
    <div class="card card-body">
        <form method="POST">
            <div class="row" style="padding: 20px 0px">
                <div class="col">
                    Логин <input name="login" type="text" required><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Пароль <input name="password" type="password" required><br> 
                </div>
            </div><br> 
            <div>
                <p>
                    <input name="submit" type="submit" value="Войти" class="btn btn-primary">
                </p>    
            </div>
        </form>
    </div>
</div>




