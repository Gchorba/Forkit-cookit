<?php
	$m = new Mongo("mongodb://jsvcycling@127.0.0.1:27017/testdb");
	$m->connect();
	$db = $m->testdb;
	$collection = $db->testcollection;
	$collection->insert(array('name'=>'super test 5000'));
	
	$cursor = $collection->find();
	echo $cursor->count() . ' documents found. <br />';
	foreach ($cursor as $obj) {
		var_dump($obj);
		echo "<br />";
	}
?>