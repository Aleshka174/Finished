<?php  
include 'application/lib/log.php'; 
$data=mysqli_connect("localhost", "root", "", "finished");
$login = $_GET['login'];
$ordersNumber = $_GET['orders_number'];

if (!empty($login) && !empty($ordersNumber)) {
    $queryUsers = mysqli_query($data,"SELECT login FROM users WHERE login='".mysqli_real_escape_string($data,$login)."' AND active = '1' LIMIT 1");
    $queryOrders = mysqli_query($data,"SELECT user_order.Id as number, orders.URL as url FROM user_order JOIN orders ON orders.Id = user_order.orderId JOIN users ON users.Id = user_order.userId WHERE login='".mysqli_real_escape_string($data,$login)."' AND active_orders = '1' and active_user_order = '1'");
    $dataUsers = mysqli_fetch_array($queryUsers);//записываем логин пользователя по GET
    // Проверим подписан ли мастер на данный Заказ
    if (!empty($dataUsers['login'])) {
        $result =0;
        while ($dataOrders = mysqli_fetch_array($queryOrders)) {
            if ($dataOrders['number']=== $ordersNumber) {
                $result = 1;
                $log->debug('Удачный переход', array('user' => $login, 'orders_id' => $ordersNumber, 'time' => date('H:i:s d.m.Y'))); 
                mysqli_query($data,"INSERT INTO clicks SET status_click='1', user_id=(SELECT Id from users WHERE login = '" . mysqli_real_escape_string($data,$login) . "' LIMIT 1), orderId=(SELECT orderId from user_order WHERE Id = '" . mysqli_real_escape_string($data,$ordersNumber) . "' LIMIT 1), times = now() "); // переписать запросы БД как в файле форм, login и name сделать через select.
                header ("Location:" . $dataOrders['url']. ""); 
                exit();
                //echo $dataOrders['url'];
            }
        };
        if ($result == 0 ) {
            $log->debug('Неудачный переход', array('user' => $login, 'orders_id' => $ordersNumber, 'time' => date('H:i:s d.m.Y')));
            mysqli_query($data,"INSERT INTO clicks SET status_click='0', user_id=(SELECT Id from users WHERE login = '" . mysqli_real_escape_string($data,$login) . "' LIMIT 1), orderId='NULL', times = now()");
            header("HTTP/1.0 404 Not Found");
            //Echo'Такого заказа нет';
        }  
    } else {
        $log->debug('Неудачный переход', array('user' => $login, 'orders_id' => $ordersNumber, 'time' => date('H:i:s d.m.Y')));
        mysqli_query($data,"INSERT INTO clicks SET status_click='0', user_id=(SELECT Id from users WHERE login = '" . mysqli_real_escape_string($data,$login) . "' LIMIT 1), orderId = (SELECT orderId from user_order WHERE Id = '" . mysqli_real_escape_string($data,$ordersNumber) . "' LIMIT 1), times = now()");
        header("HTTP/1.0 404 Not Found");
        //Echo "Такого пользователя не существует";
    }
} else {
    $log->debug('Неудачный переход', array('user' => $login, 'orders_id' => $ordersNumber, 'time' => date('H:i:s d.m.Y')));
    mysqli_query($data,"INSERT INTO clicks SET status_click='0', user_id='NULL', orderId='NULL', times = now()");
    header("HTTP/1.0 404 Not Found");
    //echo 'Отсутствуют данные пользователя или данные заказа';
}
?>