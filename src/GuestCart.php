<?php
function createGuest() { 
    global $dbc;
    $insert = 'INSERT INTO Cart VALUES()'; 
    $statement = $dbc->prepare($insert);
    $statement->execute();
    $statement->closeCursor();
	
	$getcartid = 'SELECT last_insert_id() AS Cart_id';
	$statement = $dbc->prepare($getcartid);
    $statement->execute();
	$results = $statement->fetchAll();
    $statement->closeCursor();
	return $results[0]['Cart_id'];
}
?>