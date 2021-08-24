<?php

	class Controller_office extends Controller
	{
		
		function action_index()
		{
			$this->view->generate('office_view.php', 'template_view.php');
		}
	};

 ?>