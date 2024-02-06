<?php
include 'config.php';

// Check if the request method is GET and if the 'id' parameter is set in the URL
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $customerId = $_GET['id'];

    // SQL query to select customer data based on the provided ID
    $sql = "SELECT * FROM customers WHERE id = $customerId";
    $result = $conn->query($sql);

    // Check if any rows are returned from the query
    if ($result->num_rows > 0) {
        $customerData = $result->fetch_assoc();
    } else {
        echo '<div class="alert alert-danger" role="alert">Customer not found.</div>';
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <h2>Edit Customer</h2>
    <form action="update_customer.php" method="post">

        <!-- Hidden input to store the customer ID for form submission -->
        <input type="hidden" name="customer_id" value="<?php echo $customerData['id']; ?>">

        <div class="form-group">
            <label for="customer_name">Customer Name:</label>
            <input type="text" class="form-control" name="customer_name" value="<?php echo $customerData['customer_name']; ?>" required>
        </div>

        <div class="form-group">
            <label for="billing_address">Billing Address:</label>
            <br>
            <label for="address1">Address 1:</label>
            <input type="text" class="form-control" name="address1" value="<?php echo $customerData['address1']; ?>" required>
        </div>

        <div class="form-group">
            <label for="address2">Address 2:</label>
            <input type="text" class="form-control" name="address2" value="<?php echo $customerData['address2']; ?>">
        </div>

        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" name="city" value="<?php echo $customerData['city']; ?>" required>
        </div>

        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" class="form-control" name="state" value="<?php echo $customerData['state']; ?>" required>
        </div>

        <div class="form-group">
            <label for="zip">Zip:</label>
            <input type="text" class="form-control" name="zip" value="<?php echo $customerData['zip']; ?>" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" name="phone" value="<?php echo $customerData['phone']; ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" value="<?php echo $customerData['email']; ?>" required>
        </div>

        <div class="form-group">
            <label for="business_type">Type of Business:</label>
            <select class="form-control" name="business_type">
                <option value="Corporation" <?php echo ($customerData['business_type'] == 'Corporation') ? 'selected' : ''; ?>>Corporation</option>
                <option value="LLC" <?php echo ($customerData['business_type'] == 'LLC') ? 'selected' : ''; ?>>LLC</option>
                <option value="Sole Proprietor" <?php echo ($customerData['business_type'] == 'Sole Proprietor') ? 'selected' : ''; ?>>Sole Proprietor</option>
                <option value="Other" <?php echo ($customerData['business_type'] == 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="preferred_days">Preferred Days of Receiving Shipments:</label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="preferred_days[]" value="M" <?php echo (in_array('M', explode(',', $customerData['preferred_days']))) ? 'checked' : ''; ?>> Monday
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="preferred_days[]" value="T" <?php echo (in_array('T', explode(',', $customerData['preferred_days']))) ? 'checked' : ''; ?>> Tuesday
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="preferred_days[]" value="W" <?php echo (in_array('W', explode(',', $customerData['preferred_days']))) ? 'checked' : ''; ?>> Wednesday
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="preferred_days[]" value="R" <?php echo (in_array('R', explode(',', $customerData['preferred_days']))) ? 'checked' : ''; ?>> Thursday
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="preferred_days[]" value="F" <?php echo (in_array('F', explode(',', $customerData['preferred_days']))) ? 'checked' : ''; ?>> Friday
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</body>
</html>

