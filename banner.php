<?php
namespace tolken;

require_once 'Conn.php';
require_once 'Visit.php';

$visit=new Visit();
$conn=new Conn();

$conn->query('
	INSERT INTO visit(ip_address, user_agent, page_url)
	VALUES ("'.$conn->real_escape_string($visit->get_ip_address()).'", "'.$conn->real_escape_string($visit->get_user_agent()).'", "'.$conn->real_escape_string($visit->get_page_url()).'")
	ON DUPLICATE KEY UPDATE views_count=views_count+1;
');

header('Content-Type: image/png');
readfile('images/car'.(stripos($visit->get_page_url(), 'ndex1')?'1':'2').'.png');

?>
