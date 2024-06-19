<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='Романтика' LIMIT 4");

$stmt->execute();




$romantick = $stmt->get_result();

?>