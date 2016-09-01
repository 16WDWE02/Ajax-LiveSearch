<?php

//Include our secure variables
include("../../config.inc.php");

// Connect to the database
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Filter the search query
$searchQuery = $dbc->real_escape_string($_GET['query']);

//Search for person
$sql = "SELECT first_name, last_name, email_address, phone
		FROM customers
		WHERE CONCAT(first_name, ' ', last_name)
		LIKE '%$searchQuery%'
		ORDER BY first_name ASC
		LIMIT 5";

//Run the Query
$result = $dbc->query($sql);

//Fetch all of the data
$alldata = $result->fetch_all();

//Convert the result into JSON
$alldata = json_encode($alldata);

//Tell the js it is about to recieve JSON, not text
header('Content-Type: application/json');

echo $alldata;



