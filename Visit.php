<?php
namespace tolken;

class Visit{
	protected $ip_address='';
	protected $user_agent='';
	protected $page_url='';

	public function __construct(){
		$this->determine_ip_address();
		$this->determine_user_agent();
		$this->determine_page_url();
	}

	public function get_ip_address(){
		return $this->ip_address;
	}

	public function get_user_agent(){
		return $this->user_agent;
	}

	public function get_page_url(){
		return $this->page_url;
	}

	protected function determine_ip_address(){
		if(isset($_SERVER['HTTP_CLIENT_IP'])){
			$this->ip_address=$_SERVER['HTTP_CLIENT_IP'];
		}
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$this->ip_address=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else if(isset($_SERVER['HTTP_X_FORWARDED'])){
			$this->ip_address=$_SERVER['HTTP_X_FORWARDED'];
		}
		else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
			$this->ip_address=$_SERVER['HTTP_FORWARDED_FOR'];
		}
		else if(isset($_SERVER['HTTP_FORWARDED'])){
			$this->ip_address=$_SERVER['HTTP_FORWARDED'];
		}
		else if(isset($_SERVER['REMOTE_ADDR'])){
			$this->ip_address=$_SERVER['REMOTE_ADDR'];
		}
		else{
			$this->ip_address='Unknown';
		}
	}

	protected function determine_user_agent(){
		$ua=' '.strtolower($_SERVER['HTTP_USER_AGENT']);

		if(strpos($ua, 'opera') || strpos($ua, 'opr/')){
			$this->user_agent='Opera';
		}
		else if(strpos($ua, 'edge')){
			$this->user_agent='Edge';
		}
		else if(strpos($ua, 'chrome')){
			$this->user_agent='Chrome';
		}
		else if(strpos($ua, 'safari')){
			$this->user_agent='Safari';
		}
		else if(strpos($ua, 'firefox')){
			$this->user_agent='Firefox';
		}
		else if(strpos($ua, 'msie') || strpos($ua, 'trident/7')){
			$this->user_agent='Internet Explorer';
		}
		else{
			$this->user_agent='Unknown';
		}
	}

	protected function determine_page_url(){
		$this->page_url=$_SERVER['HTTP_REFERER'];
	}
}

?>
