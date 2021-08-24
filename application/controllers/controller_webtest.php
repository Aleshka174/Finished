<?php

	class Controller_Webtest extends Controller
	{
		
		function action_index()
		{
			$this->view->generate('webtest_view.php', 'template_view.php');
		}
	};

 ?>