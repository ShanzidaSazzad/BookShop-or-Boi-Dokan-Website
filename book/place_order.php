<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$order_id = $_POST['order_id'];

$sql = "INSERT INTO customer_orders (order_id, name, email, phone, address)
        VALUES ('$order_id', '$name', '$email', '$phone', '$address')";

if ($conn->query($sql) === TRUE) {
  echo "Order placed successfully! Your Order ID is: <strong>$order_id</strong>";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
