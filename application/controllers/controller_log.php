<?php

	class Controller_Log extends Controller
	{
		function __construct()
		{
			$this->model = new Model_Log();
			$this->view = new View();
		}
		
		function action_index()
		{
			$data = $this->model -> getLog(); 
			$this->view->generate('log_view.php', 'template_view.php', $data);
		}
	};

 ?>