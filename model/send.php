<?php

include_once("post.php");
$obj=new Post();

$number=$_GET["no"];
$msg=$_GET["msg"];


 if ($msg=="post") {
	
	$row=$obj->sendUpcomingEvent();
	if($row) {
		$row=$obj->fetch();
		$eventName=$row['event_name'];
		$desc=$row['description'];
	}
	
}

?>