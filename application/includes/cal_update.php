<?php

    // Database Connection
    include('connection.php');

    // Calendar Class
    include('calendar.php');
	
	// Starts the Calendar Class @params 'DB Server', 'DB Username', 'DB Password', 'DB Name', 'Table Name'
	$calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE);
	
	// Catch start, end and id from javascript
	$start = $_POST['start'];
	$end = $_POST['end'];
	$id = $_POST['id'];
	
	echo $calendar->update($start, $end, $id);

?>