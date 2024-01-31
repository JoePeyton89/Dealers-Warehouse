<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Add New Customer</h2>
    <form action="process.php" method="post">
        <label for="customer_name">Customer Name:</label>
        <input type="text" name="customer_name" required>
        <br>
        <label for="address1">Address 1:</label>
        <input type="text" name="address1" required>
        <br>
        <label for="address2">Address 2:</label>
        <input type="text" name="address2">
        <br>
        <label for="city">City:</label>
        <input type="text" name="city" required>
        <br>
        <label for="state">State:</label>
        <input type="text" name="state" required>
        <br>
        <label for="zip">Zip:</label>
        <input type="text" name="zip" required>
        <br>
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="business_type">Type of Business:</label>
        <select name="business_type">
            <option value="Corporation">Corporation</option>
            <option value="LLC">LLC</option>
            <option value="Sole Proprietor">Sole Proprietor</option>
            <option value="Other">Other</option>
        </select>
        <br>
        <label for="preferred_days">Preferred Days of Receiving Shipments:</label>
        <input type="checkbox" name="preferred_days[]" value="M"> Monday
        <input type="checkbox" name="preferred_days[]" value="T"> Tuesday
        <input type="checkbox" name="preferred_days[]" value="W"> Wednesday
        <input type="checkbox" name="preferred_days[]" value="R"> Thursday
        <input type="checkbox" name="preferred_days[]" value="F"> Friday
        <br>
        <input type="submit" value="Add Customer">
    </form>

    <hr>

    <h2>Customer List</h2>
    <?php include 'display_customers.php'; ?>

</body>
</html>
