<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $customerId = $_GET['id'];

    $sql = "SELECT * FROM customers WHERE id = $customerId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $customerData = $result->fetch_assoc();
    } else {
        echo "Customer not found.";
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Edit Customer</h2>
    <form action="update_customer.php" method="post">
        <input type="hidden" name="customer_id" value="<?php echo $customerData['id']; ?>">

        <label for="customer_name">Customer Name:</label>
        <input type="text" name="customer_name" value="<?php echo $customerData['customer_name']; ?>" required>
        <br>
        <label for="billing_address">Billing Address:</label>
        <br>
        <label for="address1">Address 1:</label>
        <input type="text" name="address1" value="<?php echo $customerData['address1']; ?>" required>
        <br>
        <label for="address2">Address 2:</label>
        <input type="text" name="address2" value="<?php echo $customerData['address2']; ?>">
        <br>
        <label for="city">City:</label>
        <input type="text" name="city" value="<?php echo $customerData['city']; ?>" required>
        <br>
        <label for="state">State:</label>
        <input type="text" name="state" value="<?php echo $customerData['state']; ?>" required>
        <br>
        <label for="zip">Zip:</label>
        <input type="text" name="zip" value="<?php echo $customerData['zip']; ?>" required>
        <br>
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" value="<?php echo $customerData['phone']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $customerData['email']; ?>" required>
        <br>
        <label for="business_type">Type of Business:</label>
        <select name="business_type">
            <option value="Corporation" <?php echo ($customerData['business_type'] == 'Corporation') ? 'selected' : ''; ?>>Corporation</option>
            <option value="LLC" <?php echo ($customerData['business_type'] == 'LLC') ? 'selected' : ''; ?>>LLC</option>
            <option value="Sole Proprietor" <?php echo ($customerData['business_type'] == 'Sole Proprietor') ? 'selected' : ''; ?>>Sole Proprietor</option>
            <option value="Other" <?php echo ($customerData['business_type'] == 'Other') ? 'selected' : ''; ?>>Other</option>
        </select>
        <br>
        <label for="preferred_days">Preferred Days of Receiving Shipments:</label>
        <input type="checkbox" name="preferred_days[]" value="M" <?php echo (in_array('M', explode(',', $customerData['preferred_days']))) ? 'checked' : ''; ?>> Monday
        <input type="checkbox" name="preferred_days[]" value="T" <?php echo (in_array('T', explode(',', $customerData['preferred_days']))) ? 'checked' : ''; ?>> Tuesday
        <input type="checkbox" name="preferred_days[]" value="W" <?php echo (in_array('W', explode(',', $customerData['preferred_days']))) ? 'checked' : ''; ?>> Wednesday
        <input type="checkbox" name="preferred_days[]" value="R" <?php echo (in_array('R', explode(',', $customerData['preferred_days']))) ? 'checked' : ''; ?>> Thursday
        <input type="checkbox" name="preferred_days[]" value="F" <?php echo (in_array('F', explode(',', $customerData['preferred_days']))) ? 'checked' : ''; ?>> Friday
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
