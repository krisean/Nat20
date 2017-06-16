<?php
function getUser($email, $password) { 
    global $dbc;
    $query = 'SELECT * FROM Customers WHERE Cust_email = :Cust_email AND Cust_password = :Cust_password ORDER BY Item_id';
    $statement = $dbc->prepare($query);
	$statement->bindValue(':Cust_email', $email);
	$statement->bindValue(':Cust_password', $password);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
	return $results;
}
?>

<?php
function SetUpCart($Cart_id, $Cust_id) { 
    global $dbc;
    $insert = 'INSERT INTO Cart (Cart_id, Cust_id)
	VALUES (:Cart_id, :Cust_id)';
    $statement = $dbc->prepare($insert);
	$statement->bindValue(':Cart_id', $Cart_id);
	$statement->bindValue(':Cust_id', $Cust_id);
    $statement->execute();
    $statement->closeCursor();
}
?>