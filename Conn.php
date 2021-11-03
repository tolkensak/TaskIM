<?php
namespace tolken;

class Conn extends \mysqli{
	public function __construct(){
		parent::init();
		parent::options(MYSQLI_INIT_COMMAND, 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci') or exit('MYSQLI_INIT_COMMAND failed');
		parent::real_connect('localhost', 'task', 'task', 'taskim') or exit('Conn failed (' . $this->connect_errno.'): '.$this->connect_error);
	}

	public function __destruct(){
		parent::close();
	}
}

?>
