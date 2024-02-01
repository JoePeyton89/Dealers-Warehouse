<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <h2>Add New Customer</h2>
    <form action="process.php" method="post">

        <div class="form-group">
            <label for="customer_name">Customer Name:</label>
            <input type="text" class="form-control" name="customer_name" required>
        </div>

        <div class="form-group">
            <label for="address1">Address 1:</label>
            <input type="text" class="form-control" name="address1" required>
        </div>

        <div class="form-group">
            <label for="address2">Address 2:</label>
            <input type="text" class="form-control" name="address2">
        </div>

        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" name="city" required>
        </div>

        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" class="form-control" name="state" required>
        </div>

        <div class="form-group">
            <label for="zip">Zip:</label>
            <input type="text" class="form-control" name="zip" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" name="phone" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="form-group">
            <label for="business_type">Type of Business:</label>
            <select class="form-control" name="business_type">
                <option value="Corporation">Corporation</option>
                <option value="LLC">LLC</option>
                <option value="Sole Proprietor">Sole Proprietor</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="preferred_days">Preferred Days of Receiving Shipments:</label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="preferred_days[]" value="M" id="Monday">
                <label class="form-check-label" for="Monday">Monday</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="preferred_days[]" value="T" id="Tuesday">
                <label class="form-check-label" for="Tuesday">Tuesday</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="preferred_days[]" value="W" id="Wednesday">
                <label class="form-check-label" for="Wednesday">Wednesday</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="preferred_days[]" value="R" id="Thursday">
                <label class="form-check-label" for="Thursday">Thursday</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="preferred_days[]" value="F" id="Friday">
                <label class="form-check-label" for="Friday">Friday</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Add Customer</button>

    </form>

    <hr>

    <h2>Customer List</h2>
    <?php include 'display_customers.php'; ?>
    
</body>
</html>

