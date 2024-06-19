<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='Класика' LIMIT 4");

$stmt->execute();


$classick_products = $stmt->get_result();

?>