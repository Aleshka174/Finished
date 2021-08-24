<?php
    $link=mysqli_connect("localhost", "root", "", "finished");
    $active = $_POST['active'];
    $login = $_POST['login'];    

    $query = mysqli_query($link, "UPDATE users SET active = '" . mysqli_escape_string($link, $active) . "' WHERE login = '" . mysqli_escape_string($link, $login) . "'");
?>