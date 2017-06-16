<?php
require_once 'model/db_connect.php';
function removeAllFromCart($cartID) { 
    global $dbc;
    $remove = 'DELETE FROM CartItems WHERE Cart_id = :cartID';
    $statement = $dbc->prepare($remove);
	$statement->bindValue(':cartID', $cartID);
    $statement->execute();
    $statement->closeCursor();
}
?>