<?php

	class Controller_Form extends Controller
	{
		function __construct()
		{
			$this->model = new Model_Form();
			$this->view = new View();
		}
		
		function action_index()
		{
			$data = $this->model -> getInfo(); 
			$this->view->generate('form_view.php', 'template_view.php', $data);
		}
	};

?>