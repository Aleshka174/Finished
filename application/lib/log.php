<?php
require 'vendor/autoload.php'; 

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\HtmlFormatter;

// Создаем логгер 
$log = new Logger('mylogger');

$log->pushHandler(new StreamHandler('logs/log.log', Logger::DEBUG));

?>