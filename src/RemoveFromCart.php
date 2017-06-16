<?php
function removeFromCart($itemID) { 
    global $dbc;
    $remove = 'DELETE FROM CartItems WHERE Item_id = :itemID';
    $statement = $dbc->prepare($remove);
	$statement->bindValue(':itemID', $itemID);
    $statement->execute();
    $statement->closeCursor();
}
?>