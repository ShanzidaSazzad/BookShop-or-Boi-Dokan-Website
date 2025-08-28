<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);


    $stmt = $conn->prepare("SELECT * FROM customer_orders WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("UPDATE customer_orders SET name=?, email=?, phone=?, address=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $email, $phone, $address, $id);
    $stmt->execute();

    header("Location: admin.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Order</title>
</head>
<body>
    <h2>Update Order</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $order['id'] ?>">
        <label>Name: <input type="text" name="name" value="<?= htmlspecialchars($order['name']) ?>"></label><br><br>
        <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($order['email']) ?>"></label><br><br>
        <label>Phone: <input type="text" name="phone" value="<?= htmlspecialchars($order['phone']) ?>"></label><br><br>
        <label>Address:<br>
            <textarea name="address" rows="4" cols="40"><?= htmlspecialchars($order['address']) ?></textarea>
        </label><br><br>
        <button type="submit">Update Order</button>
    </form>
</body>
</html>
