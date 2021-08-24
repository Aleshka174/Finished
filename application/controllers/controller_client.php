<?php

	class Controller_Client extends Controller
	{
		function __construct()
		{
			$this->model = new Model_Client();
			$this->view = new View();
		}
		
		function action_index()
		{	
			$data = $this->model -> getOrders(); 
			$this->view->generate('client_view.php', 'template_view.php', $data);
		}
	};

 ?>