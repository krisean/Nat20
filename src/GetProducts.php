<?php
function Get20() { 
    global $dbc;
    $query = 'SELECT * FROM Products WHERE Prod_name LIKE "%20" ORDER BY Prod_id';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function Get12() { 
    global $dbc;
    $query = 'SELECT * FROM Products WHERE Prod_name LIKE "%12" ORDER BY Prod_id';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function Get10() { 
    global $dbc;
    $query = 'SELECT * FROM Products WHERE Prod_name LIKE "%10" ORDER BY Prod_id';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function Get8() { 
    global $dbc;
    $query = 'SELECT * FROM Products WHERE Prod_name LIKE "%8" ORDER BY Prod_id';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function Get6() { 
    global $dbc;
    $query = 'SELECT * FROM Products WHERE Prod_name LIKE "%6" ORDER BY Prod_id';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function Get4() { 
    global $dbc;
    $query = 'SELECT * FROM Products WHERE Prod_name LIKE "%4" ORDER BY Prod_id';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function GetPerc() { 
    global $dbc;
    $query = 'SELECT * FROM Products WHERE Prod_name LIKE "%Perc" ORDER BY Prod_id';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
?>