<?php
function setItemQuantity($itemID, $quantity) { 
    global $dbc;
	$update = 'UPDATE CartItems SET Item_quantity = :quantity WHERE Item_id = :itemID';
	$statement = $dbc->prepare($update);
	$statement->bindValue(':itemID', $itemID);
	$statement->bindValue(':quantity', $quantity);
	$statement->execute();
	$statement->closeCursor();
}
?>