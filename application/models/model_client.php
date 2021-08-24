<?php 

	class Base
	{
		public static function getConnection()
		{ 
			// Получаем параметры подключения из файла
			$paramsPath = 'data/config_db.php';
			$params = include($paramsPath);

			// Устанавливаем соединение 
			$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
			$db = new PDO($dsn, $params['user'], $params['password']);
			return $db;
		} 
	}

	class Model_Client extends Model
	{
		static function getOrders()
		{	
			$db = Base::getConnection();
			$sql = "SELECT orders.Id as number, orders.name FROM orders JOIN users ON users.Id = orders.creater_id WHERE active_orders = '1' AND login ='". $_SESSION['login'] . "'";
			$result = $db->query($sql);
			$index = array();
			$i=0;
			while($row=$result->fetch()) {
				$sqlCount = "SELECT count(user_order.Id) as countMaster FROM user_order JOIN orders ON orders.Id = user_order.orderId JOIN users ON users.Id = orders.creater_id  WHERE active_user_order = '1' AND login ='".  $_SESSION['login'] . "' AND name = '". $row['name'] ."'";
				$resultCount = $db->query($sqlCount);
				$rowOrders=$resultCount->fetch(); 
				$index[$i]['countMaster'] = $rowOrders['countMaster'];
				$index[$i]['number'] = $row['number'];
				$index[$i]['name'] = $row['name'];
				$i++;
			}
			return $index;
		}

	}

?>
