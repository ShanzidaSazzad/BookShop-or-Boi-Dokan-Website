<?php
include 'db.php';

$email = $_POST['email'];
$order_id = $_POST['order_id'];

$sql = "DELETE FROM customer_orders WHERE email='$email' AND order_id='$order_id'";

if ($conn->query($sql) === TRUE) {
  if ($conn->affected_rows > 0) {
    echo "Order cancelled successfully!";
  } else {
    echo "No matching order found!";
  }
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
