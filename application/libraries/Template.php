<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Template {
 
		function show($view, $data=array()){
 
			$CI = & get_instance();
 
			// Load header
			$CI->load->view('site/header',$data);
 
			// Load content parte que varia no site
			$CI->load->view($view,$data);
 
			// Load footer
			$CI->load->view('site/footer',$data);
 
			// Scripts é carregado no final para que não ocorrar erro e trave o funcionamento do site
			$CI->load->view('site/scripts',$data);
		}
}
 
/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */
