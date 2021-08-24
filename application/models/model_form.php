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

	class Model_Form extends Model
	{
		static function getInfo()
		{	
			$db = Base::getConnection();
			$sql = 'SELECT status FROM status_id';
			$result = $db->query($sql);
			$index = array();
			$i=0;
			while($row=$result->fetch()) {
				$index[$i]['status'] = $row['status'];
				$i++;
			}
			return $index;
		}
	}

?>