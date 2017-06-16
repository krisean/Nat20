<?php
function getCustomer($email) { 
    global $dbc;
    $query = 'SELECT * FROM Customers WHERE Cust_email = :Cust_email';
    $statement = $dbc->prepare($query);
	$statement->bindValue(':Cust_email', $email);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
?>