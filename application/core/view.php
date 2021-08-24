<?php 
 
class View
{
	public $template_view = 'Main';

	function generate($content_view, $template_view, $data = null)
	{
		include 'application/views/'.$template_view;
	}
}
 ?>