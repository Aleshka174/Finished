<?php
    $link=mysqli_connect("localhost", "root", "", "finished");
    $numberOffer = $_POST['nameOfferActive'];    
    
    for ($i = 0; $i < count($numberOffer); $i++) { 
        $query = mysqli_query($link, "UPDATE orders SET active_orders = '0' WHERE Id = '". $numberOffer[$i] ."'");
    };
?>