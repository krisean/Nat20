<?php
function isAvailable($username) { 
    global $dbc;
    $query = 'SELECT Cust_username FROM Customers WHERE Cust_username = :username';
    $statement = $dbc->prepare($query);
	$statement->bindValue(':username', $username);
    $statement->execute();
	$results = $statement->fetchAll();
    $statement->closeCursor();
	if (in_array($username, $results)) {
		return true;
	}
	else {
		return false;
	}
}
?>