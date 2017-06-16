<?php
function AddToCustomers($username, $password, $firstname, $lastname, $phone, $email) { 
    global $dbc;
    $insert = 'INSERT INTO Cart VALUES()'; 
    $statement = $dbc->prepare($insert);
    $statement->execute();
    $statement->closeCursor();
	
	$getcartid = 'SELECT last_insert_id() AS Cart_id';
	$statement = $dbc->prepare($getcartid);
    $statement->execute();
	$results = $statement->fetchAll();
    $statement->closeCursor();
	$Cart_id = $results[0]['Cart_id'];
	
    $insert = 'INSERT INTO Customers (Cust_username, Cust_password, Cust_firstName, Cust_lastName, Cust_phone, Cust_email, Cart_id)
	VALUES (:Cust_username, :Cust_password, :Cust_firstName, :Cust_lastName, :Cust_phone, :Cust_email, :Cart_id)';
    $statement = $dbc->prepare($insert);
	$statement->bindValue(':Cust_username', $username);
	$statement->bindValue(':Cust_password', $password);
	$statement->bindValue(':Cust_firstName', $firstname);
	$statement->bindValue(':Cust_lastName', $lastname);
	$statement->bindValue(':Cust_phone', $phone);
	$statement->bindValue(':Cust_email', $email);
	$statement->bindValue(':Cart_id', $Cart_id);
    $statement->execute();
    $statement->closeCursor();
}
?>