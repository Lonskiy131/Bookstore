<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='Історичні' LIMIT 4");

$stmt->execute();




$history = $stmt->get_result();

?>