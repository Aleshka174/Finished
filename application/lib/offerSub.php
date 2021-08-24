<?php

$link=mysqli_connect("localhost", "root", "", "finished");
$login = $_POST['login'];
$URL = "http://localhost/";  

if (!empty($_POST['nameOfferActive'])) {
    $nameOfferActive = $_POST['nameOfferActive']; // заказы для отписки
    $query = mysqli_query($link, "UPDATE user_order SET active_user_order = '0' WHERE Id = '" . $nameOfferActive . "' AND userId = (SELECT Id from users WHERE login = '" . mysqli_real_escape_string($link,$login) . "')");
} else if(!empty($_POST['nameOfferDeactive'])){
    $nameOfferDeactive = $_POST['nameOfferDeactive']; // заказы для подписки
    $query = mysqli_query($link, "INSERT INTO user_order SET userId = (SELECT Id from users WHERE login = '" . mysqli_real_escape_string($link,$login) . "'), orderId = '" . $nameOfferDeactive . "', times_order = now(), active_user_order = '1'");
    $href= $URL . "redirect?login=".$login."&orders_number=".$nameOfferDeactive."";
    echo $href;
}
?>