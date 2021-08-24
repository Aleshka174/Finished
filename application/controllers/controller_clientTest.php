<?php

	class Controller_ClientTest extends Controller
	{
		
		function action_index()
		{
			$this->view->generate('clientTest_view.php', 'template_view.php');
		}
	};

 ?>