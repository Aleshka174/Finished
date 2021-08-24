<?php
    $link=mysqli_connect("localhost", "root", "", "finished");
    $login = $_POST['login'];    

    $query = mysqli_query($link, "UPDATE users SET active = '0' WHERE login='" . mysqli_real_escape_string($link,$login) . "'");    
?>