<?php

require_once 'includes/dbms.inc.php';


if (isset($_REQUEST['movietitle'])) {
    $query = $connection->prepare("select * from bank_user where uid like ?");
    $query->bindValue(1, '%' . $_REQUEST['movietitle'] . '%', PDO::PARAM_STR);

    if (!$query->execute()) {
        echo print_r($query->errorInfo(), true);
    } else {
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }
} 


if (isset($_REQUEST['partialmovietitle'])) {
    $query = $connection->prepare("select * from bank_user where uid like ? limit 10");
    $query->bindValue(1, '%' . $_REQUEST['partialmovietitle'] . '%', PDO::PARAM_STR);

    if (!$query->execute()) {
        echo print_r($query->errorInfo(), true);
    } else {
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }
}

?>
