<?php
    $link=mysqli_connect("localhost", "root", "", "finished");

    $queryClickTrue = mysqli_query($link, "SELECT sum(orders.prize) as sumPrize  FROM clicks JOIN orders ON orders.Id = clicks.orderId WHERE status_click = '1'");
    $clicks = mysqli_fetch_array($queryClickTrue);
    $prizeOrders = $clicks['sumPrize'] * 0.2;
    echo $prizeOrders;
?>