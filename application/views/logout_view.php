<?php
// Страница разавторизации 
// Удаляем куки
unset($_SESSION);
header("Location: main"); exit; 
?>