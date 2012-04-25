<?php

class AuthenticationHook {
	
	function HasAuth() {
		
		$CI =& get_instance();
		
		if(!$CI->session->userdata('tractus_user_logged_in') && $CI->router->fetch_method() != 'login') {
			redirect('account/login');
		}
		
	}
	
}