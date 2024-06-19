<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='Бізнес' LIMIT 4");

$stmt->execute();




$bisnes = $stmt->get_result();

?>