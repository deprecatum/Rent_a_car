<?php

class publico extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper( array('url','form') );
        $this->load->library('session');
        
        $this->load->model('DB_handler');
    }


    public function sobre(){
         
        $this->load->view('templates/html_start');
        $this->load->view('templates/header');
        $this->load->view('templates/sobre');
        $this->load->view('templates/html_end');
    }


    public function contacto(){
         
        $this->load->view('templates/html_start');
        $this->load->view('templates/header'  );
        $this->load->view('templates/contacto');
        $this->load->view('templates/html_end');
    }


    public function index()
	{
        $this->load->view('templates/html_start');
        $this->load->view('templates/header'  );
		$this->load->view('templates/home');
        $this->load->view('templates/html_end');
	}
}
?>