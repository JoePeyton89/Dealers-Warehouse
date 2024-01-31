<?php
include 'config.php';

// Handle delete action
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_customer'])) {
    $customerID = $_POST['delete_customer'];

    $sqlDelete = "DELETE FROM customers WHERE id = $customerID";
    if ($conn->query($sqlDelete) === TRUE) {
        echo "Customer deleted successfully.";
    } else {
        echo "Error deleting customer: " . $conn->error;
    }
}

// Handle edit action
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_customer'])) {
    $customerID = $_POST['edit_customer'];
    header("Location: edit_customer.php?id=$customerID");
    exit();
}

// Retrieve and display customers sorted by most recently added
$sql = "SELECT * FROM customers ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table border="1">
            <tr>
                <th>Account Number</th>
                <th>Customer Name</th>
                <th>Billing Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Business Type</th>
                <th>Preferred Days</th>
            </tr>';

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['customer_name']}</td>
                <td>{$row['address1']} {$row['address2']} {$row['city']}, {$row['state']} {$row['zip']} </td>
                <td>{$row['phone']}</td>
                <td>{$row['email']}</td>
                <td>{$row['business_type']}</td>
                <td>{$row['preferred_days']}</td>
                <td>
                    <form method='post' action=''>
                        <input type='hidden' name='edit_customer' value='{$row['id']}'>
                        <button type='submit'>Edit</button>
                    </form>
                </td>
                <td>
                    <form method='post' action=''>
                        <input type='hidden' name='delete_customer' value='{$row['id']}'>
                        <button type='submit'>Delete</button>
                    </form>
                </td>
              </tr>";
    }

    echo '</table>';
} else {
    echo 'No customers found.';
}

$conn->close();
?>

