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

	class Model_Admin extends Model
	{
		static function getStatus()
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

		static function getUsers()
		{	
			$db = Base::getConnection();
			$sql = 'SELECT users.login, status_id.status, users.active FROM users JOIN status_id ON status_id.Id = users.Id_status WHERE active = 1 AND status <> "admin" ';
			$result = $db->query($sql);
			$index = array();
			$i=0;
			while($row=$result->fetch()) {
				$index[$i]['status'] = $row['status'];
				$index[$i]['login'] = $row['login'];
				$i++;
			}
			return $index;
		}
	}

?>