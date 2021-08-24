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

	class Model_Webdev extends Model
	{
		static function getOfferActive()
		{	
			$db = Base::getConnection();
			$sqlOfferActive = "SELECT user_order.Id as number, orders.name as name FROM user_order JOIN users on users.Id = user_order.userId Join orders on orders.Id = user_order.orderId WHERE active_user_order = '1' AND login = '". $_SESSION['login'] ."'";
			$resultOfferActive = $db->query($sqlOfferActive);
			$index = array();
			$i=0;
			while($row=$resultOfferActive->fetch()) {
				$index[$i]['number'] = $row['number'];
				$index[$i]['name'] = $row['name'];
				$i++;
			}
			return $index;
		}
		static function getOffer()
		{	
			$db = Base::getConnection();
			$activeOrder = Model_Webdev::getOfferActive();
			if (!empty($activeOrder)) {
				foreach($activeOrder as $rows){
					$sqlOffer = "SELECT Id as number, name, (prize*0.8) as prize FROM orders  WHERE active_orders = '1' AND name <> '". $rows['name'] ."'";
					$resultOffer = $db->query($sqlOffer);
					$index = array();
					$i=0;
					while($row=$resultOffer->fetch()) {
						$index[$i]['number'] = $row['number'];
						$index[$i]['name'] = $row['name'];
						$index[$i]['prize'] = $row['prize'];
						$i++;
					}
					return $index;
				}
			} else {
					$sqlOffer = "SELECT Id as number, name, (prize*0.8) as prize FROM orders  WHERE active_orders = '1'";
					$resultOffer = $db->query($sqlOffer);
					$index = array();
					$i=0;
					while($row=$resultOffer->fetch()) {
						$index[$i]['number'] = $row['number'];
						$index[$i]['name'] = $row['name'];
						$index[$i]['prize'] = $row['prize'];
						$i++;
					}
					return $index;
			}
		}
	}

?>