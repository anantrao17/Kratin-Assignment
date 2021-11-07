<?php

$api_url = 'https://api.thingspeak.com/channels/1400632/fields/1,2.json?api_key=NTIWSUNYWV4JXHWL&results=4';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// All user data exists in 'data' object
// $user_data = $response_data->stack;

// Cut long data into small & select only first 10 records
// $user_data = array_slice($user_data, 0, 9);

// Print data if need to debug
print_r($response_data->feeds[0]-> created_at);

// Traverse array and display user data
// foreach ($user_data as $user) {
// 	echo "name: ".$user->field2;
// 	echo "<br />";
// 	echo "name: ".$user->created_at;
// 	echo "<br /> <br />";
// }

?>