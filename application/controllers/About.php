<?php

class About extends CI_Controller
{

    public function index()
    {
        $this->load->view('template_mutia/header_checkout');
        $this->load->view('template_mutia/navbar_new');
        $this->load->view('mutia_fashion/about/form_about');
        $this->load->view('template_mutia/footer_checkout');
    }
}
