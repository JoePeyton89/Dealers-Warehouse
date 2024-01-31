<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customerName = $_POST['customer_name'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $businessType = $_POST['business_type'];
    $preferredDays = implode(",", $_POST['preferred_days']);

    // Insert data into the database
    $sql = "INSERT INTO customers (customer_name, address1, address2, city, state, zip, phone, email, business_type, preferred_days)
            VALUES ('$customerName', '$address1', '$address2', '$city', '$state', '$zip', '$phone', '$email', '$businessType', '$preferredDays')";

    if ($conn->query($sql) === TRUE) {
        // Retrieve the auto-incremented id (account number) for the new customer
        $accountNumber = $conn->insert_id;

        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


