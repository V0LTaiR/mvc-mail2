<?php

class Mail extends Controller
{	
	function __construct()
    {
        $this->model = new Model_Mail();
        $this->view = new View();
    }

    function showForm()
    {
		$this->view->generate('mail_view.tpl');
    }

    function sendMail()
    {
		$data = $this->model->validSend($_POST['mail'], $_POST['name'], $_POST['theme'], $_POST['text']);
		$this->view->generate('mail_result.tpl', $data);
		
        
    }
}