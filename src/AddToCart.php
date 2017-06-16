<?php
require_once 'GetCartItems.php';
require_once 'SetItemQuantity.php';
function AddToCart($productID, $quantity, $cartID) { 
    global $dbc;
	$cartContents = getCartItems($cartID);
	foreach ($cartContents as $cartContent) {
		if ($cartContent['Prod_id'] == $productID) {
			$itemID = $cartContent ['Item_id'];
			$quantity += $cartContent['Item_quantity'];
			setItemQuantity($itemID, $quantity);
			return;
		}
	}
	$insert = 'INSERT INTO CartItems(Item_quantity, Cart_id, Prod_id) VALUES(:quantity, :cartID ,:productID)';
	$statement = $dbc->prepare($insert);
	$statement->bindValue(':productID', $productID);
	$statement->bindValue(':cartID', $cartID);
	$statement->bindValue(':quantity', $quantity);
	$statement->execute();
	$statement->closeCursor();
}
?>