<?php
function GetAllCustomers() { 
    global $dbc;
    $query = 'SELECT * FROM Customers';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
?>