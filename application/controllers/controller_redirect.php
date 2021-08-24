<?php

	class Controller_redirect extends Controller
	{

		function action_index()
		{	
			$this->view->generate('redirect_view.php', 'template_view.php');
		}
	};

?>