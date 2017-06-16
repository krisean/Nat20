<?php
function AddToOrder($productID) { 
    global $dbc;
    $insert = 'INSERT INTO Orders(Order_quantity, Order_date, Products_Prod_id) VALUES(1, NOW(),:productID)';
    $statement = $dbc->prepare($insert);
	$statement->bindValue(':productID', $productID);
    $statement->execute();
    $statement->closeCursor();
}
?>