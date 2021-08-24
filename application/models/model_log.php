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

	class Model_Log extends Model
	{
		static function getLog()
		{	
			$db = Base::getConnection();
			if(isset($_POST['submit'])){
				$logo = $_POST['login'];//$db->getConnection->real_escape_string($_POST['login']); почему то не работает?!
				$sql = "SELECT users.password, users.active, status_id.status FROM users JOIN status_id ON status_id.Id = users.Id_status WHERE login='". $logo ."' LIMIT 1";
				$result = $db->query($sql);
				$index = array();
				$i=0;
				while($row=$result->fetch()) {
					$index[$i]['status'] = $row['status'];
					$index[$i]['active'] = $row['active'];
					$index[$i]['password'] = $row['password'];
					$i++;
				}
				return $index;
			};
		}
	}

?>