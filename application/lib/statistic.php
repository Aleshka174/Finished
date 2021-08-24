<?php
    $link=mysqli_connect("localhost", "root", "", "finished");
    $status = $_POST['status'];
    $startTime = $_POST['startDate'];
    $endTime = $_POST['endDate'];
    $login = $_POST['login'];

    if ($status == 'client') {
        $query = mysqli_query($link, "SELECT count(*) as clicks, sum(orders.prize) as sumPrize  FROM clicks JOIN orders ON orders.Id = clicks.orderId JOIN users ON users.Id = orders.creater_id WHERE login='".mysqli_real_escape_string($link,$login)."' AND times between '".mysqli_real_escape_string($link,$startTime)."' and '".mysqli_real_escape_string($link,$endTime)."' and status_click = '1'");
        $clicks = mysqli_fetch_array($query);
        echo "Количество переходов - " . $clicks['clicks'] . "<br>". "Сумма расходов - " . $clicks['sumPrize']. " рублей! <br>";
    }else if($status == 'web-dev') {
        $query = mysqli_query($link, "SELECT count(*) as clicks, sum(orders.prize) as sumPrize  FROM clicks JOIN orders ON orders.Id = clicks.orderId JOIN users ON users.Id = clicks.user_id WHERE login='".mysqli_real_escape_string($link,$login)."' AND times between '".mysqli_real_escape_string($link,$startTime)."' and '".mysqli_real_escape_string($link,$endTime)."' and status_click = '1'");
        $clicks = mysqli_fetch_array($query);
        $prizeOrders = $clicks['sumPrize'] * 0.8;
        echo "Количество переходов - " . $clicks['clicks'] . "<br>". "Сумма доходов - " . $prizeOrders . " рублей! <br>";
    }else if($status == 'admin'){
        $queryOrder = mysqli_query($link, "SELECT count(*) as orders FROM user_order WHERE times_order between '".mysqli_real_escape_string($link,$startTime)."' and '".mysqli_real_escape_string($link,$endTime)."'");
        $queryClickTrue = mysqli_query($link, "SELECT count(*) as clicksTrue, sum(orders.prize) as sumPrize  FROM clicks JOIN orders ON orders.Id = clicks.orderId WHERE times between '".mysqli_real_escape_string($link,$startTime)."' and '".mysqli_real_escape_string($link,$endTime)."' and status_click = '1'");
        $queryClickFalse = mysqli_query($link, "SELECT count(*) as clicksFalse  FROM clicks WHERE times between '".mysqli_real_escape_string($link,$startTime)."' and '".mysqli_real_escape_string($link,$endTime)."' and status_click = '0'");
        $userOrder = mysqli_fetch_array($queryOrder);
        $clickTrue = mysqli_fetch_array($queryClickTrue);
        $clickFalse = mysqli_fetch_array($queryClickFalse);
        $prizeOrders = $clickTrue['sumPrize'] * 0.2;
        echo "Количество удачных переходов - " . $clickTrue['clicksTrue'] . "<br> Количество неудачных переходов - " . $clickFalse['clicksFalse'] . "<br> Количество выданных ссылок - " . $userOrder['orders'] . "<br> Система заработала - " . $prizeOrders . " рублей! <br>";
    }
?>
