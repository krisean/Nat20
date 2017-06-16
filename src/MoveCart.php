<?php
require_once 'RemoveAllFromCart.php';
function moveCart($guestCart, $userCart) { 
    global $dbc;
	removeAllFromCart($userCart);
    $update = 'UPDATE CartItems SET Cart_id = :userCart WHERE Cart_id = :guestCart';
    $statement = $dbc->prepare($update);
	$statement->bindValue(':userCart', $userCart);	
	$statement->bindValue(':guestCart', $guestCart);
    $statement->execute();
    $statement->closeCursor();
	$delete = 'DELETE FROM Cart WHERE Cart_id = :guestCart';
	$statement = $dbc->prepare($delete);	
	$statement->bindValue(':guestCart', $guestCart);
    $statement->execute();
    $statement->closeCursor();
}
?>