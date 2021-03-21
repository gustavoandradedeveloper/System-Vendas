<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Site extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        
        $this->template->show('site/index');
        
    }
}