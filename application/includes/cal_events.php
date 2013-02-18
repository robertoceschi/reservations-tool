<?php
	
	// Database Connection
    include(APPPATH.'includes/connection.php');
	
	// Calendar Class
    include(APPPATH.'libraries/My_Calendar.php');
    //$this->load->library('My_Calendar');
	
	// Starts the Calendar Class @params 'DB Server', 'DB Username', 'DB Password', 'DB Name', 'Table Name'
	$calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE);
	
	echo $calendar->json_transform();
		
?>