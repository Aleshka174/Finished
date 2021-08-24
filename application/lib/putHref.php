<?php
    $link=mysqli_connect("localhost", "root", "", "finished");
    $login = $_POST['login'];  
    $url = "http://localhost/";

    $nameOfferActive = $_POST['nameOfferActive']; // заказы для отписки
    $href= $url . "redirect?login=".$login."&orders_number=".$nameOfferActive."";
    echo $href;
?>