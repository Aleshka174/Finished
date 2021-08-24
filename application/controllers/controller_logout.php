<?php

	class Controller_Logout extends Controller
	{
		
		function action_index()
		{
			$this->view->generate('logout_view.php', 'template_view.php');
		}
	};

 ?>