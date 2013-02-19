<?php

    // Database Connection
    include('connection.php');

    // Calendar Class
    include('calendar.php');
	
	// Starts the Calendar Class @params 'DB Server', 'DB Username', 'DB Password', 'DB Name', 'Table Name'
	$calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE);
	
	// Catch start, end and id from javascript
	$id = $_POST['id'];
	$event_title = $_POST['title_update'];
	$event_description = $_POST['description_update'];
	
	if(isset($_POST['url_update'])) {
		$url = $_POST['url_update'];
	} else {
		$url = 'false';	
	}
	
	$calendar->updates($id, $event_title, $event_description, $url);

?>