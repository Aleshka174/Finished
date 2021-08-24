<?php
    $link=mysqli_connect("localhost", "root", "", "finished");
    $nameOffer = $_POST['nameOffer'];
    $prizeOffer = $_POST['prizeOffer'];
    $urlOffer = $_POST['urlOffer'];
    $theameOffer = $_POST['theameOffer'];
    $login = $_POST['login'];    

    $query = mysqli_query($link, "INSERT INTO orders SET name = '" . $nameOffer . " ', prize = '". $prizeOffer . "', url = '" . $urlOffer . "', theame = '" . $theameOffer . "', times_create = now(), creater_id = (SELECT Id from users WHERE login = '" . mysqli_real_escape_string($link,$login) . "'), active_orders = '1'");
?>
