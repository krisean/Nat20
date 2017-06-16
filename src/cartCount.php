<?php
function getCartCount($cartID) { 
    global $dbc;
	$query = 'SELECT SUM(Item_quantity) FROM CartItems WHERE Cart_id = :cartID';
	$statement = $dbc->prepare($query);
	$statement->bindValue(':cartID', $cartID);
	$statement->execute();
	$results = $statement->fetchAll();
    $statement->closeCursor();
	return $results[0][0];
}
?>