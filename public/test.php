<?php
if(isset($_GET['name'])) {
// This is a simple example and will only give you a list of furniture
$api_url = 'https://api.habboapi.net/furni?code=' . $_GET['name'];
// Get furniture from our API
$furnis = json_decode(file_get_contents($api_url), true); 
foreach($furnis['data'] as $furni){
	// Echo out furniture
	echo '<img class="icon" src="' . $furni['icon'] . '" />'; 
}
}
?>