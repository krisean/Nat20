<?php
function getCartItems($cartID) { 
    global $dbc;
    $query = 'SELECT * FROM CartItems WHERE Cart_id = :cartID ORDER BY Item_id';
    $statement = $dbc->prepare($query);
	$statement->bindValue(':cartID', $cartID);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
	return $results;
}
?>