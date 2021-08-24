<?php

	class Controller_Webdev extends Controller
	{
		function __construct()
		{
			$this->model = new Model_Webdev();
			$this->view = new View();
		}
		
		function action_index()
		{	
			$data = array();
			$data['offer'] = $this->model -> getOffer(); 
			$data['offerActive'] = $this->model -> getOfferActive(); 
			$this->view->generate('webdev_view.php', 'template_view.php', $data);
		}
	};

?>