<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='Фантастика' LIMIT 4");

$stmt->execute();




$fantastyk = $stmt->get_result();

?>