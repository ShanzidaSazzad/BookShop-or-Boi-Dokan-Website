<?php
include 'db.php';

$sql = "SELECT * FROM customer_orders ORDER BY id ASC";
$result = $conn->query($sql);
?>

<html>
<head>
  <title>Admin - Customer Orders</title>
</head>
<body>
  <div class="admin-container">
    <h2>Customer Orders</h2>
    <?php if ($result->num_rows > 0): ?>
    <table>
      <tr>
        <th>ID</th>
        <th>Order ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Operations</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['order_id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['phone']) ?></td>
        <td><?= nl2br(htmlspecialchars($row['address'])) ?></td>
        <td>
        <a href="update_order.php?id=<?= $row['id'] ?>" class="btn update">Update</a>
        <a href="delete_order.php?id=<?= $row['id'] ?>" class="btn delete" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
    <?php else: ?>
      <p>No orders found.</p>
    <?php endif; ?>

    <?php $conn->close(); ?>
  </div>



  <style>
    .admin-container {
      max-width: 1000px;
      margin: auto;
      background: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      text-align: left;
      padding: 10px;
      border: 1px solid #ddd;
    }
    th {
      background-color: #4CAF50;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .btn {
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
      text-decoration: none;
      color: white;
      font-weight: bold;
      margin-right: 5px;
    }

    .btn.update {
      background-color: #007bff;
    }

    .btn.delete {
      background-color: #dc3545;
    }

  </style>
</body>
</html>
